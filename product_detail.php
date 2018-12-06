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
                            <a href="#"><img src="admin_area/product_images/<?php echo $images?>" alt="product 1"></a>
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
    <div class="container-fluid footer_bg">
        <div class="row">
            <div class="col-sm-12">
                <div class="subscribe_news">
                    <h6>SUBSCRIBE TO NEWSLETTER</h6>
                    <form action="">
                        <div class="input-group subscribe_form">
                            <input type="email" class="form-control" placeholder="Your Email">
                            <div class="input-group-append">
                                <button type="submit" class="input-group-text news_btn">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Help</div>
                    <div class="f_links">
                        <a href="#">Frequently Asked Questions</a> <br>
                        <a href="#">How to Purchase</a> <br>
                        <a href="#">Transport and delivery</a> <br>
                        <a href="#">Exchange and returns</a> <br>
                        <a href="#">Payments</a> <br>
                        <a href="contact.html">Contact</a> <br>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Company</div>
                    <div class="f_links">
                        <a href="#">History of Brand</a> <br>
                        <a href="#">Inditex</a> <br>
                        <a href="#">Values/CSR</a> <br>
                        <a href="#">Work with Us</a> <br>
                        <a href="#">Press Offices</a> <br>
                        <a href="#">Privacy Policy</a> <br>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">Follow</div>
                    <div class="f_links">
                        <a href="#">Facebook</a> <br>
                        <a href="#">Twitter</a> <br>
                        <a href="#">Youtube</a> <br>
                        <a href="#">Pinterest</a> <br>
                        <a href="#">Instagram</a> <br>
                        <a href="#">Newsletter</a> <br>
                    </div>
                </div>

            </div>
            <div class="col-sm-3">
                <div class="footer_lks">
                    <div class="h5">DOWNLOAD OUR APP</div>
                    <div class="f_links">
                        <a href="#">IOS</a> <br>
                        <a href="#">ANDROID</a>
                    </div>
                </div>

            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-10">
                <a href="#" class="f_change">Change Market</a>
            </div>
            <div class="col-sm-2">
                <a href="#" class="cntry justify-content-end">IN</a>
            </div>
        </div>
    </div>





    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>


</body>

</html>