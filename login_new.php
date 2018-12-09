<?php

session_start();


include("includes/db.php");
include("functions/functions.php");

//Include GP config file && User class
include_once 'customer/gpConfig.php';
include_once 'customer/User.php';

// echo "<script>alert('null');</script>";

if(isset($_GET['code'])){

    // echo "<script>alert('first');</script>";

    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
    $gClient->setAccessToken($_SESSION['token']);
    // echo "<script>alert('second');</script>";
}

if ($gClient->getAccessToken()) {
    //Get user profile data from google

    // echo "<script>alert('third');</script>";

    $gpUserProfile = $google_oauthV2->userinfo->get();
    
    //Initialize User class
    $user = new User();
    
    //Insert or update user data to the database
    $gpUserData = array(
        'oauth_provider'=> 'google',
        'oauth_uid'     => $gpUserProfile['id'],
        'first_name'    => $gpUserProfile['given_name'],
        'last_name'     => $gpUserProfile['family_name'],
        'email'         => $gpUserProfile['email'],
        'gender'        => $gpUserProfile['gender'],
        'locale'        => $gpUserProfile['locale'],
        'picture'       => $gpUserProfile['picture'],
        'link'          => $gpUserProfile['link']
    );
    $userData = $user->checkUser($gpUserData);
    
    //Storing user data into session
    $_SESSION['userData'] = $userData;
    
    //Render facebook profile data
    if(!empty($userData)){
        // $output = '<h1>Google+ Profile Details </h1>';
        // $output .= '<img src="'.$userData['picture'].'" width="300" height="220">';
        // $output .= '<br/>Google ID : ' . $userData['oauth_uid'];
        // $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
        // $output .= '<br/>Email : ' . $userData['email'];
        // $output .= '<br/>Gender : ' . $userData['gender'];
        // $output .= '<br/>Locale : ' . $userData['locale'];
        // $output .= '<br/>Logged in with : Google';
        // $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Google+ Page</a>';
        // $output .= '<br/>Logout from <a href="logout.php">Google</a>'; 
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
} else {
    $authUrl = $gClient->createAuthUrl();
    $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="customer/images/glogin.png" alt=""/></a>';
}

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
    include("header1.php"); 
    ?>
    <div class="container login_container">
        <h1 class="login-txt">Login</h1>
        <form method="post">
            <div class="form-row">
                <!-- <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name or Email Address">
                </div> -->
                <div class="form-group col-md-12">
                    <input type="email" class="form-control" name="c_email" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-12">
                    <input type="password" class="form-control" name="c_pass" id="inputPassword4" placeholder="Password">
                </div>
                <div class="col-md-12 login_btn">
                    <button type="submit" name="login" value="Login" class="btn btn-default sign_in_btn">Sign In</button>
                </div>
                <div class="col-md-12 login_btn">
                    <button type="submit" class="btn btn-danger google_sin_btn">Google Sign In</button>
                </div>
                <div class="sign_up_link">
                    <a href="signup.php">Don't have account ? Sign Up</a>
                </div>
            </div>
        </form>
    </div> 
    <?php

        if(isset($_POST['login'])){
            $customer_email = $_POST['c_email'];
            $customer_pass = $_POST['c_pass'];
            $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
            $run_customer = mysqli_query($con,$select_customer);
            $get_ip = getRealUserIp();
            $check_customer = mysqli_num_rows($run_customer);
            $select_cart = "select * from cart where ip_add='$get_ip'";
            $run_cart = mysqli_query($con,$select_cart);
            $check_cart = mysqli_num_rows($run_cart);
            if($check_customer==0){
                echo "<script>alert('password or email is wrong')</script>";
                exit();
            }
            if($check_customer==1 AND $check_cart==0){
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are Logged In')</script>";
            // echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
            echo "<script>window.open('check_out.php','_self')</script>";
            }
            else {
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are Logged In')</script>";
            echo "<script>window.open('check_out.php','_self')</script>";
            }
        }
        ?>

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