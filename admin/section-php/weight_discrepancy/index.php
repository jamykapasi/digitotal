<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "weight_discrepancy";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {	

		$update_array = array(
	        "order_id"       => $order_id,
	        "product_name"   => $product_name,
	        "product_qty"    => $product_qty,
	        "courier_name"   => $courier_name,
	        "enterd_weight"  => $enterd_weight,
	        "charged_weight" => $charged_weight,
	        "created"        => created()
	    );

	    if($_FILES["proof"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."discrepancy_proof/";
           $target_file = $target_dir .$name."_".$_FILES["proof"]["name"];
           move_uploaded_file($_FILES["proof"]["tmp_name"], $target_file);
           $update_array['proof'] = $name."_".$_FILES["proof"]["name"];            
	    }   

		$db->update("tbl_weight_discrepancy",$update_array,array("id"=>$id));
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been updated successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}
	else
	{	
		$orderRes = $db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 AND order_id=".$_POST['order_id']." ORDER BY id DESC LIMIT 1 ")->result();
		
		$shipingRateRes = $db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 AND id=".$orderRes['courier_partner']." ORDER BY id DESC LIMIT 1 ")->result();

		$pickupAddress = $db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE 1=1 AND id=".$orderRes['pickup_address_id']." ORDER BY id DESC LIMIT 1 ")->result();
		
		$string = explode(" ",$pickupAddress['address']);
		
		$shiping_rate = $finalPrice ='';

		if (substr($orderRes['customer_pincode'], 0, 3) == substr($string[2], 0, 3)) 
		{
			$shiping_rate = $shipingRateRes['within_city'];
		}
		if (substr($orderRes['customer_pincode'], 0, 3) !== substr($string[2], 0, 3)) 
		{
			$shiping_rate = $shipingRateRes['within_zone'];
		}
		if (substr($orderRes['customer_pincode'], 0, 1) !== substr($string[2], 0, 1)) 
		{
			$shiping_rate = $shipingRateRes['rest_of_india'];
		}
	
		$rate = $_POST['charged_weight']/0.5;
		
		$shiping_rate_price = $shiping_rate * $rate;

		$userRes = $db->pdoQuery("SELECT wallet_balance FROM tbl_users WHERE 1=1 AND id=".$orderRes['user_id']." ORDER BY id DESC LIMIT 1 ")->result();
		
		$deputeChrged = $userRes['wallet_balance'] - $shiping_rate_price;

		$update_array = array(
	        "wallet_balance" => $deputeChrged,
	    );

		$db->update("tbl_users",$update_array,array('id' =>$orderRes['user_id']));

		$insert_array = array(
	        "order_id"       => $order_id,
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

		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Courier Partner has been insert successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}    
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
