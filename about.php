


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
    <meta charset="utf-8">
    <meta name="google-site-verification" content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <?php
    include("header1.php"); 
    ?>

    <!-- about sec 1 -->
    <div class="cotainer-fluid about_bg1">
      <div class="img_container">
        <img src="images/about_bg1.jpg" alt="background image 1" />
        <div class="caption_abt">
          <img src="images/abt_logo.png" alt="Merecer Melhor" class="logo" />
          <h1 class="c_name">MERECER MELHOR <sup>&trade;</sup></h1>
          <p>E S T D . 2 0 1 3</p>
          <p>GENUINO LEATHER</p>
        </div>
      </div>
    </div>
    <div class="cotainer-fluid about_bg1">
      <div class="row">
        <div class="col-sm-12">
          <div class="img_container">
            <img src="images/about_bg2.jpg" alt="background image 1" />
            <div class="caption_abt2">
              <p class="cursive_f">The present is bright...</p>

              <p class="cursive_f ftr_txt">The future is brighter...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cotainer-fluid about_bg1">
      <div class="row">
        <div class="col-sm-12">
          <div class="img_container">
            <img src="images/about_bg1.jpg" alt="background image 1" />
            <div class="caption_abt3">
              <h1 class="abt_t">ABOUT US</h1>
              <p>
                The Brand is owned by Merecer Melhor Private Limited, having its
                roots in Mumbai, India with operational offices in Australia and
                United States of America. <br />
                <br />
                Designed by nonpareil craftsmen and team of passionate leather
                lovers, the products are high on quality and value.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cotainer-fluid about_bg1">
      <div class="row">
        <div class="col-sm-12">
          <div class="img_container">
            <img src="images/about_bg3.jpg" alt="background image 1" />
            <div class="caption_abt3">
              <h1 class="abt_t">STORY BEHIND THE BRAND</h1>
              <p>
                Inspiration came from Brazilian Portuguese language. Brazil is
                the nation with one of the finest and most extensive leather
                designing and manufacuring unit. <br />
                <br />
                The Brand name is the perfect amalgamation of our thought,
                intent and offering.
              </p>
              <table style="width:100%">
                <tr>
                  <th>Brand Name</th>
                  <th>Meaning</th>
                  <th>Pronunciation</th>
                </tr>
                <tr>
                  <td>Merecer</td>
                  <td>To deserve</td>
                  <td>me-re-ser</td>
                </tr>
                <tr>
                  <td>Melhor</td>
                  <td>The best</td>
                  <td>mel-yor</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cotainer-fluid about_bg1">
      <div class="row">
        <div class="col-sm-12">
          <div class="img_container">
            <img src="images/about_bg3.jpg" alt="background image 1" />
            <div class="caption_abt3">
              <h1 class="abt_t">THE BUSINESS BOULEVARDS</h1>
              <div class="row">
                <div class="col-sm-3">
                  <h4>Retail</h4>
                  <p>
                    In selective stores of General and Modern Trade. Our own
                    flagship store is on its way.
                  </p>
                </div>
                <div class="col-sm-3">
                  <h4>Ecommerce</h4>
                  <p>
                    Own Shopping Portal, (www.merecermelhor.com) and also at
                    Amazon, Flipkart, Myntra & Jabong
                  </p>
                </div>
                <div class="col-sm-3">
                  <h4>Corporate Gifting</h4>
                  <p>
                    The dearth of prominent players in the Business essentials,
                    has helped the Brand in carving out a niche for itself.
                  </p>
                </div>
                <div class="col-sm-3">
                  <h4>Exports</h4>
                  <p>
                    With operational offices in Australia and USA, the baby
                    steps have been taken
                  </p>
                </div>
              </div>
            </div>
          </div>
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
