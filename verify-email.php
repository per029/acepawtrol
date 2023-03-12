<?php 
	session_start();
    include('includes/dbconnection.php');
    if(isset($_POST["verify"])){
        $otp = $_SESSION['otp'];
        $email = $_SESSION['mail'];
        $otp_code = $_POST['otp_code'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
            mysqli_query($connect, "UPDATE login SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("Verfiy account done, you may sign in now");
                   window.location.replace("index.php");
             </script>
             <?php
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verify</title>
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/verify.css">

</head>
<body>
	<div class="form" style="text-align: center;">
		<h2>Verify Your Account</h2>
		<p>We emailed you to verify your email address.</p>
		<form action="" autocomplete="off">
			<div class="error-text">Error</div>
			<div class="fields-input">
				<input type="number" name="otp1" class="otp_field" placeholder="0" max="9" required onpaste="false">
				<input type="number" name="otp2" class="otp_field" placeholder="0" max="9" required onpaste="false">
				<input type="number" name="otp3" class="otp_field" placeholder="0" max="9" required onpaste="false">
				<input type="number" name="otp4" class="otp_field" placeholder="0" max="9" required onpaste="false">
				<input type="number" name="otp5" class="otp_field" placeholder="0" max="9" required onpaste="false">
				<input type="number" name="otp6" class="otp_field" placeholder="0" max="9" required onpaste="false">
			</div>
			<div class="submit">
				<input type="submit" value="verify Now" class="button">
			</div>
		</form>
	</div>
	<script src="Js/verify.js" =></script>
</body>
</html>