<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {
?>

<?php

if(isset($_GET['delete_product_colors'])){

$delete_id = $_GET['delete_product_colors'];

$delete_color = "delete from product_color where sample_image='$delete_id'";

$run_delete = mysqli_query($con,$delete_color);

if($run_delete){

echo "<script>alert('Color Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_product_colors','_self')</script>";

}


}


?>


<?php } ?>