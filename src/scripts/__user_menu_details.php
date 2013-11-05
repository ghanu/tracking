<?php include_once AppRoot . AppController . "c__user_menu_detailsController.php";

$__user_menu_detailsObj = new c__user_menu_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $__user_menu_detailsObj->id = $id = $get["id"]; 

if($post){
    
$__user_menu_detailsObj->action = $post["formaction"];
    $content_details_array["page"] = $__user_menu_detailsObj->curd();
    $__user_menu_detailsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__user_menu_details&id=".$__user_menu_detailsObj->id."&action=view");
    }else{
    $data=$__user_menu_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$__user_menu_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__user_menu_detailsObj->action = "view";
        
        $defaultdata = $__user_menu_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__user_menu_detailsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - User Menu");

$content_details_array["page"]["title"]=ucwords("{$action} -  - User Menu");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"number","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__user_menu_detailsObj->setDefaultValue("user_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["menu_id"]=array("displayName"=>"Menu Id","type"=>"number","name"=>"menu_id","id"=>"menu_id","class","style","error","required"=>"","value"=>$__user_menu_detailsObj->setDefaultValue("menu_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","value"=>$__user_menu_detailsObj->setDefaultValue("user_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["menu_id"]=array("displayName"=>"Menu Id","type"=>"text","name"=>"menu_id","id"=>"menu_id","class","style","error","required"=>"","value"=>$__user_menu_detailsObj->setDefaultValue("menu_id",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__user_menu_detailsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__user_menu_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","User Id","Menu Id","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>