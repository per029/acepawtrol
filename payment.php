<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{


if(isset($_POST['submit']))
  {
    $proname=$_POST['proname'];
    $image=$_POST['image'];
        $image=$_FILES["image"]["name"];
        

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
    $query=mysqli_query($con, "insert into  tblpayment(image) value('$newimage')");
    if ($query) {
        echo "<script>alert('Product has been added.');</script>"; 
            echo "<script>window.location.href = 'online-payment.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";      
    }

  
}
}





  ?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Ace Petshop | Payment</title>

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body id="home">
<?php include_once('includes/header.php');?>

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>

<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
                
Payment
            </h3>
           
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Payment</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div>
                <div class="cont-details">
                   <div class="table-content table-responsive cart-table-content m-t-30">
                
                    
    <?php
    $invid=intval($_GET['invoiceid']);
$ret=mysqli_query($con,"select DISTINCT  date(tblinvoice.PostingDate) as invoicedate,tbluser.FirstName,tbluser.LastName,tbluser.Email,tbluser.MobileNumber,tbluser.RegDate
    from  tblinvoice 
    join tbluser on tbluser.ID=tblinvoice.Userid 
    where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              
                
                    <div class="table-responsive bs-example widget-shadow">
                        <h2>Invoice ID: <?php echo $invid;?></h2>
                        <table class="table table-bordered" width="100%" border="1"> 
<br>
                            
<?php }?>
</table> 
<table class="table table-bordered" width="100%" border="1"> 
<tr>
<th colspan="3">Services Details</th>   
</tr>
<tr>
<th>#</th>  
<th>Service</th>
<th>Cost</th>
</tr>

<?php
$ret=mysqli_query($con,"select tblservices.ServiceName,tblservices.Cost  
    from  tblinvoice 
    join tblservices on tblservices.ID=tblinvoice.ServiceId 
    where tblinvoice.BillingId='$invid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
    ?>

<tr>
<th><?php echo $cnt;?></th>
<td><?php echo $row['ServiceName']?></td>   
<td><?php echo $subtotal=$row['Cost']?></td>
</tr>
<?php 
$cnt=$cnt+1;
$gtotal+=$subtotal;
} ?>

<tr>
<th colspan="2" style="text-align:center">Grand Total</th>
<th><?php echo $gtotal?></th>   

</tr>
</table>
  
                    </div> </div>
                
    </div>
   
    </div></div>
</section>

                <?php
                

$ret=mysqli_query($con,"select * from  tblgcash");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                <div class="col-lg-4 col-md-6 col-sm-6 propClone">
                 <img src="admin/images/<?php echo $row['gcash_qr_image']?>" alt="product" height="800" width="400" class="img-responsive about-me" style="justify-content: center;">
                    <div class="about-grids ">
                     <br>
                        <h5 class="para"><?php  echo $row['gcash_name'];?></h5>
                      
                    </div>
                    <div class="form-group"> <label for="exampleInputEmail1"></label> <input type="file" class="form-control" id="image" name="image" value="" required="true"> </div>
                </div>
                <form>
                                            
                            
                        <button type="submit" class="btn btn-primary" name="submit">submit</button>
                    </form>
                <br><?php 
$cnt=$cnt+1;
}?>
            
            </div>
        </div>
    </div>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
</script>
<!-- /move top -->
</body>

</html><?php } ?>