<?php
require DIR_INC . 'Twilio/autoload.php';
use Twilio\Rest\Client;

function APIsuccess($msg = 'success',$data = array(),$current_page = '',$total_page = '',$total_records = '',$global_array = array())
{
    if($current_page != '' && $total_page != '' && $total_records != '')
    {
        if(empty($data) || count($data) <= 0 ){
            echo json_encode(array("status" => true, 
                               "message" => $msg, 
                               "current_page" => $current_page, 
                               "total_page" => $total_page, 
                               "total_records" => $total_records, 
                               "global" => $global_array), 
                        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }else{
            echo json_encode(array("status" => true, 
                               "message" => $msg, 
                               "current_page" => $current_page, 
                               "total_page" => $total_page, 
                               "total_records" => $total_records, 
                               "global" => $global_array,
                               "data" => $data), 
                        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }       
        exit;
    }
    else if($total_records != '')
    {
        echo json_encode(array("status"  => true,
                               "message" => $msg,
                               "total_records" => $total_records, 
                               "data" => $data), 
                        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);exit;
    }
    else
    {
        echo json_encode(array("status"  => true,
                               "message" => $msg, 
                               "data" => $data), 
                        JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE );exit;
    }
}
function APIerror($msg = NRF, $data = array())
{
    echo json_encode(array("status" => false, "message" => $msg , "data" => array() ), JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
}

function getTableValue($table, $field, $wherecon = array()) {
    global $db;
    $qrySel   = $db->select($table, array($field), $wherecon);
    $qrysel1  = $qrySel->result();
    $totalRow = $qrySel->affectedRows();
    $fetchRes = $qrysel1;

    if ($totalRow > 0) {
        return $fetchRes[$field];
    } else {
        return "";
    }
}

function checkUser($user_id = 0)
{
    global $db;
    $res = $db->count("tbl_users",array("id"=>$user_id));

    if($res <= 0)
    {
        APIerror("User not found.");
    }
}

function getMonthName($monthNum = 1)
{
    $monthName = date('F', mktime(0, 0, 0, $monthNum, 10));

    return $monthName;

}


function redirectPage($url) {
    header('Location:' . $url);
    exit;
}
function created()
{
   return date("Y-m-d H:i");
}

function getDateFormat($date="" , $is_time = 'n')
{
    if($is_time=="n")
    {
        return date('d M Y',strtotime($date));
    } else {
        return date('d F Y h:i a',strtotime($date));
    }
}


function get_view($tpl_path, $replace = array())
{
    $tpl        = new MainTemplater($tpl_path);
    $parsed_tpl = $tpl->parse();
    if (!empty($replace)) {
        return str_replace(array_keys($replace), array_values($replace), $parsed_tpl);

    } else {
        return $parsed_tpl;
    }
}


function load_css($filename = array()) {
    $returnStyle = '';
    $filePath = array();
    if (!empty($filename)) {
        if (domain_details('dir') == 'admin') {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_ADM_CSS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_ADM_CSS . $v;
                }
            }
        } else {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_CSS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_CSS . $v;
                }
            }
        }
    }
    foreach ($filePath as $style) {
        $returnStyle .= '<link rel="stylesheet" type="text/css" href="' . $style . '">';
    }
    return $returnStyle;
}

function load_js_variable($js_variable = NULL) {
     $returnVariable = NULL;
    if($js_variable!=NULL){
            $returnVariable .= '<script type="text/javascript" >'.$js_variable .'</script>';

    }
    return $returnVariable;
}

function load_js($filename = array()) {

    $returnScripts = '';
    $filePath = array();
    if (!empty($filename)) {
        if (domain_details('dir') == 'admin') {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_ADM_JS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_ADM_JS . $v;
                }
            }
        } else {
            foreach ($filename as $k => $v) {
                if (is_array($v)) {
                    if (isset($v[1]) && $v[1] != "") {
                        $filePath[] = $v[1] . $v[0];
                    } else {
                        $filePath[] = SITE_JS . $v[0];
                    }
                } else {
                    $filePath[] = SITE_JS . $v;
                }
            }
        }
    }
    foreach ($filePath as $scripts) {
        $returnScripts .= '<script type="text/javascript" src="' . $scripts . '"></script>';
    }

    return $returnScripts;
}

