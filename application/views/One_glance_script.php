<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Content
================================================== -->

<!-- Page JS 'One_glance_script.php'
================================================== -->
<script type="text/javascript">

$(document).ready(function() {

    $("#datepicker").datepicker({
        minDate: new Date(),
        dateFormat: 'dd-mm-y',
        maxDate: '+20D',
        onSelect: function(date, inst) { 
            var date_a = $.datepicker.formatDate("dd-mm-y", $("#datepicker[name=datepicker]").datepicker("getDate"));
            var date = date_a.replace(/-/g,'.');

            var facility_id = document.getElementById('facility_id_tb').value;

            $.ajax({
                type: 'post',
                url: '<?=base_url()?>index.php/student/get_facilities/refresh_form',
                dataType: "json",
                data: { id: facility_id, date: date },
                success: function (response) {
                    // @return facility - Selected Tab
                    // @return booked_facilties - Facilities that are booked
                    // @return timeslots - Avail slots after difference

                    var img_src = "<?=base_url('assets/uploads') ?>/facilities/" + response.facility[0].image;
                    $('#facility_group_img').attr('src', img_src);

                    document.getElementById('facility_id_tb').value = response.facility[0].facility_id;
                    document.getElementById('max_capacity_tb').value = response.facility[0].max_capacity;

                    // Timeslot Options
                    // ===================================================>
                    $("#AvaliableTimeslotOption").html("");

                    var size = response.timeslots.length;
                    var ts_dropdown = "<option value='default'>Please Select</option>";

                    // $("#AvaliableTimeslotOption").append(ts_dropdown);

                    if (size != 0)
                    {
                        for(var i=0; i<size; i++)
                        {
                            ts_dropdown = "<option value='" + response.timeslots[i].timeslot_id + "'>" + response.timeslots[i].start_time + ' - ' + response.timeslots[i].end_time + "</option>";
                            $("#AvaliableTimeslotOption").append(ts_dropdown);
                        }
                    }
                    else
                    {
                        var ts_dropdown = "<option value='default'>" + "No Slots Available" + "</option>";
                        $("#AvaliableTimeslotOption").append(ts_dropdown);
                    }

                    // Pax Options
                    // ===================================================>
                    $("#pax").html("");

                    console.log(response.timeslots);
                    console.log(response.booked_facilties);

                    var selected_slot = document.getElementById('AvaliableTimeslotOption').value;
                    var c_dropdown = "<option value=default>0</option>";

                    for(var i=0; i<size; i++)
                    {
                        if (response.timeslots[i].timeslot_id == selected_slot)
                        {
                            if (response.timeslots[i].left === undefined)
                            {
                                for (x=response.facility[0].max_capacity; x>0; x--) 
                                {
                                    var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                                    $("#pax").append(c_dropdown);
                                }
                                break;
                            }
                            else
                            {
                                for (x=response.timeslots[i].left; x>0; x--) 
                                {
                                    var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                                    $("#pax").append(c_dropdown);
                                }
                                break;
                            }
                        }
                    }
                    $('#ModalForm').modal('show');
                },
                // error: function (jqXHR, exception) {
                //     console.log(jqXHR);
                // }
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });


        }
    });
    $(function resetDatePicker() {
        $('#datepicker').datepicker('option', 'minDate', new Date());
    });
});

// $(document).ready(function () {
//      //$('#exampleModalCenter').modal('hide'); 
//      document.getElementById("ModalForm").style.display = 'none';

//       $("#ModalForm").on("show", function () {
//         $("body").addClass("modal-open");
//     }).on("hidden", function () {
//         $("body").removeClass("modal-open")
//     });
// });

// $('.modal-content').resizable({
//     //alsoResize: ".modal-dialog",
//     minHeight: 300,
//     minWidth: 300
// });
// $('.modal-dialog').draggable();

// $('#ModalForm').on('show.bs.modal', function() {
//     $(this).find('.modal-body').css({
//         'max-height': '100%'
//     });
// });

