<?php
$reqAuth = false;
$module = 'home';
require_once "../../include/config.php";

extract($_REQUEST);

if($sessUserId == ""){
	redirectPage(SITE_URL);
}

//$styles = array(array("dashboard.css",SITE_CSS));

$tab_title =  SITE_NAME;

if(isset($_POST['action']) AND $_POST['action']=="payment")	
{
	//echo '<pre>';print_r($_POST);exit;

	$userRes = $db->pdoQuery("SELECT id,first_name,last_name,email FROM tbl_users WHERE id=".$sessUserId."")->result();
    //print_r($userRes);exit;

	$url_razorpay = SITE_URL.'include/razorpay/pay.php';
	$url_razorpay.="?amount=".$_POST['amount'];
	$url_razorpay.="&name=".$userRes['first_name'].'%20'.$userRes['last_name'];
	$url_razorpay.="&description=Recharge";
	$url_razorpay.="&email=".$userRes['email'];
	$url_razorpay.="&userid=".$sessUserId;

	redirectPage($url_razorpay);
}

$pageContent = $objHome->getPageContent();
require_once DIR_TMPL . "replace.php";
?>