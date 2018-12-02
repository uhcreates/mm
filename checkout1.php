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
  <?php
    include("header.php"); 
    ?>
    <div class="chk_back_btn">
      <span>
        <a href="#"><i class="pe-7s-angle-left"></i></a
      ></span>
      <div class="ck_out_logo">MERECER MELHOR</div>
    </div>
    <div class="shopping_bag_cont">
      <i class="pe-7s-shopbag"></i>
      <h6>BASKET</h6>
    </div>
    <div class="check_out_contain">
      <div class="order_btn_contain_1">
        <a href="#" class="btn btn-default btn_process_ck"> PROCESS ORDER </a>
      </div>
      <div class="row">
        <div class="col-sm-2">
          <div class="ck_img_contain">
            <img src="img/pd_1/Bounty_1.jpg" alt="product in basket" />
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row"><p>PRODUCT TITLE</p></div>
          <div class="row">
            <div class="col-sm-6">Size</div>
            <div class="col-sm-6">Colour</div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-6">15 x 4 inch</div>
            <div class="col-sm-6"><div class="color_cont_ck"></div></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row prc_adjst">
            <div class="col-sm-6">Quantity</div>
            <div class="col-sm-6">Price</div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3 ck_qty_box">
                <div class="input-group-prepend">
                  <span class="input-group-text">+</span>
                </div>
                <input
                  type="text"
                  class="form-control qty_box_txt"
                  placeholder="1"
                />
                <div class="input-group-append">
                  <span class="input-group-text">-</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6"><div class="ck_price">RS. 7000/-</div></div>
          </div>
        </div>
        <div class="col-sm-2">
          <span class="ck_delete_pd"><i class="pe-7s-close"></i></span>
        </div>
      </div>
      <hr />
      <div class="row">
        <div class="col-sm-2">
          <div class="ck_img_contain">
            <img src="img/pd_1/Bounty_1.jpg" alt="product in basket" />
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row"><p>PRODUCT TITLE</p></div>
          <div class="row">
            <div class="col-sm-6">Size</div>
            <div class="col-sm-6">Colour</div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-6">15 x 4 inch</div>
            <div class="col-sm-6"><div class="color_cont_ck"></div></div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="row prc_adjst">
            <div class="col-sm-6">Quantity</div>
            <div class="col-sm-6">Price</div>
          </div>
          <br />
          <div class="row">
            <div class="col-sm-6">
              <div class="input-group mb-3 ck_qty_box">
                <div class="input-group-prepend">
                  <span class="input-group-text">+</span>
                </div>
                <input
                  type="text"
                  class="form-control qty_box_txt"
                  placeholder="1"
                />
                <div class="input-group-append">
                  <span class="input-group-text">-</span>
                </div>
              </div>
            </div>
            <div class="col-sm-6"><div class="ck_price">RS. 7000/-</div></div>
          </div>
        </div>
        <div class="col-sm-2">
          <span class="ck_delete_pd"><i class="pe-7s-close"></i></span>
        </div>
      </div>
      <hr />
      <div class="container ck_ttl_cn">
        <table class="table table-borderless ml-auto">
          <tbody>
            <tr>
              <td>Product Cost</td>
              <td>Rs. 7000/-</td>
            </tr>
            <tr>
              <td>Delivery Cost</td>
              <td>Rs. 140/-</td>
            </tr>
            <tr>
              <td>Discount</td>
              <td>- Rs. 350/-</td>
            </tr>
            <tr>
              <td class="total_ck">Total</td>
              <td class="total_rs">RS. 6790</td>
            </tr>
          </tbody>
        </table>
        <div class="order_btn_contain_1">
          <a href="#" class="btn btn-default btn_process_ck"> PROCESS ORDER </a>
        </div>
      </div>
    </div>

    <hr>
    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
