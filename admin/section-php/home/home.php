<?php

class Home {

    public function __construct() {
        foreach ($GLOBALS as $key => $values) {
            $this->$key = $values;
        }
       ;
    }
    public function index() {
        $content = NULL;
        return $content;
    }
    public function getLeftMenu() {
        $htmlSection = new MainTemplater(DIR_ADMIN_TMPL."left_menu.php");
        $htmlData = $htmlSection->parse();
        return $htmlData;
    }
    public function getHTML() {
        $htmlSection = new MainTemplater(DIR_ADMIN_TMPL."home/home.php");
        $htmlSection_parsed = $htmlSection->parse();
        return $htmlSection_parsed;
    }

}
