<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

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
     
    $query=mysqli_query($con, "insert into  tblproduct(product_name,product_image,brand_id,category_id,quantity,price,active,product_datetime_addedd,expiry_date,status) value('$proname','$newimage','$brandActive','$categoryActive','$quantity','$price','$productActive', NOW(), '$expDate', 1)");
    if ($query) {

    	echo "<script>alert('Product has been added.');</script>"; 
    		echo "<script>window.location.href = 'add-product.php'</script>";   
    
  }
  else
    {
    		
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	
    }

  
}



			} else {
				return false;
			}
		
	

	  $con->close();
	  echo json_encode($valid);
