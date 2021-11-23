<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "user";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);

    if ($_POST["action"] == 'addBalance') 
    {	
    
    	$balanceRes = $db->pdoQuery("SELECT wallet_balance FROM tbl_users WHERE id='".$id."' ")->result();

    	$balance = $balanceRes['wallet_balance'] + $wallet_balance;
    	
    
    	$update_array = array(
    		"wallet_balance" => $balance,
    	);

    	$db->update("tbl_users",$update_array,array('id'=>$id));

		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Balance Added successfully.'));
		redirectPage(SITE_ADM_MOD . $module);
    }
    	   
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
