<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$productId = $_POST['productId'];
	$productName = $_POST['editProductName'];
	$quantity = $_POST['editQuantity'];
	$rate = $_POST['editRate'];
	$brandName = $_POST['editBrandName'];
	$categoryName = $_POST['editCategoryName'];
	$productStatus = $_POST['editProductStatus'];

	$sql = "UPDATE product SET product_name = '$productName', brand_id = '$brandName', categories_id = '$categoryName', quantity = '$quantity', rate = '$rate', active = '$productStatus', status = 1 WHERE product_id = 'productId'";

	if ($con->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while Updating the product information";
	}

	$con->close();
	echo json_encode($valid); 
	

	}
