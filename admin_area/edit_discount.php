<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_discount'])){

$dis_id = $_GET['edit_discount'];

$edit_discount = "select * from discount where id='$dis_id'";

$run_edit = mysqli_query($con,$edit_discount);

$row_edit = mysqli_fetch_array($run_edit);

$dis_id = $row_edit['id'];

$dis_name = $row_edit['name'];

$dis_value = $row_edit['value'];


}

?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li>

<i class="fa fa-dashboard"></i> Dashboard / Edit Category

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> Edit discount

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Discount Name</label>

<div class="col-md-6">

<input type="text" name="name" class="form-control" value="<?php echo $dis_name; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Discount value</label>

<div class="col-md-6">

<input type="text" name="value" class="form-control" value="<?php echo $dis_value;  ?>" pattern="[0-9]+(\.[0-9]{0,2})?%?">

</div>

</div><!-- form-group Ends -->



<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6">

<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$dis_name = $_POST['name'];

$dis_value = $_POST['value'];



$update_dis = "update discount set name='$dis_name', value='$dis_value' where id='$dis_id'";

$run_dis = mysqli_query($con,$update_dis);

if($run_dis){

echo "<script>alert('One Discount Has Been Updated')</script>";

echo "<script>window.open('index.php?view_discount','_self')</script>";

}

}



?>

<?php } ?>