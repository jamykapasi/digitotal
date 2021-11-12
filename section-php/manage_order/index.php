<?php
$reqAuth = true;
$module = 'manage_order';
require_once "../../include/config.php";
require_once("controller.php");

if($sessUserId <= 0){
	redirectPage(SITE_URL."login");
}

$token = (isset($_GET['token']) AND $_GET['token'] != "") ? $_GET['token'] : '';

$scripts = array(array("jquery.validate.min.js",SITE_JS));

$tab_title = "Manage Order";

if(isset($_POST['action']) AND $_POST['action']=="viewUser") 
{
	extract($_POST);
	
	$userRes = $db->pdoQuery("SELECT id,customer_name,customer_phone,customer_email,customer_address,customer_pincode,customer_city,customer_state FROM tbl_order WHERE 1=1 AND id=".$_POST['id']." ORDER BY id DESC LIMIT 1 ")->result();
	
	$responce = array(
		'customer_id'      => $userRes['id'],
		'customer_name'    => $userRes['customer_name'],
		'customer_phone'   => $userRes['customer_phone'],
		'customer_email'   => $userRes['customer_email'],
		'customer_address' => $userRes['customer_address'],
		'customer_pincode' => $userRes['customer_pincode'],
		'customer_city'    => $userRes['customer_city'],
		'customer_state'   => $userRes['customer_state'],
	);

	echo json_encode($responce); exit;
	
} 
if(isset($_POST['action']) AND $_POST['action']=="editUser") 
{
	extract($_POST);
	
	$update_array = array(
		"customer_name"    => $customer_name,
        "customer_phone"   => $customer_phone,
        "customer_email"   => $customer_email,
        "customer_address" => $customer_address,
        "customer_pincode" => $customer_pincode,
        "customer_city"    => $customer_city,
        "customer_state"   => $customer_state,
    );
    
       
	$db->update("tbl_order",$update_array,array("id"=>$customer_id));
	
	$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Customer Details has been updated successfully.'));

	redirectPage(SITE_URL."manage_order");
}

if(isset($_POST['action']) AND $_POST['action']=="deleteOrder") 
{
	extract($_POST);
	
	$db->delete("tbl_order",array("id"=>$_POST['id']));
	
	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Order Delete Successfully."));
    
    $responce = array('status'=> 1);
    echo json_encode($responce); exit;
}

if(isset($_POST['action']) AND $_POST['action']=="changeStatus") 
{
	extract($_POST);
	
	$update_array = array(
		"status"    => 'c'
    );
    
	$db->update("tbl_order",$update_array,array("id"=>$id));

	$msgType = $_SESSION["msgType"] = disMessage(array('type'=>'suc','var'=> "Order Ship."));
    
    $responce = array('status'=> 1);
    echo json_encode($responce); exit;
}

if (isset($_POST['query'])) 
{
	$serchData = $db->pdoQuery("SELECT * FROM tbl_order WHERE order_id LIKE '%".$_POST['query']."%' ")->results();

	$html ='';

	if (count($serchData) > 0) 
	{
		foreach ($serchData as $key => $value) 
		{
			$html .='<tr class="row1">
					<td class="table-style pad"><input type="checkbox" class="check">
	                <span class="checkmark"></span>'.ORDER_FORMAT.$value['order_id'].'</td>
	                <td class="table-style pad">'.getDateFormat($value['created']).'</td>
	                <td class="table-style pad">Channel Name</td>
	                <td class="table-style pad">
	                  <p style="float:left">'.$value['product_name'].'</p>
	                  <img src="'.SITE_IMG.'dashboard.svg" style="float:right">
	                </td>
	                <td class="table-style pad">'.$payment_method.'</td>
	                <td class="table-style pad">'.$value['customer_name'].'<br>
	               	<a href="#exampleModalCenter?id='.$value['id'].'" data-toggle="modal" id="userData" data-target="#exampleModalCenter" class="view" data-id="'.$value['id'].'">VIEW</a>/<a href="#exampleModalCenter?id='.$value['id'].'" data-toggle="modal" id="userData" data-target="#exampleModalCenter" class="view" data-id="'.$value['id'].'">EDIT</a>
	                </td>
	                <td class="table-style pad">'.$order_status.'</td>
	                <td class="table-style pad">'.$shipButton.'
	                <span style="float:right;" class="circle-cross">
	                <a href="#" class="cross-icon" id="deleteOrder" data-id="'.$value['id'].'"> 
	                <i class="fas fa-times-circle"></i></a></span>
	                /td>
	            <tr>';
		}
	}
	else
	{
		$html = "No Data Found";
	}	
	

	$responce = array('status'=> 1,'html'=>$html);
    echo json_encode($responce); exit;
}

else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>