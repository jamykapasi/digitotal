<?php

class Controller extends Home {

    public $data = array();
public function __construct($module, $id = 0, $objPost = NULL, $searchArray = array(), $type = '') {
        global $db;
        $this->db = $db;
        $this->data['id'] = $this->id = $id;
        $this->module = $module;
        $this->table = 'tbl_users';
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
            case 'addBalance' : {
                    $this->data['content'] =  $this->addBalance();
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
            "#FIRST_NAME#", 
            "#LAST_NAME#",
            "#EMAIL#",
            "#CREATED_DATE#",
        );
        $fields_replace = array(
            $this->first_name,
            $this->last_name,
            $this->email,
            getDateFormat($this->created,'y'),
        );
        $content=str_replace($fields,$fields_replace,$main_content);
        return sanitize_output($content);
    }
    
    public function addBalance()
    { 
        $main_content = new MainTemplater(DIR_ADMIN_TMPL.$this->module."/addBalance.php");
        $main_content = $main_content->parse(); 
        
        $fields = array(
            "%TYPE%",
            "%ID%"
        );
        $fields_replace = array(
            $this->type,
            $this->id
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
            "%FIRST_NAME%",
            "%LAST_NAME%",
            "%EMAIL_ADDRESS%",
            "%password%",
            "%mobile_number%",
            "%otp%",
            "%otp2%",
            "%TYPE%",
            "%ID%"
            
        );
        $fields_replace = array(
            $this->first_name,
            $this->last_name,
            $this->email,
            $this->password,
            $this->mobile_number,
            $this->otp,
            $this->verify_otp,
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
                $whereCond .= " AND first_name LIKE '%" . $chr . "%' OR 
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
                
                $operation.=get_operation($fetchRes['id'],"addBalance","btnEdit","Add balance");
                // $operation.=get_operation($fetchRes['id'],"edit","btnEdit","Edit");
                //$operation.=get_operation($fetchRes['id'],"view","btnEdit","View");
                //$operation.=get_operation($fetchRes['id'],"delete","btn-delete","Delete");
                
                $final_array = array(
                    $fetchRes['id'],
                    $fetchRes['id'],
                    $fetchRes['first_name'],
                    $fetchRes['company_name'],
                    $fetchRes['mobile_no'],
                    $fetchRes['email'],
                    $fetchRes['password'],
                    $fetchRes['monthly_order'],
                    getDateFormat($fetchRes['created']),
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
