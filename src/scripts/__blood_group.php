<?php include_once AppRoot . AppController . "c__blood_groupController.php";

$__blood_groupObj = new c__blood_groupController();

$action = $get["action"]?$get["action"]:"viewall";
    $__blood_groupObj->id = $id = $get["id"]; 

if($post){
    
$__blood_groupObj->action = $post["formaction"];
    $content_details_array["page"] = $__blood_groupObj->curd();
    $__blood_groupObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__blood_group&id=".$__blood_groupObj->id."&action=view");
    }else{
    $data=$__blood_groupObj->getSelectData($get["file"], $get["columns"], "id=".$__blood_groupObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__blood_groupObj->action = "view";
        
        $defaultdata = $__blood_groupObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__blood_groupObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - {$action} - Blood Group");

$content_details_array["page"]["title"]=ucwords("{$action} - Blood Group");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class","style","error","required"=>"","value"=>$__blood_groupObj->setDefaultValue("blood_group",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class"=>"textalignleft","style","error","required"=>"","value"=>$__blood_groupObj->setDefaultValue("blood_group",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__blood_groupObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__blood_groupObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Blood Group","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>