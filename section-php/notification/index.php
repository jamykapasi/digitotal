<?php
$reqAuth = true;
$module = 'notification';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Notification";

if(isset($_POST['action']) AND $_POST['action']=="loginForm") 
{
	extract($_POST);
	
	if($email_address != "" AND $password != "")
	{
		$res = $db->pdoQuery("SELECT * FROM tbl_users WHERE email = ? AND password = ? ",
	    array($email_address,$password))->results();

		if(count($res)>0)
		{
			if($res[0]['status']=="d")	
			{
				$responce = array('status'=> 0,'message'=> "Your account has been deactivated. Please contact administrator.");
				echo json_encode($responce); exit;
			} else {

				$_SESSION["userid"]    = $res[0]['id'];
				$_SESSION["name"]      = $res[0]['first_name'];
				
				$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "You have been successfully registered and logged in."));
	            $responce = array('status'=> 1);
	            echo json_encode($responce); exit;
			}
		}
		else
		{
			$responce = array('status'=> 0,'message'=> "Username and password wrong.");
			echo json_encode($responce); exit;
		}
	} 
	else 
	{
		$responce = array('status'=> 0,'message'=> "Username and password wrong.");
		echo json_encode($responce); exit;
	}	
} else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>