<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "manage_order";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {
		
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been updated successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}
	else
	{
		
		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been insert successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}    
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
