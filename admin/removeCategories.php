<?php

include('includes/dbconnection.php');


$valid['success'] = array('success' => false, 'messages' => array());

$categoriesId = $_POST['categoriesId'];

if ($categoriesId) {
	$sql = "UPDATE category SET category_status = 2 WHERE category_id = '$categoriesId'";

	if ($con->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = 'Successfully Removed';
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while removing the categories";
	}

	$con->close();
	echo json_encode($valid);
}