<?php
require_once("../../include/config.php");	

if(isset($_SESSION["adminUserId"]) && $_SESSION["adminUserId"] != "") {

	unset($_SESSION["adminUserId"]);
	unset($_SESSION["sessCataId"]);	
	$_SESSION["sessCataId"] = $_SESSION["adminUserId"] = '';
	$toastr_message = array('from'=>'admin','type'=>'suc','var'=>'succLogout');
}
redirectPage(SITE_ADM_MOD.'login/');
?>
