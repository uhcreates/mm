<?php

if(!isset($_SESSION['admin_email'])){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>
<!DOCTYPE html>

<html>

<head>

<title> Insert Product Colors </title>
<style>
#sample_preview {
  /* height: 50px;
  weight: 50px; */
  position: relative;
}
  #sample_preview img {
    /* height: 100%;
    weight: auto; */
    height: 50px;
    width: 50px;
    display: inline;
    object-fit: none;
    border-radius: 50%;
 
  }


#image_preview {
  height: 200px;
  width: 150px;
  position: relative;
  display: inline-flex;

}

#image_preview img {
    height: 100%;
    width: auto;
    display: inline;

  }
</style>
<script type="text/javascript" src="jquery.form.js"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'#product_desc,#product_features' });</script>
<script>
$(document).ready(function() 
{ 
 $('form').ajaxForm(function() 
 {
  alert("Uploaded SuccessFully");
 }); 
});

function preview_sample() 
{

if ($('#sample_preview').has('#element').length) {
  $('#element').replaceWith("<img id='element' src='"+URL.createObjectURL(event.target.files[0])+"' ><br>");
  } else {
    $('#sample_preview').append("<img id='element' src='"+URL.createObjectURL(event.target.files[0])+"' ><br>");
  }
}

function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 if (total_file <= 4) {
  for(var i=0;i<total_file;i++)
    {
      $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>&nbsp;");
    }
 } else {
   alert("Maximum 4 files can be uploaded");
    $("#upload_file").val('');

  }
}
</script>
</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Insert Product Colors

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Insert Product Colorss

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->
    <form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
      <div class="form-group" ><!-- form-group Starts -->
      <label class="col-md-3 control-label" > Select Product </label>
        <div class="col-md-6" >
          <select class="form-control" name="product_id"><!-- select product_id Starts -->
            <option> Select Product </option>
              <?php

              $get_products = "select * from products";
              $run_products = mysqli_query($con,$get_products);
              while($row_product= mysqli_fetch_array($run_products)){
              $product_id = $row_product['product_id'];
              $product_title = $row_product['product_title'];

              echo "<option value='$product_id'>
              $product_title
              </option>";

              }

              ?>
          </select><!-- select product_id Ends -->
        </div>
      </div><!-- form-group Ends -->
      <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" > Upload Sample Image </label>
        <div class="col-md-4" >
          <input type="file" name="sample_image" id="upload_sample" onchange="preview_sample();" class="form-control" required >
        </div>
        <div id="sample_preview" class="col-md-2">
        </div>
      </div><!-- form-group Ends -->
      <hr style="border-bottom: 1px solid #3c3c3c;">
      <div class="form-group" ><!-- form-group Starts -->
        <label class="col-md-3 control-label" > Select Multiple Images </label>
        <div class="col-md-6" >
          <input type="file" name="images[]" multiple  id="upload_file" onchange="preview_image();" class="form-control" required >
        </div>
      </div><!-- form-group Ends -->
      <div id="image_preview" class="col-md-offset-3">
      </div>



<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['submit'])){

$product_id = $_POST['product_id'];
$sample_image = $_FILES['sample_image']['name'];
$temp_sample = $_FILES['sample_image']['tmp_name'];
move_uploaded_file($temp_sample,"product_images/variety/sample/$sample_image");


for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
  $temp_images = $_FILES['images']['tmp_name'][$i];
  $images = $_FILES['images']['name'][$i];
  move_uploaded_file($temp_images,"product_images/variety/$images");

  $insert_product_colors = "insert into product_color (product_id, images, sample_image) values ('$product_id','$images', '$sample_image')";
  $run_product_colors = mysqli_query($con,$insert_product_colors);
}




if($run_product_colors){

echo "<script>alert('Product has been inserted successfully')</script>";

echo "<script>window.open('index.php?view_products','_self')</script>";

}

}

?>

<?php } ?>
