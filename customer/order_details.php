<?php 
session_start();
include("includes/db.php");

if(!isset($_SESSION['customer_email'])){

    echo "<script>window.open('login.php','_self')</script>";
    
}
    
    else {
    

        $invoice_no = @$_GET['invoice_no'];
        $q = "
        select *, pending_orders.qty as product_qty
        from customer_orders 
        left join pending_orders
        on customer_orders.order_id = pending_orders.order_id 
        left join products 
        on pending_orders.product_id = products.product_id
        where customer_orders.invoice_no = $invoice_no";
        $run_q = mysqli_query($con,$q);
        while ($row = mysqli_fetch_array($run_q)) {
            $customer_id = $row['customer_id'];
            $order_status = $row['order_status'];
            $due_amount = $row['due_amount'];
            $order_date = $row['order_date'];
        }

    ?>





<!DOCTYPE html>
<html>

<head>

<title>Invoice</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="css/font-awesome.min.css" rel="stylesheet" >

<style>

    .black-background {background-color:#000000;}
    .white {color:#ffffff;}
    .example-print {
    display: none;
    }
    @page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
    @media print {
    .example-screen {
        display: none;
        }
    .example-print {
    display: block;
    }
    }

</style>

</head>

<body>

<div class="container">
    <div class="col-md-12" style="margin-bottom: 3%;">
        <div class="header_logo example-screen" align="center">
            <a href="index.php"><img src="../images/logo.jpg" alt="header logo"></a>
        </div>
        <div class="header_logo example-print" align="center">
            <img src="../images/logo.jpg" alt="header logo">
        </div>
    </div>
    <div style="margin-bottom: 5%;" class="row">
        <div class="col-md-12">
        <div class="col-md-6">
            <?php 
            $query = "select * from customers where customer_id = $customer_id";
            $run_query = mysqli_query($con,$query);
            while ($result = mysqli_fetch_array($run_query)) {
                $customer_name = $result['customer_name'];
                $customer_email = $result['customer_email'];
                $customer_city = $result['customer_city'];
                $customer_country = $result['customer_country'];
                $customer_address = $result['customer_address'];
                $customer_contact = $result['customer_contact'];


            ?>

            <h3>Customer Details</h3>
            <p>Name:   <?php echo $customer_name ?></p> 
            <p class="example-screen">Email:   <a href="mailto: <?php echo $customer_email ?>"><?php echo $customer_email ?></a></p> 
            <p class="example-print">Email:   <?php echo $customer_email ?></p> 
            <p>City:    <?php echo $customer_city ?></p> 
            <p>Country: <?php echo $customer_country ?></p> 
            <p>Address: <?php echo $customer_address ?></p> 
            <p class="example-screen">Contact: <a href="tel: <?php echo $customer_contact ?>"><?php echo $customer_contact ?></a></p> 
            <p class="example-print">Contact: <?php echo $customer_contact ?>"><?php echo $customer_contact ?></p> 
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-offset-6" style="float: right;">
                    <h4>Invoice Number: <span style="color: red;"><?php echo $invoice_no ?></span> </h4>
                </div>
                <div class="col-md-offset-6" style="float: right;">
                <?php 
                    if ($order_status == "complete") {
                        echo "<button class='btn btn-success'>PAID</button>&nbsp;";
                    }else {
                        echo "<button class='btn btn-danger'>UN-PAID</button>";
                    }
                    $sum_arr = array();
                ?>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="col-md-12">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $invoice_no = @$_GET['invoice_no'];
                    $q = "
                    select *, pending_orders.qty as product_qty
                    from customer_orders 
                    left join pending_orders
                    on customer_orders.order_id = pending_orders.order_id 
                    left join products 
                    on pending_orders.product_id = products.product_id
                    where customer_orders.invoice_no = $invoice_no";
                    $run_q = mysqli_query($con,$q);
                    $total = 0;
                    while ($row = mysqli_fetch_array($run_q)) { 
                        $product_title = $row['product_title'];
                        $product_price = $row['product_price'];
                        $product_qty = $row['product_qty'];
                        $per_product = ($product_price * $product_qty);
                        ?>
                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><?php echo $product_price ?></td>
                    <td><?php echo $product_qty ?></td>
                    <td><?php 
                        $total += $per_product;
                        array_push($sum_arr, $per_product);
                        echo  ($per_product );
                        ?></td>
                </tr>   
                <?php } ?>
                <!-- <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                    <h4>Discount : <?php echo $due_amount ?></h4>
                    </td>
                </tr> -->
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <?php
                    $paid = array_sum($sum_arr);
                    ?>
                    <td><h4>Grand Total : <?php echo $paid ?></h4></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12" style="margin-top: 5%;">
        <div class="col-md-4">
            <h4>Order Date : <?php $order_date = date_create($order_date); echo date_format($order_date,"d-M-Y"); ?></h4>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 example-screen">
            <a href="myaccount.php?my_orders" class="btn btn-light black-background white" style="float: right;">VIEW OTHERS</a>
        </div>
        <div class="col-md-6 example-screen">
            <button type="button" onclick="window.print();return false;" class="btn btn-light black-background white" style="float: left;">PRINT</button>
        </div>
    </div>
</div>
    
    <?php }?>

<script src="js/jquery.min.js"></script>

<script src="js/bootstrap.min.js"></script>


</body>


</html>

    <?php }?>