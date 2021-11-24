<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "manage_order";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
   	
   	if (isset($_POST["action"]) && $_POST["action"] == "addWeightDiscrepancy") 
   	{	
   		$orderRes = $db->pdoQuery("SELECT * FROM tbl_order WHERE id='".$_POST['id']."' ")->result();

		$shipingRateRes = $db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE id='".$orderRes['courier_partner']."' ")->result();

		$pickupAddress = $db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE id='".$orderRes['pickup_address_id']."' ")->result();
		
		$shiping_rate = $finalPrice ='';

		if (substr($orderRes['customer_pincode'], 0, 3) == substr($pickupAddress['pincode'], 0, 3)) 
		{	
			$shiping_rate = $shipingRateRes['within_city'];
		}
		if (substr($orderRes['customer_pincode'], 0, 3) !== substr($pickupAddress['pincode'], 0, 3)) 
		{
			$shiping_rate = $shipingRateRes['within_zone'];
		}
		if (substr($orderRes['customer_pincode'], 0, 1) !== substr($pickupAddress['pincode'], 0, 1)) 
		{
			$shiping_rate = $shipingRateRes['rest_of_india'];
		}
	
		$rate = $_POST['charged_weight']/0.5;
		
		$shiping_rate_price = $shiping_rate * $rate;

		$update_depute = array(
			"weight_dispute_charge" => $shiping_rate_price,
		);

		$db->update("tbl_order",$update_depute,array('id'=>$_POST['id']));

		$userRes = $db->pdoQuery("SELECT wallet_balance FROM tbl_users WHERE id='".$orderRes['user_id']."' ")->result();
		
		$deputeChrged = $userRes['wallet_balance'] - $shiping_rate_price;

		$update_array = array(
	        "wallet_balance" => $deputeChrged,
	    );

		$db->update("tbl_users",$update_array,array('id' =>$orderRes['user_id']));

		$insert_array = array(
	        "order_id"       => $orderRes['order_id'],
	        "product_name"   => $product_name,
	        "product_qty"    => $product_qty,
	        "courier_name"   => $courier_name,
	        "enterd_weight"  => $enterd_weight,
	        "charged_weight" => $charged_weight,
	        "depute_charge"  => $shiping_rate_price,
	        "order_date_time" =>$orderRes['created'],
	        "created"        => created()
	    );		
	    
		if($_FILES["proof"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."discrepancy_proof/";
           $target_file = $target_dir .$name."_".$_FILES["proof"]["name"];
           move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file);
           $insert_array['proof'] = $name."_".$_FILES["proof"]["name"];           
	    }  

	    $last_id = $db->insert("tbl_weight_discrepancy",$insert_array)->getlastInsertId();

		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Weight Discrepancy  has been added successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
   	}    
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
