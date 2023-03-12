<?php
$expiry_time = time() + 30;
$otp_expired = false;

echo "This OTP will expire in: <span id='countdown'></span> ";

if ($otp_expired) {
    echo "The OTP expired. Please generate a new OTP.";
}

if (isset($_POST['submit'])) {
    $user_otp = $_POST['otp'];
    if (!$otp_expired) {
        // Check if the OTP is valid and take appropriate action
        if ($user_otp === $otp_expired) {
            echo "OTP validated successfully.";
        } else {
            echo "Invalid OTP.";
        }
    } else {
        echo "The OTP expired. Please generate a new OTP.";
    }
}
?>

<script>
// Set the countdown timer
var countDownDate = <?php echo $expiry_time ?> * 1000;

// Update the countdown every 1 second
var x = setInterval(function() {

  // Get the current time
  var now = new Date().getTime();

  // Calculate the remaining time
  var distance = countDownDate - now;

  // Calculate minutes and seconds
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the remaining time
  document.getElementById("countdown").innerHTML = minutes + "m " + seconds + "s ";

  // If the countdown is finished, display "Expired" and set otp_expired flag to true
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("countdown").innerHTML = "Expired";
    <?php $otp_expired = true; ?>
  }
}, 1000);
</script>

<!-- OTP input form -->
<form method="post">
    <label for="otp">Enter OTP:</label>
    <input type="text" id="otp" name="otp" <?php if ($otp_expired) {echo "disabled";} ?>>
    <?php if (!$otp_expired) { ?>
        <input type="submit" name="submit" value="Submit">
    <?php } ?>
</form>
