<?php 

include('includes/dbconnection.php');

$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM category WHERE categories_status = 1";
$result = $con->query($sql);

$output = array('data' => array());

if($result->num_rows > 0){
	while ($row = $result->fetch_array()) {
		$categoriesId = $row[0];

		if($row[2] == 1) {
			$activeCategories =	"<label class='label label-success'>Available</label>";
		} else {
			$activeCategories =	"<label class='label label-danger'>Not Available</label>";
		}
		

		$button = '<td><a type="button" data-toggle="modal" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class ="btn btn-primary">Edit</i></a>

					    <a type="button" data-toggle="modal" data-target="#removeCategoriesModal" onclick="removeCategories('.$categoriesId.')"> <i class ="btn btn-danger">Delete</i></a></td>';
		$output['data'][] = array(
			$row[1],
			$activeCategories,
			$button
		);
	}
	
}
$con->close(); 
echo json_encode($output);