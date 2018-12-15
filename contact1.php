<?php

session_start();
include('customer/gpConfig.php');
include('customer/User.php');

include("includes/db.php");

include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Merecer Melhor</title>
    <meta charset="utf-8" />
    <meta
      name="google-site-verification"
      content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4"
    />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <?php
    include('header1.php')
    ?>
    <!-- <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="header_logo">
            <img src="images/logo.jpg" alt="header logo" />
          </div>
        </div>
      </div>
    </div> -->
    <div class="container cnt-c">
      <form action="#">
        <div class="form-row">
          <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="First name" />
          </div>
          <div class="col-sm-6">
            <input type="text" class="form-control" placeholder="Last name" />
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-6">
            <input
              type="text"
              class="form-control"
              placeholder="Phone Number"
            />
          </div>
          <div class="col-sm-6">
            <input type="email" class="form-control" placeholder="Email" />
          </div>
        </div>
        <div class="form-row">
          <div class="col-sm-12">
            <textarea
              class="form-control"
              name="message"
              id="message"
              rows="10"
              placeholder="Message"
            ></textarea>
          </div>
        </div>
        <div class="submit_ctc">
          <button class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

    <div class="container-fluid ctc_d">
      <div class="row">
        <div class="col-sm-12"><h2>Get in Touch</h2></div>
      </div>
      <div class="row c_detail">
        <div class="col-sm-6">
          <span class="pe-7s-mail"></span>
          <span>gaurav@merecermelhor.com</span> <br />
          <span class="pe-7s-call"></span> <span>+91 98193 14493</span>
        </div>
        <div class="col-sm-6">
          <span class="pe-7s-map-marker"></span>
          <span
            >B-211, Western Edge II, W.E. Highway,<br />
            &nbsp;&nbsp;&nbsp; Borivali (E), Mumbai - 400066, India</span
          >
        </div>
      </div>
    </div>

    <!-- footer start -->
<?php
include('includes/footer1.php')
?>
   <!-- New layout Starts -->
   <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>
<!-- New Layout Ends -->
  </body>
</html>
