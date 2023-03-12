<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
 
     ?>
<!doctype html>
<html lang="en">
  <head>
   
    <title>Ace Petshop | Home Page</title>


    

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:400,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    

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

<!-- ads banner -->
<div class="w3l-hero-headers-9">
  
  <div class="css-slider">


  <?php
                

$ret=mysqli_query($con,"select * from  tblbanners");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
    <input id="slide-<?php  echo $row['banner_id'];?>" type="radio" name="slides" checked>
    <section class="slide slide-one"  style="background-image: url(admin/images/<?php  echo $row['banner_image'];?>);">
      <div class="container">
        <div class="banner-text">
          <h4>Your Pet's Second Home</h4>
          <h3>Pet Store<br>
            Pet Services</h3>

            <a href="book-appointment.php" class="btn logo-button top-margin">Get An Appointment</a>
        </div>
      </div>
      
    </section>

    <?php 
$cnt=$cnt+1;
}?>



    <header>

    <?php
                

                $ret=mysqli_query($con,"select * from  tblbanners");
                $cnt2=1;
                while ($row=mysqli_fetch_array($ret)) {
                
                ?>


      <label for="slide-<?php  echo $row['banner_id'];?>" id="slide-<?php  echo $row['banner_id'];?>"></label>
      <?php 
$cnt2=$cnt2+1;
}?>

    </header>
  </div>
</div> 

<!-- end of banner -->

<section class="w3l-call-to-action_9">
    <div class="call-w3 ">
        <div class="container">
            <div class="grids">
                    <div class="grids-content row">

                        <div class="column col-lg-4 col-md-6 color-2 ">
                            <div>
                            <h4 class=" ">Our Pet Salon is Most Popular</h4>
                            <p class="para ">Ace Petshop - Pet Grooming Services</p>
                            <a href="about.php" class="action-button btn mt-md-4 mt-3">Read more</a>
                        </div>
                    </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image  ">
                            <img src="assets/images/dog.png" alt="product" class="img-responsive ">
                        </div>
                        <div class="column col-lg-4 col-md-6 col-sm-6 back-image2 ">
                            <img src="assets/images/dog2.png" alt="product" class="img-responsive ">
                          </div>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="w3l-teams-15">
    <div class="team-single-main ">
        <div class="container">
        
                <div class="column2 image-text">
                    <h3 class="team-head ">Only the best for your fur babies</h3>
                    <p class="para  text " style="font-size:20px"> We Are Ready and Happy to Served you </p>
                        <a href="book-appointment.php" class="btn logo-button top-margin mt-4">Get An Appointment</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="w3l-specification-6">
    <div class="specification-layout ">
        <div class="container">
            <div class=" row">
                <div class="col-lg-6 back-image">
                    <img src="assets/images/bb1.jpg" alt="product" class="img-responsive ">
                </div>
                <div class="col-lg-6 about-right-faq align-self">
                    <h3 class="title-big"><a href="about.php">The best Dog Services in Marilao</a></h3>
                    <p class="mt-3 para" style="font-size:20px"> We offer Haircut, Full groom and alacarte for your loveable pet.</p> <br>
                    <ul class="w3l-right-book">
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="services.php">Hair Cut Only</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="services.php">Full Groom (Package)</a></li>
                        <li><span class="fa fa-check" aria-hidden="true"></span><a href="services.php">Alacarte </a></li>
                

                    </ul>
                </div>



        



                </div>
            </div>
        </div>
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
</script>
<!-- /move top -->
</body>

</html>