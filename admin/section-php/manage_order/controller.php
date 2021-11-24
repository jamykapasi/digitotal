<?php

class Controller extends Home {

    public $data = array();
public function __construct($module, $id = 0, $objPost = NULL, $searchArray = array(), $type = '') {
        global $db;
        $this->db = $db;
        $this->data['id'] = $this->id = $id;
        $this->module = $module;
        $this->table = 'tbl_order';
        $this->type = ($this->id > 0 ? 'edit' : 'add');
        $this->searchArray = $searchArray;
        parent::__construct();
          if ($this->id > 0) 
          {
            $fetchRes = $this->db->pdoQuery("SELECT * FROM $this->table WHERE id = '".$this->id."'")->result();
            foreach ($fetchRes as $k => $v) {
                $this->{$k} = filtering($v);
            }

        } else {

            $fetchRes = $this->db->pdoQuery("SHOW COLUMNS FROM " . $this->table)->results();
            foreach ($fetchRes as $k => $v) {
                $this->{$v["Field"]} = $v["Default"];
            }
        }
        switch ($type) {
            case 'add' : {
                    $this->data['content'] =  $this->getForm();
                    break;
                }
            case 'edit' : {
                    $this->data['content'] =  $this->getForm();
                    break;
                }
            case 'weightDiscrepancy' : {
                    $this->data['content'] =  $this->discrepancyForm();
                    break;
                }
            case 'view' : {
                    $this->data['content'] =  $this->viewForm();
                    break;
                }
            case 'delete' : {
                    $this->data['content'] =  json_encode($this->dataGrid());
                    break;
                }
            case 'datagrid' : {
                    $this->data['content'] =  json_encode($this->dataGrid());
                }
        }
    }
    
    public function viewForm()
    { 
        $main_content = new MainTemplater(DIR_ADMIN_TMPL.$this->module."/full-view.php");
        $main_content = $main_content->parse(); 
        
        $fields = array(
            "#ORDERID#", 
            "#COUSTOMER_NAME#",
            "#COUSTOMER_PHONE#",
            "#COUSTOMER_ADDRESS#",
            "#PRODUCT_NAME#",
            "#PRODUCT_PRICE#",
            "#PRODUCT_QTY#",
            "#SHIPPMENT_CHARGE#",
            "#COD_CHARGE#",
            "#TOTAL_PRICE#",
            "#CREATED_DATE#",
        );

        if ($this->payment_method == 'c') 
        {
            $cod = $this->cod_charges;
        }else{
            $cod = '0.00';
        }
        $fields_replace = array(
            ORDER_FORMAT.$this->order_id,
            $this->customer_name,
            $this->customer_phone,
            $this->customer_address,
            $this->product_name,
            $this->product_price,
            $this->product_qty,
            $this->shippment_charge,
            $cod,
            $this->total_price,
            getDateFormat($this->created,'y'),
        );
        $content=str_replace($fields,$fields_replace,$main_content);
        return sanitize_output($content);
}
    
    public function getForm() 
    {
        $content = $optionHTML = '';
        $main_content = new MainTemplater(DIR_ADMIN_TMPL . $this->module . "/editForm.php");
        $main_content = $main_content->parse();  

        
        $fields = array(
            "%TYPE%",
            "%ID%"
            
        );
        $fields_replace = array(
            $this->type,
            $this->id
        );

        $content = str_replace($fields, $fields_replace, $main_content);
        return filtering($content, 'output', 'text');
        
    }

    public function discrepancyForm() 
    {
        $content = $optionHTML = '';
        $main_content = new MainTemplater(DIR_ADMIN_TMPL . $this->module . "/weightDiscrepancy.php");
        $main_content = $main_content->parse();  
        
        $orderRes = $this->db->pdoQuery("SELECT * FROM tbl_order WHERE id='".$this->id."' ")->result();

        $fields = array(
            "%SHIP_WEIGHT%",
            "%TYPE%",
            "%ID%"
        );
        $fields_replace = array(
            $orderRes['ship_pack_weight'],
            $this->type,
            $this->id
        );

        $content = str_replace($fields, $fields_replace, $main_content);
        return filtering($content, 'output', 'text');
        
    }
    public function dataGrid() 
    {
        $content = $operation = $whereCond = $totalRow = NULL;
        $result = $tmp_rows = $row_data = array();
        extract($this->searchArray);
        $chr = str_replace(array('_', '%'), array('\_', '\%'), $chr);
        
        $whereCond = ' WHERE 1=1 ';
        if (isset($chr) && $chr != '') {
            $whereCond .= " AND order_id LIKE '%" . $chr . "%' OR customer_name LIKE '%" . $chr . "%' OR product_name LIKE '%" . $chr . "%' ";
                             
        }
        if (isset($sort))
            $sorting = $sort . ' ' . $order;
        else
            $sorting = 'id DESC';
        
        $status_ids = "a" ;
        
        // $qrySel = $this->db->pdoQuery("SELECT  * FROM $this->table WHERE 1=1 ORDER BY id DESC ")->results();

        $qrySel = $this->db->pdoQuery("SELECT  tbl_order.* , tbl_shipping_rate.courier_partner  
        FROM tbl_order
        LEFT JOIN tbl_shipping_rate ON tbl_order.courier_partner = tbl_shipping_rate.id
        ".$whereCond." ORDER BY " .$sorting." limit " .$offset." ," .$rows."")->results();
            
            $totalRow = count($qrySel);

            foreach ($qrySel as $fetchRes) 
            {
                $status = ($fetchRes['status'] == "c") ? "checked" : "";
                $payment_method = $fetchRes['payment_method'] == 'c' ? "COD" : "Prepaid";
                $order_status = $fetchRes['status'] == 'c' ? "Confirm" : "Panding";

                $operation = '';
                            
                //$operation.=get_operation($fetchRes['id'],"edit","btnEdit","Edit");
                $operation.=get_operation($fetchRes['id'],"weightDiscrepancy","btnEdit","Add-Weight-Discrepancy");
                $operation.=get_operation($fetchRes['id'],"view","btnEdit","View");
                //$operation.=get_operation($fetchRes['id'],"delete","btn-delete","Delete");

                
                $final_array = array(
                    $fetchRes['id'],
                    ORDER_FORMAT.$fetchRes['order_id'],
                    getDateFormat($fetchRes['created']),
                    $fetchRes['courier_partner'],
                    'channel name',
                    $fetchRes['product_name'],
                    $payment_method,
                    $fetchRes['customer_name'],
                    $order_status,
                    //get_switch($fetchRes['id'],$status),
                    $operation,
                );
                $row_data[] = $final_array;
            }

            $result["sEcho"] = $sEcho;
            $result["iTotalRecords"] = (int) $totalRow;
            $result["iTotalDisplayRecords"] = (int) $totalRow;
            $result["aaData"] = $row_data;
            return $result;
        }

    public function getPageContent() 
    {
        $final_result = NULL;
        $main_content = new MainTemplater(DIR_ADMIN_TMPL . $this->module."/view.php");$final_result = $main_content->parse();
        return $final_result;
    }

}
