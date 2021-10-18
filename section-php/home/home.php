<?php
class Home {
	function __construct($module = "", $id = 0, $token = "",$reffToken="") {
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
		$this->id = $id;
	}


	public function getHeaderContent() {

		$menu = NULL;
		if(isset($this->sessUserId) && $this->sessUserId > 0){
			$replace = array();
			$menu = get_view(DIR_TMPL . $this->module . "/" . "after_login.php",$replace);
		}
		else
		{	
			$replace = array();
			$menu = get_view(DIR_TMPL . $this->module . "/" . "before_login.php",$replace);	
		}
		return $menu;
	}
	public function getFooterContent() {
		
		$html = null;
		$replace = array(
			'%FOOTER%' => "",
			'%LANGUAGE_LIST%' => "",
			'%FOOTER_LOGO%' => "",
			'%SOCIAL_LINK%' => "",
			
			);
		$html .= get_view(DIR_TMPL . "footer.php",$replace);
		return $html;
		
	}

	

	public function getPageContent($type="") 
	{

		$mainHTML =  DIR_TMPL . "home/home.php";
		$array = array(
			
 		);
		return get_view($mainHTML,$array);

	}


}

?>
