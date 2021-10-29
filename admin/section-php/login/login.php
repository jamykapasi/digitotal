<?php

class Login extends Home {

    function __construct() {
        parent::__construct();
    }
    public function getPageContent() {
        $final_result = NULL;
        $main_content = new MainTemplater(DIR_ADMIN_TMPL . "login/login.php");
        $final_result = $main_content->parse();
        return $final_result;
    }

}

?>