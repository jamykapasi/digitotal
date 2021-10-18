<?php
	$main->set("module", $module);
	
	$replace_head = array('%TAB_TITLE%' => $tab_title);
	$head_content = get_view(DIR_TMPL."head.php",$replace_head);
	
	$cls = '';
	$action = isset($_REQUEST['action']) && $_REQUEST['action'] != "" ? $_REQUEST['action'] : NULL;

	if($action == 'show_loading'){
		$cls = 'loading';
	}
	$js_var = load_js_variable($js_variables);
	$js =  load_js($scripts);
	$css =  load_css($styles);
	
	
		$footerContent = $objHome->getFooterContent();
		$headerContent = $objHome->getHeaderContent();
	
	$replace = array(
				'%LOAD_CLASS%'=>$cls,
				'%HEAD%'=>$head_content,
				'%SITE_HEADER%'=> $headerContent,
				'%BODY%'=>$pageContent,
				'%FOOTER%'=> $footerContent,
				'%MESSAGE_TYPE%'=>$msgType,
				'%LOAD_CSS%'=>$css,
				'%LOAD_JS%'=>$js,
				'%LOAD_JS_VARIABLE%'=>$js_var,
			);
	
	$page_content = get_view(DIR_TMPL."top-html.php",$replace);

	echo ($page_content);
	exit;
