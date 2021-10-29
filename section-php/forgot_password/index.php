<?php
$reqAuth = false;
$module = 'forgot_password';
require_once "../../include/config.php";
require_once("forgot_password.php");

if($sessUserId != ""){
	redirectPage(SITE_URL);
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$styles = array();		
$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Forgot Password";

if(isset($_POST['action']) AND $_POST['action']=="forgotPasswordForm") 
{
	extract($_REQUEST);
	
	$checkEmail = $db->count("tbl_users",array("email"=>$email));
	
	if($checkEmail > 0)
	{
		$res = $db->pdoQuery("SELECT * FROM tbl_users WHERE email = '".$email."' ")->result();
		
		$generatePassword = genrateRandom(8);
		
		$mail_array_user = array(
	      'NEW_PASSWORD'     => $generatePassword,
	      'USERNAME'         => ucfirst($res['first_name']),
	      'SITE_NAME'        => SITE_NAME,
	    );
		sendMail("forgot_password",$mail_array_user,$res['email']);

		$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "New password send to your email address. Please check your inbox."));

		$responce = array('status'=> 1);
		echo json_encode($responce); exit;
	} else {
		$responce = array('status'=> 0 , 'message' => "This email address does not exits." );
		echo json_encode($responce); exit;		
	}
} 
else 
{
	$object = new ForgotPassword($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>