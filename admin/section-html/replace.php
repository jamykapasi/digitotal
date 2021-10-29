<?php
	$main->set("module", $module);
	
	require_once(DIR_ADMIN_THEME.'theme_template.php');

	$head->styles  = $styles;
	$head->scripts = $scripts;
	
	$head        =  $head->parse();
	$site_header = ($header_panel!=false)?$site_header->parse():'';
	$left        = ($left_panel!=false)?$objHome->getLeftMenu():'';
	$body        =  $pageContent;
	$footer      = ($footer_panel!=false)?$footer->parse():'';

	/*add class and div based on admin login contdition*/
	if($adminUserId>0){
		$f_cond   = '<div class="page-container"><div class="top_header">
		
		<h4 class="header_site_name">'.SITE_NAME.'</h4> 
		
		<!--<span class="header_menu_icon"><i class="fa fa-envelope" aria-hidden="true"></i><span class="header_menu_count">0</span></span>-->
		
	<span class="header_menu_icon"><i class="fa fa-bell" aria-hidden="true"></i><span class="header_menu_count">0</span></span>
		
		<div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            '.$_SESSION["admin_name"].'
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="'.SITE_URL.'admin_logout">Logout</a></li>
          </ul>
        </div>
		<div class="menu_icon">
			<i class="fa fa-bars" aria-hidden="true"></i>
		</div>

		</div>';
		$s_cond   = '<div class="page-content">';
		$t_cond   = $ft_cond = '</div>';
		$lg_class = "page-header-fixed";
	} else {
		$f_cond   = $s_cond = $t_cond = $ft_cond = '';
		$lg_class = "login";
	}
	/*add class and div based on admin login contdition*/

	/*load js*/
	$load_home = "";
	$loadJs    = load_js($scripts);
		/*load js for home page on top*/

		if($module == 'home'){
			$load_home = $loadJs;
			$loadJs    = "";
		}
		/*load js for home page on top*/

	/*load js*/


	$search = array('%HEAD%','%SITE_HEADER%','%LEFT%','%BODY%','%FOOTER%','%F_COND%','%S_COND%','%T_COND%','%FT_COND%','%LG_CLASS%','%LOAD_JS%','%HOME_JS%','%TOASTR_MSG%');
	$replace = array($head,$site_header,$left,$body,$footer,$f_cond,$s_cond,$t_cond,$ft_cond,$lg_class,$loadJs,$load_home,$toastr_message);
	$page_content=str_replace($search,$replace,$page->parse());
	echo $page_content;
	exit;