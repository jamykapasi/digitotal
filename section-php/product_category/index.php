<?php
$reqAuth = true;
$module = 'product_category';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Product Category";

if(isset($_POST['action']) AND $_POST['action']=="category") 
{
	extract($_POST);

	$insert_array = array(
		"category_name"    => $category_name, 
	);

	$last_id = $db->insert("tbl_category",$insert_array)->getLastInsertId();

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Category created successfully."));

	redirectPage(SITE_URL."product_category");
}

if(isset($_POST['action']) AND $_POST['action']=="deleteCategory") 
{
	extract($_POST);
	
	$db->delete("tbl_category",array("id"=>$_POST['id']));
	
	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Category Delete Successfully."));
    
    $responce = array('status'=> 1);
    echo json_encode($responce); exit;
}
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>