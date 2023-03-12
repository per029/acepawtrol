<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{ 
if($_GET['delid'])


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>AcePatrol || Product</title>

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

<!-- datatable -->
<?php
include('includes/dtables.php');
?>

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

		<style>
.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
}
.kv-avatar {
    display: inline-block;
}
.kv-avatar .file-input {
    display: table-cell;
    width: 213px;
}
.kv-reqd {
    color: red;
    font-family: monospace;
    font-weight: normal;
}
</style>
	
	<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Product</h3>
					<div class="row">
						<div class="col-md-12">
							<nav aria-label="breadcrumb">
									</nav>
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
									    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									    <li class="breadcrumb-item active" aria-current="page">product</li>
									  </ol>
									</nav>	

										<div class="panel panel-default">
											<div class="panel-heading"> <i class="glyphicon glyphicon-edit"></i>Manage Product</div>
											<div class="panel-body">
												<div class="remove-messages"></div>
 
												<div class="div-action" style="padding-bottom: 20px;">
													<button class="btn btn-default" data-toggle="modal" data-target="#addProductModal" id="addProductModalBtn"> <i class="glyphicon glyphicon-plus-sign"></i>Add Product</button>
													
												</div> <!-- /div-action -->
												
												<table class="table" id="manageProductTable">
													<thead>
														<tr>
															<th style="width: 10%;">Photo</th>
															<th>Product Name</th>
															<th>Rate</th>
															<th>Quantity</th>
															<th>Brand</th>
															<th>Category</th>
															<th>Status</th>
															<th style="width: 15%;">Actions</th>
														</tr>
													</thead>
												</table>
											</div>
											
										</div>


							</div> <!-- /col-md-12 -->
					</div> <!-- /row -->


<div class="modal fade" tabindex="-1" role="dialog" id="addProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Product </h4>
      </div>

      <form class="form-horizontal" id="submitProductForm" action="createProduct.php" method="post" enctype="multipart/form-data">
 
      <div class="modal-body" style="max-height: 450px;overflow: auto;">

      	<div id="add-product-messages"></div>

			  <div class="form-group">
			    <label for="inputEmail3" class="col-sm-3 control-label">Product Image :</label>
			    <div class="col-sm-9">

			  
			      <div id="kv-avatar-errors-1" class="center-block" style="display: none"></div>
			      <div class="kv-avatar center-block">
			      		<input id="productImage" name="productImage" type="file" class="file-loading" style="width:auto;">
			      </div>
			      
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="productName" class="col-sm-3 control-label">Product Name :</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="quantity" class="col-sm-3 control-label">Quantity :</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="rate" class="col-sm-3 control-label">Rate :</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate">
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">Brand Name :</label>
			    <div class="col-sm-9">
			      <select class="form-control" id="brandName" name="brandName">
			      	<option value="">~~SELECT~~</option>
			      	<?php 
			      	$sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
			      	$result = $con->query($sql);
			      	while ($row = $result->fetch_array()) {
			      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
			      	}
			      	?>
			      </select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="categoryName" class="col-sm-3 control-label">Category Name :</label>
			    <div class="col-sm-9">
			      <select class="form-control" id="categoryName" name="categoryName">
			      	<option value="">~~SELECT~~</option>
			      	<?php 
			      	$sql = "SELECT categories_id, categories_name FROM category WHERE categories_active = 1 AND categories_status = 1";
			      	$result = $con->query($sql);
			      	while ($row = $result->fetch_array()) {
			      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
			      	}
			      	?>
			      </select>
			    </div>
			  </div>

			  <div class="form-group">
			    <label for="productStatus" class="col-sm-3 control-label">Status :</label>
			    <div class="col-sm-9">
			      <select class="form-control" id="productStatus" name="productStatus">
			      	<option value="">~~SELECT~~</option>
			      	<option value="1">Available</option>
			      	<option value="2">Not Available</option>
			      </select>
			    </div>
			  </div>


			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary">Save changes</button>
			      </div>

			      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="editProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product </h4>
      </div>
      <div class="modal-body" style="height:450px;overflow: auto;">
    		  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
			    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Information</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="photo">

			    	
			    	<form class="form-horizontal" action="editProductImage.php" method="post" id="updateProductImageForm" enctype="multipart/form-data">
			    		<br />
			    		<div id="edit-productPhoto-messages"></div>
							  <div class="form-group">
							    <label for="getProductImage" class="col-sm-3 control-label">Product Image</label>
							    <div class="col-sm-9">
							      <img src="" id="getProductImage" class="thumbnail" style="width: 250px; height: 250px;">
							    </div>
							  </div>

							   <div class="form-group">
							    <label for="editProductImage" class="col-sm-3 control-label">Product Image</label>
							    <div class="col-sm-9">
							     <div id="kv-avatar-errors-1" class="center-block" style="width: 800px;display: none;"></div>
							     <div class="kv-avatar center-block">
							     		<input id="editProductImage" name="editProductImage" name="avatar-1" type="file" class="file-loading">
							     </div>
							    </div>
							  </div>

							  <div class="modal-footer editProductPhotoFooter">
							    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        					<button type="submit" class="btn btn-primary">Save changes</button>
							  </div>
							</form>
										    	
			    </div>
			    <div role="tabpanel" class="tab-pane" id="productInfo">
			    	<br />

			    	<div id="edit-product-messages"></div>

			    	<form class="form-horizontal" id="editProductForm" action="editProduct.php" method="POST">
						  <div class="form-group">
						    <label for="editProductName" class="col-sm-3 control-label">Product Name: </label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="editProductName" name="editProductName" placeholder="Product Name">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="editQuantity" class="col-sm-3 control-label">Quantity: </label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="editQuantity" name="editQuantity" placeholder="Quantity">
						    </div>
						  </div>
						  	 <div class="form-group">
						    <label for="editRate" class="col-sm-3 control-label">Rate: </label>
						    <div class="col-sm-9">
						      <input type="text" class="form-control" id="editRate" name="editRate" placeholder="Rate">
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="editBrandName" class="col-sm-3 control-label">Brand Name: </label>
						    <div class="col-sm-9">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">~~SELECT~~</option>
						      	<?php 
						      	$sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
						      	$result = $con->query($sql);

						      	while ($row = $result->fetch_array()) {
						      		echo "<option value'".$row[0]."'>".$row[1]."</option>";
						      	} //while
						      	?>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="editCategoryName" class="col-sm-3 control-label">Category Name: </label>
						    <div class="col-sm-9">
						      <select class="form-control" id="editCategoryName" name="editCategoryName">
						      	<option value="">~~SELECT~~</option>
						      	<?php
						      	$sql = "SELECT categories_id, categories_name FROM category WHERE categories_status = 1 AND categories_active = 1";
						      	$result = $con->query($sql);

						      	while ($row = $result->fetch_array()) {
						      		echo "<option value='".$row[0]."'>".$row[1]."</option>";
						      	}
						      	?>
						      </select>
						    </div>
						  </div>
						  <div class="form-group">
						    <label for="editProductStatus" class="col-sm-3 control-label">Status: </label>
						    <div class="col-sm-9">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">~~SELECT~~</option>
						      	<option value="1">Available</option>
						      	<option value="2">Not Available</option>
						      </select>
						    </div>
						  </div>

						  <div class="modal-footer editProductFooter">
						  	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="submit" class="btn btn-primary">Save changes</button>
						  </div>

						</form>
			    </div>
			  </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i>Remove Product</h4>
      </div>
      <div class="modal-body">
        <p>Do you want to remove?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





















		<script type="text/javascript" src="js/product.js"></script>






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
