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
	$shipingRateRes = $db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();

	$shiping_rate = $finalPrice ='';

	if (substr($_POST['pickup_pincode'], 0, 3) == substr($_POST['drop_pincode'], 0, 3)) 
	{
		$shiping_rate = $shipingRateRes['within_city'];
	}
	if (substr($_POST['pickup_pincode'], 0, 3) !== substr($_POST['drop_pincode'], 0, 3)) 
	{
		$shiping_rate = $shipingRateRes['within_zone'];
	}
	if (substr($_POST['pickup_pincode'], 0, 1) !== substr($_POST['drop_pincode'], 0, 1)) 
	{
		$shiping_rate = $shipingRateRes['rest_of_india'];
	}
		$rate = $_POST['package_weight']/0.5;
		
		$shiping_rate_price = $shiping_rate * $rate; 

		if ($_POST['payment_mode'] == 'cod') 
		{
			$finalPrice = $shiping_rate_price + $shipingRateRes['cod'];
		}
		else
		{
			$finalPrice = $shiping_rate_price;
		}

		$html = '<label class="form-check-label label-text" for="prepaid">Total Price: '.$finalPrice.'</label>';

		$responce = array("status"=>1,"finalPrice"=> $html);
        echo json_encode($responce); exit;
} 
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>