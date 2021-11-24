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
		
		$html = $priority ="";

		$userRes = $this->db->pdoQuery("SELECT courier_priority FROM tbl_users WHERE id='".$this->sessUserId."' ")->result();

		if ($userRes['courier_priority'] == 'custom') 
		{
			$check ='checked';
		}
		else
		{
			$check ='';
		}

		if ($userRes['courier_priority'] == 'recommendation') 
		{
			$check ='checked';
		}
		else
		{
			$check ='';
		}

		$res = $this->db->pdoQuery("SELECT * FROM tbl_shipping_rate WHERE 1=1 ORDER BY id DESC")->results();

		foreach ($res as $key => $value) 
		{
			$html .='<div class="col-md-4 col-xl-3">
		                    <div class="card order-card">
		                       <i class="fa fa-plus-circle fa-lg courierPartner" style="margin-left: calc(100% - 12px); margin-top: -2px; color: #062366; cursor: pointer;" aria-hidden="true" id="courierPartner" data-id='.$value['id'].'></i>
		                      <h6 class="m-b-20 fedex-text">'.strtoupper($value['courier_partner']).'</h6>
		                    </div>
		               </div>';
		}
		
		$priorityRes = $this->db->pdoQuery("SELECT courier.* 
		FROM tbl_courier_priority as priority
		LEFT JOIN tbl_shipping_rate as courier ON courier.id=priority.courier_priority_id 
		WHERE priority.user_id='".$this->sessUserId."' AND priority_type='c' ")->results();

		foreach ($priorityRes as $key => $value) 
		{
			$priority .='<div class="col-md-4 col-xl-3">
                    <div class="card order-card">
                      <i class="fa fa-minus-circle fa-lg removePartner" style="margin-left: calc(100% - 12px); margin-top: -2px; color: #062366; cursor: pointer;" aria-hidden="true" id="remove'.$value['id'].'" data-id='.$value['id'].'></i>
                      <h6 class="m-b-20 fedex-text">'.strtoupper($value['courier_partner']).'</h6>
                    </div>
                  </div>';
		}

		$mainHTML =  DIR_TMPL . "courier_partner_priority/view.php";

		$array = array(
			"%HTML%"     => $html,
			"%PRIORITY%" => $priority,
			"%CHECKED%"  => $check,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
