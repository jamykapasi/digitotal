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
		$res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 ORDER BY id DESC ")->results();

		foreach ($res as $key => $value) {

			$payment_method = $value['payment_method'] == 'c' ? "COD" : "Prepaid";
			
			$html.= '<tr class="row1">
              <td class=" table-style pad">'.ORDER_FORMAT.$value['order_id'].'</td>
              <td class=" table-style pad">Trns_123456</td>
              <td class=" table-style pad">₹'.$value['shippment_charge'].'</td>
              <td class=" table-style pad">'.getDateFormat($value['created']).'</td>
              <td class=" table-style pad">'.$payment_method.'</td>
              <tr>';
		}

		$mainHTML =  DIR_TMPL . "payment_history/view.php";
		$array = array(
			"%HTML%" => $html,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
