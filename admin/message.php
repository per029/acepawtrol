<?php
session_start();
require "Mail/phpmailer/PHPMailerAutoload.php";
include('includes/dbconnection.php');

if(isset($_SESSION['mail'])) {

  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->Host='smtp.gmail.com';
  $mail->Port=587;
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='tls';

  $mail->Username='acepetshop.online@gmail.com';
  $mail->Password='wyecmwlzvrsegvam';

  $mail->setFrom('acepetshop.online@gmail.com', 'Message from Ace Pet Shop');
  $mail->addAddress($_SESSION['mail']);

  $mail->isHTML(true);
  $mail->Subject="Message from Ace Pet Shop";
  $mail->Body="<p>Dear user, </p> <h3>Thank you for contacting Ace Pet Shop! <br></h3>
            <br>
            <p>We have received your message and will get back to you as soon as possible.</p>
            <br>
            <p>Thank you for your interest in Ace Pet Shop!</p>
";

  if(!$mail->send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else {
     // Display a success message
        echo '<script>alert("Message sent successfully!")</script>';
        
  }
} else {
  echo '<script>alert("Failed to send message. Please try again later.")</script>';
}
?>
