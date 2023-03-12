<?php

include('includes/dbconnection.php');

$productId = $_POST['productId'];


$sql = "SELECT product_id, product_name, product_image, brand_id, categories_id, quantity, rate, active, status FROM product WHERE product_id = '$productId' ";
$result = $con->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_array();  
}

$con->close();

echo json_encode($row);