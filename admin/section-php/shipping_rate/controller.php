<?php

class Controller extends Home {

    public $data = array();
public function __construct($module, $id = 0, $objPost = NULL, $searchArray = array(), $type = '') {
        global $db;
        $this->db = $db;
        $this->data['id'] = $this->id = $id;
        $this->module = $module;
        $this->table = 'tbl_shipping_rate';
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
            case 'upload' : {
                    $this->data['content'] =  $this->uploadCSV();
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
    
    public function uploadCSV()
    { 
        $main_content = new MainTemplater(DIR_ADMIN_TMPL.$this->module."/upload_csv.php");
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

    public function viewForm()
    { 
        $main_content = new MainTemplater(DIR_ADMIN_TMPL.$this->module."/full-view.php");
        $main_content = $main_content->parse(); 
        
        $pincode ="";

        $pincodeRes = $this->db->pdoQuery("SELECT * FROM tbl_courier_pincode WHERE courier_partner_id=".$_REQUEST['id']." LIMIT 50 ")->results();
        
        foreach ($pincodeRes as $key => $value) 
        {
            $pincode .='<li class="pincode-item">
                            <span>'.$value['pincode'].'</span> <a href="javascript:void()" data-id="'.$value['id'].'" class="remove-icon" id="removePin"> X </a>
                        </li>';
        }
        $fields = array(
            "#COURIER_PARTNER#",
            "#WITHIN_CITY#",
            "#WITHIN_ZONE#",
            "#METROS#",
            "#REST_OF_INDIA#",
            "#SPECIAL_ZONE#",
            "#COD#",
            "#CREATED_DATE#",
            "#PINCODE#",
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
            $pincode,
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
            //"%PINCODE%",
            "%COURIER_PARTNER%",
            "%WITHIN_CITY%",
            "%WITHIN_ZONE%",
            "%METROS%",
            "%REST_OF_INDIA%",
            "%SPECIAL_ZONE%",
            "%COD%",
            "%TYPE%",
            "%ID%"
            
        );
        $fields_replace = array(
            //$this->pincode,
            $this->courier_partner,
            $this->within_city,
            $this->within_zone,
            $this->metros,
            $this->rest_of_india,
            $this->special_zone,
            $this->cod,
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
        
        $whereCond = ' WHERE 1=1';
        if (isset($chr) && $chr != '') {
            $whereCond .= " AND courier_partner LIKE '%" . $chr . "%' ";
                             
        }
        if (isset($sort))
            $sorting = $sort . ' ' . $order;
        else
            $sorting = 'id DESC';
        
        $status_ids = "a" ;
        
        $qrySel = $this->db->pdoQuery("SELECT  * FROM $this->table ".$whereCond." ORDER BY " .$sorting." limit " .$offset." ," .$rows."")->results();
        
           $totalRow = count($qrySel);

            foreach ($qrySel as $fetchRes) 
            {
                $status = ($fetchRes['status'] == "a") ? "checked" : "";
              
                $operation = '';
                            
                $operation.=get_operation($fetchRes['id'],"upload","btnEdit","Bulk Pincode");
                $operation.=get_operation($fetchRes['id'],"edit","btnEdit","Edit");
                $operation.=get_operation($fetchRes['id'],"view","btnEdit","View");
                $operation.=get_operation($fetchRes['id'],"delete","btn-delete","Delete");


                if($fetchRes['courier_logo'] == "")
                {
                    $courier_logo = '<img src="'.SITE_UPD.'/courier_logo/no_image.jpg" width="50" height="50">';
                } else {

                    $courier_logo = '<img src="'.SITE_UPD.'/courier_logo/'.$fetchRes['courier_logo'].'" width="50" height="50">';
                }
                
                $final_array = array(
                    $fetchRes['id'],
                    $fetchRes['id'],
                    $courier_logo,
                    $fetchRes['courier_partner'],
                    get_switch($fetchRes['id'],$status),
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