function disMessage($msgArray, $script = true) {
    if(domain_details('dir') == 'admin'){
        $script = false;
    }
    $message = '';
    $content = '';
    $type = isset($msgArray["type"]) ? $msgArray["type"] : NULL;
    //$message = isset($msgArray["var"]) ? $msgArray["var"] : NULL;
    $var = isset($msgArray["var"]) ? $msgArray["var"] : NULL;
    if (!is_null($var)) {
        switch ($var) {
            case 'loginRequired' : {
                    $message = "Please login to continue";
                    break;
                }
            default : {
                    $message = $var;
                    break;
                }
        }
    }
    $type1 = ($type == 'suc' ? 'success' : ($type == 'inf' ? 'info' : ($type == 'war' ? 'warning' : 'error')));
    if ($script) {
        $content = '<script type="text/javascript"> toastr["' . $type1 . '"]("' . $message . '");</script>';
    } else {
        $content = 'toastr["' . $type1 . '"]("' . $message . '");';
    }

    return $content;
}

function Authentication($reqAuth = false, $redirect = true, $allowedUserType = 'a') {
    $todays_date = date("Y-m-d");
    global $adminUserId, $sessUserId, $db;

    $whichSide = domain_details('dir');
    if ($reqAuth == true) {
        if ($whichSide == 'admin') {

            if ($adminUserId == 0) {
                $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'loginRequired'));
                $_SESSION['req_uri_adm'] = $_SERVER['REQUEST_URI'];

                if ($redirect) {
                    redirectPage(SITE_ADMIN_URL);
                } else {
                    return false;
                }
            } else {
                return true;
            }
        } else {

            if ($sessUserId <= 0) {
                $_SESSION["toastr_message"] = disMessage(array('type' => 'err', 'var' => 'loginRequired'));
                $_SESSION['req_uri'] = $_SERVER['REQUEST_URI'];

                if ($redirect) {
                    redirectPage(SITE_URL);
                } else {
                    return false;
                }
            }
            return true;
        }
    }
}

function sendMail($type,$arrayCont,$to, $newsletter_subject='' , $replyTo=FROM_EMAIL,$unsubscribe_text='',$attachement=array()){
    global $sessUserId;
    global $db;
    
    $q = $db->select('tbl_email_html',array('subject_name','html_code'),array('action'=>$type))->result();
    
    $subject = trim(stripslashes($q["subject_name"]));
    
    if($newsletter_subject!=''){
        $subject = trim(stripslashes($newsletter_subject));
    }
    $subject_haystack = array(
        "###SITE_NM###" => SITE_NAME,
        "###NAME###"    => (isset($arrayCont["NAME"]) && $arrayCont["NAME"] != '' ? $arrayCont["NAME"] : '')
    );
    $subject = strtr($subject,$subject_haystack);
    
    $message = trim(stripslashes($q["html_code"]));
    $array_keys=(array_keys($arrayCont));
    
    for($i=0;$i<count($array_keys);$i++){
         $message = str_replace("###".$array_keys[$i]."###","".$arrayCont[$array_keys[$i]]."",$message);
    }

    
    $return=sendEmailAddress($to, $subject, $message,$replyTo,$attachement);
    return $return;
    //return true;
}

function sendEmailAddress($to, $subject, $message,$replyTo,$attachement) {

    require_once(DIR_INC."function/class.phpmailer.php");
    require_once(DIR_INC."function/class.smtp.php");
    $from_nm=FROM_EMAIL;
    $from_email=$replyTo;
    $headers = "Reply-To: " . $from_nm . " <" . $from_email . ">\r\n";
    $headers .= "From: " . $from_nm . " <" . $from_email . ">\r\n";
    $headers .= "Return-Path: ".$from_nm."<".$from_email.">\r\n";
    $headers .= "Organization: ".$from_nm."\r\n";
    $headers .= "X-Priority: 3\r\n";
    $headers .= "X-Mailer: PHP". phpversion() ."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Transfer-Encoding: 8bit\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = false;
    //$mail->CharSet="UTF-8";
    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = 'tld';
    
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    $mail->IsHTML(true);
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SetFrom(SMTP_USERNAME,SITE_NAME);
    $mail->AddReplyTo($from_email,SITE_NAME);
    $mail->Subject = $subject;
    $mail->Body = $message;
    if(!empty($attachement)){
        foreach ($attachement as $avalue) {
            $mail->AddAttachment($avalue);
        }
    }

    $mail->AddAddress($to);
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $result = true;
    if(!$mail->Send()){
        echo "Mailer Error: " . $mail->ErrorInfo;
        $result = false;
    }
    return true;
}
function curPageURL() 
{
    $pageURL = 'http';

    if (isset($_SERVER["HTTPS"])) {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }

    define('CURRENT_PAGE_URL', $pageURL);
}

function curPageName() {
    $pageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
    define('CURRENT_PAGE_NAME', $pageName);
}

