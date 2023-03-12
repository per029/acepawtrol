
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
   	$image=$_POST['image'];
		$image=$_FILES["image"]["name"];
		$brandActive=$_POST['brandActive'];
		$categoryActive=$_POST['categoryActive'];
		$quantity=$_POST['quantity'];
		$price=$_POST['price'];
		$productActive=$_POST['productActive'];
		$expDate=$_POST['expDate'];

// get the image extension
$extension = substr($image,strlen($image)-4,strlen($image));
// allowed extensions
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{
//rename the image file
$newimage=md5($image).time().$extension;
// Code for move image into directory
move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$newimage);     
    $query=mysqli_query($con, "insert into  tblproduct(product_name,product_image,brand_id,category_id,quantity,price,active,product_datetime_added,expiry_date,status) value('$proname','$newimage','$brandActive','$categoryActive','$quantity','$price','$productActive',  NOW(), '$expDate', 1)");
    if ($query) {
    	echo "<script>alert('Product has been added.');</script>"; 
    		echo "<script>window.location.href = 'manage-product.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }

  
}
}




  	
if($_GET['delstat']){
$delstat=$_GET['delstat'];
mysqli_query($con,"delete from tblproduct where product_id ='$delstat'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-product.php'</script>";
          }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop || Manage Products</title>

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


<!-- datatable -->
<?php
include('includes/dtables.php');
?>

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
				<div class="tables">
					<h3 class="title1">Manage Product</h3>
					
					<div class="form-body">
              <form method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Update Product:</h4>
						<div class="div-action">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addprod"> <i class="glyphicon glyphicon-plus-sign"></i>Add Product</button>
						</div><br>
						<table class="table table-bordered" id="dataTable"> 

							<thead> 
								<tr> <th>#</th> 
									<th>Product Name</th>
									  <th>Image</th> 
									   <th>Brand</th> 
									    <th>Category</th> 
									    <th>Quantity</th> 
									     <th>Price</th> 								       
									 <th>Status</th>
									  <th>Expiry Date</th>
									 <th>Action</th> </tr> 
									</thead>

	<div class="modal fade" tabindex="-1" role="dialog" id="addprod">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Product </h4>
      </div>

      <form class="form-horizontal" id="submitProductForm" action="createProduct.php" method="post" enctype="multipart/form-data">
 
      <div class="modal-body" style="max-height: 500px;overflow: auto;">


			  
			  <div class="form-group">
				 <label for="exampleInputEmail1">Product Name</label>
				  <input type="text" class="form-control" id="proname" name="proname" placeholder="Product Name" value="" required="true"> 
				</div>

				<div class="form-group"> 
					<label for="exampleInputEmail1">Images</label> 
					<!-- <input type="file" class="img-thumbnail" id="image" name="image" value="" required="true">  -->
<!-- 
					<img src="" alt="" class="img-thumbnail" id="image" name="image" value=""  width="500" height="600"> -->
				</div>


			  <div class="form-group">
                 <label>Brands</label>
                 <select class="form-control" id="brandActive" name="brandActive" value="" required="true">
                 <option value="">~~SELECT</option>
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
                 <option value="">~~SELECT</option>
							      	<?php 
							      	$sql = "SELECT category_id, category_name FROM tblcategory WHERE category_active = 1";
							      	$result = $con->query($sql);
							      	while ($row = $result->fetch_array()) {
							      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
							      	}
							      	?>
							      </select>
							    </div>

			  <div class="form-group"> <label for="exampleInputPassword1">Quantity</label> <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity" value="" required="true"> </div>

			   <div class="form-group"> <label for="exampleInputPassword1">Price</label> <input type="text" id="price" name="price" class="form-control" placeholder="Price" value="" required="true"> </div>


			  <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" id="productActive" name="productActive" value="" required="true">
                 <option value="">~~SELECT</option>
                 <option value="1">Available</option>
                 <option value="2">Not Available</option>
               </select>
               </div>
                <label>Expiration Date</label>
               <input type="date" class="form-control appointment_date" placeholder="Date" name="expDate" id='expDate' required="true">
               <br>

			      </div>
			      <div class="modal-footer" style="max-height 500px;">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" name="submit" class="btn btn-primary">Add</button> </form>
			      </div>

			      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



									 <tbody>
<?php
$ret=mysqli_query($con,"SELECT tblproduct.product_id, tblproduct.product_name, tblproduct.product_image, tblproduct.brand_id, tblproduct.category_id, tblproduct.quantity, tblproduct.price, tblproduct.active, tblproduct.product_datetime_added, tblproduct.expiry_date, tblproduct.status, tblbrand.brand_name, tblcategory.category_name FROM tblproduct
	INNER JOIN tblbrand ON tblproduct.brand_id = tblbrand.brand_id
	INNER JOIN tblcategory ON tblproduct.category_id = tblcategory.category_id
	WHERE tblproduct.status = 1"); //dito ko icocode inner join
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

 
 

						 <tr> <th scope="row"><?php echo $cnt;?></th> 
						 	<td><?php  echo $row['product_name'];?></td> 
						  <td><img src="images/<?php echo $row['product_image']?>" width="100" class="img-fluid" ></td>
                             
						 	<td><?php  echo $row['brand_name'];?></td>
						 	<td><?php  echo $row['category_name'];?></td>
						 	<td><?php  echo $row['quantity'];?></td>
						 	<td><?php  echo $row['price'];?></td>

						 	
						 		<td>
						 		<?php
						 		if($row['active']==1){
						 			echo "<label class='label label-success'>Available</label>";
						 		} else {
						 			echo "<label class='label label-danger'>Not Available</label>";
						 		}
						 		?>

						 	</td> 
						 	<td><?php  echo $row['expiry_date'];?></td> 

						 	<td>
						 	<a href="edit-product.php?editid=<?php echo $row['product_id'];?>" class="btn btn-primary">Edit</a>
						 	<a href="manage-product.php?delstat=<?php echo $row['product_id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

						 	</td> </tr>   <?php 
$cnt=$cnt+1;
}?></tbody> </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
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
<?php }  ?>