function book()
{
    var student_id = document.getElementById ("admin_id_tb").value;

    if (student_id == "" || student_id == null)
    {
        if (confirm("Please log in to continue."))
        {
            window.location.href = "<?=base_url('index.php/user/login')?>";
        }
    }
    else
    {

        // @Headcount - dropdownlist
        // @Date - datepicker DONE
        // @Facility - selected tab - textbox DONE
        // @Student - logged in session
        // @Timeslot - dropdownlist

        var date_a = $.datepicker.formatDate("dd-mm-y", $("#datepicker[name=datepicker]").datepicker("getDate"));
        var date = date_a.replace(/-/g,'.');
        var facility_id = document.getElementById('facility_id_tb').value;
        var pax = document.getElementById("pax").value;
        var timeslot_id = document.getElementById ("AvaliableTimeslotOption").value;
        // var student_id = document.getElementById ("admin_id_tb").value;

        // console.log(admin_id_tb);

        if (timeslot_id == "default" || pax == 0)
        {
            alert("Please check your options!");
        }
        else
        {
            $.ajax({
                type: 'post',
                url: '<?=base_url()?>index.php/student/new_booking/book_facility',
                dataType: "json",
                data: { 'facility_id': facility_id, 'date': date, 'timeslot_id': timeslot_id, 'headcount': pax, 'student_id': student_id },
                success: function (response) {
                    console.log(response);
                    
                    alert("Booking successful! \nDetails of your booking will be sent to your mobile.");

                    window.location.href = "<?=base_url('index.php/student/get_facilities/distinct')?>";

                    $('#ModalForm').modal('hide');
                },
                error: function(xhr, status, error) {
                    alert("You are not allowed to book the same slot twice!");
                    
                    // alert(xhr.responseText);
                    // console.log(status);
                    // console.log(error);
                }
            });
        }
    }
}

function try_get_time()
{
    console.log("try_get_time called.");
    var currentTime = new Date();
    var hours = currentTime.getHours();

    if (hours < 10)
    {
        hours = "0" + hours + "00";
    }
    else
    {
        hours = hours + "00";
    }
    
    console.log(hours);

    return hours;
}

function show_share_msg()
{
    document.getElementById("share_msg").innerHTML = "Please note that you will be sharing.**";
}

function clear_share_msg()
{
    document.getElementById("share_msg").innerHTML = "";
}

function slotChange(elem)
{
    // alert(elem.value);

    var selected_slot = elem.value;

    var date_a = $.datepicker.formatDate("dd-mm-y", $("#datepicker[name=datepicker]").datepicker("getDate"));
    var date = date_a.replace(/-/g,'.');
    var facility_id = document.getElementById('facility_id_tb').value;

    var pax = document.getElementById("pax").value;
    var timeslot_id = document.getElementById ("AvaliableTimeslotOption").value;

    $.ajax({
        type: 'post',
        url: '<?=base_url()?>index.php/student/get_facilities/refresh_form',
        dataType: "json",
        data: { id: facility_id, date: date },
        success: function (response) {
            // Pax Options
            // ===================================================>
            $("#pax").html("");

            var c_dropdown = "<option value=default>0</option>";

            // @return facility - Selected Tab
            // @return booked_facilties - Facilities that are booked
            // @return timeslots - Avail slots after difference

            var size = response.timeslots.length;

            for(var i=0; i<size; i++)
            {
                if (response.timeslots[i].timeslot_id == selected_slot)
                {
                    if (response.timeslots[i].left === undefined)
                    {
                        for (x=response.facility[0].max_capacity; x>0; x--) 
                        {
                            var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                            $("#pax").append(c_dropdown);
                        }

                        clear_share_msg();

                        break;
                    }
                    else
                    {
                        if (response.timeslots[i].left > 0)
                        {
                            for (x=response.timeslots[i].left; x>0; x--) 
                            {
                                var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                                $("#pax").append(c_dropdown);
                            }

                            show_share_msg();
                            break;
                        }
                        else
                        {
                            var c_dropdown = "<option value='0'>Fully Booked!</option>";
                            $("#pax").append(c_dropdown);

                            clear_share_msg();
                            break;
                        }
                    }
                }
            }

            console.log(response.timeslots);
        },
        // error: function (jqXHR, exception) {
        //     console.log(jqXHR);
        // }
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });


    // // Pax Options
    // // ===================================================>
    // $("#pax").html("");

    // console.log(response.timeslots);
    // console.log(response.booked_facilties);

    // // var selected_slot = document.getElementById('AvaliableTimeslotOption').value;
    

    
}

