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

	foreach ($booking_list as $field)
	{
        echo $field->booking_id . ' ';
        echo $field->headcount . ' ';
        echo $field->start_time . ' ';
        echo $field->end_time . ' ';
        echo $field->date . ' ';
        echo $field->facility_id . ' ';
        echo $field->pin . ' ';
        echo $field->student_id . ' ';
        echo '<br />';
	}
?>
</div>