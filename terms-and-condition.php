<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    
    <title>Ace Petshop | Terms and conditions</title>

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
					Terms and Conditions
                </h3>
            </div>
</div>
   </div>
   <div class="breadcrumbs-sub">
   <div class="container">   
    <ul class="breadcrumbs-custom-path">
        <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
        <li class="active ">Terms and Conditions</li>
    </ul>
</div>
</div>
        </div>
    </section>
    <body>
<!-- breadcrumbs //-->
<h2><strong>Terms and Conditions</strong></h2>


<p>Welcome to Ace Petshop Terms and Conditions !</p>

<p>These are the terms and conditions of your Account Please read this document carefully. Please retain this document for future reference, and note that this document is subject to change upon notice to you via posting on the website.</p>

<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use acepawtrol if you do not agree to take all of the terms and conditions stated on this page.</p>

<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: "Client", "You" and "Your" refers to you, the person log on this website and compliant to the Company’s terms and conditions. "The Company", "Ourselves", "We", "Our" and "Us", refers to our Company. "Party", "Parties", or "Us", refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>

<h3><strong>GENERAL PROVISIONS</strong></h3>

<p>In consideration of our website opening and maintaining this Account, you agree to the terms and conditions contained in this Agreement, as amended from time to time.</p>

<h3><strong>NOTE: </strong></h3>
<p>There are several aspects of this agreement and the Ace Petshop service which are not typical for online services or other scheduling accounts and which you should read carefully before opening an account, including but not limited to:</p>

<br>
<h3><strong>1. OPENING YOUR ACCOUNT. YOU MAY APPLY FOR AN ACCOUNT BY COMPLETING A SIGNUP FORM ON THE WEBSITE.</strong></h3>
<p>You warrant and represent that the information that you furnish in your Account setup is accurate and truthful. Accounts set up with invalid data will be deleted immediately. You also expressly authorize our website to obtain reports concerning your credit standing and business conduct. Upon your written request, we will inform you whether we have obtained credit reports.</p>

<h3><strong>2. COSTS AND FEES.</strong></h3>
<p>We display our service offer and prices. We offer online payment through E-wallet (GCASH). After you make an appointment you can advance your payment through our Gcash QR code. Or After the service of your pet, you may pay through over-the-counter or Gcash. When you make an appointment we need to pay you 50% or more of our services that you choose to guarantee that you appoint to our shop. If you make it on time the rest of the cost of our services you may pay. But if you didn’t arrive on your time schedule the advance payment you give is nonrefundable for the cost and delay you give,</p>

<br><h3><strong>3. CUSTOMER’S RESPONSIBILITY</strong></h3>

<p>Regarding making an appointment. If you didn’t make it in time you will be automatically canceled and you make another schedule. You are responsible for knowing the appointments that have been scheduled.</p>

<br><h3><strong>4. SCHEDULING WALK-IN/ ONLINE</strong></h3>
<p>We are always first come first serve. If you make an appointment you will automatically reserve. If a walk-in customer is the first to come the admin will reserve an available time. Online Appointee, will choose the available date and time displayed.</p>

<br><h3><strong>5. COMPANY POLICIES</strong></h3>
<p>We have policies to guarantee that your pet is safe and secure.</p>
<br>
<ul>
    <li>1.	First Come First Serve</li>
    <li>2.	Down Payment First before making an appointment</li>
    <li>3.	We provide and give our best services to your pet</li>
    <li>4.	You can leave your pet in our cage</li>
</ul>

   
                    </body>
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