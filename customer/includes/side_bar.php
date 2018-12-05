<div class="col-sm-12">
        
    <?php
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($con,$get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_image = $row_customer['customer_image'];
    $customer_name = $row_customer['customer_name'];
    if(!isset($_SESSION['customer_email'])){
    }
    else {
    echo "
    <center>
    <img src='customer_images/$customer_image' width='100%' class='img-responsive'>
    </center>
    <br>
    <h3 align='center' class='panel-title'> Hi, $customer_name </h3>

    ";

    }

    ?>
    <div class="card card_edit">
        <div class="card-body">
                
        <ul><!-- nav nav-pills nav-stacked Starts -->

            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">

            <a href="myaccount.php?my_orders"> <i class="fa fa-list"> </i> My Orders </a>

            </li>


            <li class="<?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">

            <a href="myaccount.php?edit_account"> <i class="fa fa-pencil"></i> Edit Account </a>

            </li>

            <li class="<?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">

            <a href="myaccount.php?change_pass"> <i class="fa fa-user"></i> Change Password </a>

            </li>

            <!-- <li class="<?php 
            // if(isset($_GET['my_wishlist'])){ echo "active"; } 
            ?>">

            <a href="myaccount.php?my_wishlist"> <i class="fa fa-heart"></i> My WishList </a>

            </li> -->

            <li>

            <a href="logout.php"> <i class="fa fa-sign-out"></i> Logout </a>

            </li>


            </ul><!-- nav nav-pills nav-stacked Ends -->
        </div>
    </div>


    

</div>