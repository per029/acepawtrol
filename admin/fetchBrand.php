<?php 

include('includes/dbconnection.php');

$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1";
$result = $con->query($sql);

$output = array('data' => array());

if($result->num_rows > 0){
	while ($row = $result->fetch_array()) {
		$brandId = $row[0];

		if($row[2] == 1) {
			$activeBrands =	"<label class='label label-success'>Available</label>";
		} else {
			$activeBrands =	"<label class='label label-danger'>Not Available</label>";
		}
		

		$button = '<td><a type="button" data-toggle="modal" data-target="#editBrandModal" onclick="editBrands('.$brandId.')"> <i class ="btn btn-primary">Edit</i></a>

					    <a type="button" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrands('.$brandId.')"> <i class ="btn btn-danger">Delete</i></a></td>';
		$output['data'][] = array(
			$row[1],
			$activeBrands,
			$button
		);
	}
	
}
$con->close(); 
echo json_encode($output);