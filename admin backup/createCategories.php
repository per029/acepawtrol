<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
	$categoriesName = $_POST['categoriesName'];
	$categoriesStatus = $_POST['categoriesStatus'];

	$sql = "INSERT INTO category (categories_name, categories_active, categories_status) VALUES ('$categoriesName', '$categoriesStatus', 1)";

	if ($con->query($sql) === TRUE){
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Added';
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while adding categories";
	}

	$con->close();

	echo json_encode($valid);
	  
}