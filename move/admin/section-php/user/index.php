<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "user";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {
		$update_array = array(
			"first_name"  => $first_name,
	        "last_name"   => $last_name,
	        "email"       => $email,
	        "password"=>$password,
	        "created"      =>created(),
	        "mobile_number"=>$mobile_number,
	        "otp"=>$otp,
	        "verify_otp"=>$verify_otp,
	    );         
		$db->update("tbl_users",$update_array,array("id"=>$id));
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been updated successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}
	else
	{
		$insert_array = array(
			"first_name" => $first_name,
	        "last_name"  => $last_name,
	        "email"      => $email,
	        "password"=>$password,
	        "created"    => created(),
	        "mobile_number"=>$mobile_number,
	         "otp"=>$otp,
	        "verify_otp"=>$verify_otp,
	    );		
		// if($_FILES["profile_picture"]["name"] != "")
	 	// {    
	    //        $name = time();
	    //        $target_dir = DIR_UPD."profile/";
	    //        $target_file = $target_dir .$name."_".$_FILES["profile_picture"]["name"];
	    //        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
	    //        $insert_array['image'] = $name."_".$_FILES["profile_picture"]["name"];            
	    // }	
	    $employee_id = $db->insert("tbl_users",$insert_array)->getlastInsertId();
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been insert successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}    
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
