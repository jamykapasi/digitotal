<?php
$reqAuth = true;
$module = 'create_order';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Create Order";

if(isset($_POST['action']) AND $_POST['action']=="shippingRateCalculate") 
{	

	$shipingRateRes = $db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 AND id='".$_POST['courier_partner']."' ")->result();

	$pickupAddress = $db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE 1=1 AND id='".$_POST['pickup_address']."' ")->result();

	$shiping_rate = $finalPrice ='';

	if (substr($_POST['customer_pincode'], 0, 3) == substr($pickupAddress['pincode'], 0, 3)) 
	{
		$shiping_rate = $shipingRateRes['within_city'];

	}
	if (substr($_POST['customer_pincode'], 0, 3) !== substr($pickupAddress['pincode'], 0, 3)) 
	{
		$shiping_rate = $shipingRateRes['within_zone'];

	}
	if (substr($_POST['customer_pincode'], 0, 1) !== substr($pickupAddress['pincode'], 0, 1)) 
	{
		$shiping_rate = $shipingRateRes['rest_of_india'];
	}
	
		$rate = $_POST['ship_pack_weight']/0.5;
		
		$shiping_rate_price = $shiping_rate * $rate; 

		if ($_POST['payment_method'] == 'COD') 
		{
			$ratePrice = $shiping_rate_price + $shipingRateRes['cod'];
		}
		else
		{
			$ratePrice = $shiping_rate_price;
		}

		$unitPrice = $_POST['product_price'] * $_POST['product_qty'];

		$codCharges = $shipingRateRes['cod'];

		$totalPrice = $ratePrice + $unitPrice;
		
		$responce = array("codCharges" =>$codCharges,"unitPrice"=>$unitPrice,"rateCharges" =>$ratePrice,"totalPrice"=> $totalPrice,"shipingRatePrice" =>$shiping_rate_price,"pickup_address_id"=>$_POST['pickup_address']);
        echo json_encode($responce); exit;
}

if(isset($_POST['action']) AND $_POST['action']=="submitOrderForm") 
{
	extract($_POST);

		$cod = ($product_price / 100) * 2;

		if ($product_price <= 5000) 
		{	
			if ($cod > $cod_charges) 
			{
				$cod_charges = $cod;
			}
			else
			{
				$cod_charges;
			}
		}
		else
		{
			$cod_charges = "0.00";
		}

		$total_payable = $cod_charges + $unit_price;
		
		$userBalance = $db->pdoQuery("SELECT wallet_balance FROM tbl_users WHERE id='".$sessUserId."' " )->result();

		$wallet_balance = $userBalance['wallet_balance'] - $shippment_charge;

		$update_array = array(
			"wallet_balance" => $wallet_balance,
		);

		$db->update("tbl_users",$update_array,array("id"=>$sessUserId));

		$name = time();
	    $target_dir = DIR_UPD."Product_image/";
	    $target_file = $target_dir .$name."_".$_FILES["product_image"]["name"];
	    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file);

	    
		$insert_array = array(
			"user_id"		   => $sessUserId,	
			"customer_name"    => $customer_name,
		    "customer_phone"   => $customer_phone,
		    "customer_email"   => $customer_email,
		    "customer_address" => $customer_address,
		    "customer_pincode" => $customer_pincode,
		    "customer_city"    => $customer_city,
		    "customer_state"   => $customer_state,
		    "product_name"     => $product_name,
		    "product_price"    => $product_price,
		    "product_qty"      => $product_qty,
		    "product_sku"      => $product_sku,
		    "product_category_id" => $product_category_id,
		    "product_image" 	  =>$name."_".$_FILES["product_image"]["name"],
		    "payment_method"      => $payment_method,
		    "pickup_address_id"   => $pickup_address_id,
		    "ship_pack_weight"    => $ship_pack_weight,
		    "shippment_charge"	  => $shippment_charge,
		    "cod_charges"		  => $cod_charges,
		    "unit_price"		  => $unit_price,
		    "total_payable"		  => $total_payable,	
		    "total_price"		  => $total_price,	
		    "volumetric_cm_1"     => $volumetric_cm_1,
		    "volumetric_cm_2"     => $volumetric_cm_2,
		    "volumetric_cm_3"     => $volumetric_cm_3,
		    "courier_partner"     => $courier_partner,
		    "pickup_date"         => date('Y-m-d', strtotime($pickup_date)),
		    "created"             => created(),
		);

		echo "<pre>";
		print_r($insert_array);
		exit();
		$last_emp_code = $db->pdoQuery("SELECT order_id FROM tbl_order WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();
	  	
	  	$last_id = $db->insert("tbl_order",$insert_array)->getLastInsertId();

		$order_id = $last_emp_code['order_id'];
		$new_order_id = str_pad($order_id + 1, 5, 0, STR_PAD_LEFT);
			
		$db->update("tbl_order",array("order_id" => $new_order_id),array("id"=>$last_id));
				
		$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Order created successfully."));
		
		redirectPage(SITE_URL."manage_order");
}

