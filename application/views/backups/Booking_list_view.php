<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<table id="example" class="table table table-striped table-bordered table-hover" width="100%" cellspacing="0" style="margin-top: 50px;">
    <thead>
        <tr style="background: #E6E6FA;">
            <th>Booking ID</th>
            <th>Facility</th>
            <th>No. Of Pax</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Pin</th>
            <th class=""></th>
        </tr>
    </thead>
    <?php
        foreach ($booking_list as $field)
        {
        ?>
    <tbody>
        <tr>
            <td><?php echo $field->booking_id . ' ';?></td>
            <td><a>Link To Facilities</a></td>
            <td><?php echo $field->headcount . ' ';?></td>
            <td><?php echo $field->start_time . ' ';?></td>
            <td><?php echo $field->end_time . ' ';?></td>
            <td><?php echo $field->pin . ' ';?></td>
            <td><a href="#"><i class="fa fa-trash-o fa-1x" aria-hidden="true"></i></a></td>
        </tr>
    </tbody>
    <?php
        }
    ?>
</table>

<script type="text/javascript">
    $(document).ready(function () {
        
        $('#example').DataTable();        
    });
</script>