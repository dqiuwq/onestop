<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>OneStop Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/onestop/css/bootstrap.css">
<link rel="stylesheet" href="/onestop/css/bootstrap-responsive.css">
<link rel="stylesheet" href="/onestop/css/prettyPhoto.css" />
<link rel="stylesheet" href="/onestop/css/flexslider.css" />
<link rel="stylesheet" href="/onestop/css/custom-styles.css">

<link rel="stylesheet" href="/onestop/css/bootstrap.min.css">
<link rel="stylesheet" href="/onestop/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 


<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]--> 

<!-- JS
================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="/onestop/js/bootstrap.js"></script>
<script src="/onestop/js/jquery.prettyPhoto.js"></script>
<script src="/onestop/js/jquery.flexslider.js"></script>
<script src="/onestop/js/jquery.custom.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


<script type="text/javascript">
$(document).ready(function () {

         $('#example').DataTable();

      var home = document.getElementById('home');
    home.addEventListener('click', function() {
      document.location.href = '<?php echo "/onestop/"; ?>';
    });
    
});

</script>

<style type="text/css">
  

    #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        float: right;
        margin-right: 50px;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: -2px;
        position: relative;
        left: 208px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        float: right;
    }
 
    .search-query:focus + button {
        z-index: 3;   
    }

</style>

</head>

<body class="home">
    <!-- Color Bars (above header)-->
        <div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>
    
    <div class="container">
    
      <div class="row header"><!-- Begin Header -->
      
        <!-- Logo
        ================================================== -->
        <div class="span5 logo">
                <!--<a href="index.htm"><img src="img/piccolo-logo.png" alt="" /></a>-->
            <h1>One. STOP. Booking</h1>
        </div>
        
        <!-- Main Navigation
        ================================================== -->
        <div class="span7 navigation">
            <div class="navbar hidden-phone">
            
            <ul class="nav">
            <li class="dropdown active">
            <li><a id="home">All Facilities </a></li>
            <li><a href="features.htm">T-Junction</a></li>
           
             <li class="dropdown">
                <li><a href="features.htm">Library</a></li>
             <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="blog-style1.htm">Sports <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="blog-style1.htm">Blog Style 1</a></li>
                    <li><a href="blog-style2.htm">Blog Style 2</a></li>
                    <li><a href="blog-style3.htm">Blog Style 3</a></li>
                    <li><a href="blog-style4.htm">Blog Style 4</a></li>
                    <li><a href="blog-single.htm">Blog Single</a></li>
                </ul>
             </li>
             <li><a id="myBooking">My Bookings</a></li>
                         <li><a href="logout.php">Logout</a></li>
            </ul>
           
            </div>

            <!-- Mobile Nav
            ================================================== -->
            <form action="#" id="mobile-nav" class="visible-phone">
                <div class="mobile-nav-select">
                <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                    <option value="">Navigate...</option>
                                        <option value="page-contact.htm">All Facilities</option>
                    <option value="index.htm">T-Junction</option>
                        <option value="index.htm">- Full Page</option>
                        <option value="index-gallery.htm">- Gallery Only</option>
                        <option value="index-slider.htm">- Slider Only</option>
                    <option value="features.htm">Library</option>
                    <option value="page-full-width.htm">Pages</option>
                        <option value="page-full-width.htm">- Full Width</option>
                        <option value="page-right-sidebar.htm">- Right Sidebar</option>
                        <option value="page-left-sidebar.htm">- Left Sidebar</option>
                        <option value="page-double-sidebar.htm">- Double Sidebar</option>
                    <option value="gallery-4col.htm">Sports</option>
                        <option value="gallery-3col.htm">- 3 Column</option>
                        <option value="gallery-4col.htm">- 4 Column</option>
                        <option value="gallery-6col.htm">- 6 Column</option>
                        <option value="gallery-4col-circle.htm">- Gallery 4 Col Round</option>
                        <option value="gallery-single.htm">- Gallery Single</option>
                    <option value="blog-style1.htm">My Bookings</option>
                        <option value="blog-style1.htm">- Blog Style 1</option>
                        <option value="blog-style2.htm">- Blog Style 2</option>
                        <option value="blog-style3.htm">- Blog Style 3</option>
                        <option value="blog-style4.htm">- Blog Style 4</option>
                        <option value="blog-single.htm">- Blog Single</option>
                    
                </select>
                </div>
                </form>

        </div>
        
      </div><!-- End Header -->

<!--<div id="content">
<?php

	//foreach ($booking_list as $field)
	{
        //echo $field->booking_id . ' ';
        //echo $field->headcount . ' ';
        //echo $field->start_time . ' ';
        //echo $field->end_time . ' ';
        //echo $field->date . ' ';
        //echo $field->facility_id . ' ';
        //echo $field->pin . ' ';
        //echo $field->student_id . ' ';
        //echo '<br />';
	}
?>
</div>-->

<!--<div class="container">
        <div class="row">
        <div class="span12">
            <form id="custom-search-form" class="form-search form-horizontal pull-right" action="Get_booking.php?search" method="GET">
                <div class="input-append span12">
                    <input type="text" class="search-query" name="search" placeholder="Search">
                    <button type="submit" class="btn"><i class="icon-search"></i></button>
                </div>
            </form>
        </div>
        </div>
</div>-->

<div class="container">         
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
        <td><?php echo  $field->booking_id . ' ';?></td>
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
</div>



</body>
</html>