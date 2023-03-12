<?php

include('includes/dbconnection.php');

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT category_id, category_name, category_active, category_status FROM category WHERE category_id = $categoriesId ";

$result = $con->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_array();  
}

$con->close();

echo json_encode($row);