<?php include_once AppRoot . AppController . "c__report_filtersController.php";

$__report_filtersObj = new c__report_filtersController();

$action = $get["action"]?$get["action"]:"viewall";
    $__report_filtersObj->id = $id = $get["id"]; 

if($post){
    
$__report_filtersObj->action = $post["formaction"];
    $content_details_array["page"] = $__report_filtersObj->curd();
    $__report_filtersObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__report_filters&id=".$__report_filtersObj->id."&action=view");
    }else{
    $data=$__report_filtersObj->getSelectData($get["file"], $get["columns"], "id=".$__report_filtersObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__report_filtersObj->action = "view";
        
        $defaultdata = $__report_filtersObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__report_filtersObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Report filters");

$content_details_array["page"]["title"]=ucwords("Report filters");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["customization_id"]=array("displayName"=>"Customization Id","type"=>"number","name"=>"customization_id","id"=>"customization_id","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("customization_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"number","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("user_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["default_filter"]=array("displayName"=>"Default Filter","type"=>"text","name"=>"default_filter","id"=>"default_filter","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("default_filter",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["user_filter"]=array("displayName"=>"User Filter","type"=>"text","name"=>"user_filter","id"=>"user_filter","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("user_filter",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["customization_id"]=array("displayName"=>"Customization Id","type"=>"text","name"=>"customization_id","id"=>"customization_id","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("customization_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("user_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["default_filter"]=array("displayName"=>"Default Filter","type"=>"text","name"=>"default_filter","id"=>"default_filter","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("default_filter",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["user_filter"]=array("displayName"=>"User Filter","type"=>"text","name"=>"user_filter","id"=>"user_filter","class","style","error","required"=>"","value"=>$__report_filtersObj->setDefaultValue("user_filter",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__report_filtersObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__report_filtersObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Customization Id","User Id","Default Filter","User Filter","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>