<?php include_once AppRoot . AppController . "cFees_structureController.php";

$fees_structureObj = new cfees_structureController();

$action = $get["action"]?$get["action"]:"viewall";
    $fees_structureObj->id = $id = $get["id"]; 

if($post){
    
$fees_structureObj->action = $post["formaction"];
    $content_details_array["page"] = $fees_structureObj->curd();
    $fees_structureObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("fees_structure&id=".$fees_structureObj->id."&action=view");
    }else{
    $data=$fees_structureObj->getSelectData($get["file"], $get["columns"], "id=".$fees_structureObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $fees_structureObj->action = "editview";
         }else{
            $fees_structureObj->action = "view";
         }
     
        
        $defaultdata = $fees_structureObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $fees_structureObj->action=$action;
    $content_details_array["page"] = $fees_structureObj->curd();
    redirect("fees_structure&action=viewall");
    }
    
}


$fees_structureObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Fees Structure");

$content_details_array["page"]["title"]=ucwords("Fees Structure");

if($action=="add"||$action=="edit")
{$selectboxdata=$fees_structureObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$fees_structureObj->setDefaultValue("class",$defaultdata),"addonfly"=>array("mclass","class") );
                
$selectboxdata=$fees_structureObj->getSelectData('fees_type','id,fees_type','','');$content_details_array["formelements"]["fees_types"]=array("displayName"=>"Fees Types","type"=>"text","name"=>"fees_types","id"=>"fees_types","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$fees_structureObj->setDefaultValue("fees_types",$defaultdata),"addonfly"=>array("fees_type","fees_type") );
                

$content_details_array["formelements"]["amount"]=array("displayName"=>"Amount","type"=>"text","name"=>"amount","id"=>"amount","class","style","error","required"=>"required","value"=>$fees_structureObj->setDefaultValue("amount",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["effect_from"]=array("displayName"=>"Effect From","type"=>"date","name"=>"effect_from","id"=>"effect_from","class","style","error","required"=>"required","value"=>$fees_structureObj->setDefaultValue("effect_from",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("active"=>"Active", "inactive"=>"Inactive");$content_details_array["formelements"]["fees_status"]=array("displayName"=>"Fees Status","type"=>"text","name"=>"fees_status","id"=>"fees_status","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$fees_structureObj->setDefaultValue("fees_status",$defaultdata),"addonfly"=>"");
                
$selectboxdata=$fees_structureObj->getSelectData('__branch_details','id,branch_name','','');$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"text","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$fees_structureObj->setDefaultValue("branch_id",$defaultdata),"addonfly"=>array("__branch_details","branch_name") );
                

$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"hidden","name"=>"date_timestamp","id"=>"date_timestamp","class","style","error","required"=>"","value"=>$fees_structureObj->setDefaultValue("date_timestamp",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$fees_structureObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$fees_structureObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class"] = array("type" => "text", "name" => "class", "id" => "class","value" => $fees_structureObj->setDefaultValue("class", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$fees_structureObj->getSelectData('fees_type','id,fees_type','','');$content_details_array["formelements"]["fees_types"] = array("type" => "text", "name" => "fees_types", "id" => "fees_types","value" => $fees_structureObj->setDefaultValue("fees_types", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["amount"]=array("displayName"=>"Amount","type"=>"text","name"=>"amount","id"=>"amount","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_structureObj->setDefaultValue("amount",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["effect_from"]=array("displayName"=>"Effect From","type"=>"text","name"=>"effect_from","id"=>"effect_from","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_structureObj->setDefaultValue("effect_from",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("active"=>"Active", "inactive"=>"Inactive");$content_details_array["formelements"]["fees_status"] = array("type" => "text", "name" => "fees_status", "id" => "fees_status","value" => $fees_structureObj->setDefaultValue("fees_status", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$fees_structureObj->getSelectData('__branch_details','id,branch_name','','');$content_details_array["formelements"]["branch_id"] = array("type" => "text", "name" => "branch_id", "id" => "branch_id","value" => $fees_structureObj->setDefaultValue("branch_id", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"hidden","name"=>"date_timestamp","id"=>"date_timestamp","class"=>"textalignleft","style","error","required"=>"","value"=>$fees_structureObj->setDefaultValue("date_timestamp",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$fees_structureObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$fees_structureObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$fees_structureObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Class","Fees Types","Amount","Effect From","Fees Status","Branch Id","Date Timestamp","Status","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>