<?php
$reqAuth = true;
require_once("../../../include/config.php");
include("controller.php");
$module = "shipping_rate";

if (isset($_POST["submitAddForm"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{
    extract($_REQUEST);
    if($id > 0 and $type="edit")
    {
		$update_array = array(
	        "courier_partner" => $courier_partner,
	        "within_city"     => $within_city,
	        "within_zone"     => $within_zone,
	        "metros"          => $metros,
	        "rest_of_india"   => $rest_of_india,
	        "special_zone"    => $special_zone,
	        "cod"             => $cod,
	        "created"         => created()
	    );
	    if($_FILES["courier_logo"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."courier_logo/";
           $target_file = $target_dir .$name."_".$_FILES["courier_logo"]["name"];
           move_uploaded_file($_FILES["courier_logo"]["tmp_name"], $target_file);
           $update_array['courier_logo'] = $name."_".$_FILES["courier_logo"]["name"];            
	    }   

		$db->update("tbl_shipping_rate",$update_array,array("id"=>$id));
		
		$update_pincode = array(
	    	"courier_partner_id" => $id,
	    	"pincode" 			 => $pincode,
	    	"created"			 => created(),
	    );

		$db->update("tbl_courier_pincode",$update_pincode,array("id"=>$id));

		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'User has been updated successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}
	else
	{
		$insert_array = array(
	        "courier_partner" => $courier_partner,
	        "within_city"     => $within_city,
	        "within_zone"     => $within_zone,
	        "metros"          => $metros,
	        "rest_of_india"   => $rest_of_india,
	        "special_zone"    => $special_zone,
	        "cod"             => $cod,
	        "created"         => created()
	    );		
		if($_FILES["courier_logo"]["name"] != "")
	 	{    
           $name = time();
           $target_dir = DIR_UPD."courier_logo/";
           $target_file = $target_dir .$name."_".$_FILES["courier_logo"]["name"];
           move_uploaded_file($_FILES["courier_logo"]["tmp_name"], $target_file);
           $insert_array['courier_logo'] = $name."_".$_FILES["courier_logo"]["name"];            
	    }

	    $courier_id = $db->insert("tbl_shipping_rate",$insert_array)->getlastInsertId();

	    $insert_pincode = array(
	    	"courier_partner_id" => $courier_id,
	    	"pincode" 			 => $pincode,
	    	"created"			 => created(),
	    );

	    $db->insert("tbl_courier_pincode",$insert_pincode);

		$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Courier Partner has been insert successfully.'));
    	redirectPage(SITE_ADM_MOD . $module);
	}    
}

if (isset($_POST["uploadCSV"]) && $_SERVER["REQUEST_METHOD"] == "POST") 
{	
	if($_FILES["bulk_pincode"]["tmp_name"] != "")
 	{    
       $filename = $_FILES["bulk_pincode"]["tmp_name"];   

       if ($_FILES["bulk_pincode"]["size"] > 0) 
       {
            $file = fopen($filename, "r");

            while (($column  = fgetcsv($file, 10000, ",")) !== FALSE) 
	    	{   
		        $pincode = "";
		        if (isset($column[0])) {
		            $pincode = $column[0];
		        }
	        
		        $insert_array1 = array(
		        	"courier_partner_id"  => $_POST['id'],
			        "pincode"             => $pincode,
			        "created"             => created(),
			    );

				$db->insert("tbl_courier_pincode",$insert_array1); 
			}	
	    	
	    	$_SESSION["toastr_message"] = disMessage(array('type' => 'suc', 'var' => 'Pincode File has been insert successfully.'));
	    	redirectPage(SITE_ADM_MOD . $module);     
	    }  
    }
}

if(isset($_POST['action']) AND $_POST['action']=="deletePincode") 
{
	extract($_POST);

	$db->delete("tbl_courier_pincode",array("id"=>$_POST['id']));
    $responce = array('status'=> 1,'type' => 'success', 'message' => "Pincode has been deleted successfully.");
    echo json_encode($responce); exit;
}

if (isset($_POST['action']) AND $_POST['action'] == 'getRecord') 
{
	extract($_REQUEST);

	if($page==0) { 
		$page = 1;
	} 
	
	if($limit == ""){ 
		$limit = 16;
	}
	$totalRow = 0;
	@$offset = ($page - 1) * $limit;	

	$pincode ='';

	$pincodeRes = $db->pdoQuery("SELECT * FROM tbl_courier_pincode WHERE courier_partner_id='4' LIMIT $offset,$limit ")->results();

	$totalRowRes = $db->pdoQuery("SELECT * FROM tbl_courier_pincode WHERE courier_partner_id='4' ")->results();

	$totalRow = count($totalRowRes);

	
	$totalPage=  ceil($totalRow / $limit); 
        
        foreach ($pincodeRes as $key => $value) 
        {
            $pincode .='<li class="pincode-item">
                            <span>'.$value['pincode'].'</span> <a href="javascript:void()" data-id="'.$value['id'].'" class="remove-icon" id="removePin"> X </a>
                        </li>';
        }

    echo json_encode(array('pincode'=>$pincode, "page" => $page ,  'total_page'=> $totalPage ,'current_page' => 1));   
	exit;
}
$objUsers = new Controller($module);
$pageContent = $objUsers->getPageContent();
require_once(DIR_ADMIN_TMPL . "replace.php");
