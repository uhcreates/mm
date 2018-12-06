<?php

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_state = $row_customer['customer_state'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$pincode = $row_customer['pincode'];

$customer_image = $row_customer['customer_image'];

?>
<div class="container login_container" style="margin-top: 0px !important;">
    <h1 class="login-txt" style="margin: 0px 50px 50px 50px!important;">Edit Your Account</h1>
    <form method="post" enctype="multipart/form-data" >
        <div class="form-row">
            <!-- <div class="form-group col-md-12">
                <input type="text" class="form-control" name="user_name" id="user_name" placeholder="User Name or Email Address">
            </div> -->
            <div class="form-group col-md-12">
                <input type="text" value="<?php echo $customer_name; ?>" class="form-control" name="c_name" required id="inputEmail4" placeholder="Customer Name">
            </div>
            <div class="form-group col-md-12">
                <input type="text" value="<?php echo $customer_email; ?>" class="form-control" name="c_email" required  placeholder="Customer Email">
            </div>
            <div class="form-group col-md-12">
                <input type="text" class="form-control" value="<?php echo $customer_country; ?>" name="c_country" required  placeholder="Customer Country">
            </div>
            <div class="form-group col-md-12">
                <input type="text" value="<?php echo $customer_state; ?>" class="form-control" name="c_state" required  placeholder="Customer State">
            </div>
            <div class="form-group col-md-12">
                <input type="text" value="<?php echo $customer_city; ?>" class="form-control" name="c_city" required  placeholder="Customer City">
            </div>
            <div class="form-group col-md-12">
                <input type="text" value="<?php echo $customer_contact; ?>" class="form-control" name="c_contact" required  placeholder="Customer Contact">
            </div>
            <div class="form-group col-md-12">
                <input type="number" value="<?php echo $pincode; ?>" class="form-control" name="c_pincode" required  placeholder="Customer Pincode">
            </div>
            <div class="form-group col-md-12">
                <input type="file" name="c_image" class="form-control" required ><br>
                <img src="customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive" > 
            </div>
            <div class="col-md-12 login_btn">
                <button type="submit" name="update" class="btn btn-default sign_in_btn">Sign In</button>
            </div>
        </div>
    </form>

        
    <?php

    if(isset($_POST['update'])){

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_country = $_POST['c_country'];

    $c_state = $_POST['c_state'];


    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];

    $c_address = $_POST['c_address'];

    $c_pincode = $_POST['c_pincode'];


    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp,"customer_images/$c_image");

    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_state='$c_state',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',pincode='$c_pincode',customer_image='$c_image' where customer_id='$update_id'";

    $run_customer = mysqli_query($con,$update_customer);

    if($run_customer){

    echo "<script>alert('Your account has been updated please login again')</script>";

    echo "<script>window.open('logout.php','_self')</script>";

    }

    }


    ?>
</div>