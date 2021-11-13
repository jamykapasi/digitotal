<?php
$reqAuth = false;
$module = 'home';
require_once "../../include/config.php";

require '../../include/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;

extract($_REQUEST);

if($sessUserId == ""){
	redirectPage(SITE_URL);
}

//$styles = array(array("dashboard.css",SITE_CSS));

$tab_title =  SITE_NAME;

if(isset($_POST['action']) AND $_POST['action']=="payment")	
{
	extract($_POST);

	$userRes = $db->pdoQuery("SELECT * FROM tbl_users WHERE id='".$sessUserId."' ")->result();

	// echo "<pre>";
	// print_r($userRes);
	// exit();

	$api = new Api(KEY_ID,KEY_SECRET);

	$amount   = $_POST['amount'];
	// $customer = $_POST['customername'];
	// $email    = $_POST['email'];
	// $contact  = $_POST['phone'];

	$orderData = [
    	'receipt'  => 3456,
    	'amount'   => $amount * 100, // 2000 rupees in paise
    	'currency' => 'INR',
    	'payment_capture' => 1, // auto capture
	];

	$razorpayOrder = $api->order->create($orderData);

	$razorpayOrderId = $razorpayOrder['id'];

	$_SESSION['razorpay_order_id'] = $razorpayOrderId;

	$displayAmount = $amount = $orderData['amount'];
	
	$displayCurrency = DISPLAY_CURRENCY;

	echo "<pre>";
	print_r($displayCurrency);
	exit();

	if ($displayCurrency !== 'INR') {

	    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
	    $exchange = json_decode(file_get_contents($url), true);

	    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
	}

	$data = [
	    "key" => KEY_ID,
	    "amount" => $amount,
	    "name" => "DIGITOTAL",
	    "description" => "Demo",
	    "image" => "https://s29.postimg.org/r6dj1g85z/daft_punk.jpg",
	    "prefill" => [
	        "name" => $customer,
	        "email" => $email,
	        "contact" => $contact,
	    ],
	    "notes" => [
	        "address" => "Hello World",
	        "merchant_order_id" => "12312321",
	    ],
	    "theme" => [
	        "color" => "#F37254",
	    ],
	    "order_id" => $razorpayOrderId,
	];

	if (DISPLAY_CURRENCY !== 'INR') {
	    $data['display_currency'] = $displayCurrency;
	    $data['display_amount'] = $displayAmount;
	}

	$json = json_encode($data);
}

$pageContent = $objHome->getPageContent();
require_once DIR_TMPL . "replace.php";
?>