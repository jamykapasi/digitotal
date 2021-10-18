<?php
$reqAuth = false;
require_once("../../../include/config.php");
require_once("login.php");
if ($adminUserId > 0) {
    redirectPage(SITE_ADM_MOD . 'home');
}
$header_panel = false;
$left_panel = false;
$footer_panel = false;
$styles = array("login.css");
$scripts = array(array("login.js",SITE_ADMIN_JS));
$objUser = new Login();
if (isset($_POST["submitLogin"])) 
{
    extract($_POST);
    $username = $_REQUEST['uName'];
    $password = $_REQUEST['uPass'];
    $qrysel = $db->pdoQuery("SELECT * FROM tbl_admin WHERE 
username = ? AND password = ? AND status = ? ",array($username,$password,"a"))->result();

    if (!empty($qrysel) > 0) 
    {
        $fetchUser = $qrysel;    
        $_SESSION["adminUserId"] = (int) $fetchUser["id"];
        $_SESSION["uName"] = $username;
        $_SESSION["adminType"] = "";  
        $_SESSION["user_id"] = $fetchUser['id'];
        $_SESSION["admin_name"] = ucfirst($fetchUser['username']); 
        $sess_id = session_id();

        redirectPage(SITE_ADM_MOD . 'home');
    } 
    else
    { 
        $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'Username and password wrong.'));
        redirectPage(SITE_ADM_MOD . 'login');
    }
}
$pageContent = $objUser->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
