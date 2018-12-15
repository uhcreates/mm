<?php
    session_start();
    include("admin_area/includes/db.php");
    include("includes/db.php");
    include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Merecer Melhor</title>
    <meta charset="utf-8">
    <meta name="google-site-verification" content="cfEtbhLPxNxhejLF5MDgsRMIq-hapjeFth9hFCvLsN4" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/style.css">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"
      type="text/javascript"
    ></script>
    <style>
    #sample_preview {
    /* height: 50px;
    weight: 50px; */
    position: relative;
    }
    #sample_preview img {
        /* height: 100%;
        weight: auto; */
        height: 25px;
        width: 25px;
        display: inline;
        object-fit: none;
        border-radius: 50%;
    
    }
    </style>

</head>

<body>
    <?php 
        include("header.php");
    ?>
    <!--page heading -->
    <div class="container-fluid" style="padding-top: 3%;">
        <div class="row">
            <div class="col-sm-12">
                <div class="header_logo">
                    <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
                </div>
            </div>
        </div>
        <?php
                $product_id = @$_GET['pro_id'];
                $q =  "SELECT * FROM products WHERE product_id = $product_id";
                $query = mysqli_query($con,  $q);
                while ($result = mysqli_fetch_array($query)) {
                    $product_title = $result['product_title'];
                    $product_price = $result['product_price'];
                    $product_desc = $result['product_desc'];
                }
                ?>
        <div class="row single_pdct">
            <div class="col-sm-8">
                <div class="row">
                <?php 
                if (isset($_GET['color']))
                {
                    $sample_image = @$_GET['color'];
                    $query = "select * from product_color where product_id = $product_id and sample_image = '$sample_image'";
                }   else {
                    $query = "select * from product_color where product_id =$product_id limit 0,4";
                }
                    $run_query = mysqli_query($con,$query);
                    while ( $out = mysqli_fetch_array($run_query)) { 
                            $images = $out['images']; ?>
                    <div class="col-sm-6">
                        <div class="img_container">
                            <a href="#" data-toggle="modal" data-target="#fsModal"><img src="admin_area/product_images/<?php echo $images?>" alt="product 1"></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="single_ph">
                    <p><?php echo $product_title ?> </p>
                    <p class="price"> <?php echo $product_price ?><span> INR</span></p>
                </div>
                <div class="single_pc">
                <?php 
                    $query = "select * from product_color where product_id = $product_id group by sample_image order by id";
                    $run_query = mysqli_query($con,$query);
                    while ( $out = mysqli_fetch_array($run_query)) { 
                            $sample_image = $out['sample_image']; ?>
                    <span id="sample_preview">
                        <a href='product_detail.php?pro_id=<?php echo  $product_id ?>&color=<?php echo  $out['sample_image']?>'>
                            <img width="100%" height="100%" src="admin_area/product_images/variety/sample/<?php echo $out['sample_image']?>"/>
                        </a>
                    </span>
                    <!-- <a href="#"><span class="c_brown"></span></a>
                    <a href="#"><span class="c_golden"></span></a> -->
                    <?php } ?>
                </div>
                <div class="single_size">
                    <p>FIT FOR ALL SIZE</p>
                </div>
                <div class="buy">
                    <a href="cart_add.php?product_id=<?php echo $product_id ?>" class="btn buy_btn" role="button">BUY NOW</a>
                </div>
                <div class="s_details">
                    <!-- dropdown -->
                    <div id="accordion">

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    PRODUCT DETAILS
                                    <span class="float-right dp_size"> + </span>
                                </a>

                            </div>
                            <div id="collapseOne" class="collapse">
                                <div class="card-body">
                                    <?php echo $product_desc ?>
                                </div>
                            </div>
                        </div>

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                    FABRIC / CARE
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse">
                                <div class="card-body">
                                    st...
                                </div>
                            </div>
                        </div>

                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    DELIVERY DETAILS
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseThree" class="collapse">
                                <div class="card-body">
                                    fit..
                                </div>
                            </div>
                        </div>
                        <div class="card card_edit">
                            <div class="card-header">
                                <a class="collapsed card-link" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    RETURN POLICY
                                    <span class="float-right dp_size"> + </span>
                                </a>
                            </div>
                            <div id="collapseFour" class="collapse">
                                <div class="card-body">
                                    Return...
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--accordion end-->
                </div>
            </div>
        </div>
    </div>

    <!-- footer start -->
<?php

include('includes/footer1.php');
?>



    <!-- footer ends -->

<!-- modal -->
<div
      id="fsModal"
      class="modal animated bounceIn"
      tabindex="-1"
      role="dialog"
      aria-labelledby="myModalLabel"
      aria-hidden="true"
    >
      <!-- dialog -->
      <div class="modal-dialog">
        <!-- content -->
        <div class="modal-content">
          <!-- header -->
          <!--
            <div class="modal-header">
              <h1 id="myModalLabel" class="modal-title">Modal title</h1>
            </div>
          -->
          <!-- header -->

          <!-- body -->
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-1">
                <div class="thumbnail_contain">
                  <a href="#">
                    <img src="img/products/wallet/wallet-4.jpg" alt="img" />
                  </a>
                </div>
                <div class="thumbnail_contain">
                  <a href="#">
                    <img src="img/products/wallet/wallet-4.jpg" alt="img" />
                  </a>
                </div>
                <div class="thumbnail_contain">
                  <a href="#">
                    <img src="img/products/wallet/wallet-4.jpg" alt="img" />
                  </a>
                </div>
                <div class="thumbnail_contain">
                  <a href="#">
                    <img src="img/products/wallet/wallet-4.jpg" alt="img" />
                  </a>
                </div>
              </div>
              <div class="col-sm-11">
                <div class="img_full_contain">
                  <img src="admin_area/product_images/<?php echo $images?>" alt="img full" />
                </div>
              </div>
            </div>
          </div>
          <!-- body -->

          <!-- footer -->
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">
              close
            </button>
          </div>
          <!-- footer -->
        </div>
        <!-- content -->
      </div>
      <!-- dialog -->
    </div>
    <!-- modal -->
    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>


</body>

</html>