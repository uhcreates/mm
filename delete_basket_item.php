<?php

session_start();

include("includes/db.php");

include("functions/functions.php");

		$product_id = @$_GET['product_id'];
		$ip_add = getRealUserIp();			
		$delete_item = "delete from cart where ip_add='$ip_add' and product_id =$product_id";
        $query = mysqli_query($con,$delete_item);
        // echo "<script>window.open('header.php','_self')</script>";	
        header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
