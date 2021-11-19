<?php
class Controller extends Home {
	function __construct($module = "",$token = 0) 
	{
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
	}

	
	function getHTML() {
		
		$html = "";
		// $res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 AND user_id=".$this->sessUserId." ORDER BY id DESC ")->results();

		// foreach ($res as $key => $value) {

		// 	$payment_method = $value['payment_method'] == 'c' ? "COD" : "Prepaid";
		// 	$order_status = $value['status'] == 'c' ? "Completed" : "Pending";

		// 	if ($value['status'] == 'c') 
		// 	{
		// 		$shipButton ='<button class="btn2 ship" id="ship" data-id="'.$value['id'].'" style="float:left;" disabled>SHIP</button>';
		// 	}
		// 	else
		// 	{
		// 		$shipButton ='<button class="btn2 ship" id="ship" data-id="'.$value['id'].'" style="float:left;" >SHIP</button>';
		// 	}	
			
		// 	$html.= '<tr class="row1">
		// 							<td class="table-style pad"><input type="checkbox" class="check">
  //                   <span class="checkmark"></span>'.ORDER_FORMAT.$value['order_id'].'</td>
  //                   <td class="table-style pad">'.getDateFormat($value['created']).'</td>
  //                   <td class="table-style pad">Channel Name</td>
  //                   <td class="table-style pad">
  //                     <p style="float:left">'.$value['product_name'].'</p>
  //                     <img src="'.SITE_IMG.'dashboard.svg" style="float:right">
  //                   </td>
  //                   <td class="table-style pad">'.$payment_method.'</td>
  //                   <td class="table-style pad">'.$value['customer_name'].'<br>
  //                  	<a href="#exampleModalCenter?id='.$value['id'].'" data-toggle="modal" id="userData" data-target="#exampleModalCenter" class="view" data-id="'.$value['id'].'">VIEW</a>/<a href="#exampleModalCenter?id='.$value['id'].'" data-toggle="modal" id="userData" data-target="#exampleModalCenter" class="view" data-id="'.$value['id'].'">EDIT</a>
  //                   </td>
  //                   <td class="table-style pad">'.$order_status.'</td>
  //                   <td class="table-style pad">'.$shipButton.'
  //                   <span style="float:right;" class="circle-cross">
  //                   <a href="#" class="cross-icon" id="deleteOrder" data-id="'.$value['id'].'"> 
  //                   <i class="fas fa-times-circle"></i></a></span>
  //               	</td>
  //           		<tr>';
		// }

		$mainHTML =  DIR_TMPL . "manage_order/view.php";
		$array = array(
			// "%HTML%" => $html,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