if(isset($_POST['action']) AND $_POST['action']=="AddNewAddress") 
{
	extract($_POST);

	$insert_array = array(
		"user_id"	 => $sessUserId,	
		"name"    	 => $name,
	    "phone_no"   => $phone_no,
	    "flat_no"    => $flat_no,
	    "locality"   => $locality,
	    "landmark"   => $landmark,
	    "pincode"    => $pincode,
	    "area"       => $area,
	    "created"    => created(),
	);

	if (isset($_POST['default_address'])) 
	{
		$insert_array['default_address'] = 'y';
	}
	
	$last_id = $db->insert("tbl_pickup_address",$insert_array)->getLastInsertId();

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "New Adress created successfully."));
	
	redirectPage(SITE_URL."create_order");		
}

if(isset($_POST['action']) AND $_POST['action']=="viewAddress") 
{
	extract($_POST);

	$addressRes = $db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE id=".$_POST['id']." ")->result();
	
	$responce = array(
		'address_id'      => $addressRes['id'],
		'name'            => $addressRes['name'],
		'phone_no'        => $addressRes['phone_no'],
		'flat_no'         => $addressRes['flat_no'],
		'locality'        => $addressRes['locality'],
		'landmark'        => $addressRes['landmark'],
		'pincode'         => $addressRes['pincode'],
		'area'   		  => $addressRes['area'],
		'default_address' => $addressRes['default_address'],
	);

	echo json_encode($responce); exit;	
}

if(isset($_POST['action']) AND $_POST['action']=="editAddress") 
{
	extract($_POST);

	$update_array = array(
		"user_id"	 => $sessUserId,	
		"name"    	 => $name,
	    "phone_no"   => $phone_no,
	    "flat_no"    => $flat_no,
	    "locality"   => $locality,
	    "landmark"   => $landmark,
	    "pincode"    => $pincode,
	    "area"       => $area,
	);

	if (isset($_POST['default_address'])) 
	{
		$insert_array['default_address'] = 'y';
	}

	$db->update("tbl_pickup_address",$update_array,array("id"=>$_POST['id']));

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Adress update successfully."));
	
	redirectPage(SITE_URL."create_order");		
}

if(isset($_POST['action']) AND $_POST['action']=="deleteAddress") 
{
	extract($_POST);
	
	$db->delete("tbl_pickup_address",array("id"=>$_POST['id']));
	
	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Order Delete Successfully."));
    
    $responce = array('status'=> 1);
    echo json_encode($responce); exit;
}

