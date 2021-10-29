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
		$res = $this->db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 ORDER BY id DESC ")->results();
		foreach ($res as $key => $value) {
			$html.= '<tr class="row1">
					  <td class="tg-ea2u"><img src="'.SITE_UPD.'/courier_logo/'.$value['courier_logo'].'" width="50" height="50"></td>
					  <td class="tg-jgah">'.$value['courier_partner'].'</td>
		              <td class="tg-jgah">₹'.$value['within_city'].'</td>
		              <td class="tg-jgah">₹'.$value['within_zone'].'</td>
		              <td class="tg-jgah">₹'.$value['metros'].'</td>
		              <td class="tg-jgah">₹'.$value['rest_of_india'].'</td>
		              <td class="tg-jgah">₹'.$value['special_zone'].'</td>
		              <td class="tg-jgah">₹'.$value['cod'].'</td>
	        		</tr>';
		}

		$mainHTML =  DIR_TMPL . "shipping_rate/view.php";
		$array = array(
			"%HTML%" => $html,
		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
