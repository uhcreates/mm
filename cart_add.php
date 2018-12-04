<?php

session_start();

include("includes/db.php");

include("functions/functions.php");


		$product_id = @$_GET['product_id'];

		$ip_add = getRealUserIp();

		$select_product = "select * from products where product_id =$product_id and status='product'";
		$select_product_query = mysqli_query($con,$select_product);	
		while ($result=mysqli_fetch_array($select_product_query)) {
			$product_price = $result['product_price'];
			}

			
		$select_cart = "select * from cart where ip_add='$ip_add' and product_id =$product_id";
		$query = mysqli_query($con,$select_cart);
		$count = mysqli_num_rows($query);
		while ($row=mysqli_fetch_array($query)) {
			$id = $row['id'];
			$product_id = $row['product_id'];
			}
                                                                                                                                      
		if($count != 1) {
			$insert_product = "insert into cart (product_id, ip_add, qty, p_price, size) values ('$product_id','$ip_add','1', '$product_price', 'All')";
			$run_product = mysqli_query($con,$insert_product);
			if($run_product){
			echo "<script>window.open('check_out.php','_self')</script>";
			}
		} else {
			echo "<script>alert('Product already in cart!')</script>";
			header('Location: ' . $_SERVER['HTTP_REFERER']);

		}
	
?>
