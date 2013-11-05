<?php include_once AppRoot . AppController . "c__designationController.php";

$__designationObj = new c__designationController();

$action = $get["action"]?$get["action"]:"viewall";
    $__designationObj->id = $id = $get["id"]; 

if($post){
    
$__designationObj->action = $post["formaction"];
    $content_details_array["page"] = $__designationObj->curd();
    $__designationObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__designation&id=".$__designationObj->id."&action=view");
    }else{
    $data=$__designationObj->getSelectData($get["file"], $get["columns"], "id=".$__designationObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__designationObj->action = "view";
        
        $defaultdata = $__designationObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__designationObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - Designation  ");

$content_details_array["page"]["title"]=ucwords("{$action}  - Designation {$id}");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["designation_code"]=array("displayName"=>"Designation Code","type"=>"text","name"=>"designation_code","id"=>"designation_code","class","style","error","required"=>"required","value"=>$__designationObj->setDefaultValue("designation_code",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["designation_name"]=array("displayName"=>"Designation Name","type"=>"text","name"=>"designation_name","id"=>"designation_name","class","style","error","required"=>"required","value"=>$__designationObj->setDefaultValue("designation_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["designation_code"]=array("displayName"=>"Designation Code","type"=>"text","name"=>"designation_code","id"=>"designation_code","class","style","error","required"=>"required","value"=>$__designationObj->setDefaultValue("designation_code",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["designation_name"]=array("displayName"=>"Designation Name","type"=>"text","name"=>"designation_name","id"=>"designation_name","class","style","error","required"=>"required","value"=>$__designationObj->setDefaultValue("designation_name",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__designationObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__designationObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Designation Code","Designation Name","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>