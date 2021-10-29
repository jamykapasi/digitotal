<?php
$reqAuth = false;
$module = 'register';
require_once "../../include/config.php";
require_once("register.php");

if($sessUserId != ""){
	redirectPage(SITE_URL."dashboard");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Register";

if(isset($_POST['action']) AND $_POST['action']=="checkEmailAddress"){
	extract($_POST);
	$res = $db->count("tbl_users",array("email"=>$email));
	
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
		extract($_POST);
	
		$token = genrateRandom(8);
		


		$insert_array = array(
			"first_name"    => $first_name,
			"company_name"  => $company_name,
			"mobile_no"     => $mobile_no,
			"email"         => $user_email,
			"password"      => $password,
			"created"       => created(),
			"email_token"   => $token, 
		);
		$user_id = $db->insert("tbl_users",$insert_array)->getLastInsertId();

		// $url = SITE_URL.'verify/'.$user_id.'/'.$token;
						
		// $mail_array = array(
		// 	"ACTIVATION_LINK"  => $url,
		// 	'NAME'             => ucfirst($first_name),
		// 	'SITE_NM'          => SITE_NAME
		// );
		// sendMail("register_link",$mail_array,$email);
		
		$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Registration process has been completed."));
		$responce = array('status'=> 1);
		echo json_encode($responce); exit;
} 
else 
{
	$object = new Register($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>