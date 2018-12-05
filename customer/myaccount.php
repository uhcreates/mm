<?php

session_start();

if(!isset($_SESSION['customer_email'])){

echo "<script>window.open('../check_out.php','_self')</script>";


} else {




include("includes/db.php");

include("functions/functions.php");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>Merecer Melhor</title>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">


</head>

<body>
    <?php
        include("../header.php"); 
        ?>
    <!--page heading -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 3%;">
            <!-- <div class="col-sm-12">
                <div class="header_logo">
                <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
                </div>
            </div> -->
        </div>
        <div class="row pdp_bg" style="margin-top: 5%;">
            <div class="col-sm-3 col-md-3">
                <!-- dropdown -->
                <div id="sidemenu">
                    <div class="col-sm-12">
                    <?php
                        include("includes/side_bar.php"); 
                        ?>
                    </div>
                </div>
                <!--accordion end-->
            </div>
            <div class="col-sm-0 col-md-9">
                                
                <?php
                
                if(isset($_GET['my_orders'])){

                include("my_orders.php");

                }

                if(isset($_GET['edit_account'])) {

                include("editaccount.php");

                }

                if(isset($_GET['change_pass'])){

                include("change_pass.php");

                }

                ?>

            </div> 
        </div>
    </div>

    <!-- footer start -->
    <?php
        include("includes/footer1.php"); 
        ?>





    <script src="../js/js/jquery-3.3.1.min.js"></script>
    <script src="../js/js/popper.js"></script>
    <script src="../js/js/bootstrap.min.js"></script>
    <script src="../js/js/owl.carousel.min.js"></script>
    <script src="../js/js/scrollreveal.min.js"></script>
    <script src="../js/js/main.js"></script>


</body>

</html>
