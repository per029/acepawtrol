<?php
// Get the current date and time
$current_date = new DateTime();

// Calculate the date and time for the same time next month
$next_month_date = new DateTime('+1 month');
$next_month_date->setTime($current_date->format('H'), $current_date->format('i'), $current_date->format('s'));

// Store the reservation date and time in a variable
$reservation_date = $next_month_date->format('Y-m-d H:i:s');

// Insert the reservation into the database
// Replace <database>, <username>, <password>, and <table> with your own database information
include('includes/dbconnection.php');

$sql = "INSERT INTO tblbook (AptDate) VALUES ('$reservation_date')";

if ($con->query($sql) === TRUE) {
    echo "Reservation created successfully";
} else {
    echo "Error creating reservation: " . $con->error;
}

$con->close();
?>
