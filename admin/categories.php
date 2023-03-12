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
<title>AcePatrol || Categories</title>

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
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Categories</h3>
					<div class="row">
						<div class="col-md-12">
							<nav aria-label="breadcrumb">
									</nav>
									<nav aria-label="breadcrumb">
									  <ol class="breadcrumb">
									    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
									    <li class="breadcrumb-item active" aria-current="page">Categories</li>
									  </ol>
									</nav>	

										<div class="panel panel-default">
											<div class="panel-heading"> <i class="glyphicon glyphicon-edit"></i>Manage Categories</div>
											<div class="panel-body">
												<div class="remove-messages"></div>

												<div class="div-action" style="padding-bottom: 20px;">
													<button class="btn btn-default" data-toggle="modal" data-target="#addCategoriesModal" onclick="addCategories()"><i class="glyphicon glyphicon-plus-sign"></i>Add Categories</button>
													
												</div> <!-- /div-action -->
												
												<table class="table" id="manageCategoriesTable">
													<thead>
														<tr>
															<th>Categories Name</th>
															<th>Status</th>
															<th style="width: 15%;">Actions</th>
														</tr>
													</thead>
												</table>
											</div>
											
										</div>


							</div> <!-- /col-md-12 -->
					</div> <!-- /row -->

<div class="modal fade" tabindex="-1" role="dialog" id="addCategoriesModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i>Add Categories</h4>
      </div>
      <form class="form-horizontal" id="submitCategoriesForm" action="createCategories.php" method="POST">
      <div class="modal-body">
      		<div id="add-Categories-messages"></div>
		  <div class="form-group">
		    <label for="CategoriesName" class="col-sm-3 control-label">Categories Name: </label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="categoriesName" name="categoriesName" placeholder="Categories Name" autocomplete="off">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="CategoriesStatus" class="col-sm-3 control-label">Status: </label>
		    <div class="col-sm-9">
		     	<select class="form-control" id="categoriesStatus" name="categoriesStatus">
		     		<option value="">~~SELECT~~</option>
		     		<option value="1">Available</option>
		     		<option value="2">Not Available</option>
		     	</select>
		    </div>
		  </div>   
      </div> 
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="createCategoriesBtn" data-loading-text="Loading...">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





<div class="modal fade" tabindex="-1" role="dialog" id="editCategoriesModal"> 
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i>Edit Categories</h4>
      </div>
      			<form class="form-horizontal" id="editCategoriesForm" action="editCategories.php" method="POST">
      <div class="modal-body">
      	<div id="edit-Categories-messages"></div>
      	<div class="form-group">
		    <label for="editCategories" class="col-sm-3 control-label">Categories Name: </label>
		    <div class="col-sm-9">
		      <input type="text" class="form-control" id="editCategoriesName" name="editCategoriesName" placeholder="Categories Name" autocomplete="off">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="editCategoriesStatus" class="col-sm-3 control-label">Status: </label>
		    <div class="col-sm-9">
		     	<select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
		     		<option value="">~~SELECT~~</option>
		     		<option value="1">Available</option>
		     		<option value="2">Not Available</option>
		     	</select>
		    </div>
		  </div>       
      </div>
      <div class="modal-footer editCategoriesFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




	<div class="modal fade" tabindex="-1" role="dialog" id="removeCategoriesModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Categories </h4>
      </div>
      <div class="modal-body">
        <p>Do you want to remove?</p>
      </div>
      <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove-sign"></i>Close</button>
        <button type="button" class="btn btn-primary" id="removeCategoriesBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i>Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

	<script type="text/javascript" src="js/Categories.js"></script>
					
				

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




	