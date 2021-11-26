<?php
$reqAuth = true;
$module = 'credits_summary';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Credits Summary";

if (isset($_POST['action']) AND $_POST['action'] == 'getRecord') 
{
	extract($_REQUEST);
	$object = new Controller($module,$token);
	$data = $object->getHTML($status,$keyword,$date,$page_rec,'y');

} else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>