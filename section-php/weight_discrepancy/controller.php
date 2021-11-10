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
		
		$disputeFound = $disputeAction ="";

		$disputeFoundRes = $this->db->pdoQuery("SELECT * FROM tbl_weight_discrepancy  WHERE status='d' ")->results();

		foreach ($disputeFoundRes as $key => $value) {

			if($value['proof'] == "")
            {
                $discrepancy_proof = '<img src="'.SITE_UPD.'/discrepancy_proof/no_image.jpg" width="50" height="50">';
            } else {

                $discrepancy_proof = '<img src="'.SITE_UPD.'/discrepancy_proof/'.$value['proof'].'" width="50" height="50">';
            }

			$disputeFound.= '<tr class="row1">
                <td class=" table-style pad">
	                <p>'.date('d M Y',strtotime($value['created'])).',
	                   '.date('h:i a',strtotime($value['created'])).'</p>
                </td>
                <td class=" table-style pad">
	                <p>'.date('d M Y',strtotime($value['order_date_time'])).',
	               	   '.date('h:i a',strtotime($value['order_date_time'])).'</p>
                <td class=" table-style pad">
                    <p>'.$value['product_name'].'</p>
                    <p>Qty: '.$value['product_qty'].'</p>
                    <img src="'.SITE_IMG.'dashboard.svg" style="float:right">
                <td class=" table-style pad">
                	<p>'.$value['courier_name'].'</p>
                	<p>AWB:12456</p>
                </td>
                <td class=" table-style pad">
                	<p>Weight : '.$value['enterd_weight'].' kg</p>
                	<p>₹</p>
                </td>
                <td class=" table-style pad">
                	<p>Weight : '.$value['charged_weight'].' kg</p>
                	<p>₹'.$value['depute_charge'].'</p>
                </td>
                <td class="table-style pad">'.$discrepancy_proof.'</td>
              </tr>';
		}
		
		$disputeActionRes = $this->db->pdoQuery("SELECT * FROM tbl_weight_discrepancy WHERE status='a'")->results();

		foreach ($disputeActionRes as $key => $value) {

			$disputeAction.= '<tr class="row1">
                <td class=" table-style pad">
	                <p>'.date('d M Y',strtotime($value['created'])).',
	                   '.date('h:i a',strtotime($value['created'])).'</p>
                </td>
                <td class=" table-style pad">
	                <p>'.date('d M Y',strtotime($value['order_date_time'])).',
	               	   '.date('h:i a',strtotime($value['order_date_time'])).'</p>
                <td class=" table-style pad">
                    <p>'.$value['product_name'].'</p>
                    <p>Qty: '.$value['product_qty'].'</p>
                    <img src="'.SITE_IMG.'dashboard.svg" style="float:right">
                <td class=" table-style pad">
                	<p>'.$value['courier_name'].'</p>
                	<p>AWB:12456</p>
                </td>
                <td class=" table-style pad">
                	<p>Weight : '.$value['enterd_weight'].' kg</p>
                	<p>₹</p>
                </td>
                <td class=" table-style pad">
                	<p>Weight : '.$value['charged_weight'].' kg</p>
                	<p>₹'.$value['depute_charge'].'</p>
                </td>
                <td class="table-style pad">
                	<p>Dispute Resolved</p>
                	<p>credit Added:₹'.$value['depute_charge'].'</p>
                </td>
              </tr>';
		}

		$mainHTML =  DIR_TMPL . "weight_discrepancy/view.php";
		$array = array(
			"%DISPUTEFOUND%"  => $disputeFound,
			"%DISPUTEACTION%" => $disputeAction,
  		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