function checkIfIsActive() {
    global $db;

    if (isset($_SESSION['user_id']) && '' != $_SESSION['user_id']) {
        $user_details = $db->select("tbl_users", "*", array(
                    "id" => $_SESSION['user_id']
                ))->result();
        if ($user_details) {
            
            if ('d' == $user_details['status']) {
                unset($_SESSION['user_id']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);

                $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "You have not verified the email address that is registered with us. Please try logging in again after verifying your email address."));
                redirectPage(SITE_URL);
                return false;
            } else if ('d' == $user_details['status']) {
                unset($_SESSION['user_id']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);

                $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "Your account has been deactivated by Admin. Please contact Site Admin to re-activate your account."));
                redirectPage(SITE_URL);

                return false;
            } else {
                return true;
            }
        } else {
            unset($_SESSION['user_id']);
            unset($_SESSION['first_name']);
            unset($_SESSION['last_name']);

            $_SESSION['toastr_message'] = disMessage(array('type' => 'err', 'var' => "There seems to be an issue. Please try logging in again."));
            redirectPage(SITE_URL);
            return false;
        }
    } else {

        return true;
    }
}

function domain_details($returnWhat)
{
    $arrScriptName = explode('/', $_SERVER['SCRIPT_NAME']);
    foreach ($arrScriptName as $singleSciptName) {

        if ($singleSciptName == "admin") {
            return $singleSciptName;
            break;
        }
    }
}

function sanitize_output($buffer) {

    $search  = array('/\>[^\S ]+/s', '/[^\S ]+\</s', '/(\s)+/s', '/<!--.*?-->|\t|(?:\r?\n[ \t]*)+/s');
    $replace = array('>', '<', '\\1', '');
    $buffer  = preg_replace($search, $replace, $buffer);
    return $buffer;
}

function filtering($value = '', $type = 'output', $valType = 'string', $funcArray = '') {
    global $abuse_array, $abuse_array_value;

    if ($valType != 'int' && $type == 'output') {
        $value = str_ireplace($abuse_array, $abuse_array_value, $value);
    }

    if ($type == 'input' && $valType == 'string') {
        $value = str_replace('<', '< ', $value);
    }

    $content = $filterValues = '';
    if ($valType == 'int')
        $filterValues = (isset($value) ? (int) strip_tags(trim($value)) : 0);
    if ($valType == 'float')
        $filterValues = (isset($value) ? (float) strip_tags(trim($value)) : 0);
    else if ($valType == 'string')
        $filterValues = (isset($value) ? (string) strip_tags(trim($value)) : NULL);
    else if ($valType == 'text')
        $filterValues = (isset($value) ? (string) trim($value) : NULL);
    else
        $filterValues = (isset($value) ? trim($value) : NULL);

    if ($type == 'input') {
        //$content = mysql_real_escape_string($filterValues);
        //$content = $filterValues;
        //$value = str_replace('<', '< ', $filterValues);
        $content = addslashes($filterValues);
    } else if ($type == 'output') {
        if ($valType == 'string')
            $filterValues = html_entity_decode($filterValues);

        $value = str_replace(array('\r', '\n', ''), array('', '', ''), $filterValues);
        $content = stripslashes($value);
    }
    else {
        $content = $filterValues;
    }

    if ($funcArray != '') {
        $funcArray = explode(',', $funcArray);
        foreach ($funcArray as $functions) {
            if ($functions != '' && $functions != ' ') {
                if (function_exists($functions)) {
                    $content = $functions($content);
                }
            }
        }
    }

    return $content;
}
function genrateRandom($length = 8, $seeds = 'alphanum') {
    // Possible seeds
    $seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $seedings['numeric'] = '0123456789';
    $seedings['alphanum'] = 'abcdefghijklmnopqrstuvwqyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $seedings['hexidec'] = '0123456789abcdef';
    // Choose seed
    if (isset($seedings[$seeds])) {
        $seeds = $seedings[$seeds];
    }
    // Seed generator
    list($usec, $sec) = explode(' ', microtime());
    $seed = (float) $sec + ((float) $usec * 100000);
    mt_srand($seed);
    // Generate
    $str = '';
    $seeds_count = strlen($seeds);
    for ($i = 0; $length > $i; $i++) {
        $str .= $seeds[mt_rand(0, $seeds_count - 1)];
    }
    return $str;
}

function sendOtp($phone_no='',$otp = 0){
    
    $msg = $otp . ' is your one time password to proceed on '.SITE_NAME.'. It is valid for 1 minute. Do not share your otp with anyone.';
    
    $sid = TWILIO_SID;
    $token = TWILIO_TOKEN;
    
    $client = new Twilio\Rest\Client($sid, $token);
        
    $message = $client->messages->create(
        $phone_no,
        array(
            'from' => TWILIO_PHONE_NO,
            'body' => $msg
        )
    );
}


function getUsername($id = 0)
{
    global $db;
    $res = $db->pdoQuery("SELECT first_name , last_name FROM tbl_users WHERE id = '".$id."'")->result();
    return ucfirst($res['first_name'])." ".ucfirst($res['last_name']);
}