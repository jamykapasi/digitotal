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
		
		$last_order_code = $this->db->pdoQuery("SELECT order_id FROM tbl_order WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();
  		$order_id = $last_order_code['order_id'];
		$new_order_id = str_pad($order_id + 1, 5, 0, STR_PAD_LEFT);
	
		$res = $this->db->pdoQuery("SELECT * FROM tbl_category WHERE status = 'a' ")->results();

		$option = $pickup_option = "";
		foreach ($res as $key => $value) {
			$option.= "<option value='".$value['id']."'>".$value['category_name']."</option>";
		}

		$res = $this->db->pdoQuery("SELECT * FROM  tbl_pickup_address WHERE status = 'a' ")->results();

		foreach ($res as $key => $value) {
			$pickup_option.= "<option value='".$value['id']."'>".$value['address']."</option>";
		}

		$mainHTML =  DIR_TMPL . "create_order/view.php";
		$array = array(
			"#OPTION#"         => $option,	
			"#PICKUP_ADDRESS#" => $pickup_option,
			"#NEW_ORDER_ID#"   => ORDER_FORMAT.$new_order_id,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
