<?php include_once AppRoot . AppController . "cRoute_allocationController.php";

$route_allocationObj = new croute_allocationController();

$action = $get["action"]?$get["action"]:"viewall";
    $route_allocationObj->id = $id = $get["id"]; 

if($post){
    
$route_allocationObj->action = $post["formaction"];
    $content_details_array["page"] = $route_allocationObj->curd();
    $route_allocationObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("route_allocation&id=".$route_allocationObj->id."&action=view");
    }else{
    $data=$route_allocationObj->getSelectData($get["file"], $get["columns"], "id=".$route_allocationObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $route_allocationObj->action = "editview";
         }else{
            $route_allocationObj->action = "view";
         }
     
        
        $defaultdata = $route_allocationObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $route_allocationObj->action=$action;
    $content_details_array["page"] = $route_allocationObj->curd();
    redirect("route_allocation&action=viewall");
    }
    
}


$route_allocationObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Route Allocation");

$content_details_array["page"]["title"]=ucwords("Route Allocation");

if($action=="add"||$action=="edit")
{$selectboxdata=$route_allocationObj->getSelectData('vehicle','id,registration_no','','');$content_details_array["formelements"]["vehicle_no"]=array("displayName"=>"Vehicle No","type"=>"text","name"=>"vehicle_no","id"=>"vehicle_no","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$route_allocationObj->setDefaultValue("vehicle_no",$defaultdata),"addonfly"=>array("vehicle","registration_no") );
                
$selectboxdata=$route_allocationObj->getSelectData('__user_details','id,first_name','deignation=2','');$content_details_array["formelements"]["driver_name"]=array("displayName"=>"Driver Name","type"=>"text","name"=>"driver_name","id"=>"driver_name","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$route_allocationObj->setDefaultValue("driver_name",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                
$selectboxdata=$route_allocationObj->getSelectData('route_details','id,route_name','','');$content_details_array["formelements"]["route"]=array("displayName"=>"Route","type"=>"text","name"=>"route","id"=>"route","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$route_allocationObj->setDefaultValue("route",$defaultdata),"addonfly"=>array("route_details","route_name") );
                

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$route_allocationObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$route_allocationObj->getSelectData('vehicle','id,registration_no','','');$content_details_array["formelements"]["vehicle_no"] = array("type" => "text", "name" => "vehicle_no", "id" => "vehicle_no","value" => $route_allocationObj->setDefaultValue("vehicle_no", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$route_allocationObj->getSelectData('__user_details','id,first_name','deignation=2','');$content_details_array["formelements"]["driver_name"] = array("type" => "text", "name" => "driver_name", "id" => "driver_name","value" => $route_allocationObj->setDefaultValue("driver_name", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$route_allocationObj->getSelectData('route_details','id,route_name','','');$content_details_array["formelements"]["route"] = array("type" => "text", "name" => "route", "id" => "route","value" => $route_allocationObj->setDefaultValue("route", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$route_allocationObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$route_allocationObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$route_allocationObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Vehicle No","Driver Name","Route","Branch Id","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>