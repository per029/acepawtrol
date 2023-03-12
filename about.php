<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Ace Petshop | About us Page</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">
<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
    <section class="w3l-inner-banner-main">
        <div class="about-inner about ">
            <div class="container">   
                <div class="main-titles-head text-center">
                <h3 class="header-name ">
					About Us
                </h3>
            </div>
</div>
   </div>
   <div class="breadcrumbs-sub">
   <div class="container">   
    <ul class="breadcrumbs-custom-path">
        <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
        <li class="active ">About</li>
    </ul>
</div>
</div>
        </div>
    </section>
<!-- breadcrumbs //-->
<section class="w3l-content-with-photo-4"  id="about">
    <div class="content-with-photo4-block ">
        <div class="container">
            <div class="cwp4-two row">
            <div class="cwp4-image col-xl-6">
                <img src="assets/images/dogbg123.png" alt="product" class="img-responsive about-me">
            </div>
                <div class="cwp4-text col-xl-6 ">
                    <div class="posivtion-grid">
                    <h3 class="">Dog Grooming</h3>
                    <div class="hair-two-colums">
                        <div class="hair-left">
                            <h5>Haircut Only</h5>
                            </div>

                        <div class="hair-left">
                            <h5>Full Groom (Package)</h5>
                        </div>

                        <div class="hair-left">
                        <h5>Nail Clipping</h5>
                        </div>

                        <div class="hair-left">
                        <h5>Face Trim</h5>          
                         </div>

                        <div class="hair-left">
                        <h5>Paw Trim</h5>          
                         </div>

                        <div class="hair-left">
                        <h5>Ear Cleaning</h5>
                         </div>

                        <div class="hair-left">
                        <h5>Ear Flucking</h5>
                        </div>

        </div>
        </div>
    </div>
</div>
</section>
    
<section class="w3l-recent-work">
	<div class="jst-two-col">
		<div class="container">
<div class="row">
		<div class="my-bio col-lg-6">

	<div class="hair-make">
		<?php

$ret=mysqli_query($con,"select * from tblpage where PageType='aboutus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
		<h5><a href="blog.html"><?php  echo $row['PageTitle'];?></a></h5>
		<p class="para mt-2"><?php  echo $row['PageDescription'];?></p><?php } ?>
	</div>
	
	
	</div>
	<div class="col-lg-6 ">
		<img src="assets/images/dogbg4.png" alt="product" class="img-responsive about-me">
	</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div class="col-lg-6">
        <img src="assets/images/location.png" class="img-responsive about-me">
    </div>
        


    
 
            
               
    
                <div class="cwp4-text col-xl-6 ">
                    
                
                    <div class="hair-two-colums">
                        <div class="hair-left">
                           <h2> <a href="https://www.google.com/maps/place/Ace+Petshop/@14.7599391,120.9615404,3a,90y,304.57h,91.21t/data=!3m6!1e1!3m4!1sD4uQiGjoXY8gO6PaaF3UGg!2e0!7i16384!8i8192!4m5!3m4!1s0x3397b26a5e7a8a55:0xfbb5af365c5c2e61!8m2!3d14.7600086!4d120.961484">@AcePetshop Location</a>
                           <p> Your Pet's Second Home <br> Ace Petshop is always serves the best for your fur babies
                           </p>
                            </div></h2>

                        </div>





    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators"></ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner"></div>
  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>












</div>
		</div>
	</div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top -->
</body>

</html>