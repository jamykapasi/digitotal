<?php
$reqAuth = true;
require_once("../../../include/config.php");

$obj = new Home();
$res = $obj->index();
$pageContent = $obj->getHTML();

require_once(DIR_ADMIN_TMPL . "replace.php");
