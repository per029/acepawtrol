<?php

include('includes/dbconnection.php');

$productId = $_GET['i'];

$sql = "SELECT product_image FROM product WHERE product_id = 'productId'";
$data = $con->query($sql);
$result = $data->fetch_row();

$con->close();

echo "stock/".$result[0];