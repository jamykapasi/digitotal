<?php
class Login extends Home {
	function __construct($module = "",$token = 0) 
	{
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
	}

	function getHTML() {
		
		$mainHTML =  DIR_TMPL . "login/login.php";
		$array = array(
			'#COUNTRY_NAME#'       => $this->getCountryName(),
 		);
		return get_view($mainHTML,$array);
	}
	function getCountryName()
	{	
		$html = "";
		$res = $this->db->pdoQuery("SELECT * FROM tbl_country WHERE isActive ='y'")->results();

		foreach ($res as $key => $value) 
		{
			$html.="<option value='".$value['id']."'>".$value['countryName']."</option>";
		}
		return $html;
	}
}

?>
