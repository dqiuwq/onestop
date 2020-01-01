<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Content
================================================== -->

<div class="row headline"><!-- Begin Headline -->
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
    if (count($t_junction) == 0)
    {
        echo '<p style="font-family: Oswald, sans-serif; font-size: medium; margin-left: 2em;">No facilies available at the moment.</p>';
    }
    else
    {
        foreach ($t_junction as $field)
        {
?>
                    <!-- List Item : <?=$field->facility_id ?>
                    ================================================== -->
                    <li  class="span3 gallery-item" data-id="id-1" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet pointer" data-toggle="modal" data-target="#ModalForm" style="height: 178px;" id="<?=$field->facility_id ?>" name="<?=$field->new_name ?>" onclick="get_booking_form('<?=$field->facility_id?>', '<?=$field->new_name?>')">
                                <div><p class="hover-p">Click to book</p></div>
                        </span>
                        <!-- <a href=""> -->
                            <!-- <div class="gallery-image-frame"> -->
                                <img src="<?=base_url('assets/uploads') ?>/facilities/<?=$field->image ?>" alt="Gallery">
                            <!-- </div> -->
                        <!-- </a> -->
                        <span class="project-details">
                            <!-- <a href="#" data-toggle="modal" data-target="
                                
                                #exampleModalCenter

                                "><?=$field->name ?></a> -->
                            <p><?=$field->new_name ?></p>
                            <br />
                            Available for Booking 
                            <br />
                        </span>
                    </li>
<?php
            }
        }
?>
                </ul>
        </div>

        <!-- Library
        ================================================= -->
        <div class="row clearfix no-margin">
                <div class="section-bar">
                        <h4>Library</h4>
                </div>
                <ul class="gallery-post-grid holder">
<?php
    if (count($library) == 0)
    {
        echo '<p style="font-family: Oswald, sans-serif; font-size: medium; margin-left: 2em;">No facilies available at the moment.</p>';
    }
    else
    {
        foreach ($library as $field)
        {
?>
                    <!-- List Item : <?=$field->facility_id ?>
                    ================================================== -->
                    <li  class="span3 gallery-item" data-id="id-1" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet pointer" data-toggle="modal" data-target="#ModalForm" style="height: 178px;" id="<?=$field->facility_id ?>" name="<?=$field->new_name ?>" onclick="get_booking_form('<?=$field->facility_id?>', '<?=$field->new_name?>')">
                                <div><p class="hover-p">Click to book</p></div>
                        </span>
                        <!-- <a href=""> -->
                            <!-- <div class="gallery-image-frame"> -->
                                <img src="<?=base_url('assets/uploads') ?>/facilities/<?=$field->image ?>" alt="Gallery">
                            <!-- </div> -->
                        <!-- </a> -->
                        <span class="project-details">
                            <!-- <a href="#" data-toggle="modal" data-target="
                                
                                #exampleModalCenter

                                "><?=$field->name ?></a> -->
                            <p><?=$field->new_name ?></p>
                            <br />
                            Available for Booking 
                            <br />
                        </span>
                    </li>
<?php
            }
        }
?>
                </ul>
        </div>

        <!-- Sports
        ================================================= -->
        <div class="row clearfix no-margin">
                <div class="section-bar">
                        <h4>Sports</h4>
                </div>
                <ul class="gallery-post-grid holder">
