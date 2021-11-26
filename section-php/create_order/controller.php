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
		
		$address = $default='';
		$last_order_code = $this->db->pdoQuery("SELECT order_id FROM tbl_order WHERE 1=1 ORDER BY id DESC LIMIT 1 ")->result();

  		$order_id = $last_order_code['order_id'];
		$new_order_id = str_pad($order_id + 1, 5, 0, STR_PAD_LEFT);
	
		$res = $this->db->pdoQuery("SELECT * FROM tbl_category WHERE status = 'a' ")->results();

		$option = $pickup_option = $courier_option = "";

		foreach ($res as $key => $value) {
			$option.= "<option value='".$value['id']."'>".$value['category_name']."</option>";
		}

		$addresRes = $this->db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE user_id='".$this->sessUserId."' AND status='a' ")->results();

		foreach ($addresRes as $key => $value) {

			if ($value['default_address'] == 'y') 
			{
				$default ='<button class="btn2 btn-next update-btn btn-hv dft-btn col-2" style="margin: 0 10px 0px auto;">DEFAULT</button>';
			}
			$address .='<div style="display: flex; padding: 10px 15px 60px 15px; border: 1px solid #9ce1d0;margin: 2% 0% 0% 0%; align-items: flex-start;">
                            <input type="checkbox" id="'.$value['id'].'" class="pickup_address" name="pickup_address" class="check" style="margin: 10px -23px 0px 3px;" value="'.$value['id'].'">
                            <span class="checkmark"></span><label for="'.$value['id'].'" class="custinput placeholder col-2" style="margin-left: 20px !important;padding-top:5px;    cursor: pointer;">Address'.$value['id'].'</label>
                            <label class="placeholder col-2" style="margin: 5px 2px 2px 8px !important;">+91'.$value['phone_no'].'</label>
                            	'.$default.'
                            <a href="#editAddressModalCenter?id='.$value['id'].'" class="edt-btn view" id="editAddress" data-id="'.$value['id'].'" data-dismiss="modal" data-toggle="modal" data-target="#editAddressModalCenter" style="margin-left: auto; padding-left: 10px;">EDIT | </a>
                            <a href="javascript:void()" data-id="'.$value['id'].'" id="deleteAddress" style="padding-left: 5px;" class="text-danger view"> REMOVE</a>
                        </div>
                        <p style="    position: relative; width: calc(100% - 40px); top: -44px; left: 10px; font-size: 14px; margin-bottom: 0;"class="placeholder">'.$value['flat_no'].', '.$value['locality'].', '.$value['landmark'].', '.$value['area'].', '.$value['pincode'].'</p>';
			// $pickup_option.= "<option value='".$value['id']."'>".$value['address']."</option>";
		}

		$userRes = $this->db->pdoQuery("SELECT id,courier_priority FROM tbl_users WHERE id=".$this->sessUserId." ")->result();

		if ($userRes['courier_priority'] == "recommended priority") 
		{
			$resCourier = $this->db->pdoQuery("SELECT * FROM  tbl_shipping_rate WHERE status = 'a'  ORDER BY within_city ASC ")->results();

			foreach ($resCourier as $key => $value) {
				$courier_option.= "<option value='".$value['id']."'>".$value['courier_partner']."</option>";
			}
		}
		else
		{
			$resCourier = $this->db->pdoQuery("SELECT * FROM  tbl_shipping_rate WHERE status = 'a' ")->results();

			foreach ($resCourier as $key => $value) {
				$courier_option.= "<option value='".$value['id']."'>".$value['courier_partner']."</option>";
			}
		}
		
		$mainHTML =  DIR_TMPL . "create_order/view.php";
		$array = array(
			"#OPTION#"   => $option,	
			"#ADDRESS#"  => $address,
			"#COURIER_PARTNER#"	=> $courier_option,
			"#NEW_ORDER_ID#"    => ORDER_FORMAT.$new_order_id,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
