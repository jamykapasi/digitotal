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
	$shipingRateRes = $db->pdoQuery("SELECT rate.*,pincode.courier_partner_id,pincode 
	FROM tbl_shipping_rate as rate 
	LEFT JOIN tbl_courier_pincode as pincode ON pincode.courier_partner_id = rate.id
	WHERE pincode.pincode= ".$_POST['pickup_pincode']." ORDER BY id DESC ")->results();
	

	if (count($shipingRateRes) > 0) 
	{
		$shiping_rate = $finalPrice = $shippingTable = $withinCity = $withinZone = $RestOfIndia= $shippingTableVal ='';

		if (substr($_POST['pickup_pincode'], 0, 3) == substr($_POST['drop_pincode'], 0, 3)) 
		{
			$shiping_rate = $shipingRateRes[0]['within_city'];
		}
		if (substr($_POST['pickup_pincode'], 0, 3) !== substr($_POST['drop_pincode'], 0, 3)) 
		{
			$shiping_rate = $shipingRateRes[0]['within_zone'];
		}
		if (substr($_POST['pickup_pincode'], 0, 1) !== substr($_POST['drop_pincode'], 0, 1)) 
		{
			$shiping_rate = $shipingRateRes[0]['rest_of_india'];
		}
			$rate = $_POST['package_weight']/0.5;
			
			$shiping_rate_price = $shiping_rate * $rate; 

			
			if ($_POST['payment_mode'] == 'cod') 
			{
				$finalPrice = $shiping_rate_price + $shipingRateRes[0]['cod'];
			}
			else
			{
				$finalPrice = $shiping_rate_price;
			}

			foreach ($shipingRateRes as $key => $value) {
				
				if ($shiping_rate == $shipingRateRes[0]['within_city']) 
				{
					$withinCity .='<tbody>
										<td class="tg-jgah">'.$value['courier_partner'].'</td>
										<td class="tg-jgah">₹'.$value['within_city'].'</td>
									</tbody>';
				}
				if ($shiping_rate == $shipingRateRes[0]['within_zone']) 
				{
					$withinZone .='<tbody>
										<td class="tg-jgah">'.$value['courier_partner'].'</td>
										<td class="tg-jgah">₹'.$value['within_zone'].'</td>
									</tbody>';
				}
				if ($shiping_rate == $shipingRateRes[0]['rest_of_india']) 
				{
					$RestOfIndia .='<tbody>
										<td class="tg-jgah">'.$value['courier_partner'].'</td>
										<td class="tg-jgah">₹'.$value['rest_of_india'].'</td>
									</tbody>';
				}
				
			}

			if ($shiping_rate == $shipingRateRes[0]['within_city']) 
			{
				$shippingTable ='<table class="tg ms-3 mt-3">
				                <thead>
				                  <tr>
				                  	<th class="tg-9sut">Courier Partner</th>
				                    <th class="tg-9sut">WITHIN CITY</th>
				                  </tr>
				                </thead>
				                '.$withinCity.' ';
			}
			if ($shiping_rate == $shipingRateRes[0]['within_zone']) 
			{
				$shippingTable ='<table class="tg ms-3 mt-3">
				                <thead>
				                  <tr>
				                  	<th class="tg-9sut">Courier Partner </th>
				                    <th class="tg-9sut">WITHIN ZONE</th>
				                  </tr>
				                </thead>
				                '.$withinZone.' ';
			}
			if ($shiping_rate == $shipingRateRes[0]['rest_of_india']) 
			{
				$shippingTable ='<table class="tg ms-3 mt-3">
				                <thead>
				                  <tr>
				                    <th class="tg-9sut">Courier Partner </th>
				                    <th class="tg-9sut">REST OF INDIA</th>
				                  </tr>
				                </thead>
				                '.$RestOfIndia.' ';
			}

			
			$html = '<label class="form-check-label label-text" for="prepaid">Total Price: '.$finalPrice.'</label>';


			$responce = array("status"=>1,"finalPrice"=> $html,"shippingTable"=>$shippingTable);
	        echo json_encode($responce); exit;
	}
	else
	{
		$responce = array("status"=>0,"error"=> "No service available this area");
        echo json_encode($responce); exit;
	}	
} 

if(isset($_POST['action']) AND $_POST['action']=="downloadPincode") 
{	
	if (isset($_POST['dwnpincode']) AND $_POST['dwnpincode'] =="pincodeDownload") 
	{
		$pincodeRes = $db->pdoQuery("SELECT id,pincode FROM tbl_courier_pincode WHERE pincode=".$_POST['pickup_pincode']." ")->results();

		if (count($pincodeRes) > 0) 
		{
			$filename = 'pincode_'.date('Ymd').'.csv';

			$file = fopen('php://output', 'w');

			$header = array("No","Pincode",);
			fputcsv($file, $header);

			foreach ($pincodeRes as $key=>$line){
			 fputcsv($file,$line);
			}

			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			fclose($file);
			exit;	
		}
		else
		{
			$_SESSION["toastr_message"] = disMessage(array('type' => 'war', 'var' => 'No service available'));

			redirectPage(SITE_URL."shipping_rate_calculator");
		}	
	}
}

else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>