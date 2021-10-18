<?php
$reqAuth = true;
require_once("../../../include/config.php");
require_once("change_password.php");

$module = "change_password";

$objPost = new stdClass();

extract($_POST);

$objUser = new changePassword();

if (isset($_POST["submitChange"])) {

    $opasswd   = $_REQUEST['opasswd'];
    $passwd    = $_REQUEST['passwd'];

    if ($opasswd != "" && $passwd) 
    {
        $res = $db->pdoQuery("SELECT * FROM tbl_admin WHERE password = ?",array($opasswd))->result();

        if (!empty($res) > 0) 
        {
            $update_array=array(
                "password" => $passwd,
            );
            $db->update("tbl_admin",$update_array,array("id"=>$_SESSION['user_id']));

            $_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'password has been successfully changed.'));
            redirectPage(SITE_ADM_MOD . 'change_password');

        } else {
            $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'Old password is wrong.'));
            redirectPage(SITE_ADM_MOD . 'change_password');
        }
    }
}

$pageContent = $objUser->getHTML();
require_once(DIR_ADMIN_TMPL . "replace.php");

?>