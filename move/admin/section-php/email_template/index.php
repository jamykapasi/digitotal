<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "email_template";   

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {
          $update_array = array(
          "html_name"    => $html_name,
          "subject_name" => $subject_name,
          "html_code"    => $html_code,
      );

        $db->update("tbl_email_html",$update_array,array("id"=>$id));
        $_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Email Template has been updated successfully.'));
        redirectPage(SITE_ADM_MOD . $module);
   }
   else
    {

        $insert_array = array(
          "html_name"    => $html_name,
          "subject_name" => $subject_name,
          "action" => $action,
          "html_code"    => $html_code,
      );
        $db->insert("tbl_email_html",$insert_array);
        $_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Email Template has been Inserted successfully.'));
        redirectPage(SITE_ADM_MOD . $module);
    }     
   
}

$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