<?php
    if (count($sports) == 0)
    {
        echo '<p style="font-family: Oswald, sans-serif; font-size: medium; margin-left: 2em;">No facilies available at the moment.</p>';
    }
    else
    {
        foreach ($sports as $field)
        {
?>
                    <!-- List Item : <?=$field->facility_id ?>
                    ================================================== -->
                    <li  class="span3 gallery-item" data-id="id-1" data-type="illustration">
                        <span class="gallery-hover-4col hidden-phone hidden-tablet pointer" data-toggle="modal" data-target="#ModalForm" style="height: 178px;" id="<?=$field->facility_id ?>" name="<?=$field->new_name ?>" onclick="get_booking_form('<?=$field->facility_id?>', '<?=$field->new_name?>')">
                                <div><p class="hover-p">Click to book</p></div>
                        </span>
                        <!-- <a href=""> -->
                            <!-- <div class="gallery-image-frame"> -->
                                <img src="<?=base_url('assets/uploads') ?>/facilities/<?=$field->image ?>" alt="Gallery">
                            <!-- </div> -->
                        <!-- </a> -->
                        <span class="project-details">
                            <!-- <a href="#" data-toggle="modal" data-target="
                                
                                #exampleModalCenter

                                "><?=$field->name ?></a> -->
                            <p><?=$field->new_name ?></p>
                            <br />
                            <!-- Next Avaliable Time Slot for today : -->
                            Available for Booking
                            <br />
                        </span>
                    </li>
<?php
            }
        }
?>
                </ul>
        </div>

        <div class="modal fade" id="ModalForm" tabindex="-1" role="dialog" aria-labelledby="ModalFormTitle" aria-hidden="true" style="left: 45%; width: 660px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title" id="ModalFormLongTitle"></p>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetActive()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div>
                            <ul class="nav nav-pills" id="tabAjax">
                                <!-- Facility group will be populated here.. -->
                            </ul>
                        </div>


                        <div>
                            <div id="datepicker" name="datepicker" style="float: left;"></div>
                        </div>

                        <div>
                            <img id="facility_group_img" src="<?=base_url('assets/uploads') ?>/facilities/pool_table3.jpg" alt="Facility_image" style="float: right; width: 50%;">
                            <div style="clear: both;"></div>
                        </div>
                        &nbsp;
                        &nbsp;

                        <div style="margin-top: 12px;">
                            <label class="control-label col-sm-2" for="AvaliableTimeslotOption">Timeslot:</label>
                            <div class="col-sm-10 margin-top">
                                <select class="form-control" id="AvaliableTimeslotOption" onchange="slotChange(this)">
                                    <!-- timeslots will be populated here.. -->
                                </select>
                            </div>
                        </div>

                        <div style="margin-top: 12px;" class="hide" id="EndTimeslot">
                            <label class="control-label col-sm-2" for="end_time">End Time:</label>
                            <div class="col-sm-10 margin-top"> 
                                <select class="form-control" id="EndTimeslotOption"></select>
                            </div>
                        </div>

                        <div style="margin-top: 12px;" >
                            <label class="control-label col-sm-2" for="pax">Number of Pax :</label>
                            <div class="col-sm-10 margin-top"> 
                                <select class="form-control" id="pax" style="display: inline;">
                                    <!-- pax will be populated here.. -->
                                </select><p id="share_msg" style="margin-left: 10px; display: inline;"></p>
                            </div>
                        </div>
                        <!-- Hidden fields -->
                        <div>
                            <input type="hidden" id="facility_id_tb" name="facility_id_tb" />
                            <input type="hidden" id="max_capacity_tb" name="max_capacity_tb" />
                            <input type="hidden" id="admin_id_tb" name="admin_id_tb" value="<?php if (isset($_SESSION['adminid']) && !empty($_SESSION['adminid'])) { echo $_SESSION['adminid']; } ?>" />
                            <!-- <input type="text" id="admin_id_tb" name="admin_id_tb" value="<?=$_SESSION['adminid'] ?>" /> -->
                        </div>

                        <!-- <div style="margin-top: 12px;" class="form-group" id="startTimeInputDiv">
                            <label class="control-label col-sm-2" for="start_time">Timeslot:</label>
                            <div class="col-sm-10 margin-top"> 
                                <input id="startTimeInput" type="text" class="margin-left" value="13:00" disabled>
                            </div>
                        </div> -->

                    </div>

                    <div class="modal-footer">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" style="float: right;margin-right: 30px;" class="btn btn-default" onclick="book();">Book!</button>
                        </div>
                    </div>


                </div><!-- Modal Content -->
            </div><!-- End Modal Dialog -->
        </div> <!-- End Modal -->
        
        </div><!-- End Span -->
</div><!-- End Gallery Row -->