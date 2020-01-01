<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
	<!-- Page Content
    ================================================== --> 
	<div class="row"  style="height: 450px;">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Logout success!</h1>
			</div>
			<p style="margin-top: 10px;">You will be redirected shortly in.. <span id="countdown">10</span> secs</p>

		</div>
	</div><!-- End container row -->
    
    </div> <!-- End Container -->

    <script>
	    // Total seconds to wait
	    var seconds = 10;
	    
	    function countdown() {
	        seconds = seconds - 1;
	        if (seconds < 0) {
	            // Chnage your redirection link here
	            window.location = "<?=base_url('index.php/student/get_facilities/distinct')?>";
	        } else {
	            // Update remaining seconds
	            document.getElementById("countdown").innerHTML = seconds;
	            // Count down using javascript
	            window.setTimeout("countdown()", 1000);
	        }
	    }
	    
	    // Run countdown function
	    countdown();
    </script>