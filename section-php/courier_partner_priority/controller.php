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
		$res = $this->db->pdoQuery("SELECT * FROM tbl_users WHERE id=".$this->sessUserId." ")->result();

		if ($res['courier_priority'] == 'recommended priority') 
		{
			$check ='checked';
		} else {
			$check ='';
		}

		if ($res['courier_priority'] == 'custom priority') 
		{
			$check ='checked';
		} else {
			$check ='';
		}
		
		$mainHTML =  DIR_TMPL . "courier_partner_priority/view.php";

		$array = array(
			"%CHECK%" => $check,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
