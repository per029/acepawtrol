<?php 
    session_start();
    error_reporting(0);
    include('includes/dbconnection.php');


    $ret=mysqli_query($con,"select * from  tblbook WHERE AptDate = '".$_GET['date_selected']."';");
    $cnt=1;

    $time_arr = [];

    while ($row=mysqli_fetch_array($ret)) {
        $time_arr[] = date('h:i a', strtotime($row['AptTime'])).' - '.date('h:i a', strtotime($row['appt_to']));
        $cnt=$cnt+1;
    }

    echo json_encode($time_arr);
?>
       

