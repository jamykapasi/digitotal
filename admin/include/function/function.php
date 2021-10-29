<?php


function get_switch($id = 0,$status='')
{
    $html = '<div class="switch-small">
              <input type="checkbox" class="make-switch" data-action="ajax.php?id='.$id.'" '.$status.' data-on-label="ON" data-off-label="OFF"
            </div>';
    return $html;        
}

function get_operation($id = 0,$action_name = "" ,$class_name = "",$label_text = "",$data_id = 0)
{
    $html ='&nbsp; <a data-id='.$data_id.' href="ajax.php?action='.$action_name.'&id='.$id.'" class="btn default btn-xs '.$class_name.'">
                &nbsp;'.$label_text.'</a>';
    return $html;            
}


function getActiveClass($section_name)
{
    $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 

    if (strpos($url, $section_name) == false) { 
        return ""; 
    } else { 
        return "active"; 
    }             
}

function getLoggedinName() {
	global $db, $adminUserId;
	$qrysel = $db->select("username","id=".$adminUserId."");
	$fetchUser = mysql_fetch_object($qrysel);
	return trim(addslashes(ucwords($fetchUser->username)));
}

function makeConstantFile($default_lang=0,$insertId=0)
{
    global $db, $adminUserId;
    
    $qrysel1 = $db->pdoQuery("SELECT * FROM tbl_lang")->results();
    
    foreach($qrysel1 as $value)
    {
        $fp = fopen(DIR_INC. "language/".$value['id'].".php","wb");
        $content = '';


        $qsel1 = $db->pdoQuery("SELECT * FROM tbl_language")->results();
        
        $content.='<?php ';
        foreach($qsel1 as $fetchSel1){
            
            if($value['id']==1)
            {
                 $content.= ' define("'.$fetchSel1['constant_name'].'","'.$fetchSel1['english_value'].'"); ';
            } else {
                $content.= ' define("'.$fetchSel1['constant_name'].'","'.$fetchSel1['nepali_value'].'"); ';
            }
        }
        $content.=' ?>';
        fwrite($fp,$content);
        fclose($fp);
    }
    
}






?>
