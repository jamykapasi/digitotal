<?php
$reqAuth = true;
$module = 'shipping_rate_calculator';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Shipping Rate Calculator";

if(isset($_POST['action']) AND $_POST['action']=="shippingRateCalculate") 
{
	print_r($_REQUEST);
	exit();
} 
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>