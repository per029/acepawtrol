<?php

include('includes/dbconnection.php');


$valid['success'] = array('success' => false, 'messages' => array());

$productId = $_POST['productId'];

if($productId) { 

 $sql = "UPDATE product SET active = 2, status = 2 WHERE product_id = '$productId'";

 if($con->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the categories";
 }
 
 //close teh database connection
 $con->close();

 echo json_encode($valid);
 
} // /if $_POST
?>