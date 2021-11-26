<?php
class Controller extends Home {
	function __construct($module = "",$token = 0) 
	{
		foreach ($GLOBALS as $key => $values) {
			$this->$key = $values;
		}
		$this->module = $module;
	}

	function getHTML($search='',$page_rec='',$api='') {
		
		$html =$limit = "";

		$where = '';
		if($search != ''){
			$where .= 'AND category_name LIKE "%'.$search.'%"';
		}

		if($page_rec > 0){
			$limit = ' LIMIT '.$page_rec.'';
		}

		$categoryRes = $this->db->pdoQuery("SELECT * FROM tbl_category WHERE 1=1 ".$where." ORDER BY id DESC ".$limit."")->results();

		foreach ($categoryRes as $key => $value) 
		{
			$html .='<tr class="row1">
                    <td class=" table-style pad">'.$value['category_name'].'</td>
					<td class="table-style pad"><button class="ship-btn btn-hv btn1" style="float:left;" id="editBtn" onclick="editModal()" data-id="'.$value['id'].'">EDIT</button>
					<span style="float:right;" class="circle-cross">
					<a href="javascript:void()" id="deleteCategory" data-id="'.$value['id'].'" class="cross-icon"> 
					<i class="fas fa-times-circle"></i></a></span>
					</td>
                  </tr>';
		}


		if($api == 'y'){
			
			$data['html'] = $html;
			
			echo json_encode($data);   
			exit;

		}else{

			$mainHTML =  DIR_TMPL . "product_category/view.php";
			$array = array(
				"%HTML%" => $html,
			);
			return get_view($mainHTML,$array);
		}
	}
	
	
}

?>
