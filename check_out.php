<?php

session_start();
include('customer/gpConfig.php');

include('customer/User.php');

include("includes/db.php");

include("functions/functions.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Merecer Melhor</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="css/animate.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <div class="chk_back_btn">
      <span>
        <a href="products.php"><i class="pe-7s-angle-left"></i></a
      ></span>
      <div class="ck_out_logo">
        <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
      </div>
    </div>
    <div class="shopping_bag_cont">
    <?php 
          $ip_add = getRealUserIp();
          $select_cart = "select * from cart where ip_add='$ip_add'";
          $query = mysqli_query($con,$select_cart);
          $count = mysqli_num_rows($query); ?>
      <i class="pe-7s-shopbag"></i>&nbsp;<span class='count_of_item'><?php echo $count ?></span>
      <h6>BASKET</h6>
    </div>
    <div class="check_out_contain">
      <!-- <div class="order_btn_contain_1">
        <a href="#" class="btn btn-default btn_process_ck"> PROCESS ORDER </a>
      </div> -->
      <div class="row">
        <?php  
          $ip_add = getRealUserIp();
          $select_cart = "select * from cart where ip_add='$ip_add'";
          $query = mysqli_query($con,$select_cart);
          $count = mysqli_num_rows($query);
          while($row = mysqli_fetch_array($query)) {
          $product_id = $row['product_id'];
          $select_pro = "select * from products where product_id=".$row['product_id']." and status='product'";
          $q_pro = mysqli_query($con, $select_pro);
          while ($res = mysqli_fetch_array($q_pro)) {
          ?>
        <div class="col-sm-2">
          <div class="ck_img_contain">
          <img src="admin_area/product_images/<?php echo $res['product_img1'] ?>" style="height:100%;" alt="product in basket" />
          </div>
        </div>
        <!-- <div class="col-sm-4">
          <div class="row">
            <div class="col-sm-6">Size</div>
            <div class="col-sm-6">Colour</div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-6">15 x 4 inch</div>
            <div class="col-sm-6"><div class="color_cont_ck"></div></div>
          </div>
        </div> -->
        <div class="col-sm-8">
          <div class="row"><p><?php echo $res['product_title']?></p></div>
          <div class="row prc_adjst">
            <div class="col-sm-4">Color</div>
            <div class="col-sm-4">Quantity</div>
            <div class="col-sm-4">Price</div>
          </div>
          <br />
          <div class="row">
          <div class="col-sm-4"><div class="color_cont_ck"></div></div>
            <div class="col-sm-4">
              <div class="input-group mb-3 ck_qty_box">
                <!-- <div class="input-group-prepend">
                  <span class="input-group-text">+</span>
                </div> -->
                <input
                  type="number"
                  class="form-control qty_box_txt"
                  placeholder="1"
                  min=1
                />
                <!-- <div class="input-group-append">
                  <span class="input-group-text">-</span>
                </div> -->
              </div>
            </div>
            <div class="col-sm-4"><div class="ck_price">RS. <?php echo $res['product_price']?>/-</div></div>
          </div>
        </div>
        <div class="col-sm-2">
          <span class="ck_delete_pd"><a style="text-decoration:none;" href="delete_item.php?product_id=<?php echo $product_id?>"><i class="pe-7s-close"></i></a></span>
        </div>
        <?php } ?>
          <?php } ?>
        </div>
        <hr />
      <div class="container ck_ttl_cn">
        <table class="table table-borderless ml-auto">
          <tbody>
          <?php 
          $ip_add = getRealUserIp();
          $sum_pro_price = "select sum(p_price) as total from cart where ip_add='$ip_add'";
          $query = mysqli_query($con,$sum_pro_price);
          while ($total_cost = mysqli_fetch_array($query)) {
            $final_cost = $total_cost['total'];
            ?>
            <tr>
              <td>Product Cost</td>
              <td>Rs. <?php echo $total_cost['total'] ?>/-</td>
            </tr>
            <!-- <tr>
              <td>Delivery Cost</td>
              <td>Rs. 140/-</td>
            </tr> -->
            <?php 
            $ip_add = getRealUserIp();
            $disc = "select * from discount";
            $q = mysqli_query($con,$disc);
            while ($discount = mysqli_fetch_array($q)) {?>
            <tr>
              <td>Discount</td>
              <td style="color: red;">- Rs. 
              <?php 
              if (stripos($discount['value'], "%") !== false) {
                echo ($out = $final_cost/$discount['value']);
              } else  {
                echo ($out = $discount['value']);
              }
              ?>/-</td>
            </tr>
            <tr>
              <td class="total_ck">Total</td>
              <td class="total_rs">RS. <?php echo ($final_cost - $out) ?></td>
            </tr>
            <?php } ?>
          </tbody>
          <?php } ?>
        </table>
        <div class="order_btn_contain_1">
          <a href="#" class="btn btn-default btn_process_ck"> PROCESS ORDER </a>
        </div>
      </div>
    </div>

    <hr>
    
    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>
  </body>
</html>
