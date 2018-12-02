<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['delete_discount'])){

$dis_id = $_GET['delete_discount'];

$delete_dis = "delete from discount  where id='$dis_id'";

$run_delete = mysqli_query($con,$delete_dis);

if($run_delete){

echo "<script> alert('One Discount Has Been Deleted') </script>";

echo "<script>window.open('index.php?view_discount','_self')</script>";

}

}

?>

<?php } ?>