<?php
$reqAuth = false;
$module = 'home';
require_once "../../include/config.php";

extract($_REQUEST);

if($sessUserId == ""){
	redirectPage(SITE_URL);
}

$styles = array(array("dashboard.css",SITE_CSS));


$tab_title =  SITE_NAME;

if(isset($_POST['action']) AND $_POST['action']=="checkEmailAddress"){
	extract($_POST);
	$res = $db->count("tbl_news_letter",array("email"=>$email));
	 
	if($res > 0) {
		$valid='false';
	} else {
		$valid='true';
	}
	echo $valid;
	exit;
}
if(isset($_POST['action']) AND $_POST['action']=="registerFrom") 
{
	$insert_array = array(
		"email"      => $email,
		"user_id"    => $sessUserId > 0 ? $sessUserId : 0, 
 		"created"    => created(),
	);
	$user_id = $db->insert("tbl_news_letter",$insert_array)->getLastInsertId();

	$responce = array('status'=> 1,"message"=> "News letter has been subcribed successfully.");
	echo json_encode($responce); exit;
}


$pageContent = $objHome->getPageContent();
require_once DIR_TMPL . "replace.php";
?>