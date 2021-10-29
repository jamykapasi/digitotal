<?php
$reqAuth = true;
$module = 'courier_partner_priority';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Courier Partner";

if(isset($_POST['action']) AND $_POST['action']=="setPriority") 
{
	extract($_POST);

	$update_array = array(
		"courier_priority"    => $priority,
    );
       
	$db->update("tbl_users",$update_array,array("id"=>$sessUserId));
	
	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "priority Set "));

	redirectPage(SITE_URL."manage_order");
} 
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>