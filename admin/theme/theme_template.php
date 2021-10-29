<?php 

$page = new MainTemplater(DIR_ADMIN_TMPL."top.php");

$head = new MainTemplater(DIR_ADMIN_TMPL."head.php");

$site_header= new MainTemplater(DIR_ADMIN_TMPL."header.php");

$footer=new MainTemplater(DIR_ADMIN_TMPL."footer.php");

$page->body= '';
$page->right='';
$page->head='';
$page->header='';
$page->footer='';

