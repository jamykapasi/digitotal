<?php 
$menu = "";
	
	$res  = $this->db->pdoQuery("SELECT tbl_menu.* FROM tbl_menu WHERE status = 'a' ")->results();
	
	foreach ($res as $key => $value) 
	{
		$menu  .= '<li class="'.getActiveClass($value["link"]).'">
		  	<a href="'.SITE_ADM_MOD.$value['link'].'" >
	    	  <span class="title"><i class="'.$value['icon'].'" aria-hidden="true"></i>'. $value['menu_name'] .'</span>
	  	 	   </a>
	   </li>';
	}
	
?>		
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				<?php echo $menu;?>
				<li class="sidebar-toggler-wrapper">
					<div class="sidebar-toggler hidden-phone">
	
					</div>
				</li>
			</ul>
		</div>
	</div>