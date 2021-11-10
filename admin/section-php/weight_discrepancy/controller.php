<?php

class Controller extends Home {

    public $data = array();
public function __construct($module, $id = 0, $objPost = NULL, $searchArray = array(), $type = '') {
        global $db;
        $this->db = $db;
        $this->data['id'] = $this->id = $id;
        $this->module = $module;
        $this->table = 'tbl_weight_discrepancy';
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
            "#COURIER_PARTNER#",
            "#WITHIN_CITY#",
            "#WITHIN_ZONE#",
            "#METROS#",
            "#REST_OF_INDIA#",
            "#SPECIAL_ZONE#",
            "#COD#",
            "#CREATED_DATE#",
        );
        $fields_replace = array(
            $this->courier_partner,
            $this->within_city,
            $this->within_zone,
            $this->metros,
            $this->rest_of_india,
            $this->special_zone,
            $this->cod,
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
            "%ORDER_ID%",
            "%PRODUCT_DETAILS%",
            "%PRODUCT_QTY%",
            "%COURIER_NAME%",
            "%ENTERD_WEIGHT%",
            "%CHARGED_WEIGHT%",
            "%PROOF%",
            "%TYPE%",
            "%ID%"
            
        );
        $fields_replace = array(
            $this->order_id,
            $this->product_name,
            $this->product_qty,
            $this->courier_name,
            $this->enterd_weight,
            $this->charged_weight,
            $this->proof,
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
                $whereCond .= " AND id LIKE '%" . $chr . "%' OR 
                                     LIKE '%" . $chr . "%'  ";
                                 
            }
            if (isset($sort))
                $sorting = $sort . ' ' . $order;
            else
                $sorting = 'id DESC';
        
        $status_ids = "a" ;
        
        $qrySel = $this->db->pdoQuery("SELECT  * FROM $this->table WHERE 1=1 ORDER BY id DESC ")->results();

           $totalRow = count($qrySel);

            foreach ($qrySel as $fetchRes) 
            {
                $status = ($fetchRes['status'] == "a") ? "checked" : "";
              
                $operation = '';
                            
                //$operation.=get_operation($fetchRes['id'],"edit","btnEdit","Edit");
                //$operation.=get_operation($fetchRes['id'],"view","btnEdit","View");
                //$operation.=get_operation($fetchRes['id'],"delete","btn-delete","Delete");
                
                if($fetchRes['proof'] == "")
                {
                    $discrepancy_proof = '<img src="'.SITE_UPD.'/discrepancy_proof/no_image.jpg" width="50" height="50">';
                } else {

                    $discrepancy_proof = '<img src="'.SITE_UPD.'/discrepancy_proof/'.$fetchRes['proof'].'" width="50" height="50">';
                }

                $final_array = array(
                    $fetchRes['id'],
                    date('d M Y h:i a',strtotime($fetchRes['created'])),
                    date('d M Y h:i a',strtotime($fetchRes['order_date_time'])),
                    $fetchRes['product_name'],
                    $fetchRes['courier_name'],
                    $fetchRes['enterd_weight']."kg",
                    $fetchRes['charged_weight']."kg",
                    $discrepancy_proof,
                    get_switch($fetchRes['id'],$status),
                    //$operation,
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
