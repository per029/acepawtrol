<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $prodActive=$_POST['prodActive'];
   $quantity=$_POST['quantity'];
   $expDate=$_POST['expDate'];

// get the image extension

// allowed extensions


     
    $query=mysqli_query($con, "insert into  tblstock(product_id, stock_quantity, stock_expirydate, stock_months, stock_datetime_added) value('$prodActive','$quantity', '$expDate', 1)");
    if ($query) {
      echo "<script>alert('Brand has been added.');</script>"; 
        echo "<script>window.location.href = 'add-brand.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }

  
}
}
  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop | Add Banners</title>

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
          <h3 class="title1">Add Stocks</h3>
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>Ace Petshop Stocks:</h4>
            </div>
            <div class="form-body">
              <form method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>

  
               <div class="form-group">
                 <label>Product</label>
                 <select class="form-control" id="prodActive" name="prodActive" value="" required="true">
                 <option value="">~~SELECT</option>
                      <?php 
                      $sql = "SELECT product_id, product_name FROM tblproduct WHERE active = 1";
                      $result = $con->query($sql);
                      while ($row = $result->fetch_array()) {
                        echo "<option value='".$row[0]."'>".$row[1]."</option>";
                      }
                      ?>
                    </select>
                  </div>




                <div class="form-group"> <label for="exampleInputPassword1">Stock Quantity</label> <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Quantity" value="" required="true"> </div>


                 <label>Expiration Date</label>
               <input type="date" class="form-control appointment_date" placeholder="Date" name="expDate" id='expDate' required="true">
               <br>

               <label>Expiration Date</label>
               <input type="date" class="form-control appointment_date" placeholder="Date" name="expDate" id='expDate' required="true">
               <br>
               
                <button type="submit" name="submit" class="btn btn-primary">Add</button> </form> 
                 <br>
             <div class="form-group"> <label for="exampleInputEmail1"><a href="manage-brand.php">Manage Brands</a></label></div>
              </div>
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
<?php  ?>  