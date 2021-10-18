<?php
class ForgotPassword extends Home {
	function __construct($module = "",$token = 0) 
	{
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
	}

	function getHTML() {
		
		$mainHTML =  DIR_TMPL . "forgot_password/forgot_password.php";
		$array = array();
		return get_view($mainHTML,$array);
	}
}

?>
