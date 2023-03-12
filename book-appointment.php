<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['bpmsuid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit'])) {
  $uid=$_SESSION['bpmsuid'];
  $adate=$_POST['adate'];
  $appointment_time=$_POST['time'];
  $msg=$_POST['message'];
  $aptnumber = mt_rand(100000000, 999999999);
  list($atime, $end_time) = explode(' - ', $appointment_time);
  
  // Check if selected time is already reserved
  $existing = mysqli_query($con, "SELECT * FROM tblbook WHERE AptDate='$adate' AND AptTime='$atime'");
  if(mysqli_num_rows($existing) > 0) {
    echo '<script>alert("The selected date and time is already reserved. Please choose another date and time.")</script>';
    echo "<script>window.location.href='book-appointment.php'</script>";
  }
  
  // Insert new appointment
  $query=mysqli_query($con,"INSERT INTO tblbook(UserID,AptNumber,AptDate,AptTime,Message,appt_to) VALUE('$uid','$aptnumber','$adate','$atime','$msg','$end_time')");

  if ($query) {
    $ret=mysqli_query($con,"SELECT AptNumber FROM tblbook WHERE tblbook.UserID='$uid' ORDER BY ID DESC LIMIT 1;");
    $result=mysqli_fetch_array($ret);
    $_SESSION['aptno']=$result['AptNumber'];
    echo "<script>window.location.href='thank-you.php'</script>";  
  } else {
    echo '<script>alert("Something went wrong. Please try again.")</script>';
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

<script src="assets/js/jquery-3.3.1.min.js"></script> <!-- Common jquery plugin -->
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
    <div class="contact-sec ">
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
                            <span class="fa fa-map-marker text-primary"></span>
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
                          <br>  <label>Select Services</label> <br>
            <style>
  select {
    width: 250px;
    font-size: 18px;
    padding: 10px;
  }
</style>

  <select id="main-category"  >
  <option value="">Select Type of Services:</option>
  <option value="Category A">Haircut Only</option>
  <option value="Category B">Full Groom</option>
  <option value="Category C">Alacarte</option>
</select>

<select id="sub-category" >
  <option value="disabled">Please Select Category</option>
</select>

<script>
    
  const mainCategory = document.querySelector("#main-category");
  const subCategory = document.querySelector("#sub-category");

  mainCategory.addEventListener("change", function() {
    switch (mainCategory.value) {
      case "Category A":
        subCategory.innerHTML = `
          <option value=""disabled>Select Haircut Dog Size</option>
          <option value="SMALL ₱ 199.00">SMALL ₱ 199.00</option>
          <option value="MEDIUM ₱ 249.00">MEDIUM ₱ 249.00</option>
          <option value="LARGE ₱ 300.00">LARGE ₱ 300.00</option>
          <option value=" EXTRA LARGE ₱ 350.00"> EXTRA LARGE ₱ 350.00</option>
        `;
        break;
      case "Category B":
        subCategory.innerHTML = `
          <option value=""disabled>Select Full Groom Dog Size</option>
          <option value="SMALL ₱ 300.00">SMALL ₱ 300.00</option>
          <option value="MEDIUM ₱ 350.00">MEDIUM ₱ 350.00</option>
          <option value="LARGE ₱ 450.00">LARGE ₱ 450.00</option>
          <option value="EXTRA LARGE ₱ 550.00">EXTRA LARGE ₱ 550.00</option>
          <option value="DOUBLE EXTRA LARGE ₱ 650.00"> DOUBLE EXTRA LARGE ₱ 650.00</option>
        `;
        break;
      case "Category C":
        subCategory.innerHTML = `
        <option value="" disabled>Select Alacarte for your Dog </option>
          <option value="NAIL CLIPPING ₱ 50.00">NAIL CLIPPING ₱ 50.00</option>
          <option value="PAW TRIM ₱ 75.00">PAW TRIM ₱ 75.00</option>
          <option value="EAR CLEANING ₱ 50.00">EAR CLEANING ₱ 50.00</option>
          <option value="FACE TRIM ₱ 100.00">FACE TRIM ₱ 100.00</option>
          <option value="EAR CLEANING ₱ 50.00">EAR CLEANING ₱ 50.00</option>
          <option value="EAR PLUCKING ₱ 50.00">EAR PLUCKING ₱ 50.00</option>
        `;
        break;
      default:
        subCategory.innerHTML = `
          <option value="">Please Select Category</option>
        `;
    }
  });
</script>
            </div>
            


                    
                        <div style="padding-top: 30px;">
                            <label>Appointment Date</label>
                            
                            <input class="form-control appointment_date" placeholder="Select Date" type="date" name="adate" id='adate' required="true"></div>
                           


                            



                        <div style="padding-top: 30px;">
                        


                            
                            <!-- <input class="form-control appointment_time" placeholder="Select Time" type="time" name="atime" id='atime' required="true"></div>
 -->
 <label for="time">Appointment Time <br/>(Opening Hours 9:00 am - 7:00 pm)</label>
 
 <input id="time" type="text" list="times" class="block border border-grey-light w-full p-3 rounded mb-4" name="time" placeholder="Select Time" required />
                            <datalist id="times">
                                <option>9:00 am- 10:00 am</option>
                                <option>10:00 am- 11:00 am</option>
                                <option>11:00 am - 12:00 pm</option>
                                <option>12:00 pm - 1:00 pm</option>
                                <option>1:00 pm - 2:00 pm</option>
                                <option>2:00 pm - 3:00 pm</option>
                                <option>3:00 pm - 4:00 pm</option>
                                <option>4:00 pm - 5:00 pm</option>
                                <option>5:00 pm - 6:00 pm</option>
                                <option>6:00 pm - 7:00 pm</option>
                            </datalist>





                           

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
<!-- /move top -->
</body>

</html><?php } ?>