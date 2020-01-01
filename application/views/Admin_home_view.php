<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Content
================================================== -->

<div style="height: 20px;"></div>
<div>
	<p>Welcome Admin!</p>
	<p>Today's booking for your area: <span style="text-transform: uppercase; font-weight: bold;"><?=$_SESSION['user_category'] ?></span></p>
</div>

<div>
	<?php echo $output; ?>
</div>
