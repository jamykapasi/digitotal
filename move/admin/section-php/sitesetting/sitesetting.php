<?php
class SiteSetting extends Home {

    function __construct()
    {
        parent::__construct();
    }
    public function getHTML()
    {
        $html = "";
        $setting_html = "";

        $resGeneral = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'g' ORDER BY id ASC ")->results();

        $resMail = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'm' ")->results();

        $resHome = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'h' ")->results();
        
        $resFooter = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'f' ")->results();
        
        $resPlan = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'p' ")->results();

        $resPaypal = $this->db->pdoQuery("SELECT * FROM tbl_setting WHERE action = 'paypal' ")->results();
        

        foreach ($resGeneral as $key => $value) {
           
           if($value['type']=='textbox')
           {
                $setting_html.='<div class="form-group">
                    <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                    </div>
                </div>' ;
            }
            if($value['type']=='filebox')
            {
                $setting_html.='<div class="form-group">
                            <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                            <div class="col-md-4">
                                <input type="file" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'">
                            </div>
                        </div>';

                if($value['value'] != ""){
                        $setting_html.=' <div class="form-group">
                            <label for="1" class="control-label col-md-3"></label>
                            <div class="col-md-4">
                               <img src="'.SITE_IMG.$value["value"].'" height="100" width="100">
                            </div>
                        </div>
                        ';
                }        
            }
        }

        if(count($resPaypal) > 0)
        {
            $setting_html.= '<div class="form-group">
                        <label for="1" class="control-label col-md-3"></label>
                        <div class="col-md-4">
                            <h3>Paypal Setting</h3>
                        </div>
                    </div>';    
            
            foreach ($resPaypal as $key => $value) {
                
                if($value['type']=='textbox')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                        </div>
                    </div>' ;
                }
            }    
        }
           
       if(count($resMail) > 0)
       {
            $setting_html.= '<div class="form-group">
                        <label for="1" class="control-label col-md-3"></label>
                        <div class="col-md-4">
                            <h3>Email Setting</h3>
                        </div>
                    </div>';    
            
            foreach ($resMail as $key => $value) {
                
                if($value['type']=='textbox')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                        </div>
                    </div>' ;
                }
            }    
        }

        if(count($resHome) > 0)
        {
            $setting_html.= '<div class="form-group">
                        <label for="1" class="control-label col-md-3"></label>
                        <div class="col-md-4">
                            <h3>Homepage Setting</h3>
                        </div>
                    </div>';    
            
            foreach ($resHome as $key => $value) {
                
                if($value['type']=='textbox')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                        </div>
                    </div>' ;
                }
                if($value['type']=='textarea')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <textarea class="form-control required" rows="7" name="'.$value["field_name"].'" id="'.$value["field_name"].'">'.$value["value"].'</textarea>
                        </div>
                    </div>' ;
                }
            }    
        }

        if(count($resFooter) > 0)
        {
            $setting_html.= '<div class="form-group">
                        <label for="1" class="control-label col-md-3"></label>
                        <div class="col-md-4">
                            <h3>Footer Setting</h3>
                        </div>
                    </div>';    
            
            foreach ($resFooter as $key => $value) {
                
                if($value['type']=='textbox')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                        </div>
                    </div>' ;
                }
            }    
        }

        if(count($resPlan) > 0)
        {
            $setting_html.= '<div class="form-group">
                        <label for="1" class="control-label col-md-3"></label>
                        <div class="col-md-4">
                            <h3>Default Buy/sell plan price</h3>
                        </div>
                    </div>';    
            
            foreach ($resPlan as $key => $value) {
                
                if($value['type']=='textbox')
                {
                    $setting_html.='<div class="form-group">
                        <label for="1" class="control-label col-md-3">'.$value['label'].':</label>
                        <div class="col-md-4">
                            <input type="text" class="form-control required" name="'.$value["field_name"].'" id="'.$value["field_name"].'" value="'.$value["value"].'">
                        </div>
                    </div>' ;
                }
            }    
        }

        $replace = array(
            "%SETTING_FILED%" => $setting_html,
            );
        $html .= get_view(DIR_ADMIN_TMPL . "sitesetting/sitesetting.php",$replace);
        return $html;    


        
    }
}

?>