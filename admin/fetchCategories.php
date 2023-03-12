<?php 

include('includes/dbconnection.php');

$sql = "SELECT category_id, category_name, category_active, category_status FROM category WHERE category_status = 1";
$result = $con->query($sql);

$output = array('data' => array());

if($result->num_rows > 0){
	$activeCategories = "";

	while ($row = $result->fetch_array()) {
		$categoriesId = $row[0];

		if($row[2] == 1) {
			$activeCategories = "<label class='label label-success'>Available</label>";
		} else {
			$activeCategories = "<label class='label label-danger'>Not Available</label>";
		}

	$button = '<td><a type="button" data-toggle="modal" data-target="#editCategoriesModal" onclick="editCategories('.$categoriesId.')"> <i class="btn btn-primary">Edit</i></a></td>
					    <td><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="btn btn-danger">Delete</i></a></td>';

			$output['data'][] = array(
			$row[1],
			$activeCategories,
			$button
		);
	} 
	 

	
}
$con->close(); 
echo json_encode($output);
