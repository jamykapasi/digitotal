<?php
$reqAuth = true;
require_once("../../../include/config.php");
require_once("sitesetting.php");

$module = "sitesetting";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
	extract($_REQUEST);
	
	if($site_name != "")
	{
		$db->update("tbl_setting",array("value"=>$site_name),array("id"=>1));
	}
	if($buy_btc_commission != "")
	{
		$db->update("tbl_setting",array("value"=>$buy_btc_commission),array("id"=>20));
	}
	if($sell_btc_commission != "")
	{
		$db->update("tbl_setting",array("value"=>$sell_btc_commission),array("id"=>21));
	}

	if($btc_rate_update != "")
	{
		$db->update("tbl_setting",array("value"=>$btc_rate_update),array("id"=>22));
	}

	if($admin_email != "")
	{
		$db->update("tbl_setting",array("value"=>$admin_email),array("id"=>3));
	}
	if($from_email != "")
	{
		$db->update("tbl_setting",array("value"=>$from_email),array("id"=>4));
	}
	if($smtp_host != "")
	{
		$db->update("tbl_setting",array("value"=>$smtp_host),array("id"=>5));
	}
	if($smtp_port != "")
	{
		$db->update("tbl_setting",array("value"=>$smtp_port),array("id"=>6));
	}
	if($smtp_username != "")
	{
		$db->update("tbl_setting",array("value"=>$smtp_username),array("id"=>7));
	}
	if($smtp_password != "")
	{
		$db->update("tbl_setting",array("value"=>$smtp_password),array("id"=>8));
	}
	if($header_title != "")
	{
		$db->update("tbl_setting",array("value"=>$header_title),array("id"=>9));
	}
	if($header_content != "")
	{
		$db->update("tbl_setting",array("value"=>$header_content),array("id"=>10));
	}
	if($about_us_content != "")
	{
		$db->update("tbl_setting",array("value"=>$about_us_content),array("id"=>11));
	}
	
	if($footer_content != "")
	{
		$db->update("tbl_setting",array("value"=>$footer_content),array("id"=>12));
	}
	if($facebook_link != "")
	{
		$db->update("tbl_setting",array("value"=>$facebook_link),array("id"=>13));
	}
	if($twitter_link != "")
	{
		$db->update("tbl_setting",array("value"=>$twitter_link),array("id"=>14));
	}
	if($instagram_link != "")
	{
		$db->update("tbl_setting",array("value"=>$instagram_link),array("id"=>15));
	}
	if($linkedin_link != "")
	{
		$db->update("tbl_setting",array("value"=>$linkedin_link),array("id"=>16));
	}

	if($first_plan != "")
	{
		$db->update("tbl_setting",array("value"=>$first_plan),array("id"=>17));
	}
	if($second_plan != "")
	{
		$db->update("tbl_setting",array("value"=>$second_plan),array("id"=>18));
	}
	if($third_plan != "")
	{
		$db->update("tbl_setting",array("value"=>$third_plan),array("id"=>19));
	}

	if($paypal_email != "")
	{
		$db->update("tbl_setting",array("value"=>$paypal_email),array("id"=>23));
	}

	if($paypal_url != "")
	{
		$db->update("tbl_setting",array("value"=>$paypal_url),array("id"=>24));
	}

	if($deposit_amount != "")
	{
		$db->update("tbl_setting",array("value"=>$deposit_amount),array("id"=>25));
	}
	
	if($_FILES['site_logo']['name'] != "")
	{
		$file_name = time()."_".$_FILES['site_logo']['name'];	
		$target_file = DIR_IMG . basename($file_name);
		move_uploaded_file($_FILES['site_logo']['tmp_name'], $target_file);
		$db->update("tbl_setting",array("value"=>$file_name),array("id"=>2));
	}
	$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Site setting has been updated successfully.'));
    redirectPage(SITE_ADM_MOD . "sitesetting");	
    exit;
}


$obj = new SiteSetting();
$pageContent = $obj->getHTML();
require_once(DIR_ADMIN_TMPL . "replace.php");
?>