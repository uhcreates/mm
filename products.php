
<?php

session_start();

include("admin_area/includes/db.php");

include("includes/db.php");

include("functions/functions.php");

include("pagination/function.php");


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


</head>

<body>
    <?php
        include("header.php"); 
        ?>
    <!--page heading -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 3%;">
            <div class="col-sm-12">
                <div class="header_logo">
                <a href="index.php"><img src="images/logo.jpg" alt="header logo"></a>
                </div>
            </div>
        </div>
        <div class="row pdp_bg" style="margin-top: 5%;">
            <div class="col-sm-2 col-md-2">
                <!-- dropdown -->
                <div id="sidemenu">
                    <div class="card card_edit">
                        <?php 
                        $q = "select * from categories where showInMenu = 1";
                        $query = mysqli_query($con,$q);
                        while ( $res = mysqli_fetch_array($query)) {
                        ?>
                        <div class="card-header">
                            <a class="collapsed card-link" data-toggle="collapse" data-parent="#sidemenu" href="#collapse<?php echo $res['cat_id'] ?>">
                            
                                <?php echo $res['cat_title']; ?>
                                <span  class="float-right dp_size"> + </span>
                            </a>
                        </div>
                        
                        <div id="collapse<?php echo $res['cat_id'] ?>" class="collapse">
                            <div class="card-body">
                                <ul>
                                    <?php
                                    $command = "select * from product_categories where cat_id =". $res['cat_id']."";
                                    $productQuery = mysqli_query($con,$command);
                                    while ( $result = mysqli_fetch_array($productQuery)) { ?>
                                    <li><a href="products.php?product_cat_id=<?php echo $result['p_cat_id']?>&page=1"><?php echo  $result['p_cat_title'] ?></a></li>
                                    <?php } ?>
                                </ul>
                               
                            </div>
                        </div>
                        <?php 
                    } ?>
                    </div>
                </div>
                <!--accordion end-->
            </div>
            <div class="col-sm-10 col-md-10">
                <div class="row">
                    <?php

                    // Get Record By Product Category ID
                    if(isset($_GET['product_cat_id'])) {
                        $product_cat_id = @$_GET['product_cat_id'];
                        $limit = 8;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { 
                            $page=1; 
                        };  
                        $start_from = ($page-1) * $limit;  
                        $sql = "SELECT * FROM products where p_cat_id=".$product_cat_id." LIMIT $start_from , $limit";  
                        } 
                        
                    // Get Record By Search    
                        else if (isset($_GET['search']) || isset($_GET['user_query'])){
                            $user_keyword = $_GET['user_query'];
                            $limit = 8;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { 
                            $page=1; 
                        };  
                        $start_from = ($page-1) * $limit;  
                        $sql = "select * from products where status='product' and product_keywords like '%$user_keyword%' LIMIT $start_from , $limit";  
                        } 
                        
                    // Get All Record
                        else {
                            $limit = 8;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { 
                            $page=1; 
                        };  
                        $start_from = ($page-1) * $limit;  
                        $sql = "SELECT * FROM products where status='product' LIMIT $start_from , $limit";  
                        }
                        $rs_result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($rs_result)) {  
                        ?>
                    <div class='col-sm-3'>
                        
                        <div class='p_container'>
                            <div class='p_img'>
                                <a href='product_detail.php?pro_id=<?php echo  $row['product_id']?>'><img src='admin_area/product_images/<?php echo $row["product_img1"]?>'></a>
                                <div class='overlay'>COLORS
                                    <div class='p_colors'>
                                        <span class='c_black'></span>
                                        <span class='c_brown'></span>
                                        <span class='c_golden'></span>
                                    </div>
                                </div>
        
                            </div>
                            <div class='p_sub_d'>
                                <p><?php echo $row["product_label"] ?></p>
                                
                                <p class='price'><?php echo $row["product_price"] ?><span> INR</span></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php       
                            }
                        ?>
                </div>
                <div class="col-md-12">
                <?php  
                    $limit = 8;  

                    // Get Record By Product Category ID PAGE
                    if(isset($_GET['product_cat_id'])) {
                        $sql = "SELECT COUNT(product_id) FROM products where p_cat_id=".$_GET['product_cat_id'].""; 
                        $rs_result = mysqli_query($con, $sql);  
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "<div class='pagination justify-content-center'>";  
                        for ($i=1; $i<=$total_pages; $i++) {  
                                    $pagLink .= "<a class='page-link' href='products.php?product_cat_id=".$_GET['product_cat_id']."&page=".$i."'>".$i."</a>";  
                        };  
                        echo $pagLink . "</div>";   
                    } 
                    
                    // Get Record By Search  PAGE                    
                    else if (isset($_GET['search']) || isset($_GET['user_query'])) {
                            $user_keyword = $_GET['user_query'];
                            $get_products = "select * from products where status='product' and product_keywords like '%$user_keyword%'";
                            $run_products = mysqli_query($con,$get_products);

                            $row = mysqli_fetch_row($run_products);  
                            $total_records = $row[0];  
                            $total_pages = ceil($total_records / $limit);  
                            $pagLink = "<div class='pagination justify-content-center'>";  
                            for ($i=1; $i<=$total_pages; $i++) {  
                                        $pagLink .= "<a class='page-link' href='products.php?user_query=".$user_keyword."&page=".$i."'>".$i."</a>";  
                            };  
                        echo $pagLink . "</div>";  
                    } 
                    
                    // Get All Record PAGE                    
                    else {
                        $sql = "SELECT COUNT(product_id) FROM products where status='product'";  
                        $rs_result = mysqli_query($con, $sql);  
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "<div class='pagination justify-content-center'>";  
                        for ($i=1; $i<=$total_pages; $i++) {  
                                    $pagLink .= "<a class='page-link' href='products.php?page=".$i."'>".$i."</a>";  
                        };  
                        echo $pagLink . "</div>";  
                    }
                        
                    ?>
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
                        <a href="#">Newsletter</a> <br>2
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