<?php
session_start();
include('includes/dbconnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exeption;

require 'vendor/autoload.php';

function sendemail_verify($firstname,$email,$verification_status) 
{
	$mail = new PHPMailer(true);
	// $mail->SMTPDebug = 2;
	$mail->isSMTP();
	$mail->SMTPAuth = true;

	$mail->Host = "smtp.gmail.com";
	$mail->Username = "lunariacarlangelo@gmail.com";
	$mail->Password = "wacavikllybacvut";

	$mail->SMTPSecure = "tls";
	$mail->Port = 587;

	$mail->isHTML(true);
	$mail->Subject = "Email verification From acepetshop";

	$email_template = "
		<h2>You have registered with acepetshop</h2>
		<h5>Verify your email address to login with the link below</h5>
		<br/><br/>
		<a href='http://localhost/acepetshop/verify-email.php?verification=$verification_status'> Click Me </a>";

	$mail->Body = $email_template;
	$mail->send();
	//echo 'message has been sent';
}

if (isset($_POST['register_btn'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$mobilenumber = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$repeatpassword = $_POST['repeatpassword'];
	$verification_status = md5(rand());

	sendemail_verify("$firstname","$email","$verification_status");
	echo "sent or not?";

	//email exists or not 
	//$check_email_query = "SELECT email FROM tbluser WHERE email='$email' LIMIT 1";
	//$check_email_query_run = mysqli_query($con, $check_email_query);

	//if(mysqli_num_rows($check_email_query) > 0)
	//{
	//	$_SESSION['status'] = "email id already exsists";
	//	header("Location: signup.php");
	//}
	//else
	//{
	//	//insert user or registered user data
	//	$query = "INSERT INTO tbluser (firstname,lastname,mobilenumber,email,password,repeatpassword,//verification_status) VALUES ('$firstname','$lastname','$mobilenumber','$email','$password'//,'$repeatpassword','$verification_status')";
	//	$query_run = mysqli_query($con, $query);

	//	if($query_run)
	//	{
	//		sendemail_verify("$firstname","$email","$verification_status");
	//		$_SESSION['status'] = "Registration successful. Please verify your email address";
	//		header("Location: signup.php");
	//	}
	//	else
	//	{
	//		$_SESSION['status'] = "Registration failed";
	//		header("Location: signup.php");
	//	}
	//}
}
?>