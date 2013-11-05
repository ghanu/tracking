<?php include_once AppRoot . AppController . "cFees_duesController.php";

$fees_duesObj = new cfees_duesController();

$action = $get["action"]?$get["action"]:"viewall";
    $fees_duesObj->id = $id = $get["id"]; 

if($post){
    
$fees_duesObj->action = $post["formaction"];
    $content_details_array["page"] = $fees_duesObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("fees_dues&id=".$fees_duesObj->id."&action=view");
    }else{
    $data=$fees_duesObj->getSelectData($get["file"], $get["columns"], "id=".$fees_duesObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $fees_duesObj->action = "view";
        
        $defaultdata = $fees_duesObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Fees Dues");

$content_details_array["page"]["title"]=ucwords("Fees Dues");

if($action=="add"||$action=="edit")
{$selectboxdata=$fees_duesObj->getSelectData('admission','id,first_name','','');$content_details_array["formelements"]["student_id"]=array("displayName"=>"Student Id","type"=>"text","name"=>"student_id","id"=>"student_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$fees_duesObj->setDefaultValue("student_id",$defaultdata),"addonfly"=>array("admission","first_name") );
                
$selectboxdata=$fees_duesObj->getSelectData('fees_type','id,fees_type','','');$content_details_array["formelements"]["fees_type_id"]=array("displayName"=>"Fees Type Id","type"=>"text","name"=>"fees_type_id","id"=>"fees_type_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$fees_duesObj->setDefaultValue("fees_type_id",$defaultdata),"addonfly"=>array("fees_type","fees_type") );
                

$content_details_array["formelements"]["fees_amount"]=array("displayName"=>"Fees Amount","type"=>"text","name"=>"fees_amount","id"=>"fees_amount","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("fees_amount",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["paid"]=array("displayName"=>"Paid","type"=>"text","name"=>"paid","id"=>"paid","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("paid",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["due_date"]=array("displayName"=>"Due Date","type"=>"date","name"=>"due_date","id"=>"due_date","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("due_date",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"number","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("status",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$fees_duesObj->getSelectData('admission','id,first_name','','');$content_details_array["formelements"]["student_id"] = array("displayName" => "Student Id", "type" => "text", "name" => "student_id", "id" => "student_id", "class", "style", "error", "required" => "", data => $selectboxdata, value => $fees_duesObj->setDefaultValue("student_id", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$fees_duesObj->getSelectData('fees_type','id,fees_type','','');$content_details_array["formelements"]["fees_type_id"] = array("displayName" => "Fees Type Id", "type" => "text", "name" => "fees_type_id", "id" => "fees_type_id", "class", "style", "error", "required" => "", data => $selectboxdata, value => $fees_duesObj->setDefaultValue("fees_type_id", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["fees_amount"]=array("displayName"=>"Fees Amount","type"=>"text","name"=>"fees_amount","id"=>"fees_amount","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("fees_amount",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["paid"]=array("displayName"=>"Paid","type"=>"text","name"=>"paid","id"=>"paid","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("paid",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["due_date"]=array("displayName"=>"Due Date","type"=>"text","name"=>"due_date","id"=>"due_date","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("due_date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$fees_duesObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$fees_duesObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$fees_duesObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Student Id~~~Fees Type Id~~~Fees Amount~~~Paid~~~Due Date~~~Status~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>