<?php
session_start();

include("../includes/db.php");

include("../functions/functions.php");

$session_email = $_SESSION['customer_email'];

$select_customer = "select * from customers where customer_email='$session_email'";

$run_customer = mysqli_query($con,$select_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_contact = $row_customer['customer_contact'];

$pro_arr = array();
          $ip_add = getRealUserIp();
          $select_cart = "select * from cart where ip_add='$ip_add'";
          $query = mysqli_query($con,$select_cart);
          $count = mysqli_num_rows($query);
          while($row = mysqli_fetch_array($query)) {
			  array_push($pro_arr, $row['product_id']);
		  }


if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') == 0){
	//Request hash
	$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';	
	if(strcasecmp($contentType, 'application/json') == 0){
		$data = json_decode(file_get_contents('php://input'));
		$hash=hash('sha512', $data->key.'|'.$data->txnid.'|'.$data->amount.'|'.$data->pinfo.'|'.$data->fname.'|'.$data->email.'|||||'.$data->udf5.'||||||'.$data->salt);
		$json=array();
		$json['success'] = $hash;
    	echo json_encode($json);
	
	}
	exit(0);
}
 
function getCallbackUrl()
{
	$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	return $protocol . $_SERVER['HTTP_HOST'] . '/mm/payu/response.php';
	// . $_SERVER['REQUEST_URI']
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PayUmoney BOLT PHP7 Kit</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- this meta viewport is required for BOLT //-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" >
<!-- BOLT Sandbox/test //-->
<script id="bolt" src="https://sboxcheckout-static.citruspay.com/bolt/run/bolt.min.js" bolt-
color="e34524" bolt-logo=".. /images/8.png"></script>
<!-- http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png -->
<!-- BOLT Production/Live //-->
<!--// script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="http://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script //-->

</head>
<style type="text/css">
	.main {
		margin-left:30px;
		font-family:Verdana, Geneva, sans-serif, serif;
	}
	.text {
		float:left;
		width:180px;
	}
	.dv {
		margin-bottom:5px;
	}
</style>
<body>
<div class="main">
	<div>
    	<!-- <img src="images/payumoney.png" /> -->
    </div>
    <div>
    	<!-- <h3>PHP7 BOLT Kit</h3> -->
    </div>
	<form action="#" id="payment_form">
    <input type="hidden" id="udf5" name="udf5" value="BOLT_KIT_PHP7" />
    <input type="hidden" id="surl" name="surl" value="<?php echo getCallbackUrl(); ?>" />
    <div class="dv">
    <!-- <span class="hidden"><label>Merchant Key:</label></span> -->
    <span><input type="hidden" id="key" name="key" placeholder="Merchant Key" value="cCQrwtq3" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Merchant Salt:</label></span> -->
    <span><input type="hidden" id="salt" name="salt" placeholder="Merchant Salt" value="eqBqyviKGO" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Transaction/Order ID:</label></span> -->
    <span><input type="hidden" id="txnid" name="txnid" placeholder="Transaction ID" value="<?php echo  "Txn" . rand(10000,99999999)?>" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Amount:</label></span> -->
    <span><input type="hidden" id="amount" name="amount" placeholder="Amount" value="<?php echo (int)$_GET['php']?>" /></span>    
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Product Info:</label></span> -->
    <span><input type="hidden" id="pinfo" name="pinfo" placeholder="Product Info" value="<?php echo implode(", ",$pro_arr); ?>" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>First Name:</label></span> -->
    <span><input type="hidden" id="fname" name="fname" placeholder="First Name" value="<?php echo $customer_name ?>" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Email ID:</label></span> -->
    <span><input type="hidden" id="email" name="email" placeholder="Email ID" value="<?php echo $customer_email ?>" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Mobile/Cell Number:</label></span> -->
    <span><input type="hidden" id="mobile" name="mobile" placeholder="Mobile/Cell Number" value="<?php echo $customer_contact ?>" /></span>
    </div>
    
    <div class="dv">
    <!-- <span class="hidden"><label>Hash:</label></span> -->
    <span><input type="hidden" id="hash" name="hash" placeholder="Hash" value="" /></span>
    </div>
    
    
    <div style="cursor: pointer; margin-top: 25%; margin-left: 43%;">
		<!-- <input type="submit" value="" onclick="launchBOLT(); return false;" /> -->
		<img src="images/payumoney.png" alt="" onclick="launchBOLT();">
	</div>
	</form>
</div>
<script type="text/javascript"><!--
$('#payment_form').load('keyup blur', function(){
	$.ajax({
          url: 'index.php',
          type: 'post',
          data: JSON.stringify({ 
            key: $('#key').val(),
			salt: $('#salt').val(),
			txnid: $('#txnid').val(),
			amount: $('#amount').val(),
		    pinfo: $('#pinfo').val(),
            fname: $('#fname').val(),
			email: $('#email').val(),
			mobile: $('#mobile').val(),
			udf5: $('#udf5').val()
          }),
		  contentType: "application/json",
          dataType: 'json',
          success: function(json) {
            if (json['error']) {
			 $('#alertinfo').html('<i class="fa fa-info-circle"></i>'+json['error']);
            }
			else if (json['success']) {	
				$('#hash').val(json['success']);
            }
          }
        }); 
});
//-->
</script>
<script type="text/javascript"><!--
function launchBOLT()
{
	bolt.launch({
	key: $('#key').val(),
	txnid: $('#txnid').val(), 
	hash: $('#hash').val(),
	amount: $('#amount').val(),
	firstname: $('#fname').val(),
	email: $('#email').val(),
	phone: $('#mobile').val(),
	productinfo: $('#pinfo').val(),
	udf5: $('#udf5').val(),
	surl : $('#surl').val(),
	furl: $('#surl').val(),
	mode: 'dropout'	
},{ responseHandler: function(BOLT){
	console.log( BOLT.response.txnStatus );		
	if(BOLT.response.txnStatus != 'CANCEL')
	{
		//Salt is passd here for demo purpose only. For practical use keep salt at server side only.
		var fr = '<form action=\"'+$('#surl').val()+'\" method=\"post\">' +
		'<input type=\"hidden\" name=\"key\" value=\"'+BOLT.response.key+'\" />' +
		'<input type=\"hidden\" name=\"salt\" value=\"'+$('#salt').val()+'\" />' +
		'<input type=\"hidden\" name=\"txnid\" value=\"'+BOLT.response.txnid+'\" />' +
		'<input type=\"hidden\" name=\"amount\" value=\"'+BOLT.response.amount+'\" />' +
		'<input type=\"hidden\" name=\"productinfo\" value=\"'+BOLT.response.productinfo+'\" />' +
		'<input type=\"hidden\" name=\"firstname\" value=\"'+BOLT.response.firstname+'\" />' +
		'<input type=\"hidden\" name=\"email\" value=\"'+BOLT.response.email+'\" />' +
		'<input type=\"hidden\" name=\"udf5\" value=\"'+BOLT.response.udf5+'\" />' +
		'<input type=\"hidden\" name=\"mihpayid\" value=\"'+BOLT.response.mihpayid+'\" />' +
		'<input type=\"hidden\" name=\"status\" value=\"'+BOLT.response.status+'\" />' +
		'<input type=\"hidden\" name=\"hash\" value=\"'+BOLT.response.hash+'\" />' +
		'</form>';
		var form = jQuery(fr);
		jQuery('body').append(form);								
		form.submit();
	}
},
	catchException: function(BOLT){
 		alert( BOLT.message );
	}
});
}
//--
</script>	

</body>
</html>
	
