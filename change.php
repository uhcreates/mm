<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

?>

<?php


$ip_add = getRealUserIp();

if(isset($_POST['product_id'])){

$product_id = $_POST['product_id'];

$qty = $_POST['quantity'];

$change_qty = "update cart set qty='$qty' where product_id='$product_id' AND ip_add='$ip_add'";

$run_qty = mysqli_query($con,$change_qty);


}





?>