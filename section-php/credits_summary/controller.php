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
		
		$prepaid = $cod ="";
		$res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 AND payment_method='p' ORDER BY id DESC ")->results();

		foreach ($res as $key => $value) {

			$order_status = $value['status'] == 'c' ? "Completed" : "Pending";

			$prepaid.= '<tr class="row1">
              <td class=" table-style pad">'.ORDER_FORMAT.$value['order_id'].'</td>
              <td class=" table-style pad">'.$order_status.'</td>
              <td class=" table-style pad">'.getDateFormat($value['created']).'</td>
              <td class=" table-style pad">123456</td>
              <td class=" table-style pad">'.$value['ship_pack_weight'].'kg</td>
              <td class=" table-style pad">₹'.$value['shippment_charge'].'</td>
            </tr>';
		}

		$res = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE 1=1 AND payment_method='c' ORDER BY id DESC ")->results();

		foreach ($res as $key => $value) {

			$order_status = $value['status'] == 'c' ? "Completed" : "Pending";

			$cod.= '<tr class="row1">
              <td class=" table-style pad">'.ORDER_FORMAT.$value['order_id'].'</td>
              <td class=" table-style pad">'.$order_status.'</td>
              <td class=" table-style pad">'.getDateFormat($value['created']).'</td>
              <td class=" table-style pad">123456</td>
              <td class=" table-style pad">'.$value['ship_pack_weight'].'kg</td>
              <td class=" table-style pad">aaa</td>
              <td class=" table-style pad">₹'.$value['shippment_charge'].'</td>
            </tr>';
		}

		$TotalCod = $this->db->pdoQuery("SELECT SUM(cod_charges) as totalCod FROM tbl_order WHERE payment_method='c' ")->result();

		$TotalShipCharge = $this->db->pdoQuery("SELECT SUM(shippment_charge) as ShipCharges FROM tbl_order")->result();
		
		$TotalDisputeCharge = $this->db->pdoQuery("SELECT SUM(weight_dispute_charge) as weight_despute FROM tbl_order")->result();

		$shipmentCharges = $TotalShipCharge['ShipCharges'] + $TotalCod['totalCod'];


		$netpayable = $TotalShipCharge['ShipCharges'] - $TotalCod['totalCod'];
		
		$totalPayment = $netpayable - $TotalDisputeCharge['weight_despute'];

		$mainHTML =  DIR_TMPL . "credits_summary/view.php";
		$array = array(
			"%PREPAID%" =>$prepaid,
			"%COD%"		=>$cod,
			"%TOTALCOD%" =>'₹'.$TotalCod['totalCod'],
			"%SHIPMENTCHARGES%" =>'₹'.$shipmentCharges,
			"%NETPAYABLE%" =>'₹'.$netpayable,
			"%DIPUTE%"	=>'₹'.$TotalDisputeCharge['weight_despute'],
			"%TOTAL_PAYMENT%" =>'₹'.$totalPayment, 
 		);
		return get_view($mainHTML,$array);
	}
	
	
}

?>
