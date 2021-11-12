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
		$random = time();
		$userRes = $this->db->pdoQuery("SELECT id,wallet_balance FROM tbl_users WHERE id =".$this->sessUserId." ")->result();

		$res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 AND status = 'c' ORDER BY id DESC ")->results();

		foreach ($res as $key => $value) {

			// $payment_method = $value['payment_method'] == 'c' ? "COD" : "Prepaid";
			$random = time();
            
			$html.='<tr class="payment-history-head detail-show">
                    <td>
                        <span class="day">Date</span>
                        <span class="date">'.getDateFormat($value['created']).'</span>
                    </td>
                    <td>
                        <span class="satus"> Paid</span>
                        <span class="date">₹'.$value['total_price'].'</span>
                    </td>
                    <td class="text-end">
                        <button class="btn2">PYMENT SHEET</button>
                        <button class="btn2" data-id=invoice_'.$random.'>INVOICE</button>
                        <span style="float:right;" class="open-details-icon" >
                            <i class="fas fa-chevron-down" id="down"></i>
                            <i class="fas fa-chevron-up" id="up" style="display :none;"></i>
                        </span>
                    </td>
                </tr>

                <tr class="payment-history-details detail-show" id="detail-show" style="display :none;">
                    <td colspan="3">
                        <div class="payment-history-detail-content">
                            <div class="payment-history-detail__inner">
                                <span class="price">₹ '.$value['total_price'].'</span>
                                <span class="description">Total Ammount Collected</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span>+</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span class="price">₹ '.$value['total_price'].'</span>
                                <span class="description">Shipping Credits Used</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span>-</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span class="price">₹ '.$value['shippment_charge'].'</span>
                                <span class="description">Total Shipping Charges</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span>=</span>
                            </div>
                            <div class="payment-history-detail__inner">
                                <span class="price">₹ '.$value['total_price'].'</span>
                                <span class="description">Amount Paid</span>
                            </div>
                        </div>
                    </td>
                </tr>';

			// $html.= '<tr class="row1">
   //            <td class=" table-style pad">'.ORDER_FORMAT.$value['order_id'].'</td>
   //            <td class=" table-style pad">Trns_123456</td>
   //            <td class=" table-style pad">₹'.$value['shippment_charge'].'</td>
   //            <td class=" table-style pad">'.getDateFormat($value['created']).'</td>
   //            <td class=" table-style pad">'.$payment_method.'</td>
   //            <tr>';
		}

		$mainHTML =  DIR_TMPL . "payment_history/view.php";
		$array = array(
			"%HTML%" => $html,
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
