<?php include_once AppRoot . AppController . "c__loginController.php";

$__loginObj = new c__loginController();

$action = $get["action"]?$get["action"]:"viewall";
    $__loginObj->id = $id = $get["id"]; 

if($post){
    
$__loginObj->action = $post["formaction"];
    $content_details_array["page"] = $__loginObj->curd();
    $__loginObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__login&id=".$__loginObj->id."&action=view");
    }else{
    $data=$__loginObj->getSelectData($get["file"], $get["columns"], "id=".$__loginObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__loginObj->action = "view";
        
        $defaultdata = $__loginObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__loginObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - Login");

$content_details_array["page"]["title"]=ucwords("{$action} - Login");

if($action=="add"||$action=="edit")
{$selectboxdata=$__loginObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$__loginObj->setDefaultValue("user_id",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["login_name"]=array("displayName"=>"Login Name","type"=>"text","name"=>"login_name","id"=>"login_name","class","style","error","required"=>"required","value"=>$__loginObj->setDefaultValue("login_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["password"]=array("displayName"=>"Password","type"=>"text","name"=>"password","id"=>"password","class","style","error","required"=>"required","value"=>$__loginObj->setDefaultValue("password",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"hidden","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"","value"=>$__loginObj->setDefaultValue("last_updated",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["is_active"]=array("displayName"=>"Is Active","type"=>"checkbox","name"=>"is_active","id"=>"is_active","class","style","error","required"=>"","value"=>$__loginObj->setDefaultValue("is_active",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$__loginObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["user_id"] = array("type" => "text", "name" => "user_id", "id" => "user_id","value" => $__loginObj->setDefaultValue("user_id", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["login_name"]=array("displayName"=>"Login Name","type"=>"text","name"=>"login_name","id"=>"login_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$__loginObj->setDefaultValue("login_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["password"]=array("displayName"=>"Password","type"=>"text","name"=>"password","id"=>"password","class"=>"textalignleft","style","error","required"=>"required","value"=>$__loginObj->setDefaultValue("password",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"hidden","name"=>"last_updated","id"=>"last_updated","class"=>"textalignleft","style","error","required"=>"","value"=>$__loginObj->setDefaultValue("last_updated",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["is_active"]=array("displayName"=>"Is Active","type"=>"checkbox","name"=>"is_active","id"=>"is_active","class"=>"textalignleft","style","error","required"=>"","value"=>$__loginObj->setDefaultValue("is_active",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__loginObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__loginObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","User Id","Login Name","Password","Last Updated","Is Active","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>