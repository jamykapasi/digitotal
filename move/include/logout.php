<?php
require_once("../include/config.php");	
unset($_SESSION["userid"]);
session_destroy();
redirectPage(SITE_URL);

?>
