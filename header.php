<nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
        <!-- Brand -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                    <?php 
                        $q = "select * from categories where showInMenu = 1";
                        $query = mysqli_query($con,$q);
                        while ( $res = mysqli_fetch_array($query)) {
                        ?>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbardrop" data-toggle="dropdown">
                    
                        <?php echo $res['cat_title'] ?>
                    </a>
                    <div class="dropdown-menu">
                    <?php 
                        $command = "select * from product_categories where cat_id =". $res['cat_id']."";
                        $productQuery = mysqli_query($con,$command);
                        while ( $result = mysqli_fetch_array($productQuery)) {
                        ?>
                        
                        <a class="dropdown-item" href="products.php?product_cat_id=<?php echo $result['p_cat_id']?>"><?php echo  $result['p_cat_title'] ?></a>
                        <?php  
                            }
                        ?>
                    </div>
                    <?php  
                }
                    ?>
                </li>
            </ul>
            <!-- <ul class="navbar-nav">
                <li class="nav-item">
                    <a  href="#"> 
                        <img src="images/logo.jpg" alt="merecerlogo"  height="auto" width="130px">
                    </a>
                </li>
            </ul> -->
            <ul class="navbar-nav ml-auto nav_txt_r">
            <li class="nav-item">
                <a class="nav-link" href="#search"><span class="pe-7s-search"></span> Search
                </a>
            </li>
                <!--  <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li> -->

                <li class="nav-item">
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a  class='nav-link' href='login_new.php'> Login </a>";
                        }   else {
                            // echo "<a  class='btn btn-success btn-sm nav-link' style='color: white;' href='logout.php'> Welcome, " . $_SESSION['first_name'] ."</a>";
                            echo "<a  class='btn btn-success btn-sm nav-link' style='color: white;' href='logout.php'> Welcome, " . $_SESSION['customer_email'] ."</a>";

                        }

                    ?>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#" >My Orders</a>
                </li> -->
                <li class="nav-item" id="basket_link">
                    <a class="nav-link" href="#">My Basket</a>
                </li>
            </ul>

        </div>
    </nav>
    <!-- navbar end -->
    <div id="search">
      <span class="close">X</span>
      <form role="search" id="searchform"  method="get" action="products.php?user_query='<?php echo $_GET["user_query"] ?>'">
        <input value="" name="user_query" type="search" placeholder="Type To Search" />
      </form>
    </div>
    <div class="panel-wrap" >
      <div class="panel">
        <div class="checkout_cancel_btn"><i class="pe-7s-close"></i></div>
        <div class="shopping_bag_cont">
        <?php 
          
            $ip_add = getRealUserIp();
            $select_cart = "select * from cart where ip_add='$ip_add'";
            $query = mysqli_query($con,$select_cart);
            $count = mysqli_num_rows($query); ?>
          <i class='pe-7s-shopbag'></i>&nbsp;<span class='count_of_item'><?php echo $count ?></span>
          <h6>BASKET</h6>
        </div>     
        <div class="basket_nav_pd">
          <div class="row pd_bas_row">
          <?php 
          
            $ip_add = getRealUserIp();
            $select_cart = "select * from cart where ip_add='$ip_add'";
            $query = mysqli_query($con,$select_cart);
            $count = mysqli_num_rows($query);
            while($row = mysqli_fetch_array($query)) {
          
            $select_pro = "select * from products where product_id=".$row['product_id']." and status='product'";
            $q_pro = mysqli_query($con, $select_pro);
            while ($res = mysqli_fetch_array($q_pro)) {
            ?>
            <div class="col-sm-4" style="padding-bottom: 2%;">
              <div class="img_basket_contain">
                <img src="admin_area/product_images/<?php echo $res['product_img1'] ?>" style="height:100%;" alt="product in basket" />
              </div>
            </div>
            <div class="col-sm-6" style="padding-bottom: 2%;">
              <p><?php echo $res['product_title']?></p>
              <!-- <div class="single_pc nav_bas_cl">
                <a href="#"><span class="c_black"></span></a>
                <a href="#"><span class="c_brown"></span></a>
                <a href="#"><span class="c_golden"></span></a>
              </div> -->
              <!-- nav_basket_price -->
              <div class="single_pc nav_bas_cl"><p>PRICE: RS. <?php echo $res['product_price']?>/-</p></div>
            </div>
            <div class="col-sm-2">
            <div style="font-size: 30px; right: 5px; cursor: pointer;">
                <a style="text-decoration:none;" href="delete_basket_item.php?product_id=<?php echo $row['product_id']?>"><i class="pe-7s-less"></i></a>
            </div>  
            </div>
            <?php } ?>
            <?php } ?>
          </div>
          <hr />
          
        </div>
            
        <div>

          <a href="check_out.php" class="btn btn-default baskt_btn" role="button">GO TO BASKET</a>


        </div>
      </div>
    </div>