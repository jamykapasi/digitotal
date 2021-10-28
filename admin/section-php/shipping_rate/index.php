<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "shipping_rate";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {
		$update_array = array(
			"pincode"         => $pincode,
	        "courier_partner" => $courier_partner,
	        "within_city"     => $within_city,
	        "within_zone"     =>$within_zone,
	        "metros"          =>$metros,
	        "rest_of_india"   =>$rest_of_india,
	        "special_zone"    =>$special_zone,
	        "cod"             =>$cod,
	        "created"         =>created()
	    );
	    if($_FILES["courier_logo"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."courier_logo/";
           $target_file = $target_dir .$name."_".$_FILES["courier_logo"]["name"];
           move_uploaded_file($_FILES["courier_logo"]["tmp_name"], $target_file);
           $update_array['courier_logo'] = $name."_".$_FILES["courier_logo"]["name"];            
	    }         
		$db->update("tbl_shipping_rate",$update_array,array("id"=>$id));
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been updated successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}
	else
	{
		$insert_array = array(
			"pincode"         => $pincode,
	        "courier_partner" => $courier_partner,
	        "within_city"     => $within_city,
	        "within_zone"     =>$within_zone,
	        "metros"          =>$metros,
	        "rest_of_india"   =>$rest_of_india,
	        "special_zone"    =>$special_zone,
	        "cod"             =>$cod,
	        "created"         =>created()
	    );		
		if($_FILES["courier_logo"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."courier_logo/";
           $target_file = $target_dir .$name."_".$_FILES["courier_logo"]["name"];
           move_uploaded_file($_FILES["courier_logo"]["tmp_name"], $target_file);
           $insert_array['courier_logo'] = $name."_".$_FILES["courier_logo"]["name"];            
	    }	
	    $shiping_rate = $db->insert("tbl_shipping_rate",$insert_array)->getlastInsertId();
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been insert successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}    
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
