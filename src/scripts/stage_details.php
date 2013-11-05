<?php include_once AppRoot . AppController . "cStage_detailsController.php";

$stage_detailsObj = new cstage_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $stage_detailsObj->id = $id = $get["id"]; 

if($post){
    
$stage_detailsObj->action = $post["formaction"];
    $content_details_array["page"] = $stage_detailsObj->curd();
    $stage_detailsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("stage_details&id=".$stage_detailsObj->id."&action=view");
    }else{
    $data=$stage_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$stage_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $stage_detailsObj->action = "editview";
         }else{
            $stage_detailsObj->action = "view";
         }
     
        
        $defaultdata = $stage_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $stage_detailsObj->action=$action;
    $content_details_array["page"] = $stage_detailsObj->curd();
    redirect("stage_details&action=viewall");
    }
    
}


$stage_detailsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Stage Details");

$content_details_array["page"]["title"]=ucwords("Stage Details");

if($action=="add"||$action=="edit")
{$selectboxdata=$stage_detailsObj->getSelectData('route_details','id,route_name','','id');$content_details_array["formelements"]["route_name"]=array("displayName"=>"Route Name","type"=>"text","name"=>"route_name","id"=>"route_name","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$stage_detailsObj->setDefaultValue("route_name",$defaultdata),"addonfly"=>array("route_details","route_name") );
                

$content_details_array["formelements"]["stages"]=array("displayName"=>"Stages","type"=>"text","name"=>"stages","id"=>"stages","class","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("stages",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"","placeholder"=>"stages");

$content_details_array["formelements"]["cost"]=array("displayName"=>"Cost","type"=>"text","name"=>"cost","id"=>"cost","class","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("cost",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"","placeholder"=>"cost");

$content_details_array["formelements"]["km"]=array("displayName"=>"Km","type"=>"text","name"=>"km","id"=>"km","class","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("km",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"","placeholder"=>"kilometer");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"hidden","name"=>"date","id"=>"date","class","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$stage_detailsObj->getSelectData('route_details','id,route_name','','id');$content_details_array["formelements"]["route_name"] = array("type" => "text", "name" => "route_name", "id" => "route_name","value" => $stage_detailsObj->setDefaultValue("route_name", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["stages"]=array("displayName"=>"Stages","type"=>"text","name"=>"stages","id"=>"stages","class"=>"textalignleft","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("stages",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["cost"]=array("displayName"=>"Cost","type"=>"text","name"=>"cost","id"=>"cost","class"=>"textalignleft","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("cost",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["km"]=array("displayName"=>"Km","type"=>"text","name"=>"km","id"=>"km","class"=>"textalignleft","style","error","required"=>"required","value"=>$stage_detailsObj->setDefaultValue("km",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"hidden","name"=>"date","id"=>"date","class"=>"textalignleft","style","error","required"=>"","value"=>$stage_detailsObj->setDefaultValue("date",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$stage_detailsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$stage_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Route Name","Stages","Cost","Km","Branch Id","Status","Date","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>