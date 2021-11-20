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
		
		$mainHTML =  DIR_TMPL . "manage_order/view.php";
		$array = array(
			// "%HTML%" => $html,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
