<?php


	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "bpmsdb";


	$conn = new mysqli($server,$username,$password,$db);



if(isset($_POST['submit'])){

$adminname = $_POST['adminname'];
$username = $_POST['user'];
$mobnumber = $_POST['mobnumber'];
$email = $_POST['email'];
$password = $_POST['pass'];
$type= $_POST['UserType'];

		$insert = "INSERT INTO tbladmin(`AdminName`,`UserName`,`MobileNumber`,`email`,`Password`,`UserType`) VALUES ('$adminname','$username','$mobnumber','$email','$password','$type')";
		$conn->query($insert) or die ($conn->error);

		echo header("Location: Register.php");




}?>



<!DOCTYPE HTML>
<html>
<head>
<title>AcePatrol | Login Page </title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" rel="stylesheet">

<style>
  i{
	color:lightgray;
	position: relative	;
	bottom: 55px;
	cursor:pointer;
	left: 670px;;

	}
</style>





 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		
		<!-- main content start-->
		<div style="background-color: #F1F1F1; height:800px;">
			<div class="main-page login-page ">
				<h3 class="title1">Register Page</h3>
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Registration of Ace Patrol ! </h4>
					</div>
					<div class="login-body">
							<form role="form" method="post" action="">
							
						<form method="post" action="register.php">
							
							<input type="text" class="adminname" name="adminname" placeholder="admin Name" required="true">
							<input type="text" class="user" name="user" placeholder="Username" required="true">
							<input type="text" class="mobnumber" name="mobnumber" placeholder="mobilenumber" required="true">
							<input type="text" class="email" name="email" placeholder="Email" required="true">
							<input type="password" name="pass"  id="password" class="lock" placeholder="Password" required="true">
                           <i id="visibilityBtn"><span id="icon" class="material-symbols-outlined">visibility_off</i>
							
							<div><label>User Type :</label>
								<select name="UserType">
									<option value="Admin">Admin</option>
									<option value="Cashier">Cashier</option>
								</select></div>
							<br>
							
							
							
							<input type="Submit" name="submit">
							<div class="forgot-grid">
								
								<div class="forgot">
									
									<a href="index.php">Back to Login</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="forgot-grid">
								
								
								<div class="clearfix"> </div>
							</div>
						</form>
					</div>
				</div>
				
				
			</div>
		</div>
		
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>

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

		</script>		   
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.js"> </script>
</body>
</html>