<?php
session_start();
error_reporting(0);

include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{
// Check connection

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop || Expiration</title>

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
          <h3 class="title1">Product Expiration</h3>
          <div class="table-responsive bs-example widget-shadow">
            <h4>Product Expiration:</h4>
            <br>
            <table class="table table-bordered" id="dataTable"> 
               
<?php  
// Calculate 3 months from today
$today = date("Y-m-d");
$threemonths = date("Y-m-d", strtotime($today . ' + 3 months'));

// Query the database for nearest expiration dates
$sql = "SELECT * FROM tblproduct WHERE expiry_date <= '$threemonths' ORDER BY expiry_date";
$result = $con->query($sql);

// Display the results
if ($result->num_rows > 0) {
    echo "<thead> 
                <tr> <th>ID</th> 
                  <th>Product Name</th>
                    <th>Image</th> 
                                             
                   
                    <th>Expiration Date</th>
                  
                  </thead>";
    while($row = $result->fetch_assoc()) {
        echo "<tr> <td>".$row["product_id"]."</td>
                  <td>".$row["product_name"]."</td>
                  <td>".$row["product_image"]."</td>
                  <td>".$row["expiry_date"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

// Close database connection
$con->close();
?>
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