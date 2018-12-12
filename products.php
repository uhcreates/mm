
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
    <div class="container-fluid">
        <div class="row" style="margin-top: 3%;">
            <div class="col-sm-12 ">
                <div class="header_logo">
                <a href="index.php" ><img src="images/logo.jpg" alt="header logo"></a>
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
                    // Get Record By Category ID
                    if(isset($_GET['cat_id'])) {
                        $cat_id = @$_GET['cat_id'];
                        $limit = 8;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { 
                            $page=1; 
                        };  
                        $start_from = ($page-1) * $limit;  
                        $sql = "SELECT * FROM products where cat_id=".$cat_id." LIMIT $start_from , $limit";  
                        } 

                    // Get Record By Product Category ID
                    else if(isset($_GET['product_cat_id'])) {
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
                    if ( mysqli_num_rows($rs_result) == 0) {
                        echo '<h1 style="margin-left: 15%;">Products will be added soon!</h1>';
                    }
                        else {
                            while ($row = mysqli_fetch_array($rs_result)) {  
                                $prod_id = $row['product_id'];
                        ?>
                    <div class='col-sm-3'>
                        
                        <div class='p_container'>
                            <div class='p_img'>
                                <a href='product_detail.php?pro_id=<?php echo  $row['product_id']?>'><img src='admin_area/product_images/<?php echo $row['product_img1'] ?>'></a>
                                <div class='overlay'>COLORS
                                    <div class='p_colors'>
                                    <?php 
                                    $query = "select * from product_color where product_id = $prod_id group by sample_image order by id";
                                    $run_query = mysqli_query($con,$query);
                                    while ( $out = mysqli_fetch_array($run_query)) { 
                                            $sample_image = $out['sample_image']; ?>
                                        <!-- class='c_black' -->
                                        <span id="sample_preview">
                                            <a href='product_detail.php?pro_id=<?php echo  $row['product_id']?>&color=<?php echo  $out['sample_image']?>'>
                                                <img width="100%" height="100%" src="admin_area/product_images/variety/sample/<?php echo $out['sample_image']?>"/>
                                            </a>
                                        </span>
                                        <?php } ?>
                                        <!-- <span class='c_black'></span>
                                        <span class='c_golden'></span> -->
                                    </div>
                                </div>
                            </div>
                            <div class='p_sub_d'>
                                <p style=" text-transform: capitalize;"><font  size='3pt'  ><?php echo $row["product_label"] ?></font></p>
                                
                                <p class='price'><font  size='3pt'  ><?php echo $row["product_price"] ?><span> INR</span></font></p>
                            </div>
                        </div>
                        
                    </div>
                    <?php       
                            } 
                        }
                        ?>
                </div>
                <div class="col-md-12">
                <?php  
                    $limit = 8;  

                    // Get Record By Product Category ID PAGE
                    if(isset($_GET['cat_id'])) {
                        $sql = "SELECT COUNT(*) FROM products where cat_id=".$_GET['cat_id'].""; 
                        $rs_result = mysqli_query($con, $sql);  
                        $row = mysqli_fetch_row($rs_result);  
                        $total_records = $row[0];  
                        $total_pages = ceil($total_records / $limit);  
                        $pagLink = "<div class='pagination justify-content-center'>";  
                        for ($i=1; $i<=$total_pages; $i++) {  
                                    $pagLink .= "<a class='page-link' href='products.php?cat_id=".$_GET['cat_idz']."&page=".$i."'>".$i."</a>";  
                        };  
                        echo $pagLink . "</div>";   
                    }

                    // Get Record By Product Category ID PAGE
                    else if(isset($_GET['product_cat_id'])) {
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
    <?php
    include('includes/footer1.php')
    ?>



    <script src="js/js/jquery-3.3.1.min.js"></script>
    <script src="js/js/popper.js"></script>
    <script src="js/js/bootstrap.min.js"></script>
    <script src="js/js/owl.carousel.min.js"></script>
    <script src="js/js/scrollreveal.min.js"></script>
    <script src="js/js/main.js"></script>


</body>

</html>