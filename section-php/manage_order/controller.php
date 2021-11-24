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

		$categoryRes = $this->db->pdoQuery("SELECT * FROM tbl_category WHERE status='a' ")->results();

		foreach ($categoryRes as $key => $value) 
		{
			$html .='<option value="'.$value['id'].'">'.$value['category_name'].'</option>';
		}
		
		$mainHTML =  DIR_TMPL . "manage_order/view.php";
		$array = array(
		    "%HTML%" => $html,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
