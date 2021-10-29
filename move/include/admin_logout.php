<?php
require_once("../include/config.php");	
unset($_SESSION["user_id"]);
session_destroy();
redirectPage(SITE_ADM_MOD."login");

?>
