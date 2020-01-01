<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Content
================================================== -->

<div class="row headline"><!-- Begin Headline -->
        <!-- Slider Carousel
        ================================================== -->
        <div class="span12">
            <h5 class="title-bg" style="font-size: large; text-align: center;">ALL FACILITIES</h5>
        </div>
</div><!-- End Headline -->

<!-- Gallery Thumbnails
================================================== -->
<div class="row gallery-row"><!-- Begin Gallery Row --> 

        <div class="span12">

        <!-- T Junction
        ================================================= -->
        <div class="row clearfix no-margin">
                <div class="section-bar">
                        <h4>T-Junction</h4>
                </div>
                <ul class="gallery-post-grid holder">
<?php
    foreach ($t_juction as $field)
    {
?>
                    <!-- List Item : <?=$field->facility_id ?>
                    ================================================== -->
                    <li  class="span3 gallery-item" data-id="id-<?=$field->facility_id ?>" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet pointer" data-toggle="modal" data-target="#<?=$field->facility_id ?>" style="height: 178px;">
                                <div><p class="hover-p">Click to book</p></div>
                        </span>
                        <a href="#">
                            <!-- <div class="gallery-image-frame"> -->
                                <img src="<?=base_url('assets/uploads') ?>/facilities/<?=$field->image ?>" alt="Gallery">
                            <!-- </div> -->
                        </a>
                        <span class="project-details">
                            <a href="#" data-toggle="modal" data-target="#<?=$field->facility_id ?>"><?=$field->name ?></a>
                            <br />
                            Next Avaliable Time Slot for today : 
                            <br />
                            <table style="margin-top: 10px; width: 100%;">
                                <tr>
<?php 
        $count = count($field->free_slots);

        for ($x = 0; $x < $count; $x++)
        {
            if ($x < 10)
            {
?>
                                    <td>
                                        <a href="#<?=$field->free_slots[$x]->timeslot_id?>"><?=$field->free_slots[$x]->start_time?></a>
                                    </td>
<?php
                if ($x == 4)
                {
                    echo '</tr>';
                    echo '<tr>';
                }
            }
            else
            {
?>
                                </tr>
                            </table>
                            <br />
                            <a>More..</a>
<?php
                break;
            }
        }
?>
                        </span>
                    </li>
                    <!-- Modal
                    ================================================== -->
                    <!--<div class="modal fade" id="<?=$field->facility_id ?>" tabindex="-<?=$field->facility_id ?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="modal-title" id="<?=$field->facility_id ?>"><?=$field->name ?></p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetActive()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <ul class="nav nav-pills">
                                            <li class="active pointer" id="tab1" onclick="changeClass(this.id)"><a>Pool Table 1</a></li>
                                            <li class="pointer" id="tab2" onclick="changeClass(this.id)"><a>Pool Table 2</a></li>
                                            <li class="pointer" id="tab3" onclick="changeClass(this.id)"><a>Pool Table 3</a></li>
                                            <li class="pointer" id="tab4" onclick="changeClass(this.id)"><a>Pool Table 4</a></li>
                                            <li><?=$field->image ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div> http://localhost:8080/onestop/index.php/student/get_facility_details -->
                    <div class="modal fade" id="<?=$field->facility_id ?>" tabindex="-<?=$field->facility_id ?>" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <a href="#" id="<?=$field->facility_id ?>"><?=$field->name ?></a>
                                    
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetActive()">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <p><?=$count ?> Slots Available for Today</p>
                                        <ul class="nav nav-pills">
<?php 
        for ($x = 0; $x < $count; $x++)
        {
?>
                                            <li class="pointer" id="tab<?=$x?>" onclick="changeClass(this.id)">
                                                <a><?=$field->free_slots[$x]->start_time?></a></li>
<?php 
        }
?>
                                        </ul>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>

<?php
    }
?>
                </ul>
        </div>

        <!-- Library
        ================================================= -->
        <div class="row clearfix no-margin" style="margin-top: 20px;">
                <div class="section-bar">
                        <h4>Library</h4>
                </div>
        </div>

        <!-- Sports
        ================================================= -->
        <div class="row clearfix no-margin" style="margin-top: 20px;">
                <div class="section-bar">
                        <h4>Sports</h4>
                </div>
        </div>

        </div>
</div><!-- End Gallery Row -->

<!-- Page JS
================================================== -->
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