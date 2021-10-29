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
		// $res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 ORDER BY id DESC ")->results();

		// foreach ($res as $key => $value) {

		// 	$payment_method = $value['payment_method'] == 'c' ? "COD" : "Prepaid";
		// 	$order_status = $value['status'] == 'c' ? "Completed" : "Pending";

		// 	$html.= '<tr class="row1">
  //                   <td class="table-style pad"><input type="checkbox" class="check">
  //                   <span class="checkmark"></span>'.ORDER_FORMAT.$value['order_id'].'</td>
  //                   <td class="table-style pad">'.getDateFormat($value['created']).'</td>
  //                   <td class="table-style pad">Channel Name</td>
  //                   <td class="table-style pad">
  //                     <p style="float:left">'.$value['product_name'].'</p>
  //                     <img src="'.SITE_IMG.'dashboard.svg" style="float:right">
  //                   </td>
  //                   <td class="table-style pad">'.$payment_method.'</td>
  //                   <td class="table-style pad">'.$value['customer_name'].'<br><a href="" class="view">VIEW</a>/<a href="" class="view">EDIT</a>
  //                   </td>
  //                   <td class="table-style pad">'.$order_status.'</td>
  //                   <td class="table-style pad"><button class="btn2" style="float:left;">SHIP</button>
  //                   <span style="float:right;" class="circle-cross">
  //                   <a href="#" class="cross-icon"> 
  //                   <i class="fas fa-times-circle"></i></a></span>
  //                   </td>
  //           </tr>';
		// }


		$mainHTML =  DIR_TMPL . "shipping_rate_calculator/view.php";
		$array = array(
			
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
