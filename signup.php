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
    <script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body>
    <?php 
        include("header1.php"); 
        ?>
            <div class="container Signup_container">
            <h1 class="login-txt">Sign Up</h1>
            <form action="customer_register.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="c_name" id="c_name" placeholder="Full Name">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="c_email" id="c_email" placeholder="Customer Email">
                    </div>
                    <div class="form-group col-md-5">
                        <input type="password" class="form-control" name="c_pass" id="pass" placeholder="Password">
                    </div>
                    <div class="col-md-1">
                    <span id="pass_type"> </span>
                    <div style="display: none;" id="meter"> </div>
                    </div>
                    <div class="form-group col-md-5">
                            <input type="password" class="form-control" name="c_pass_confirm" id="c_pass_confirm" placeholder="Confirm Password">
                    </div>
                    <span class="visible_btn col-md-1">
                        <a role="button" class="btn btn-default visible_btn" id="visible_btn" onclick="myVisible()"> <img src="images/visible.png" alt="visible"></a>
                    </span>
                    <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="c_address" id="c_address" placeholder="Address">
                        </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="c_country" id="c_country" placeholder="Customer Country">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="c_state" id="c_state" placeholder="Customer state">
                    </div>
                    <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="c_city" id="c_city" placeholder="Customer City">
                    </div>
                    <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="c_contact" id="c_contact" placeholder="Customer Contact">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pin Code">
                    </div>
                    <div class="col-md-12" align="center">
                        <div class="g-recaptcha" data-sitekey="6Lc-WxYUAAAAAFUhTFfBEzLGmEgRXHHdsD4ECvIC"></div>

                    </div>
                    <div class="col-md-12 login_btn">
                        <button type="submit" name="register" class="btn btn-default sign_in_btn">Register</button>
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

    <script>

$(document).ready(function(){

$('.tick1').hide();
$('.cross1').hide();

$('.tick2').hide();
$('.cross2').hide();


$('.confirm').focusout(function(){

var password = $('#pass').val();

var confirmPassword = $('#con_pass').val();

if(password == confirmPassword){

$('.tick1').show();
$('.cross1').hide();

$('.tick2').show();
$('.cross2').hide();



}
else{

$('.tick1').hide();
$('.cross1').show();

$('.tick2').hide();
$('.cross2').show();


}


});


});

</script>

<script>

$(document).ready(function(){

$("#pass").keyup(function(){

check_pass();

});

});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
   document.getElementById("pass_type").style.fontcolor("red");
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
   document.getElementById("pass_type").style.fontcolor("yellow");
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
   document.getElementById("pass_type").style.fontcolor("orange");
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
   document.getElementById("pass_type").style.fontcolor("green");
  }
 }

 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}

</script>

<?php

if(isset($_POST['register'])){

$secret = "6Lc-WxYUAAAAAN5j2OdDsryWwGfREg5eeuZFpKMv";

$response = $_POST['g-recaptcha-response'];

$remoteip = $_SERVER['REMOTE_ADDR'];

$url = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip");

$result = json_decode($url, TRUE);

if($result['success'] == 1){

$c_name = $_POST['c_name'];

$c_email = $_POST['c_email'];

$c_pass = $_POST['c_pass'];

$c_country = $_POST['c_country'];

$c_state = $_POST['c_state'];

$c_city = $_POST['c_city'];

$c_contact = $_POST['c_contact'];

$c_address = $_POST['c_address'];

$pincode = $_POST['pincode'];

$c_image = $_FILES['c_image']['name'];

$c_image_tmp = $_FILES['c_image']['tmp_name'];

$c_ip = getRealUserIp(); 

move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

$get_email = "select * from customers where customer_email='$c_email'";

$run_email = mysqli_query($con,$get_email);

$check_email = mysqli_num_rows($run_email);

if($check_email == 1){

echo "<script>alert('This email is already registered, try another one')</script>";

exit();

}

$customer_confirm_code = mt_rand();

$subject = "Email Confirmation Message";

$from = "scorpjonas@gmail.com";

$message = "

<h2>
Email Confirmation By Merecer Melhor Private Limited, $c_name
</h2>

<a href='localhost:82/mm/customer/myaccount.php?$customer_confirm_code'>

Click Here To Confirm Email

</a>

";

$headers = "From: $from \r\n";

$headers .= "Content-type: text/html\r\n";

mail($c_email,$subject,$message,$headers);

$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country, customer_state, customer_city,customer_contact,customer_address, pincode, customer_image,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_country','$c_state','$c_city','$c_contact','$c_address', '$pincode','$c_image','$c_ip','$customer_confirm_code')";


$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart where ip_add='$c_ip'";

$run_cart = mysqli_query($con,$sel_cart);

$check_cart = mysqli_num_rows($run_cart);

if($check_cart>0){

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('check_out.php','_self')</script>";

}else{

$_SESSION['customer_email']=$c_email;

echo "<script>alert('You have been Registered Successfully')</script>";

echo "<script>window.open('index.php','_self')</script>";


}


}
else{

echo "<script>alert('Please Select Captcha, Try Again')</script>";

}


}

?>

</body>

</html>