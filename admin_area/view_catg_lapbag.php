<?php


if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View LapBag

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts  -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Lapbag

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<?php

$get_catg_lapbag = "select * from catg_lapbag";

$run_catg_lapbag = mysqli_query($con,$get_catg_lapbag);

while($row_catg_lapbag=mysqli_fetch_array($run_catg_lapbag)){

$id = $row_catg_lapbag['id'];

$catg_lapbag_name = $row_catg_lapbag['catg_lapbag_name'];

$catg_lapbag_img = $row_catg_lapbag['catg_lapbag_img'];

$catg_lapbag_url = $row_catg_lapbag['catg_lapbag_url'];

?>

<div class="col-lg-3 col-md-3" ><!-- col-lg-3 col-md-3 Starts -->

<div class="panel panel-primary" ><!-- panel panel-primary Starts --->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" align="center" >

<?php echo $catg_lapbag_name; ?>


</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<img src="lapbag_images/<?php echo $catg_lapbag_img; ?>" class="img-responsive" >

</div><!-- panel-body Ends -->

<div class="panel-footer" ><!-- panel-footer Starts -->

<center><!-- center Starts -->

<!-- <a href="index.php?delete_newin=<?php echo $id; ?>" class="pull-left" >

<i class="fa fa-trash-o" ></i> Delete

</a> -->

<a href="index.php?edit_catg_lapbag=<?php echo $id; ?>" class="pull-right" >

<i class="fa fa-pencil" ></i> Edit

</a>

<div class="clearfix" >

</div>



</center><!-- center Ends -->


</div><!-- panel-footer Ends -->


</div><!-- panel panel-primary Ends --->


</div><!-- col-lg-3 col-md-3 Ends -->


<?php } ?>


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends  -->

<?php } ?>