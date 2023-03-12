<?php
session_start();
require "Mail/phpmailer/PHPMailerAutoload.php";
include('includes/dbconnection.php');

if(isset($_SESSION['mail'])) {
  $otp = rand(100000,999999);
  $_SESSION['otp'] = $otp;

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';

  $mail->Username='acepetshop.online@gmail.com';
  $mail->Password='wyecmwlzvrsegvam';

  $mail->setFrom('acepetshop.online@gmail.com', 'OTP Verification');
  $mail->addAddress($_SESSION['mail']);

  $mail->isHTML(true);
  $mail->Subject="Your verify code";
  $mail->Body="<p>Dear user, </p> <h3>Your verify OTP code is $otp <br></h3>
            <br><br>
            <p>Thank you for signing up,</p>
";

  if(!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else { 
     // Display a success message
        echo '<script>alert("New OTP code sent successfully!")</script>';

        echo "<script>window.location.href='otp-verification.php'</script>";
  }
} else {
  echo '<script>alert("Failed to send new OTP code. Please try again later.")</script>';
}
?>