if(isset($_POST['upload'])) 
{	
	$filename = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0) 
	{
		$file = fopen($filename, "r");

		while (($column  = fgetcsv($file, 10000, ",")) !== FALSE) 
	    {   
	        $customer_name = "";
	        if (isset($column[0])) {
	            $customer_name = $column[0];
	        }
	        $customer_phone = "";
	        if (isset($column[1])) {
	            $customer_phone = $column[1];
	        }
	        $customer_email = "";
	        if (isset($column[2])) {
	            $customer_email = $column[2];
	        }
	        $customer_address = "";
	        if (isset($column[3])) {
	            $customer_address = $column[3];
	        }
	        $customer_pincode = "";
	        if (isset($column[4])) {
	            $customer_pincode = $column[4];
	        } 
	        $customer_city = "";
	        if (isset($column[5])) {
	            $customer_city = $column[5];
	        }
	        $customer_state = "";
	        if (isset($column[6])) {
	            $customer_state = $column[6];
	        }
	        $product_name = "";
	        if (isset($column[7])) {
	            $product_name = $column[7];
	        }
	        $product_price = "";
	        if (isset($column[8])) {
	            $product_price = $column[8];
	        }
	        $product_qty = "";
	        if (isset($column[9])) {
	            $product_qty = $column[9];
	        }
	        $product_sku = "";
	        if (isset($column[10])) {
	            $product_sku = $column[10];
	        } 
	        $product_category_id = "";
	        if (isset($column[11])) {
	            $product_category_id = $column[11];
	        }
	        $payment_method = "";
	        if (isset($column[12])) {
	            $payment_method = $column[12];
	        }
	        $pickup_address_id = "";
	        if (isset($column[13])) {
	            $pickup_address_id = $column[13];
	        }
	        $ship_pack_weight = "";
	        if (isset($column[14])) {
	            $ship_pack_weight = $column[14];
	        } 
	        $volumetric_cm_1 = "";
	        if (isset($column[15])) {
	            $volumetric_cm_1 = $column[15];
	        }
	        $volumetric_cm_2 = "";
	        if (isset($column[16])) {
	            $volumetric_cm_2 = $column[16];
	        } 
	        $volumetric_cm_3 = "";
	        if (isset($column[17])) {
	            $volumetric_cm_3 = $column[17];
	        }
	        $courier_partner = "";
	        if (isset($column[18])) {
	            $courier_partner = $column[18];
	        } 
	        $pickup_date = "";
	        if (isset($column[19])) {
	            $pickup_date = $column[19];
	        }
	        
	        $shipingRateRes = $db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();

	        $pickupAddress = $db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE 1=1 AND id=".$pickup_address_id." ORDER BY id DESC LIMIT 1 ")->result();	

	        $string = explode(" ",$pickupAddress['address']);

	        $shiping_rate = $total_price ='';

	        if (substr($customer_pincode, 0, 3) == substr($string[2], 0, 3)) 
			{
				$shiping_rate = $shipingRateRes['within_city'];
			}
			if (substr($customer_pincode, 0, 3) !== substr($string[2], 0, 3)) 
			{
				$shiping_rate = $shipingRateRes['within_zone'];
			}
			if (substr($customer_pincode, 0, 1) !== substr($string[2], 0, 1)) 
			{
				$shiping_rate = $shipingRateRes['rest_of_india'];
			}

			$rate = $ship_pack_weight/0.5;
		
			$shippment_charge = $shiping_rate * $rate; 

			$productTotal = $product_price * $product_qty;

			if ($payment_method == 'c') 
			{
				$cod_charges = $shipingRateRes['cod'];

				$total_price = $shippment_charge + $cod_charges + $productTotal;	
			}else
			{
				$cod_charges = "0.00";
				
				$total_price = $shippment_charge + $productTotal;
			}

	        $insert_array = array(
	        	"user_id"		   => $sessUserId,
		        "customer_name"    => $customer_name,
			    "customer_phone"   => $customer_phone,
			    "customer_email"   => $customer_email,
			    "customer_address" => $customer_address,
			    "customer_pincode" => $customer_pincode,
			    "customer_city"    => $customer_city,
			    "customer_state"   => $customer_state,
			    "product_name"     => $product_name,
			    "product_price"    => $product_price,
			    "product_qty"      => $product_qty,
			    "product_sku"      => $product_sku,
			    "product_category_id" => $product_category_id,
			    "payment_method"      => $payment_method,
			    "pickup_address_id"   => $pickup_address_id,
			    "ship_pack_weight"    => $ship_pack_weight,
			    "shippment_charge"	  => $shippment_charge,
			    "cod_charges"		  => $cod_charges,
			    "total_price"		  => $total_price,			
			    "volumetric_cm_1"     => $volumetric_cm_1,
			    "volumetric_cm_2"     => $volumetric_cm_2,
			    "volumetric_cm_3"     => $volumetric_cm_3,
			    "courier_partner"     => $courier_partner,
			    "pickup_date"         => $pickup_date,
		        "created"             => created(),
		    ); 

		    $last_emp_code = $db->pdoQuery("SELECT order_id FROM tbl_order WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();
		  	
		  	$last_id = $db->insert("tbl_order",$insert_array)->getLastInsertId();
		  	
			$order_id = $last_emp_code['order_id'];
			$new_order_id = str_pad($order_id + 1, 5, 0, STR_PAD_LEFT);
				
			$db->update("tbl_order",array("order_id" => $new_order_id),array("id"=>$last_id)); 
	    }

	    $msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Order created successfully."));
			
		redirectPage(SITE_URL."manage_order");
	}
}  
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>