<?php

//define('ADMIN_USER_ID', 1);

$sqlSettings = $db->select("tbl_setting", array("constant", "value"))->results();
foreach ($sqlSettings as $conskey => $consval) {
    define($consval["constant"], $consval["value"]);
}

$host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$canonical_url = "http://" . $host . $request_uri;
define('CANONICAL_URL', $canonical_url);

if(!defined('KEY_ID')){
    //define('KEY_ID', ''); //Live
    define('KEY_ID', 'rzp_test_MGWEvtj7yKCjDr'); //TEST
}

if(!defined('KEY_SECRET')){
    //define('KEY_SECRET', ''); //Live
    define('KEY_SECRET', 'dnzW8z6gtLTRi44lZptFPsID'); //TEST
}

if(!defined('DISPLAY_CURRENCY')){
    //define('DISPLAY_CURRENCY', 'INR'); //Live
    define('DISPLAY_CURRENCY', 'INR'); //TEST
}

define('ORDER_FORMAT', 'ORDER');

define('MEND_SIGN', '<font color="#FF0000">*</font>');

define('AUTHOR', 'Rajnish');
define('ADMIN_NM', 'Administrator');
define('REGARDS', SITE_NAME);


define("SITE_INC", SITE_URL . "include/");
define("DIR_INC", DIR_URL . "include/");
define("SITE_MOD", SITE_URL . "section-php/");
define("DIR_MOD", DIR_URL . "section-php/");



define("SITE_UPD", SITE_URL . "upload/");
define("DIR_UPD", DIR_URL . "upload/");


define('SITE_THEME', SITE_URL . 'theme/');
define("DIR_THEME", DIR_URL . "theme/");
define('SITE_CSS', SITE_THEME . 'css/');

define('SITE_JS', SITE_THEME . 'js/');


define("DIR_CSS", DIR_THEME . "css/");
define('SITE_IMG', SITE_THEME . 'image/');
define("DIR_IMG", DIR_THEME . "image/");
define("DIR_FONT", DIR_INC . "font/");


//define("SITE_THEME_CSS", SITE_URL . "theme/css/");
define('SITE_THEME_FONTS', SITE_URL . 'font/');
define('SITE_THEME_IMG', SITE_URL . 'image/');
define('SITE_THEME_JS', SITE_URL . 'js/');


define('DIR_THEME_IMG', DIR_THEME . 'image/');

//define("SITE_JS", SITE_INC . "js/");

define("SITE_JS_MOD", SITE_JS . "section-php/");

define('SITE_LOGO_URL', SITE_URL . 'theme-image/' . SITE_LOGO . '?w=161&h=37');

define("DIR_FUN", DIR_URL . "include/functions/");
define("DIR_TMPL", DIR_URL . "section-html/");

/* Start ADMIN SIDE */
define("SITE_ADMIN_URL", SITE_URL . "admin/");


define("SITE_ADM_CSS", ADMIN_URL . "theme/css/");

define("SITE_ADMIN_JS", ADMIN_URL . "theme/js/");


define("SITE_ADM_IMG", ADMIN_URL . "theme/image/");

define("SITE_ADM_INC", ADMIN_URL . "include/");
define("SITE_ADM_MOD", ADMIN_URL . "section-php/");
define("SITE_ADM_JS", ADMIN_URL . "include/javascript/");
define("SITE_ADM_UPD", ADMIN_URL . "upload/");
define("SITE_JAVASCRIPT", SITE_URL . "include/js/");
define("SITE_ADM_PLUGIN", ADMIN_URL . "include/plugin/");
define("SITE_ADM_JAVA", SITE_ADMIN_URL . "include/js/");

define("DIR_ADMIN_URL", DIR_URL . "admin/");
define("DIR_ADMIN_THEME", DIR_ADMIN_URL . "theme/");
define("DIR_ADMIN_TMPL", DIR_ADMIN_URL . "section-html/");
define("DIR_ADM_INC", DIR_ADMIN_URL . "include/");
define("DIR_ADM_MOD", DIR_ADMIN_URL . "section-php/");
define("DIR_ADM_PLUGIN", DIR_ADM_INC . "plugin/");
define("DIR_ADMIN_FIELDS_HTML", DIR_ADMIN_TMPL."fields_htmld/");

define('COUNTRY_CODE','+91');

/* End ADMIN SIDE */

define("NMRF", '<div class="no-results">No more results found.</div>');
define("LOADER", '<img alt="Loading.." src=" ' . SITE_THEME_IMG . 'ajax-loader-transparent.gif" class="lazy-loader" />');

define("PHP_DATE_FORMAT", 'M d, Y');
define("PHP_DATE_FORMAT_MONTH", 'M Y');
define("PHP_DATE_FORMAT_MONTH_YEAR", 'M Y');
define("MYSQL_DATE_FORMAT", '%b %d, %Y');
define("BOOTSTRAP_DATEPICKER_FORMAT", 'M d, yyyy');

define("GOOGLE_MAPS_API_KEY", "AIzaSyDdUNwDsMUgonNscXdqmZAAWn4B1mFweDM");
