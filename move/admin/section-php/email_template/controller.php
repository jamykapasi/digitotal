<?php
class Controller extends Home {
    public $data = array();
    public function __construct($module, $id = 0, $objPost = NULL, $searchArray = array(), $type = '') {
        global $db;
        $this->db = $db;
        $this->data['id'] = $this->id = $id;
        $this->module = $module;
        $this->table = 'tbl_email_html';
        $this->type = ($this->id > 0 ? 'edit' : 'add');
        $this->searchArray = $searchArray;
        parent::__construct();
        
        if ($this->id > 0) {

            $fetchRes = $this->db->pdoQuery("SELECT * FROM $this->table WHERE id = '".$this->id."'")->result();
            foreach ($fetchRes as $k => $v) {
                $this->{$k} = $v;
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
    
    

    public function getForm() 
    {

        $content = $optionHTML = '';
        $main_content = new MainTemplater(DIR_ADMIN_TMPL . $this->module . "/editForm.php");
        $main_content = $main_content->parse();
        
        $fields = array(
            "%HTML_NAME%",
            "%SUBJECT_NAME%",
            "%HTML_CODE%",
            "%ACTION%",
            "%TYPE%",
            "%ID%"
        );

        $fields_replace = array(
            $this->html_name,
            $this->subject_name,
            $this->html_code,
            $this->action,
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
            $whereCond .= " AND html_name LIKE '%" . $chr . "%' ";
                             
        }
        if (isset($sort))
            $sorting = $sort . ' ' . $order;
        else
            $sorting = 'id DESC';

       
      $status_ids = "a" ;
        $qrySel = $this->db->pdoQuery("SELECT  * FROM $this->table WHERE status = '".$status_ids."'")->results();
        $totalRow = count($qrySel);

        foreach ($qrySel as $fetchRes) 
        {
            
            $status = ($fetchRes['status'] == "a") ? "checked" : "";
            $operation = '';
           
            $operation.=get_operation($fetchRes['id'],"edit","btnEdit","Edit");
            $operation.=get_operation($fetchRes['id'],"delete","btn-delete","Delete");
           
            $final_array = array(
                $fetchRes['id'],
                $fetchRes['html_name'],
                $fetchRes['subject_name'],
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

    public function getPageContent() {
        $final_result = NULL;

        $main_content = new MainTemplater(DIR_ADMIN_TMPL . $this->module."/view.php");
        


        $final_result = $main_content->parse();
        return $final_result;
    }

}
