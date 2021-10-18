<?php
ob_start();
session_start();
set_time_limit(0);

date_default_timezone_set('Asia/Kolkata');

$include_sharing_js = false;

$header_panel = true;
$footer_panel = true;
$styles = array();
$scripts = array();

$reqAuth = isset($reqAuth) ? $reqAuth : false;

$allowedUserType = isset($allowedUserType) ? $allowedUserType : 'a';

$adminUserId = (isset($_SESSION["adminUserId"]) && $_SESSION["adminUserId"] > 0 ? (int) $_SESSION["adminUserId"] : 0);

$sessUserId = (isset($_SESSION["userid"]) && $_SESSION["userid"] > 0 ? (int) $_SESSION["userid"] : 0);
$sessName = (isset($_SESSION["name"]) && $_SESSION["name"] != '' ? $_SESSION["name"] : NULL);


$toastr_message = isset($_SESSION["toastr_message"]) ? $_SESSION["toastr_message"] : NULL;
unset($_SESSION['toastr_message']);

$memberId = isset($sessUserId)?$sessUserId : 0;

global $db, $helper, $fields, $module, $adminUserId, $sessUserId, $objHome, $main_temp, $breadcrumb, $Permission, $memberId;
global $head, $header, $left, $right, $footer, $content, $title, $resend_email_verification_popup,$old_error_handler,$css_array,$js_variables,$scripts,$styles;

require_once('database_config.php');

require_once('function/pdohelper.php');
require_once('function/pdowrapper.php');
require_once('function/pdowrapper-child.php');
require_once('mime_type_lib.php');

$dbConfig = array("host" => DB_HOST, "dbname" => DB_NAME, "username" => DB_USER, "password" => DB_PASS);
$db = new PdoWrapper($dbConfig);

$helper = new PDOHelper();

require_once('constant.php');

require_once(DIR_INC.'function/function.php');

// $res = $db->pdoQuery("SELECT * FROM tbl_lang WHERE is_default = 'y'")->result();
// $language_id = $res['id'] > 0 ? $res['id'] : 1;

// $_SESSION['language_id']   = $language_id;
// $_SESSION['language_name'] = $res['language_name'];

// require_once("language/".$language_id.'.php');

curPageURL();
curPageName();

//checkIfIsActive();
Authentication($reqAuth, true, $allowedUserType);

require("main_html.php");

$main = new MainTemplater();
$msgType = isset($_SESSION["msgType"])?$_SESSION["msgType"]:NULL;
unset($_SESSION['msgType']);

if (domain_details('dir') == 'admin') {
    
    $left_panel = true;
    require_once(DIR_ADM_INC . 'function/function.php');

    require_once(DIR_ADM_MOD . 'home/home.php');
    $objHome = new Home($module, 0);
} else 
{
	 require_once(DIR_MOD . 'home/home.php');
    $objHome = new Home("home");
}


$objPost = new stdClass();

$description = SITE_NAME;
$keywords = "";
