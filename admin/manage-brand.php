<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $brandsName=$_POST['brandsName'];
   $brandActive=$_POST['brandActive'];

// get the image extension

// allowed extensions


     
   $query=mysqli_query($con, "insert into  tblbrand(brand_name,brand_active, brand_datetime_added, brand_status) value('$brandsName','$brandActive', NOW(), 1)");
    if ($query) {
      echo "<script>alert('Brand has been added.');</script>"; 
        echo "<script>window.location.href = 'manage-brand.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }

  
}

if($_GET['delstat']){
$delstat=$_GET['delstat'];
mysqli_query($con,"delete from tblbrand where brand_id = '$delstat'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-brand.php'</script>";
          }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop || Manage Brand</title>

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
					<h3 class="title1">Manage Brand</h3>
					<div class="form-body">
              <form method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Update Brands:</h4>
						<div class="div-action">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addbrand"> <i class="glyphicon glyphicon-plus-sign"></i>Add Brands</button>
						</div><br>
						<table class="table table-bordered" id="dataTable"> 
							<thead> 
								<tr>
								 <th>#</th>
								  <th>Brand Name</th> 
								  <th>Brand Status</th> 
								  <th>Date and Time Added</th>
								  <th>Action</th>
								</tr> 
							</thead>

							<div class="modal" tabindex="-1" id="addbrand">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								         <h4 class="modal-title"> <i class="fa fa-plus"></i>Add Brand</h4>
								      </div>
								      <form class="form-horizontal" id="submitBrandForm" action="createBrand.php" method="POST"></form>
												<div class="modal-body">
										   <div class="form-group"> <label for="exampleInputEmail1">Brand Name</label> <input type="text" class="form-control" id="brandsName" name="brandsName" placeholder="Brand Name" value="" required="true"> </div>

										   <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" id="brandActive" name="brandActive" value="" required="true">
                 <option value="">~~SELECT</option>
                 <option value="1">Available</option>
                 <option value="2">Not Available</option>
               </select>
               </div>
               <br>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								          <button type="submit" name="submit" class="btn btn-primary">Add</button> </form> 
								      </div>
								      </form>
								    </div>
								  </div>
								</div>

						 <tbody>

<?php
$ret=mysqli_query($con,"select * from  tblbrand");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $cnt;?></th> 



						 	<td><?php  echo $row['brand_name'];?></td> 


						 	<td>
						 		<?php
						 		if($row['brand_active']==1){
						 			echo "<label class='label label-success'>Available</label>";
						 		} else {
						 			echo "<label class='label label-danger'>Not Available</label>";
						 		}
						 		?>

						 	</td>
						 	<td><?php  echo $row['brand_datetime_added'];?></td> 
						 	 <td>
						 	<a href="edit-brand.php?editid=<?php echo $row['brand_id'];?>" class="btn btn-primary">Edit</a>
						 	<a href="manage-brand.php?delstat=<?php echo $row['brand_id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

						 	</td> </tr>   <?php 
$cnt=$cnt+1;
}?>

</tbody> </table> 
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