function refresh_form(facility_id, facility_name)
{
    facility_id = facility_id.replace('tab','');
    
    // get_booking_form (facility_id, facility_name);

    var date_a = $.datepicker.formatDate("dd-mm-y", $("#datepicker[name=datepicker]").datepicker("getDate"));
    var date = date_a.replace(/-/g,'.');

    $.ajax({
        type: 'post',
        url: '<?=base_url()?>index.php/student/get_facilities/refresh_form',
        dataType: "json",
        data: { id: facility_id, name: facility_name, date: date},
        success: function (response) {
            // @return facility - Selected Tab
            // @return booked_facilties - Facilities that are booked
            // @return timeslots - Avail slots after difference

            var img_src = "<?=base_url('assets/uploads') ?>/facilities/" + response.facility[0].image;
            $('#facility_group_img').attr('src', img_src);

            document.getElementById('facility_id_tb').value = response.facility[0].facility_id;
            document.getElementById('max_capacity_tb').value = response.facility[0].max_capacity;

            // Timeslot Options
            // ===================================================>
            $("#AvaliableTimeslotOption").html("");

            var size = response.timeslots.length;
            var ts_dropdown = "<option value='default'>Please Select</option>";

            // $("#AvaliableTimeslotOption").append(ts_dropdown);

            if (size != 0)
            {
                for(var i=0; i<size; i++)
                {
                    // if (response.timeslots[i].left == undefined)
                    // {
                    //     var left = response.facility[0].max_capacity;
                    // }
                    // else
                    // {
                    //     var left = response.timeslots[i].left;
                    // }

                    ts_dropdown = "<option value='" + response.timeslots[i].timeslot_id + "'>" + response.timeslots[i].start_time + " - " + response.timeslots[i].end_time +"</option>";
                    $("#AvaliableTimeslotOption").append(ts_dropdown);
                }
            }
            else
            {
                var ts_dropdown = "<option value='default'>" + "No Slots Available" + "</option>";
                $("#AvaliableTimeslotOption").append(ts_dropdown);
            }

            // Pax Options
            // ===================================================>
            $("#pax").html("");

            console.log(response.timeslots);
            console.log(response.booked_facilties);

            var selected_slot = document.getElementById('AvaliableTimeslotOption').value;
            var c_dropdown = "<option value=default>0</option>";

            for(var i=0; i<size; i++)
            {
                if (response.timeslots[i].timeslot_id == selected_slot)
                {
                    if (response.timeslots[i].left === undefined)
                    {
                        for (x=response.facility[0].max_capacity; x>0; x--) 
                        {
                            var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                            $("#pax").append(c_dropdown);
                        }

                        clear_share_msg();

                        break;
                    }
                    else
                    {
                        if (response.timeslots[i].left > 0)
                        {
                            for (x=response.timeslots[i].left; x>0; x--) 
                            {
                                var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                                $("#pax").append(c_dropdown);
                            }

                            show_share_msg();
                            break;
                        }
                        else
                        {
                            var c_dropdown = "<option value='0'>Fully Booked!</option>";
                            $("#pax").append(c_dropdown);

                            clear_share_msg();
                            break;
                        }   
                    }
                }
            }
            // $('#ModalForm').modal('show');
        },
        // error: function (jqXHR, exception) {
        //     console.log(jqXHR);
        // }
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function get_booking_form (facility_id, facility_name) // desmond edited
{
    // $('#datepicker').datepicker('setDate', null);

    var date_a = $.datepicker.formatDate("dd-mm-y", $("#datepicker[name=datepicker]").datepicker("getDate"));
    var date = date_a.replace(/-/g,'.');
    // var curr_time = try_get_time();

    // console.log("get_booking_form:" + curr_time);

    $.ajax({
        type: 'post',
        url: '<?=base_url()?>index.php/student/get_facilities',
        dataType: "json",
        data: { id: facility_id, name: facility_name, date: date/*, time_now: curr_time*/ },
        success: function (response) {

            // @return grouped_facility - Tab Title
            // @return booked_facilties - Facilities that are booked
            // @return timeslots - Avail slots after difference

            var img_src = "<?=base_url('assets/uploads') ?>/facilities/" + response.grouped_facility[0].image;
            $('#facility_group_img').attr('src', img_src);

            document.getElementById('facility_id_tb').value = response.grouped_facility[0].facility_id;
            document.getElementById('max_capacity_tb').value = response.grouped_facility[0].max_capacity;

            // Tab Title
            // ===================================================>
            $("#tabAjax").html("");
            
            var tr_str = "<li class='pointer active' id='tab" + response.grouped_facility[0].facility_id + "' onclick='changeClass(this.id)'><a>" + response.grouped_facility[0].name +"</a></li>";

            $("#tabAjax").append(tr_str);

            var len = response.grouped_facility.length;

            for (var i=1; i<len; i++)
            {
                var id = response.grouped_facility[i].facility_id;
                var name = response.grouped_facility[i].name;

                var tr_str = "<li class='pointer' id='tab" + id + "' onclick='changeClass(this.id)'><a>" + name +"</a></li>";

                $("#tabAjax").append(tr_str);
            }


            // Timeslot Options
            // ===================================================>
            $("#AvaliableTimeslotOption").html("");

            var size = response.timeslots.length;
            var ts_dropdown = "<option value='default'>Please Select</option>";

            // $("#AvaliableTimeslotOption").append(ts_dropdown);

            if (size != 0)
            {
                for(var i=0; i<size; i++)
                {
                    // if (response.timeslots[i].left == undefined)
                    // {
                    //     var left = response.grouped_facility[0].max_capacity;
                    // }
                    // else
                    // {
                    //     var left = response.timeslots[i].left;
                    // }
                    
                    ts_dropdown = "<option value='" + response.timeslots[i].timeslot_id + "'>" + response.timeslots[i].start_time + " - " + response.timeslots[i].end_time + "</option>";
                    $("#AvaliableTimeslotOption").append(ts_dropdown);
                }
            }
            else
            {
                var ts_dropdown = "<option value='default'>" + "No Slots Available" + "</option>";
                $("#AvaliableTimeslotOption").append(ts_dropdown);
            }

            // Pax Options
            // ===================================================>
            $("#pax").html("");

            // console.log(response.timeslots);
            // console.log(response.booked_facilties);

            var selected_slot = document.getElementById('AvaliableTimeslotOption').value;
            var c_dropdown = "<option value='default'>0</option>";

            for(var i=0; i<size; i++)
            {
                if (response.timeslots[i].timeslot_id == selected_slot)
                {
                    if (response.timeslots[i].left === undefined)
                    {
                        for (x=response.grouped_facility[0].max_capacity; x>0; x--) 
                        {
                            var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                            $("#pax").append(c_dropdown);
                        }
                        break;
                    }
                    else
                    {
                        if (response.timeslots[i].left > 0)
                        {
                            for (x=response.timeslots[i].left; x>0; x--) 
                            {
                                var c_dropdown = "<option value='" + x + "'>" + x + "</option>";
                                $("#pax").append(c_dropdown);
                            }

                            show_share_msg();
                            break;
                        }
                        else
                        {
                            var c_dropdown = "<option value='0'>Fully Booked!</option>";
                            $("#pax").append(c_dropdown);
                            
                            clear_share_msg();
                            break;
                        }
                    }
                }
            }
            // $('#ModalForm').modal('show');
        },
        // error: function (jqXHR, exception) {
        //     console.log(jqXHR);
        // }
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

// function endTime(endTime) {

//     var dropdownStartTime = document.getElementById("AvaliableTimeslotOption");
//     var startTime = dropdownPax.options[dropdownStartTime.selectedIndex].value;

//     alert(startTime);

//     $("#EndTimeslotOption").html("");

//     var tr_str = "<option value='" + (startTime+1) + "'>" + (startTime+1) + "</option>";

//     $("#EndTimeslotOption").append(tr_str);

// }

// function check_slots_and_cap(facility_id) // desmond edited
// {
//     facility_id = facility_id.replace('tab','');
    
//     $.ajax({
//         type: 'post',
//         url: '<?=base_url()?>index.php/student/get_facilities/get_slots_and_cap',
//         dataType: "json",
//         data: {id: facility_id},
//         success: function(response)
//         {

//             document.getElementById('facility_id_tb').value = facility_id;

//             // console.log(document.getElementById('facility_id_tb').value);

//             var size = response.free_slots.length;

//             $("#AvaliableTimeslotOption").html("");

//             var ts_dropdown = "<option value='" + 0 + "'>" + size + " Slots Available" + "</option>";
//             $("#AvaliableTimeslotOption").append(ts_dropdown);

//             if (size != 0)
//             {
//                 for(var i=0; i<size; i++)
//                 {
//                     ts_dropdown = "<option value='" + response.free_slots[i].timeslot_id + "'>" + response.free_slots[i].start_time + "</option>";
//                     $("#AvaliableTimeslotOption").append(ts_dropdown);
//                 }
//             }
//             else
//             {
//                 var ts_dropdown = "<option value='" + 0 + "'>" + "No Slots Available" + "</option>";
//                 $("#AvaliableTimeslotOption").append(ts_dropdown);
//             }

//             var current_capacity = response.capacity[0].current_capacity;
//             var max_capacity = response.capacity[0].max_capacity;
//             var left = max_capacity - current_capacity;

//             $("#pax").html("");

//             var c_dropdown = "<option value='" + 0 + "'>" + "Please Select" + "</option>";
//             $("#pax").append(c_dropdown);

//             if (left != 0)
//             {
//                 for (var i=0; i<left; i++)
//                 {
//                     c_dropdown = "<option value='" + (i+1) + "'>" + (i+1) + "</option>";
//                     $("#pax").append(c_dropdown);
//                 }
//             }
//             else
//             {
//                 c_dropdown = "<option value='0'>0</option>";
//                 $("#pax").append(c_dropdown);
//             }

//             $('#ModalForm').modal('show');
//         },
//         error: function(xhr, status, error) {
//             alert(xhr.responseText);
//         }
//     });
// }



// function facilityCategory_timing(facilityId)
// {
//     //e.preventDefault();

//     var id = facilityId;

//     // if (facilityId.innerHTML != '13:00')
//     // {
//     //     //document.getElementById("startTimeInput").style.display = 'none';
//     //     document.getElementById("startTimeInputDiv").style.display = 'none';
//     //     document.getElementById("AvaliableTimeslot").style.display = 'inline-block';
//     // }
//     // else
//     // {
//     //     document.getElementById("startTimeInput").value = facilityId.innerHTML;
//     // }

//     $.ajax({
//         type: 'post',
//         url: 'index.php/get_facilities/get_by_name_group',
//         dataType: "json",
//         data: {id:id},
//         success: function(response){

//             var len1 = response.facility_list;
//             var len = len1.length;

//             $("#pax").html("");
//             //$("#exampleModalLongTitle").html("");

//             var element = document.querySelectorAll('li.active:not(.dropdown)');

//             for(var i=0; i<element[0].id; i++){


//                 var current_capacity = response.facility_list[i].current_capacity;
//                 var max_capacity = response.facility_list[i].max_capacity;
//                 var left = max_capacity - current_capacity;

                
//                 if (left != 0)
//                 {
//                     for(var i=0; i<left; i++){
//                         var dropdown = "<option value='" + (i+1) + "'>" + (i+1) + "</option>";
//                         $("#pax").append(dropdown);
//                     }
//                 }

//                 else
//                 {
//                     var dropdown_1 = "<option value='0'>0</option>";
//                     $("#pax").append(dropdown_1);
//                 }
//             }
//           $('#ModalForm').modal('show');
//         }
//     }); /* End Ajax */
// }

function changeClass(clicked_id) {

    var element = document.querySelectorAll('li.active:not(.dropdown)');

    element[0].classList.remove("active");

    var addClass = document.getElementById(clicked_id);

    addClass.classList.add("active");

    // facilityCategory_timing(clicked_id);
    // check_slots_and_cap(clicked_id);

    refresh_form(clicked_id);

}

 function resetActive() {

    var element = document.querySelectorAll('li.active:not(.dropdown)');

    element[0].classList.remove("active");

    var addClass = document.getElementById("tab1");

    addClass.classList.add("active");

    // document.getElementById("NotAvailable").style.display = 'none';
    // document.getElementById("paxDiv").style.display = 'block';
    resetDatePicker();
}


// function facility_category (facility_id, facility_name) // desmond edited
// { 
//     // console.log(facility_id);
//     // console.log(facility_name);

//     // var before_id = facilityId.id;
//     // var id = before_id.replace('_facility','');
//     // alert(id);
//     // console.log(facilityId.innerHTML);
 

//     /*if (facilityId.innerHTML != '13:00') {
//         //document.getElementById("startTimeInput").style.display = 'none';
//         document.getElementById("startTimeInputDiv").style.display = 'none';
//         document.getElementById("AvaliableTimeslot").style.display = 'inline-block';
//     }

//     else {
//         document.getElementById("startTimeInput").value = facilityId.innerHTML;
//     }*/

//     //AvaliableTimeslotOption

//     $.ajax({
//         type: 'post',
//         url: '<?=base_url()?>index.php/student/get_facilities/get_by_name_group',
//         dataType: "json",
//         data: { id: facility_id, name: facility_name},
//         success: function (response) {    
//             //$("#exampleModalLongTitle").html("");

//             // document.getElementById('facility_id_tb').value = "HELLO";

//             // console.log(document.getElementById('facility_id_tb').value);

//             var img_src = "<?=base_url('assets/uploads') ?>/facilities/" + response.facility_list[0].image;
//             $('#facility_group_img').attr('src', img_src);

//             document.getElementById('facility_id_tb').value = response.facility_list[0].facility_id;

//             $("#AvaliableTimeslotOption").html("");

//             var size = response.free_slots.length;

//             var ts_dropdown = "<option value='default'>" + size + " Slots Available" + "</option>";
//             $("#AvaliableTimeslotOption").append(ts_dropdown);

//             if (size != 0)
//             {
//                 for(var i=0; i<size; i++)
//                 {
//                         ts_dropdown = "<option value='" + response.free_slots[i].timeslot_id + "'>" + response.free_slots[i].start_time + "</option>";
//                         $("#AvaliableTimeslotOption").append(ts_dropdown);
//                 }
//             }
//             else
//             {
//                 var ts_dropdown = "<option value='default'>" + "No Slots Available" + "</option>";
//                 $("#AvaliableTimeslotOption").append(ts_dropdown);
//             }

//             $("#tabAjax").html("");
//             $("#pax").html("");

//             var tr_str = "<li class='pointer active' id='tab" + response.facility_list[0].facility_id + "' onclick='changeClass(this.id)'><a>" + response.facility_list[0].name +"</a></li>";

//             $("#tabAjax").append(tr_str);

//             var len = response.facility_list.length;

//             for (var i=1; i<len; i++)
//             {
//                 var id = response.facility_list[i].facility_id;
//                 var name = response.facility_list[i].name;

//                 var tr_str = "<li class='pointer' id='tab" + (i+1) + "' onclick='changeClass(this.id)'><a>" + name +"</a></li>";

//                 $("#tabAjax").append(tr_str);
//             }

//             var current_capacity = response.facility_list[0].current_capacity;
//             var max_capacity = response.facility_list[0].max_capacity;
//             var left = max_capacity - current_capacity;

//             var c_dropdown = "<option value='default'>" + "Please Select" + "</option>";
//             $("#pax").append(c_dropdown);

//             if (left != 0)
//             {
//                 for (var i=0; i<left; i++)
//                 {
//                     c_dropdown = "<option value='" + (i+1) + "'>" + (i+1) + "</option>";
//                     $("#pax").append(c_dropdown);
//                 }
//             }
//             else
//             {
//                 c_dropdown = "<option value='default'>No Space Available</option>";
//                 $("#pax").append(c_dropdown);
//             }

//             $('#ModalForm').modal('show');
//         },
//         // error: function (jqXHR, exception) {
//         //     console.log(jqXHR);
//         // }
//         error: function(xhr, status, error) {
//             alert(xhr.responseText);
//         }
//     });
// }
</script>