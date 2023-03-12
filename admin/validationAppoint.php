<?php
$con = mysqli_connect("", "", "", "bpmsdb");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$user_datetime = "";

$sql = "SELECT * FROM tblbook WHERE aptTime = '$user_datetime'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "Warning: There is already an appointment at this date and time in the database.";
}

mysqli_close($con);
?>
