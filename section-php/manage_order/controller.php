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
		
		$html = $address = $default="";

		$categoryRes = $this->db->pdoQuery("SELECT * FROM tbl_category WHERE status='a' ")->results();

		foreach ($categoryRes as $key => $value) 
		{
			$html .='<option value="'.$value['id'].'">'.$value['category_name'].'</option>';
		}

		$addressRes = $this->db->pdoQuery("SELECT * FROM tbl_pickup_address WHERE user_id='".$this->sessUserId."' AND status='a' ")->results();

		foreach ($addressRes as $key => $value) 
		{	
			if ($value['default_address'] == 'y') 
			{
				$default ='<button class="btn2 btn-next update-btn btn-hv dft-btn col-2" style="margin: 0 10px 0px auto;">DEFAULT</button>';
			}

			$address .='<div style="display: flex; padding: 10px 15px 60px 15px; border: 1px solid #9ce1d0;margin: 2% 0% 0% 0%; align-items: flex-start;">
                            <span class="checkmark">
                            <input type="radio" id="'.$value['id'].'" class="pickup_address" name="pickup_address" style="margin: 10px -23px 0px 3px;" value="'.$value['id'].'" required>
                            </span><label for="5" class="custinput placeholder col-2" style="margin-left: 20px !important;padding-top:5px; cursor: pointer;">Address'.$value['id'].'</label>
                            <label class="placeholder col-2" style="margin: 5px 2px 2px 8px !important;">'.$value['phone_no'].'</label>
                            	'.$default.'
                            <a href="#editAddressModalCenter?id=5" class="edt-btn view" id="editAddress" data-id="'.$value['id'].'" data-dismiss="modal" data-toggle="modal" data-target="#editAddressModalCenter" style="margin-left: auto; padding-left: 10px;">EDIT | </a>
                            <a href="javascript:void()" data-id="'.$value['id'].'" id="deleteAddress" style="padding-left: 5px;" class="text-danger view"> REMOVE</a>
                        </div>
                        <p style=" position: relative; width: calc(100% - 40px); top: -44px; left: 10px; font-size: 14px; margin-bottom: 0;" class="placeholder">'.$value['flat_no'].', '.$value['locality'].', '.$value['landmark'].', '.$value['area'].', '.$value['pincode'].'</p>';
		}
		
		$mainHTML =  DIR_TMPL . "manage_order/view.php";
		$array = array(
		    "%HTML%"    => $html,
		    "%ADDRESS%" => $address,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
