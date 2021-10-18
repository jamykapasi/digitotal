<?php
$module = 'register';
require_once("../../include/config.php");

extract($_GET);

$user_id_exist = $db->count('tbl_users',array('id'=>$user_id));

if($user_id_exist > 0)
{
	$tokenRes = $db->count('tbl_users',array('email_token'=>$token,'id'=>$user_id));
	
  if($tokenRes > 0)
	{	
		$db->update("tbl_users",array("email_token"=>"","is_email_verify"=>"y"),array("id"=>$user_id));
		$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Email id verified successfully."));
	} 
	else 
	{  
    $msgType = $_SESSION["msgType"] = disMessage(array('type'=>'error','var'=> "Something went wrong."));
	} 
} 
else 
{
	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'error','var'=> "User not found."));
}	

redirectPage(SITE_URL);

?>


