
<?php 
date_default_timezone_set('Asia/Manila');
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $uid=$_SESSION['bpmsuid'];
    $adate=$_POST['adate'];
    $appointment_time=$_POST['time'];
    $aptnumber = mt_rand(100000000, 999999999);
    $msg=$_POST['message'];
    $atime = $_POST['appoint_time'].':00:00';
    $end_time = $_POST['appoint_time'] + 1 . ':00:00';
    
    // echo $atime. " ". $end_time;
    // echo "<script>alert('$end_time');</script>";

    $query=mysqli_query($con,"insert into tblbook(UserID,AptNumber,AptDate,AptTime,Message,appt_to
    ) value('$uid','$aptnumber','$adate','$atime','$msg','$end_time')");

    if ($query) {
$ret=mysqli_query($con,"select AptNumber from tblbook where tblbook.UserID='$uid' order by ID desc limit 1;");
$result=mysqli_fetch_array($ret);
$_SESSION['aptno']=$result['AptNumber'];
 echo "<script>window.location.href='thank-you.php'</script>";  
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!doctype html>
<html lang="en">
  <head>
 

    <title>Ace Petshop | Appointment Page</title>

    <!-- Template CSS -->
    
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   
   
  </head>
  <body id="home">
<?php include_once('includes/header.php');?>

<!-- Common jquery plugin -->
<!-- <script src="assets/js/jquery-3.3.1.min.js"></script>  -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!--bootstrap working-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- //bootstrap working-->
<!-- disable body scroll which navbar is in active -->
<script>
$(function () {
  $('.navbar-toggler').click(function () {
    $('body').toggleClass('noscroll');
  })
});
</script>
<!-- disable body scroll which navbar is in active -->

<!-- breadcrumbs -->
<section class="w3l-inner-banner-main">
    <div class="about-inner contact ">
        <div class="container">   
            <div class="main-titles-head text-center">
            <h3 class="header-name ">
             Book an Appointment</h3>
        </div>
</div>
</div>
<div class="breadcrumbs-sub">
<div class="container">   
<ul class="breadcrumbs-custom-path">
    <li class="right-side propClone"><a href="index.php" class="">Home <span class="fa fa-angle-right" aria-hidden="true"></span></a> <p></li>
    <li class="active ">
        Book Appointment</li>
</ul>
</div>
</div>
    </div>
</section>
<!-- breadcrumbs //-->
<section class="w3l-contact-info-main" id="contact">
    <div class="contact-sec	">
        <div class="container">

            <div class="d-grid contact-view">
                <div class="cont-details">
                    <?php

$ret=mysqli_query($con,"select * from tblpage where PageType='contactus' ");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                    <div class="cont-top">
                        <div class="cont-left text-center">
                            <span class="fa fa-phone text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Call Us</h6>
                            <p class="para"><a href="tel:+44 99 555 42">+<?php  echo $row['MobileNumber'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-envelope-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Email Us</h6>
                            <p class="para"><a href="mailto:example@mail.com" class="mail"><?php  echo $row['Email'];?></a></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-map-marker text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Address</h6>
                            <p class="para"> <?php  echo $row['PageDescription'];?></p>
                        </div>
                    </div>
                    <div class="cont-top margin-up">
                        <div class="cont-left text-center">
                            <span class="fa fa-clock-o text-primary"></span>
                        </div>
                        <div class="cont-right">
                            <h6>Time</h6>
                            <p class="para"> <?php  echo $row['Timing'];?></p>
                        </div>
                    </div>
               <?php } ?> </div>
                <div class="map-content-9 mt-lg-0 mt-4">
                    <form method="post">


                    

                      <div style="padding-top: 30px;">

                            <label>Select Services</label>
                            
                            <select id="main-category">
                                <option value="">Select Type of Services:</option>
                                <option value="Category A">Haircut Only</option>
                                <option value="Category B">Full Groom</option>
                                <option value="Category C">Alacarte</option>
                          </select>

                        </div>
                           

                          <div id="sub-category" style="padding-top: 30px;">
                 
                  </div>




                    
                        <div style="padding-top: 30px;">
                            <label>Appointment Date</label>
                            
                            <input class="form-control appointment_date" placeholder="Select Date" type="date" name="adate" id='adate' required="true"></div>
                           

                        <div style="padding-top: 30px;">
                        


                            
                            <!-- <input class="form-control appointment_time" placeholder="Select Time" type="time" name="atime" id='atime' required="true"></div>
 -->
 <label for="time">Appointment Time <br/>(Opening Hours 9:00 am - 7:00 pm)</label>
 
 <!-- <label id="time" type="text" list="times" class="block border border-grey-light w-full p-3 rounded mb-4" name="time" placeholder="Select Time"> </label></div> -->
                           <div> <select id="times" disabled name="appoint_time"> </div>
                              <option value="" hidden>Available Time</option>
                            </select>

                           
                           

                        <div style="padding-top: 30px;">
                        <textarea class="form-control" id="message" name="message" placeholder="Message" required=""></textarea></div>
                        <br>

                        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                          
                        

                 
                      
                      <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                      <!-- <script>
                          config = {
                                        enableTime: true,
                                        noCalendar: true,
                                        dateFormat: "H:i",
                                        minTime: "9:00 am",
                                        maxTime: "19:00 pm",


                                    }
                            flatpickr("input[type=time]", config);
                      </script> -->

                       

                        </body> </table> 
                        <form>   
                        <button type="submit" class="btn btn-contact" name="submit">Make an Appointment</button>
                    </form>
                </div>
    </div>
   
    
    <br>
</section>
<?php include_once('includes/footer.php');?>
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
	<span class="fa fa-long-arrow-up"></span>
</button>
<script>
  const mainCategory = document.querySelector("#main-category");
  const subCategory = document.querySelector("#sub-category");

  mainCategory.addEventListener("change", function() {
    switch (mainCategory.value) {
      case "Category A":
        subCategory.innerHTML = `
          <h3>Select Haircut Dog Size</h3>
          <label><input type="radio" name="size[]" value="SMALL" class="custom-checkbox"> SMALL ₱ 199.00</label><br>
          <label><input type="radio" name="size[]" value="MEDIUM" class="custom-checkbox"> MEDIUM ₱ 249.00</label><br>
          <label><input type="radio" name="size[]" value="LARGE" class="custom-checkbox"> LARGE ₱ 300.00</label><br>
          <label><input type="radio" name="size[]" value="EXTRA LARGE"class=" custom-checkbox"> EXTRA LARGE ₱ 350.00</label><br>
        `;
        break;
      case "Category B":
        subCategory.innerHTML = `
          <h3>Select Full Groom Dog Size</h3>
          <label><input type="radio" name="size[]" value="SMALL" class="custom-checkbox"> SMALL ₱ 300.00</label><br>
          <label><input type="radio" name="size[]" value="MEDIUM" class="custom-checkbox"> MEDIUM ₱ 350.00</label><br>
          <label><input type="radio" name="size[]" value="LARGE" class="custom-checkbox"> LARGE ₱ 450.00</label><br>
          <label><input type="radio" name="size[]" value="EXTRA LARGE"class=" custom-checkbox"> EXTRA LARGE ₱ 550.00</label><br>
          <label><input type="radio" name="size[]" value="DOUBLE EXTRA LARGE" class="custom-checkbox"> DOUBLE EXTRA LARGE ₱ 650.00</label><br>
        ` 
        break;
      case "Category C":
        subCategory.innerHTML = `
          <h3>Select Alacarte for your Dog:</h3>
          <label><input type="checkbox" name="alacarte[]" value="NAIL CLIPPING"> NAIL CLIPPING ₱ 50.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="PAW TRIM"> PAW TRIM ₱ 75.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="EAR CLEANING"> EAR CLEANING ₱ 50.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="FACE TRIM"> FACE TRIM ₱ 100.00</label><br>
          <label><input type="checkbox" name="alacarte[]" value="EAR PLUCKING"> EAR PLUCKING ₱ 50.00</label><br>
        `;
        break;
      default:
        subCategory.innerHTML = `
      
        `;
    }
  });
</script>
<script>
	// When the user scrolls down 20px from the top of the document, show the button
	window.onscroll = function () {
		scrollFunction()
	};

	function scrollFunction() {
		if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
			document.getElementById("movetop").style.display = "block";
		} else {
			document.getElementById("movetop").style.display = "none";
		}
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
		document.body.scrollTop = 0;
		document.documentElement.scrollTop = 0;
	}
$(function(){
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#adate').attr('min', maxDate);
});</script>
<script>
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
<!-- /move top -->
</body>

</html><?php } ?>