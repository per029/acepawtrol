<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['login']))
  {
    $email = mysqli_real_escape_string($con, trim($_POST['emailcont']));
    $password = mysqli_real_escape_string($con,($_POST['password']));
    $password=md5($password);
    
    $query=mysqli_query($con,"select * from tbluser where Email='$email'  && Password='$password' ");
    $count = mysqli_num_rows($query);

    if($count > 0){

        $fetch = mysqli_fetch_assoc($query);
        $verified = $fetch["status"];

        if($verified == 1){

            $_SESSION['bpmsuid']=$fetch['ID'];
            ?>
            <script>
                alert("login successful.");
                window.location.replace('index.php');

            </script>
            <?php
           
        }
        else{
            ?>
            <script>
                alert("Please verify email account before login.");
            </script>
            <?php
        }
     
    }
    else{
    echo "<script>alert('Invalid Details.');</script>";
    }
  }
  




?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Ace Petshop | Login</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">



<style>
  i{
    color:lightgray;
                position: relative;
                bottom: 30px;
                cursor:pointer;
                left: 600px;
    }
</style>

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
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Login Page
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Login</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                    <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Call Us</h6>
                            <p class="para"><a href="09510722565">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Email Us</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Address</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-clock-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">
                        <div>
                            <label>Email</label>
                            <input type="text" class="form-control" name="emailcont" required="true" placeholder="Registered Email" required="true">
                        </div>

                        <div style="padding-top: 30px">
                             <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password"required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                           <i id="visibilityBtn"><span id="icon" class="material-symbols-outlined">visibility_off</i>
                        </div>
                        <div class="twice-two">
                          <a class="link--gray" style="color: blue;" href="recover-password.php">Forgot Password?</a>
                        
                        <button type="submit" class="btn btn-contact" name="login">Login</button>
                        </div>
                    </form>
                </div>
    </div>
   
    </div></div>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
        const visibilityBtn= document.getElementById("visibilityBtn")
                    visibilityBtn.addEventListener("click",toggleVisibility)

                   function toggleVisibility(){
                    const passwordInput= document.getElementById("password")
                    const icon = document.getElementById("icon")
                        if (passwordInput.type === "password"){
                            passwordInput.type = "text"
                            icon.innerText = "visibility"
                        
                        } else{
                            passwordInput.type = "password"
                            icon.innerText = "visibility_off"
                        }


                   } 


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