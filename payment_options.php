<?php
session_start();


include("includes/db.php");
include("functions/functions.php");


$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];


?>


        
<!-- <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">


<input type="hidden" name="business" value="slokchavhan9@gmail.com">

<input type="hidden" name="cmd" value="_cart">

<input type="hidden" name="upload" value="1">

<input type="hidden" name="currency_code" value="USD"> -->

<!-- <input type="hidden" name="return" value="http://localhost/mm/paypal_order.php?c_id=<?php echo $customer_id; ?>"> -->

<!-- <input type="hidden" name="cancel_return" value="http://localhost/mm/index.php"> -->


<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$id = $row_cart['id'];

$product_id = $row_cart['product_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$product_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>


<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product_title; ?>" >

<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $i; ?>" >

<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $pro_price; ?>" >

<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $pro_qty; ?>" >


<?php } ?>
<!-- <input type="image" name="submit" width="500" height="270" src="images/paypal.png" > -->

<div class="order_btn_contain_1">
<!-- name="submit" -->
<a href="paypal_order.php?c_id=<?php echo $customer_id; ?>" class="btn btn-default btn_process_ck">
    PAYPAL
    </a> &nbsp; &nbsp;&nbsp; 
    <a href="pay_u/PayUMoney_form.php" class="btn btn-default btn_process_ck">
    PAY U
    </a>
</div> 
</form><!-- form Ends -->
