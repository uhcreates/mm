
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"><!-- form Starts -->

<input type="hidden" name="business" value="slokchavhan9@gmail.com">

<input type="hidden" name="cmd" value="_cart">

<input type="hidden" name="upload" value="1">

<input type="hidden" name="currency_code" value="USD">

<input type="hidden" name="return" value="http://localhost/ecom_store/paypal_order.php?c_id=<?php echo $customer_id; ?>">


<input type="hidden" name="cancel_return" value="http://localhost/ecom_store/index.php">


<?php

$i = 0;


$ip_add = getRealUserIp();

$get_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($con,$get_cart);

while($row_cart = mysqli_fetch_array($run_cart)){

$pro_id = $row_cart['p_id'];

$pro_qty = $row_cart['qty'];

$pro_price = $row_cart['p_price'];

$get_products = "select * from products where product_id='$pro_id'";

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

<input type="image" name="submit" width="500" height="270" src="images/paypal.png" >


</form>