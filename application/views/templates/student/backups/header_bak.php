<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Piccolo Theme</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- CSS
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/bootstrap.css">
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/bootstrap-responsive.css">
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/prettyPhoto.css" />
<link rel="stylesheet" href="<?=base_url('assets/piccolo') ?>/css/custom-styles.css">

<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" href="css/style-ie.css"/>
<![endif]--> 

<!-- Favicons
================================================== -->
<link rel="shortcut icon" href="<?=base_url('assets/piccolo') ?>/img/favicon.ico">
<link rel="apple-touch-icon" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?=base_url('assets/piccolo') ?>/img/apple-touch-icon-114x114.png">

<!-- JS
================================================== -->
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.easing.1.3.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/bootstrap.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.prettyPhoto.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.quicksand.js"></script>
<script src="<?=base_url('assets/piccolo') ?>/js/jquery.custom.js"></script>

</head>

<body>
	<div class="color-bar-1"></div>
    <div class="color-bar-2 color-bg"></div>

    <div class="container main-container">
    
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
    				<li><a href="index.htm">All Facilities</a></li>
    	                <!--<a class="dropdown-toggle" data-toggle="dropdown" href="index.htm">All Facilities <b class="caret"></b></a>
    	                <ul class="dropdown-menu">
    	                    <li><a href="index.htm">Full Page</a></li>
    	                    <li><a href="index-gallery.htm">Gallery Only</a></li>
    	                    <li><a href="index-slider.htm">Slider Only</a></li>
    	                </ul>
    	            </li>-->
    	           	<li><a href="features.htm">T-Junction</a></li>
    	           	<li class="dropdown active">
    	                <a class="dropdown-toggle" data-toggle="dropdown" href="gallery-4col.htm">Library</a>
    	                <ul class="dropdown-menu">
    	                    <li><a href="gallery-3col.htm">Gallery 3 Column</a></li>
    	                    <li><a href="gallery-4col.htm">Gallery 4 Column</a></li>
    	                    <li><a href="gallery-6col.htm">Gallery 6 Column</a></li>
    	                    <li><a href="gallery-4col-circle.htm">Gallery 4 Round</a></li>
    	                    <li><a href="gallery-single.htm">Gallery Single</a></li>
    	                </ul>
    		        </li>
    		        <li class="dropdown">
    	                <a class="dropdown-toggle" data-toggle="dropdown" href="blog-style1.htm">Sports</a>
    	                <ul class="dropdown-menu">
    	                    <li><a href="blog-style1.htm">Blog Style 1</a></li>
    	                    <li><a href="blog-style2.htm">Blog Style 2</a></li>
    	                    <li><a href="blog-style3.htm">Blog Style 3</a></li>
    	                    <li><a href="blog-style4.htm">Blog Style 4</a></li>
    	                    <li><a href="blog-single.htm">Blog Single</a></li>
    	                </ul>
    	            </li>
    	            <li class="dropdown">
    	                <a class="dropdown-toggle" data-toggle="dropdown" href="blog-style1.htm">My Account</a>
    	                <ul class="dropdown-menu">
    	                    <li><a href="blog-style1.htm">Login</a></li>
    	                </ul>
    	            </li>
    	            <li><a href="page-contact.htm">Contact Us</a></li>
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

            </div><!-- End Navigation 
            ================================================== -->
            
        </div><!-- End Header 
        ================================================== -->