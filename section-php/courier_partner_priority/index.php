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

if(isset($_POST['action']) AND $_POST['action']=="prioritySet") 
{
	extract($_POST);

	$update_array = array(
		"courier_priority" => $inlineRadioOptions,
	);

	$db->update("tbl_users",$update_array,array("id"=>$sessUserId));

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Priority Set Successfully."));

	redirectPage(SITE_URL."courier_partner_priority");
}

if(isset($_POST['action']) AND $_POST['action']=="addCourierPriority") 
{
	extract($_POST);

	$insert_array = array(
		"user_id"             => $sessUserId,
		"courier_priority_id" => $id,
		"priority_type"       => 'c',
		"created"			  => created(),	
	);

	$last_id = $db->insert("tbl_courier_priority",$insert_array)->getLastInsertId();

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Priority Set Successfully."));

	$responce = array('status'=> 1,"id"=>$id);
    
    echo json_encode($responce); exit;
}

if(isset($_POST['action']) AND $_POST['action']=="deletePriority") 
{
	extract($_POST);

	$check = $db->count("tbl_courier_priority",array("user_id"=>$sessUserId));

	if ($check > 1) 
	{
		$db->delete("tbl_courier_priority",array("courier_priority_id"=>$id));	

		$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'war','var'=> "Priority Delete Successfully."));

		$responce = array('status'=> 1,"id"=>$id);
    	echo json_encode($responce); exit;
	}
	else
	{
		$responce = array('status'=> 0,"id"=>$id);
    	echo json_encode($responce); exit;
	}
} 
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>