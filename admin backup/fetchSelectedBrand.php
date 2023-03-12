<?php

include('includes/dbconnection.php');

$brandId = $_POST['brandId'];


$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_id = '$brandId' ";
$result = $con->query($sql);

if($result->num_rows > 0) {
	$row = $result->fetch_array();  
}

$con->close();

echo json_encode($row);