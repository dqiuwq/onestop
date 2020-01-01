<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="content">
<?php
	/*foreach ($facility_list->result() as $row)
	{
        echo $row->facility_id;
        echo $row->name;
        echo $row->location;
        echo $row->current_capacity;
        echo $row->max_capacity;
        echo $row->status;
        echo $row->category;
        echo $row->qr_id;
	}

	echo 'Total Results: ' . $facility_list->num_rows();*/

	foreach ($facility_list as $field)
	{
        echo $field->facility_id . ' ';
        echo $field->name . ' ';
        echo $field->location . ' ';
        echo $field->current_capacity . ' ';
        echo $field->max_capacity . ' ';
        echo $field->status . ' ';
        echo $field->category . ' ';
        echo $field->qr_id . ' ';
        echo '<br />';
	}
?>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        // $('#example').DataTable();
        
        $('select').addClass('mdb-select');
        $('.mdb-select').material_select();

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

        
    });

    $(window).load(function(){

        $('.flexslider').flexslider({
            
            animation: "slide",
            slideshow: true,
            
            start: function(slider){
                $('body').removeClass('loading');
            }
        });  

        var btn = document.getElementById('myBooking');
            btn.addEventListener('click', function() {
                document.location.href = '<?php echo "index.php/student/Get_booking/my_bookings"; ?>';
        });
    });

    function changeClass(clicked_id) {

        var element = document.querySelectorAll('li.active:not(.dropdown)');

        element[0].classList.remove("active");

        var addClass = document.getElementById(clicked_id);

        addClass.classList.add("active");

    }

    function resetActive() {

        var element = document.querySelectorAll('li.active:not(.dropdown)');

        element[0].classList.remove("active");

        var addClass = document.getElementById("tab1");

        addClass.classList.add("active");

    }
</script>