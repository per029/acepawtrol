<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$categoriesName = $_POST['editCategoriesName'];
	$categoriesStatus = $_POST['editCategoriesStatus'];
	$categoriesId = $_POST['categoriesId'];

	$sql = "UPDATE category SET Categories_name = '$categoriesName', Categories_active = '$categoriesStatus' WHERE Categories_id = '$categoriesId'";

	if ($con->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while Updating the Categories";
	}

	$con->close();
	echo json_encode($valid); 
}