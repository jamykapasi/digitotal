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

if (isset($_POST['action']) AND $_POST['action'] == 'getRecord') 
{
	extract($_REQUEST);

	$user = $total ='';

	$where = '';
	if($status != ''){
		$where .= 'AND status = "'.$status.'"';
	}

	if($keyword != ''){
		$where .= 'AND (order_id LIKE "%'.$keyword.'%" or product_name LIKE "%'.$keyword.'%" or customer_name LIKE "%'.$keyword.'%")';
	}

	if($date != ''){
		$where .= 'AND DATE_FORMAT(created, "%d-%m-%Y") = "'.$date.'"';
	}

	if($page_rec > 0){
		$limit = ' LIMIT '.$page_rec.'';
	}
	
	$userRes = $db->pdoQuery("SELECT * FROM tbl_order WHERE  user_id='".$sessUserId."' ".$where." $limit ")->results();

	$totalRowRes = $db->pdoQuery("SELECT * FROM tbl_order WHERE user_id='".$sessUserId."' ".$where." ")->results();
	
	$totalRow = count($totalRowRes);


    foreach ($userRes as $key => $value) 
    {
        $payment_method = $value['payment_method'] == 'c' ? "COD" : "Prepaid";
		$order_status = $value['status'] == 'c' ? "Completed" : "Pending";

		if ($value['status'] == 'c') 
		{
			$shipButton ='<button class="btn2 ship" id="ship" data-id="'.$value['id'].'" style="float:left;" disabled>SHIP</button>';
		}
		else
		{
			$shipButton ='<button class="btn2 ship" id="ship" data-id="'.$value['id'].'" style="float:left;" >SHIP</button>';
		}				
			$user.='<tr class="row1">
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
            	</td></tr>';
    }

	if($totalRow > $limit){
		//$user.= '<tr><td><a herf="javascript:void(0);" id="viewall">View all</a></td></tr>';
	}

    $userTable ='<tr class="row1">
			        <th class=" table-style table-heading">ORDER ID</th>
			        <th class=" table-style table-heading">ORDER DATE AND TIME</th>
			        <th class=" table-style table-heading">CHANNEL INTEGRATION<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>

			        <th class=" table-style table-heading">PRODUCT DETAILS</th>
			        <th class=" table-style table-heading">PAYMENT<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>
			        <th class=" table-style table-heading">CUSTOMER DETAILS<span><a href=""><i class="fas fa-filter filter_img"></i></a></span></th>
			        <th class=" table-style table-heading">STATUS</th>
			        <th class=" table-style table-heading">ACTIONS</th>
			      </tr> 
			      	'.$user.' ';
	echo json_encode(array('userTable'=>$userTable));   
	exit;
}

else 
{
	$object = new Controller($module,$token);
	$pageContent = $object->getHTML();

	require_once DIR_TMPL . "replace.php";
}
?>