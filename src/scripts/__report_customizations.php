<?php include_once AppRoot . AppController . "c__report_customizationsController.php";

$__report_customizationsObj = new c__report_customizationsController();

$action = $get["action"]?$get["action"]:"viewall";
    $__report_customizationsObj->id = $id = $get["id"]; 

if($post){
    
$__report_customizationsObj->action = $post["formaction"];
    $content_details_array["page"] = $__report_customizationsObj->curd();
    $__report_customizationsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__report_customizations&id=".$__report_customizationsObj->id."&action=view");
    }else{
    $data=$__report_customizationsObj->getSelectData($get["file"], $get["columns"], "id=".$__report_customizationsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__report_customizationsObj->action = "view";
        
        $defaultdata = $__report_customizationsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__report_customizationsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Report Customization");

$content_details_array["page"]["title"]=ucwords("Report Customization");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["report_id"]=array("displayName"=>"Report Id","type"=>"number","name"=>"report_id","id"=>"report_id","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("report_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["customization_name"]=array("displayName"=>"Customization Name","type"=>"text","name"=>"customization_name","id"=>"customization_name","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("customization_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"number","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("user_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["created_on"]=array("displayName"=>"Created On","type"=>"date","name"=>"created_on","id"=>"created_on","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("created_on",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["report_id"]=array("displayName"=>"Report Id","type"=>"text","name"=>"report_id","id"=>"report_id","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("report_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["customization_name"]=array("displayName"=>"Customization Name","type"=>"text","name"=>"customization_name","id"=>"customization_name","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("customization_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("user_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["created_on"]=array("displayName"=>"Created On","type"=>"text","name"=>"created_on","id"=>"created_on","class","style","error","required"=>"","value"=>$__report_customizationsObj->setDefaultValue("created_on",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__report_customizationsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__report_customizationsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Report Id","Customization Name","User Id","Created On","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>