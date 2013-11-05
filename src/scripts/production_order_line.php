<?php include_once AppRoot . AppController . "cProduction_lineController.php";

$pre_admissionObj = new cProduction_lineController();

$action = $get["action"]?$get["action"]:"viewall";
    $pre_admissionObj->id = $id = $get["id"]; 

if($post){
    
$pre_admissionObj->action = $post["formaction"];
    $content_details_array["page"] = $pre_admissionObj->curd();
    $pre_admissionObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("pre_admission&id=".$pre_admissionObj->id."&action=view");
    }else{
    $data=$pre_admissionObj->getSelectData($get["file"], $get["columns"], "id=".$pre_admissionObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $pre_admissionObj->action = "editview";
         }else{
            $pre_admissionObj->action = "view";
         }
     
        
        $defaultdata = $pre_admissionObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $pre_admissionObj->action=$action;
    $content_details_array["page"] = $pre_admissionObj->curd();
    redirect("pre_admission&action=viewall");
    }
    
}


$pre_admissionObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Production Order Line");

$content_details_array["page"]["title"]=ucwords("Production Order Line");







if($action =="viewall"){
    
	 
   

    $content_details_array["viewall"]["data"]=$pre_admissionObj->curd();//print_r($content_details_array["viewall"]["data"]);
	//$content_details_array["viewall"]["data"]=$csvdata;
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
  
   $content_details_array["viewall"]["columnnames"]=json_decode('["Status","Order No","Line No","Item No","description",
   "location code","Qty","Finished Qty","Due Date","Start Date","end date","Route no","Route Ref"]');   

}






 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>
