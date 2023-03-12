<?php

include('includes/dbconnection.php');



 if(isset($_POST['voidId'])){
    echo "<script>alert('$voidId');</script>";
//     $sql = "UPDATE apttime SET status='4' WHERE id=$_POST['voidId']";
//     $query=mysqli_query($con, $sql);
//     if ($query) {
//       echo "<script>alert('successfully has been added.');</script>"; 
//         echo "<script>window.location.href = 'walk-in-appointment-time.php'</script>";   
    
//   }
//   else
//     {
//     echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
//     }
 }


//   // Get the status value from the request
//   $status = $_POST["status"];

//   // Update the status field in the database
//   $sql = "UPDATE apttime SET status='$status' WHERE id=1";
//   mysqli_query($con, $sql);

//   // Close the database connection
//   mysqli_close($con);
?>
