<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $ID=$_POST['ID'];
    $gname=$_POST['gname'];
   	$image=$_POST['image'];
		$image=$_FILES["image"]["name"];
		$status=$_POST['status'];
		

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
    $query=mysqli_query($con, "insert into  tblgcash(ID,gcash_name,gcash_qr_image,qr_datetime_added,status) value('$ID','$gname','$newimage',NOW(),'$status')");
    if ($query) {
    	echo "<script>alert('gcash has been added.');</script>"; 
    		echo "<script>window.location.href = 'manage-gcash.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }

  
}
}




  	
if($_GET['delstat']){
$delstat=$_GET['delstat'];
mysqli_query($con,"delete from tblgcash where qr_id ='$delstat'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='manage-gcash.php'</script>";
          }
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop || Manage Gcash</title>

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
					<h3 class="title1">Manage Gcash</h3>
					
					<div class="form-body">
              <form method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Update Gcash:</h4>
						<div class="div-action">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addgcash"> <i class="glyphicon glyphicon-plus-sign"></i>Add Gcash</button>
						</div><br>
						<table class="table table-bordered" id="dataTable"> 

							<thead> 
								<tr> <th>#</th> 
									<th>ID</th>
									<th>gcash Name</th> 
									  <th>Image</th> 
									    <th>Date and Time Added</th>
									    
									 						       
									 <th>Status</th>
									<th>Action</th>
									   </tr> 
									</thead>

	<div class="modal fade" tabindex="-1" role="dialog" id="addgcash">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Gcash </h4>
      </div>

      <form class="form-horizontal" id="submitProductForm" action="createProduct.php" method="post" enctype="multipart/form-data">
 
      <div class="modal-body" style="max-height: 500px;overflow: auto;">

      

			  
			  <div class="form-group"> <label for="exampleInputEmail1">ID</label> <input type="text" class="form-control" id="ID" name="ID" placeholder="admin ID" value="" required="true"> </div>

			  <div class="form-group"> <label for="exampleInputEmail1">Gcash Name</label> <input type="text" class="form-control" id="gname" name="gname" placeholder="gcash Name" value="" required="true"> </div>

				<div class="form-group"> <label for="exampleInputEmail1">Images</label> <input type="file" class="form-control" id="image" name="image" value="" required="true"> </div>


			  				
							


			  <div class="form-group">
                 <label>Status</label>
                 <select class="form-control" id="status" name="status" value="" required="true">
                 <option value="">~~SELECT</option>
                 <option value="1">Active</option>
                 <option value="2">In Active</option>
               </select>
              
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
$ret=mysqli_query($con,"select * from  tblgcash");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
 
 

						 <tr> <th scope="row"><?php echo $cnt;?></th> 
						 	<td><?php  echo $row['ID'];?></td>
						 	<td><?php  echo $row['gcash_name'];?></td> 
						  <td><img src="images/<?php echo $row['product_image']?>" width="200"></td>
                             
						 	
					
						<td><?php  echo $row['product_datetime_added'];?></td> 
						 	
						 		<td>
						 		<?php
						 		if($row['status']==1){
						 			echo "<label class='label label-success'>active</label>";
						 		} else {
						 			echo "<label class='label label-danger'>in active</label>";
						 		}
						 		?>

						 	</td> 
						 
						 

						 	<td>
						 	
						 	<a href="manage-gcash.php?delstat=<?php echo $row['qr_id'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

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