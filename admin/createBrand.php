<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
	$brandsName = $_POST['brandsName'];
	$brandActive = $_POST['brandActive'];
	$expDate = $_POST['expDate'];

	$sql = "INSERT INTO tblbrand (brand_name, brand_active,brand_datetime_added, expiry_date, brand_status) values ('$brandsName','$brandActive', '$NOW()', '$expDate', 1)";

	if ($con->query($sql) === TRUE){
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Added';
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding brands";
	}

	$con->close();

	echo json_encode($valid);
	  
}



