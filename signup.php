<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $fname=$_POST['firstname'];
    $lname=$_POST['lastname'];
    $contno=$_POST['mobilenumber'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $ret=mysqli_query($con, "select Email from tbluser where Email='$email' || MobileNumber='$contno'");
    $result=mysqli_fetch_array($ret);


    if($result>0){

echo "<script>alert('This email or Contact Number already associated with another account!.');</script>";
    }
    else{
    $query=mysqli_query($con, "insert into tbluser(FirstName, LastName, MobileNumber, Email, Password, status) value('$fname', '$lname','$contno', '$email', '$password', 0)");
    if ($query) {

        if($query){
            $otp = rand(100000,999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['mail'] = $email;
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host='smtp.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth=true;
            $mail->SMTPSecure='tls';

            $mail->Username='acepetshop.online@gmail.com';
            $mail->Password='wyecmwlzvrsegvam';

            $mail->setFrom('acepetshop.online@gmail.com', 'OTP Verification');
            $mail->addAddress($_POST["email"]);

            $mail->isHTML(true);
            $mail->Subject="Your verify code";
            $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
            <br><br>
            <p>Thank you for signing up,</p>
";

                    if(!$mail->send()){
                        ?>
                            <script>
                                alert("<?php echo "Register Failed "?>");
                            </script>
                        <?php
                    }else{
                        ?>
                        <script>
                            alert("<?php echo "Register Successfully, OTP sent to " . $email ?>");
                            window.location.replace('otp-verification.php');
                        </script>
                        <?php
                    }
        }
    }
}
}
    
    // echo "<script>alert('You have successfully registered.');</script>";
//   }
//   else
//     {
    
//       echo "<script>alert('Something Went Wrong. Please try again.');</script>";
//     }
// }
// }
?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Ace Petshop | Signup Page</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">



            <style>
              i{
                color:lightgray;
                position: relative;
                bottom: 40px;
                cursor:pointer;
                left: 600px;;

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
<script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
 Signup
            </h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Signup</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec ">
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
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <h3>Register with us!!</h3>
                    <form method="post" name="signup" onsubmit="return checkpass();">

                    <div style="padding-top: 30px;">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required=""></div>
                           <div style="padding-top: 30px;">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required="">
                        </div>
                        <div style="padding-top: 30px;">
                            <label>Mobile Number</label>
                           <input type="text" class="form-control" placeholder="Mobile Number" required="" name="mobilenumber" pattern="[0-9]{11}" maxlength="11" title="mobile number must 09510722565"></div>
                           <div style="padding-top: 30px;">
                            <label>Email address</label>
                            <input type="email" class="form-control" class="form-control" placeholder="Email address" required="" name="email">
                        </div>


                        <div style="padding-top: 30px">
                             <label>Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Password" id="password"required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                           <i id="visibilityBtn"><span id="icon" class="material-symbols-outlined">visibility_off</i>
                        </div>

                        <div style="padding-top: 30px">
                             <label>Repeat Password</label>
                          <input type="password" class="form-control" name="password2" placeholder="Password" id="password2"required="true" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" >
                           <i id="visibilityBtn2"><span id="icon2" class="material-symbols-outlined">visibility_off</span></i>
                        </div>

                           
                          <!--   <div class="checkbox-container">
                              <input type="checkbox" id="checkbox1" required>
                              <label for="checkbox1"></label>
                          </div>
                          <label> I agree <br><a href="terms-and-condition.php">Terms and Conditions</a></label> -->
                            
                      <!--   <div class="checkbox-container">
                            <input type="checkbox" name="agreement" class="form-check-output" required>
                            <label for="agreement" class="form-check-label font-ubuntu text-black-50">I agree<a href="terms-and-condition.php">Terms and Conditions</a></label>
                            
                        </div> -->



                        <button type="submit" class="btn btn-contact" name="submit">Signup</button>
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

                   const visibilityBtn2= document.getElementById("visibilityBtn2")
                    visibilityBtn2.addEventListener("click",toggleVisibility2)

                   function toggleVisibility2(){
                    const passwordInput= document.getElementById("password2")
                    const icon = document.getElementById("icon2")
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