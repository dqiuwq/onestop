<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Page Content
================================================== -->

<div class="row headline"><!-- Begin Headline -->
        <!-- Slider Carousel
        ================================================== -->
        <div class="span8">
                <div class="flexslider">
                        <ul class="slides">
                                <li><a href="gallery-single.htm"><img src="<?=base_url('assets/piccolo') ?>/img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                                <li><a href="gallery-single.htm"><img src="<?=base_url('assets/piccolo') ?>/img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                                <li><a href="gallery-single.htm"><img src="<?=base_url('assets/piccolo') ?>/img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                                <li><a href="gallery-single.htm"><img src="<?=base_url('assets/piccolo') ?>/img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                                <li><a href="gallery-single.htm"><img src="<?=base_url('assets/piccolo') ?>/img/gallery/slider-img-1.jpg" alt="slider" /></a></li>
                        </ul>
                </div>
        </div>

        <!-- Headline Text
        ================================================== -->
        <div class="span4">
                <h3>New Facilities.</h3>
                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam pretium vulputate magna sit amet blandit.</p>
                <p>Cras rutrum, massa non blandit convallis, est lacus gravida enim, eu fermentum ligula orci et tortor. In sit amet nisl ac leo pulvinar molestie. Morbi blandit ultricies ultrices.</p>
                <a href="#"><i class="icon-plus-sign"></i>Book Now</a> 
        </div>
</div><!-- End Headline -->

<figure class="snip0013">
    <img src="<?=base_url('assets/uploads/gallery') ?>/facility.jpg" alt="Facility"/>
    <div>
        <a href="http://myportal.nyp.edu.sg/portal/page/portal/Student_Portal/Student_Portal_DocumentLibrary/login.htm"><span>NYP Portal</span></a>
    </div>          
</figure>
<figure class="snip0013">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample32.jpg" alt="sample32"/>
    <div>
        <a href="https://polymall.polytechnic.edu.sg/"><span>NYP PolyMall</span></a>
    </div>          
</figure>
<figure class="snip0013">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample32.jpg" alt="sample32"/>
    <div>
        <a href="https://learn.nyp.edu.sg/"><span>NYP Blackboard</span></a>
    </div>          
</figure>


<!-- Page JS
================================================== -->
<script type="text/javascript">
    $(window).load(function(){

        $('.flexslider').flexslider({
            
            animation: "slide",
            slideshow: true,
            
            start: function(slider){
                $('body').removeClass('loading');
            }
        });  
    });
</script>

<style>
@import url(https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css);
figure.snip0013 {
  position: relative;
  float: left;
  overflow: hidden;
  margin: 10px 1%;
  min-width: 220px;
  max-width: 310px;
  max-height: 220px;
  width: 100%;
  background: #000000;
  text-align: center;
}
figure.snip0013 img {
  max-width: 100%;
  opacity: 1;
  -webkit-transition: opacity 0.35s;
  transition: opacity 0.35s;
}
figure.snip0013 > div {
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  height: 100%;
  position: absolute;
}
figure.snip0013 > div a {
  color: #ffffff;
}
figure.snip0013 > div a span {
  font-size: 16px;
  line-height: 25px;
  width:75%;
  opacity: 0;
  top: 50%;
  position: relative;
  -webkit-transform: translate3d(0, -50%, 0);
  transform: translate3d(0, -50%, 0);
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
  display: inline-block;
}
figure.snip0013 > div a span.left-icon {
  -webkit-transform: translate3d(0, -50%, 0);
  transform: translate3d(0, -50%, 0);
}
figure.snip0013 > div a span.right-icon {
  -webkit-transform: translate3d(0, -50%, 0);
  transform: translate3d(0, -50%, 0);
}
figure.snip0013 > div::before {
  position: absolute;
  top: 30px;
  right: 50%;
  bottom: 30px;
  left: 50%;
  border-left: 1px solid rgba(255, 255, 255, 0.8);
  border-right: 1px solid rgba(255, 255, 255, 0.8);
  content: '';
  opacity: 0;
  background-color: #ffffff;
  -webkit-transition: all 0.4s;
  transition: all 0.4s;
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}
figure.snip0013:hover img {
  opacity: 0.35;
}
figure.snip0013:hover > div span {
  opacity: 0.9;
  -webkit-transition: 0.3s ease-in-out;
  transition: 0.3s ease-in-out;
  -webkit-transition-delay: 0.3s;
  transition-delay: 0.3s;
}
figure.snip0013:hover > div span.left-icon {
  -webkit-transform: translate3d(-25%, -50%, 0);
  transform: translate3d(-25%, -50%, 0);
}
figure.snip0013:hover > div span.right-icon {
  -webkit-transform: translate3d(25%, -50%, 0);
  transform: translate3d(25%, -50%, 0);
}
figure.snip0013:hover > div::before {
  background: rgba(255, 255, 255, 0);
  left: 30px;
  right: 30px;
  opacity: 1;
  -webkit-transition-delay: 0s;
  transition-delay: 0s;
}

</style>