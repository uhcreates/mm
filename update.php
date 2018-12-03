<?php
session_start();

include("includes/db.php");

include("functions/functions.php");


$ip_add = getRealUserIp();
$product_id = $_POST['product_id'];
$qty = $_POST['quantity'];
$select_pro = "select * from products where product_id='$product_id' and status='product'";
        $query = mysqli_query($con,$select_pro);
        while ($res = mysqli_fetch_array($query)) {
            $pro_price = $res['product_price'];
        }
$total = ($pro_price * $qty);




$change_qty = "update cart set qty='$qty', p_price='$total' where product_id='$product_id' AND ip_add='$ip_add'";

$run_qty = mysqli_query($con,$change_qty);  
return $run_qty['p_price'];

?>

