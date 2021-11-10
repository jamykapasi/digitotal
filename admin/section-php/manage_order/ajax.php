<?php
$content = '';
require_once("../../../include/config.php");
if ($adminUserId == 0) {
    die('Invalid request');
}
include("controller.php");
$module = 'manage_order';
$table = "tbl_order";

$action = isset($_GET["action"]) ? trim($_GET["action"]) : (isset($_POST["action"]) ? trim($_POST["action"]) : 'datagrid');

$id    = isset($_GET["id"]) ? trim($_GET["id"]) : (isset($_POST["id"]) ? trim($_POST["id"]) : 0);
$value = isset($_POST["value"]) ? trim($_POST["value"]) : isset($_GET["value"]) ? trim($_GET["value"]) : '';
$page  = isset($_POST['iDisplayStart']) ? intval($_POST['iDisplayStart']) : 0;
$rows  = isset($_POST['iDisplayLength']) ? intval($_POST['iDisplayLength']) : 25;
$sort  = isset($_POST["iSortTitle_0"]) ? $_POST["iSortTitle_0"] : NULL;
$order = isset($_POST["sSortDir_0"]) ? $_POST["sSortDir_0"] : NULL;
$chr   = isset($_POST["sSearch"]) ? $_POST["sSearch"] : NULL;
$sEcho = isset($_POST['sEcho']) ? $_POST['sEcho'] : 1;

extract($_GET);
$searchArray = array("page" => $page, "rows" => $rows, "sort" => $sort, "order" => $order, "offset" => $page, "chr" => $chr, 'sEcho' => $sEcho);

if ($action == "updateStatus") {
        $update_array = array('status' => ($value == 'c' ? 'c' : 'p'));
        $db->update($table, $update_array,array("id" => $id));
        echo json_encode(array('type' => 'success', 'User ' . ($value == 'c' ? 'confirm ' : 'pandding ') . 'successfully'));
        exit;
} else if ($action == "delete") {
    $db->delete($table,array("id"=>$id));
    echo json_encode(array('type' => 'success', 'message' => "User has been deleted successfully."));
    exit;
} 


$mainObject = new Controller($module, $id, NULL, $searchArray, $action);
extract($mainObject->data);
echo ($content);
exit;
