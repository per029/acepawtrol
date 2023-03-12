<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $proname=$_POST['proname'];
    $brandActive=$_POST['brandActive'];
    $categoryActive=$_POST['categoryActive'];
    $quanti=$_POST['quanti'];
    $rates=$_POST['rates'];
   	$prostat=$_POST['prostat'];
    
   
 $eid=$_GET['editid'];
     
    $query=mysqli_query($con, "update  tblproduct set product_name='$proname',brand_id='$brandActive',category_id='$categoryActive',quantity='$quanti',rate='$rates',active='$prostat' where product_id='$eid' ");
    if ($query) {
  
    echo "<script>alert('Service has been Updated.');</script>";
  }
  else
    {
      
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }

  
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Pawtrol | Update Services</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
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
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
	 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="forms">
					<h3 class="title1">Update Services</h3>
					<div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Update Parlour Services:</h4>
						</div>
						<div class="form-body">
							<form method="post">
								
  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"SELECT tblproduct.product_id, tblproduct.product_name, tblproduct.product_image, tblproduct.brand_id, tblproduct.category_id, tblproduct.quantity, tblproduct.rate, tblproduct.active, tblproduct.status, tblbrand.brand_name, tblcategory.category_name FROM tblproduct
	INNER JOIN tblbrand ON tblproduct.brand_id = tblbrand.brand_id
	INNER JOIN tblcategory ON tblproduct.category_id = tblcategory.category_id
	WHERE tblproduct.product_id = '$cid' "); //dito ko icocode inner join
$cnt=1;
while ($row2=mysqli_fetch_array($ret)) {

?> 


  
							 <div class="form-group"> <label for="exampleInputEmail1">Product Name</label> <input type="text" class="form-control" id="proname" name="proname" placeholder="Product Name" value="<?php  echo $row2['product_name'];?>" required="true"> </div>



							 <div class="form-group"> <label for="exampleInputPassword1">Image</label> <br><br> <img src="images/<?php echo $row2['product_image']?>" width="200">
               <a href="update-product-image.php?lid=<?php echo $row2['product_id'];?>">Update Image</a> </div>



							 

							 
							 <div class="form-group">
                 <label>Brands</label>
                 <select class="form-control" id="brandActive" name="brandActive" value="" required="true">
                 <option value=""><?php echo $row2['brand_name'];?></option>
							      	<?php 
							      	$sql = "SELECT brand_id, brand_name FROM tblbrand WHERE brand_active = 1";
							      	$result = $con->query($sql);
							      	while ($row = $result->fetch_array()) {
							      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
							      	}
							      	?>
							      </select>
							    </div>




							  <div class="form-group">
                 <label>Category</label>
                 <select class="form-control" id="categoryActive" name="categoryActive" value="" required="true">
                 <option value=""><?php echo $row2['category_name'];?></option>
							      	<?php 
							      	$sql = "SELECT category_id, category_name FROM tblcategory WHERE category_active = 1";
							      	$result = $con->query($sql);
							      	while ($row = $result->fetch_array()) {
							      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
							      	}
							      	?>
							      </select>
							    </div>





							  <div class="form-group"> <label for="exampleInputEmail1">Quantity</label> <input type="text" class="form-control" id="quanti" name="quanti" placeholder="Quantity" value="<?php  echo $row2['quantity'];?>" required="true"> </div>

							 

							 <div class="form-group"> <label for="exampleInputEmail1">Rate</label> <input type="text" class="form-control" id="rates" name="rates" placeholder="Rate" value="<?php  echo $row2['rate'];?>" required="true"> </div>





							




															 
								<div class="form-group"> 
								<label for="exampleInputEmail1">Product Status</label>
															 	
								<select class="form-control" id="prostat" name="prostat" value="" required="true">
															  	
								<option value=""><?php if($row2['active']==1){
									echo "available";
								} else{
									echo "not available";
								};?></option>
								<option value="1">Available</option>
								<option value="2">Not Available</option>
								</select>

								</div>
							 



						


							 <?php } ?>


							  <button type="submit" name="submit" class="btn btn-default">Update</button> </form>

							  <br>
							  <div class="form-group"> <label for="exampleInputEmail1"><a href="manage-product.php">Back to Manage product</a></label></div>
						</div>
						
					</div>
				
				
			</div>
		</div>
		 <?php include_once('includes/footer.php');?>
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>
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
<?php } ?>