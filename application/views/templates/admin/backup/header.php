<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
<?php else : ?>
<?php endif; ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>One Stop Admin</title>
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
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.easing.1.3.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/bootstrap.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.prettyPhoto.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.quicksand.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.custom.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.flexslider.js"></script>

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
                <h1><a href="<?=base_url('index.php/get_admin_home') ?>" style="text-decoration: none; color: #333333;">One. STOP. Admin</a></h1>
            </div>
            
            <!-- Main Navigation
            ================================================== -->
            <div class="span7 navigation">
                <div class="navbar hidden-phone">
    	            <ul class="nav">
        				<!-- <li class="active"> -->
                        <li><a href="<?=base_url('index.php/admin/get_facilities/my_area') ?>">Home</a></li>
                        <li><a href="<?=base_url('index.php/admin/get_facilities') ?>">Facilities</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="<?=base_url('index.php/admin/get_bookings') ?>">Student's Bookings</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url('index.php/admin/get_booking/today') ?>">Today</a></li>
                                <li><a href="<?=base_url('index.php/admin/get_booking/future') ?>">Future</a></li>
                                <li><a href="<?=base_url('index.php/admin/get_booking/history') ?>">History</a></li>
                            </ul>
                        </li>
                        <li><a href="<?=base_url('index.php/user/register') ?>">Register New Admin</a></li>
                        <li><a href="<?=base_url('index.php/user/logout') ?>">Logout</a></li>
                    </ul>
                </div>

                <!-- Mobile Nav
                ================================================== -->
                <!-- <form action="#" id="mobile-nav" class="visible-phone">
                    <div class="mobile-nav-select">
                    <select onchange="window.open(this.options[this.selectedIndex].value,'_top')">
                        <option value="">Navigate...</option>
    					<option value="#">All Facilities</option>
                        <option value="#">T-Junction</option>
                        <option value="#">Library</option>
                        <option value="#">Sports</option>
                        <option value="#">My Account</option>
                            <option value="#">- Login</option>
                            <option value="gallery-4col.htm">- 4 Column</option>
                            <option value="gallery-6col.htm">- 6 Column</option>
                            <option value="gallery-4col-circle.htm">- Gallery 4 Col Round</option>
                            <option value="gallery-single.htm">- Gallery Single</option>
                        <option value="#">Contact Us</option>
                    </select>
                    </div>
                </form> -->

            </div><!-- End Navigation 
            ================================================== -->
            
        </div><!-- End Header 
        ================================================== -->