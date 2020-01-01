<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>One Stop Booking</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS Main
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/bootstrap-responsive.css">
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/prettyPhoto.css" />
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/flexslider.css" />
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/custom-styles.css">

<!-- JS Main
================================================== -->
<script src="<?=base_url('assets/piccolo') ?>/js/jquery-1.8.3.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.easing.1.3.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/bootstrap.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.prettyPhoto.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.quicksand.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.custom.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.flexslider.js"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

<!-- Fonts
================================================== -->
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]--> 

<!-- Favicons
================================================== -->
<!-- <link rel="shortcut icon" href="<?=base_url('assets/piccolo') ?>/img/favicon.ico">
<link rel="apple-touch-icon" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon-114x114.png"> -->

<!-- Hui Wen CSS JS
================================================== -->
<!-- <link rel="stylesheet" href="<?=base_url('assets/datatable') ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url('assets/datatable') ?>/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('assets/datatable') ?>/css/huiwen-tables.css"> -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script> -->
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/datetimepicker.min.css">
<script src="<?=base_url('assets/piccolo') ?>/js/datetimepicker.min.js"></script>

<!-- Jun Long CSS JS
================================================== -->

<!-- Desmond CSS JS
================================================== -->
<style>
.gallery-image-frame
{
    height: 178px;
    width: 270px;
    overflow: hidden;
    background-color: black;
}
</style>
<?php 
    if (isset($css_files) && isset($js_files))
    {
        foreach ($css_files as $file):
    ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php
        endforeach;
        foreach($js_files as $file):
?>
        <script src="<?php echo $file; ?>"></script>
<?php
        endforeach;
    } 
?>
</head>

<body>
	<div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>

    <!-- Main Container
    ================================================== -->
    <div class="container main-container">
    
        <div class="row header"><!-- Begin Header -->
          
            <!-- Logo
            ================================================== -->
            <div class="span5 logo">
            	<!--<a href="index.htm"><img src="img/piccolo-logo.png" alt="" /></a>-->
                <h1><a href="<?=base_url('index.php') ?>" style="text-decoration: none; color: #333333;">One. STOP. Booking</a></h1>
            </div>
            
            <!-- Main Navigation
            ================================================== -->
            <div class="span7 navigation">
                <div class="navbar hidden-phone">
    	            <ul class="nav">
                        <li><a href="<?=base_url('index.php') ?>">Home</a></li>
        				<li><a href="<?=base_url('index.php/student/get_facilities/distinct') ?>">Facilities</a></li>
                        
<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>                       
                        <!-- <li><?=$_SESSION['username']?></li> -->
                        <li><a href="<?=base_url('index.php/student/get_booking/my_bookings') ?>">My Bookings</a></li>
                        <li><a href="<?=base_url('index.php/user/logout') ?>">Logout</a></li>
<?php else : ?>
                        <li><a href="<?=base_url('index.php/user/login') ?>">Login</a></li>
                        <!-- <li><a href="<?=base_url('index.php/user/register') ?>">Register</a></li> -->
<?php endif; ?>
                    </ul>
                </div>

                <!-- Mobile Nav
                ================================================== -->
                <form action="#" id="mobile-nav" class="visible-phone">
                    <div class="mobile-nav-select">
                    <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <option value="">Navigate...</option>
    					<option value="#">Home</option>
                        <option value="#">Facilities</option>
                        <option value="#">My Bookings</option>
                        <option value="#">Login</option>
                        <option value="#">Logout</option>
                    </select>
                    </div>
                </form>

            </div><!-- End Navigation 
            ================================================== -->
            
        </div><!-- End Header 
        ================================================== -->