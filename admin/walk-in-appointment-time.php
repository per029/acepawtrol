<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $time=$_POST['time'];
	list($atime, $end_time) = explode(' - ', $time);

// get the image extension

// allowed extensions


     
   $query=mysqli_query($con, "insert into  tblapttime(AptTime, appt_to, created_at, status ) value('$time','$end_time', NOW(), 1)");
    if ($query) {
      echo "<script>alert('successfully has been added.');</script>"; 
        echo "<script>window.location.href = 'walk-in-appointment-time.php'</script>";   
    
  }
  else
    {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }

  
}

if($_GET['delstat']){
$delstat=$_GET['delstat'];
mysqli_query($con,"delete from tblapttime where id = '$delstat'");
echo "<script>alert('Data Deleted');</script>";
echo "<script>window.location.href='walk-in-appointment-time.php'</script>";
          }

  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ace Petshop || Manage Wak-in Appointment</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/modernizr.custom.js"></script>
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 


<!-- datatable -->
<?php
include('includes/dtables.php');
?>

<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		 <?php include_once('includes/sidebar.php');?>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		 <?php include_once('includes/header.php');?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Manage Appointment</h3>
					<div class="form-body">
              <form method="post" enctype="multipart/form-data">
                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
					
				
					<div class="table-responsive bs-example widget-shadow">
						<h4>Update Walk-in Appointment:</h4>
						<div class="div-action">
							<button class="btn btn-primary" data-toggle="modal" data-target="#addwalkin"> <i class="glyphicon glyphicon-plus-sign"></i>Add Time</button>
						</div><br>
						<table class="table table-bordered" id="dataTable"> 
							<thead> 
								<tr>
								 <th>id</th>
								  <th>Appoinment From</th> 
								  <th>Appoinment To</th> 
								  <th>Date</th>
								  <th>Status</th>
								  <th>Action</th>
								</tr> 
							</thead>

							<div class="modal" id="#addwalkin">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								         <h4 class="modal-title"> <i class="fa fa-plus"></i>Add Time</h4>
								      </div>
								      <form class="form-horizontal" id="submitBrandForm" action="walk-in-appointment-time.php" method="POST"></form>
												<div class="modal-body">
										   <div class="form-group"> 
											<label for="exampleInputEmail1">Appoinment Time</label> 
                            <select id="times"></select>
							

										  
               </div>
               <br>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								          <button type="submit" name="submit" class="btn btn-primary">Add</button> </form> 
								      </div>
								      </form>
								    </div>
								  </div>
								</div>

						 <tbody>

<?php
$ret=mysqli_query($con,"select * from  tblapttime");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

						 <tr> <th scope="row"><?php echo $row['id'];?></th> 



						 	<td><?php  echo $row['AptTime'];?></td> 
							 <td><?php  echo $row['appt_to'];?></td> 

							 <td><?php  echo $row['created_at'];?></td> 
						 	<td>
						 		<?php
						 		if($row['status']==1){
						 			echo "<label class='label label-success'>active</label>";
						 		} else {
						 			echo "<label class='label label-danger'>Not Available</label>";
						 		}
						 		?>

						 	</td>
						 	
						 	 <td>
						 	<a href="edit-walk-in-appointment-time.php?editid=<?php echo $row['ID'];?>" class="btn btn-primary">Edit</a>
							
						 	<a href="edit-walk-in-appointment-time.php?delstat=<?php echo $row['ID'];?>" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
							 

						 	</td> </tr>   <?php 
$cnt=$cnt+1;
}?>

</tbody> </table> 
					</div>
				</div>
			</div>
		</div>
		<!--footer-->
		 <?php include_once('includes/footer.php');?>
        <!--//footer-->
	</div>
	<!-- Classie -->
		<script src="js/classie.js"></script>

		<script>
  document.getElementById("void").addEventListener("click", function() {
    // Send an AJAX request to the server
	var voidId = document.getElementById("voidId");
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "walk-in-appointment-time.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("status=updated");

    // Handle the response from the server
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        alert("Status updated successfully");
      }
    };
  });
</script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			
			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js"> </script>




<script>
$( "#addwalkin" ).on('click',function() {
	var button= $(this)."<?php echo addwalkin(''); ?>";

	
	$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})




    $( "#adate" ).on('change',function() {
        var date= $(this).val()
        if (date != ""){

          // enabled the available time
          $("#times").attr("disabled",false)
          
          // empty select then append available options
          $("#times").empty();
          $('#times').append('<option hidden value="">Available Time</option>');
          

          var static_time = [
            "09:00 am - 10:00 am",
            "10:00 am - 11:00 am",
            "11:00 am - 12:00 pm",
            "12:00 pm - 01:00 pm",
            "01:00 pm - 02:00 pm",
            "02:00 pm - 03:00 pm",
            "03:00 pm - 04:00 pm",
            "04:00 pm - 05:00 pm",
            "05:00 pm - 06:00 pm",
            "06:00 pm - 07:00 pm",
          ];

          var reserved_time = [];

          var current_time = "<?php echo date('H'); ?>";
          var current_date = "<?php echo date('Y-m-d'); ?>";
          
          $.ajax({
            // GET - fetching, 
            // POST - insert
            type: 'GET', 
            url : 'get_reserved_time.php',  // php file path 
            data: {'date_selected' : date}, /* 2023-03-04 ...  php echo date('Y-m-d') ?>; */
            success: function(response) {
              reserved_time = JSON.parse(response);
              
              static_val_time = 9;
              for(i = 0; i < static_time.length; i++) {
                // check if next append option is not in array reserved_time if true, append.

                if(!reserved_time.includes(static_time[i])) {
                  $('#times').append('<option value="'+static_val_time+'">'+static_time[i]+'</option>');
                }
                static_val_time++;
              }
            }
          });
        }
        else{ 
          $("#times").attr("disabled",true)
        }
    });
  </script>








</body>
</html>
<?php }  ?>