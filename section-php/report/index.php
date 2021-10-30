<?php
$reqAuth = true;
$module = 'report';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Report";

if(isset($_POST['action']) AND $_POST['action']=="downloadReport") 
{	
	extract($_POST);
	
	if (isset($_POST['order']) AND $_POST['order'] =="order") 
	{
		$orderRes = $db->pdoQuery("SELECT id,order_id,customer_name,product_name,product_price,product_qty,shippment_charge,cod_charges,total_price,courier_partner,created FROM tbl_order WHERE 1=1 ORDER BY id DESC ")->results();

		if (count($orderRes) > 0) 
		{
			$filename = 'order_'.date('Ymd').'.csv';

			$file = fopen('php://output', 'w');

			$header = array("No","Order Id","Customer Name","Product Name","Product Price","Product Qty","Shippment Charge","Cod Charge","Total Price","Courier Partner","Date");
			fputcsv($file, $header);

			foreach ($orderRes as $key=>$line){
			 fputcsv($file,$line);
			}

			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			fclose($file);
			
			$responce =array("status"=>1,"filename"=>$file);
			echo json_encode($responce); exit;		
		}	
	}

	// if (isset($_POST['order']) AND $_POST['order'] =="weight") 
	// {
		
	// }
	if (isset($_POST['order']) AND $_POST['order'] =="payment") 
	{	

		$paymentRes = $db->pdoQuery("SELECT id,order_id,customer_name,product_name,product_price,payment_method,shippment_charge,total_price,created FROM tbl_order WHERE 1=1 ORDER BY id DESC ")->results();

		if (count($paymentRes) > 0) 
		{
			$filename = 'payment_'.date('Ymd').'.csv';

			$file = fopen('php://output', 'w');

			$header = array("No","Order Id","Customer Name","Product Name","Product Price","Payment Method","Shippment Charge","Total Price","Date");
			fputcsv($file, $header);

			foreach ($paymentRes as $key=>$line){
			 fputcsv($file,$line);
			}

			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=$filename");
			header("Content-Type: application/csv; ");

			fclose($file);
			
			// $responce =array("status"=>1,"filename"=>$filename);
			// echo json_encode($responce); exit;		
		}	
	}
	// if (isset($_POST['order']) AND $_POST['order'] =="recharge") 
	// {
		
	// }

} 
else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>