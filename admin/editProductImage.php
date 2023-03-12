<?php

include('includes/dbconnection.php');

$valid['success'] = array('success' => false, 'messages' => array());

if ($_POST) {
	$productId = $_POST['productId'];
	

	$type = explode('.', $_FILES['editProductImage']['name']);
	$type = $type[count($type) - 1];
	$url = '../assets/images/stock/'.uniqid(rand()).'.'.$type;



	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])) {
			if(move_uploaded_file($_FILES['editProductImage']['tmp_name'], $url)) {

				$sql = "UPDATE product SET product_image = '$url' WHERE product_id = $productId"; 

				if($con->query($sql) === TRUE) {

					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";
				} else {

					$valid['success'] = false;
					$valid['messages'] = "Error while adding products";
				}


			} else {
				return false;
			}
		}
	}
	
	$con->close();
	echo json_encode($valid); 
	
}



