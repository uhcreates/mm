<?php

session_start();
include('customer/gpConfig.php');

include('customer/User.php');

include("includes/db.php");

include("functions/functions.php");

// $session_email = $_SESSION['customer_email'];

// $select_customer = "select * from customers where customer_email='$session_email'";

// $run_customer = mysqli_query($con,$select_customer);

// $row_customer = mysqli_fetch_array($run_customer);

// $customer_id = $row_customer['customer_id'];

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
        <a href="products.php"><i class="pe-7s-angle-left"></i></a>
      </span>
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
      <!-- <form action="update.php" method="post"> -->
      <div class="order_btn_contain_1">
        <!-- <button type="submit" class="btn btn-default btn_process_ck">UPDATE CART</button> -->
      </div>
      <div class="row">
        <?php
          $ip_add = getRealUserIp();
          $select_cart = "select * from cart where ip_add='$ip_add'";
          $query = mysqli_query($con,$select_cart);
          $count = mysqli_num_rows($query);
          while($row = mysqli_fetch_array($query)) {
          $qty = $row['qty'];
          $_SESSION['qty'] = $qty;
          $product_id = $row['product_id'];
          $_SESSION['product_id'] = $product_id;
          $select_pro = "select * from products where product_id=".$row['product_id']." and status='product'";
          $q_pro = mysqli_query($con, $select_pro);
          while ($res = mysqli_fetch_array($q_pro)) {
            $p_id = $res['product_id'];
            $price = $res['product_price'];
          ?>
        <div class="col-sm-2" style="padding-bottom: 2%;">
          <div class="ck_img_contain">
          <img src="admin_area/product_images/<?php echo $res['product_img1'] ?>" style="height:100%;" alt="product in basket" />
          </div>
        </div>
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
                  name="quantity"
                  id="<?php echo $product_id?>"
                  class="form-control qty_box_txt"
                  min=1
                  value="<?php echo $qty?>"
                  onblur="saveCart(this)"
                />
                <!-- <div class="input-group-append">
                  <span class="input-group-text">-</span>
                </div> -->
              </div>
            </div>
            <div class="col-sm-4"><div class="ck_price" name="price">RS. <?php echo $res['product_price']?>/-</div></div>
          </div>
        </div>

      <script>
        function saveCart(obj) {
          var quantity = $(obj).val();
          var product_id = $(obj).attr("id");
          $.ajax({
            url: "update.php",
            type: "POST",
            data: 'product_id='+product_id+'&quantity='+quantity,
            // success: function(data, status){$("#total_price").html(data)},
            success: function(data, status) {window.open('check_out.php','_self')},
            error: function () {alert("Problem in sending reply!")}
          });
        }
        </script>
        <div class="col-sm-2">
          <span class="ck_delete_pd"><a style="text-decoration:none;" href="delete_item.php?product_id=<?php echo $product_id?>"><i class="pe-7s-close"></i></a></span>
        </div>
        <?php } ?>
        <?php } ?>

        </div>


        <hr />
        <!-- </form> -->
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
              <td id="total_price">Rs. <?php echo $total_cost['total'] ?>/-</td>
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

        </table>
        <?php } ?>
        <div class="order_btn_contain_1">
         <?php 
          if (!isset($_SESSION['customer_email'])) {
              echo  '<a href="login_new.php" class="btn btn-default btn_process_ck">LOGIN </a>';
          } else {
            echo  '<a href="payment_options.php" class="btn btn-default btn_process_ck">
            PROCESS ORDER
            </a> ';
          }
          ?>
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
