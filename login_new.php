<?php

session_start();


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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>
    <?php 
    include("header.php"); 
    ?>
    <div class="container login_container">
            <h1 class="login-txt">Login</h1>
            <form>
            <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name or Email Address">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                        <div class="col-md-12 login_btn">
                            <button type="submit" class="btn btn-default sign_in_btn">Sign In</button>
                        </div>
                        <div class="col-md-12 login_btn">
                            <button type="submit" class="btn btn-danger google_sin_btn">Google Sign In</button>
                        </div>

                
                <div class="sign_up_link">
                    <a href="#">Don't have account ? Sign Up</a>
                </div>
                
            </form>
        </div>
    </div> 

    <!-- footer start -->
<?php

include("includes/footer1.php");

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