<?php
class changePassword extends Home {

    function __construct() {
        parent::__construct();
    }
    
    public function submitProcedure() {
        $opasswd = isset($this->objPost->opasswd) ? $this->objPost->opasswd : '';
        $passwd  = isset($this->objPost->passwd) ? $this->objPost->passwd : '';
        $cpasswd = isset($this->objPost->cpasswd) ? $this->objPost->cpasswd : '';

        $qrySel = $this->db->select("tbl_admin", array("uPass"), array("id =" => $this->adminUserId))->result();
        $fetchUser = $qrySel;
        if ($fetchUser["uPass"] != md5($opasswd)) {
            return 'wrongPass';
        } else if ($passwd != $cpasswd) {
            return 'passNotmatch';
        } else {
            $value = new stdClass();
            $value->uPass     = md5($cpasswd);
            $value->ipAddress = $_SERVER["REMOTE_ADDR"];

            $valArray   = array("uPass" => $value->uPass, "ipAddress" => $value->ipAddress);
            $whereArray = array("id " => $this->adminUserId);
            $this->db->update("tbl_admin", $valArray, $whereArray);
            return 'succChangePass';
        }
    }

    public function getHTML() {
        $htmlObj = new MainTemplater(DIR_ADMIN_TMPL. "change_password/change_password.php");
        $html = $htmlObj->parse();
        return $html;
    }

}
