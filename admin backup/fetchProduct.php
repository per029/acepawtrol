<?php

include('includes/dbconnection.php');

$sql = "SELECT product.product_id, product.product_name, product.product_image, product.brand_id, product.categories_id, product.quantity, product.rate, product.active, product.status, brands.brand_name, category.categories_name FROM product
	INNER JOIN brands ON product.brand_id = brands.brand_id
	INNER JOIN category ON product.categories_id = category.categories_id
	WHERE product.status = 1";

$result = $con->query($sql);

$output = array('data' => array());

if ($result->num_rows > 0) {
	$active = "";

	while($row = $result->fetch_array()) {
		$productId = $row[0];

		if ($row[7] == 1) {
			$active = "<label class='label label-success'>Available</label>";
		} else {
			$active = "<label class='label label-danger'>Not Available</label>";
		}

		$button = '<td>
					
					
					    <a type="button" data-toggle="modal" data-target="#editBrandModal"><i class ="btn btn-primary">Edit</i></a>
					    <a type="button" data-toggle="modal" data-target="#removeBrandModal"> <i class ="btn btn-danger">Delete</i></a></td>';

		$brand = $row[9];
		$category = $row[10];

		$imageUrl = substr($row[2], 3);
		$productImage = "<img class='img-round' src='".$imageUrl."' style='height:30px;width:50px;' />";

		$output['data'][] = array(
			$productImage,
			$row[1],
			$row[6],
			$row[5],
			$brand,
			$category,
			$active,
			$button
		);
	}
}

$con->close();
echo json_encode($output);