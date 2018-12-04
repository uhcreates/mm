<?php



if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / View Products color

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Products color

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th> ID</th>
<th>Product Title</th>
<th> Product ID</th>

<th>Product Images</th>
<th>Sample images</th>
<th>Product Delete</th>
<th>Product Edit</th>



</tr>

</thead>

<tbody>

<?php



$get_pro = "Select products.product_title,product_color.*
from product_color
left join products 
on product_color.product_id = products.product_id";

$run_pro = mysqli_query($con,$get_pro);

while($row_pro=mysqli_fetch_array($run_pro)){

$pro_title = $row_pro['product_title'];

$id = $row_pro['id'];

$product_id = $row_pro['product_id'];

$images = $row_pro['images'];

$sample_image = $row_pro['sample_image'];





?>

<tr>

<td><?php echo $id; ?></td>

<td><?php echo $pro_title; ?></td>

<td><?php echo $product_id; ?></td>

<td><img src="product_images/<?php echo $images; ?>" width="60" height="60"></td>


<td><img src="product_images/<?php echo $sample_image; ?>" width="60" height="60"></td>





<td>

<a href="index.php?delete_product_colors=<?php echo $id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_product_colors=<?php echo $id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>