<?php include_once AppRoot . AppController . "cRoute_detailsController.php";

$route_detailsObj = new croute_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $route_detailsObj->id = $id = $get["id"]; 

if($post){
    
$route_detailsObj->action = $post["formaction"];
    $content_details_array["page"] = $route_detailsObj->curd();
    $route_detailsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("route_details&id=".$route_detailsObj->id."&action=view");
    }else{
    $data=$route_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$route_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $route_detailsObj->action = "editview";
         }else{
            $route_detailsObj->action = "view";
         }
     
        
        $defaultdata = $route_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $route_detailsObj->action=$action;
    $content_details_array["page"] = $route_detailsObj->curd();
    redirect("route_details&action=viewall");
    }
    
}


$route_detailsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Route Details");

$content_details_array["page"]["title"]=ucwords("Route Details");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["route_no"]=array("displayName"=>"Route No","type"=>"text","name"=>"route_no","id"=>"route_no","class","style","error","required"=>"required","value"=>$route_detailsObj->setDefaultValue("route_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["route_name"]=array("displayName"=>"Route Name","type"=>"text","name"=>"route_name","id"=>"route_name","class","style","error","required"=>"required","value"=>$route_detailsObj->setDefaultValue("route_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"hidden","name"=>"date","id"=>"date","class","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["route_no"]=array("displayName"=>"Route No","type"=>"text","name"=>"route_no","id"=>"route_no","class"=>"textalignleft","style","error","required"=>"required","value"=>$route_detailsObj->setDefaultValue("route_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["route_name"]=array("displayName"=>"Route Name","type"=>"text","name"=>"route_name","id"=>"route_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$route_detailsObj->setDefaultValue("route_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"hidden","name"=>"date","id"=>"date","class"=>"textalignleft","style","error","required"=>"","value"=>$route_detailsObj->setDefaultValue("date",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$route_detailsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$route_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Route No","Route Name","Branch Id","Status","Date","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>