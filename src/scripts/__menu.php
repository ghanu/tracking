<?php include_once AppRoot . AppController . "c__menuController.php";

$__menuObj = new c__menuController();

$action = $get["action"]?$get["action"]:"viewall";
    $__menuObj->id = $id = $get["id"]; 

if($post){
    
$__menuObj->action = $post["formaction"];
    $content_details_array["page"] = $__menuObj->curd();
    $__menuObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__menu&id=".$__menuObj->id."&action=view");
    }else{
    $data=$__menuObj->getSelectData($get["file"], $get["columns"], "id=".$__menuObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__menuObj->action = "view";
        
        $defaultdata = $__menuObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__menuObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - Menu");

$content_details_array["page"]["title"]=ucwords("{$action} - Menu");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["menu_name"]=array("displayName"=>"Menu Name","type"=>"text","name"=>"menu_name","id"=>"menu_name","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("menu_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["url"]=array("displayName"=>"Url","type"=>"text","name"=>"url","id"=>"url","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("url",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["display_icon"]=array("displayName"=>"Display Icon","type"=>"text","name"=>"display_icon","id"=>"display_icon","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("display_icon",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["access_key"]=array("displayName"=>"Access Key","type"=>"text","name"=>"access_key","id"=>"access_key","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("access_key",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["parent"]=array("displayName"=>"Parent","type"=>"number","name"=>"parent","id"=>"parent","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("parent",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"checkbox","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["menu_name"]=array("displayName"=>"Menu Name","type"=>"text","name"=>"menu_name","id"=>"menu_name","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("menu_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["url"]=array("displayName"=>"Url","type"=>"text","name"=>"url","id"=>"url","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("url",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["display_icon"]=array("displayName"=>"Display Icon","type"=>"text","name"=>"display_icon","id"=>"display_icon","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("display_icon",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["access_key"]=array("displayName"=>"Access Key","type"=>"text","name"=>"access_key","id"=>"access_key","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("access_key",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["parent"]=array("displayName"=>"Parent","type"=>"text","name"=>"parent","id"=>"parent","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("parent",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$__menuObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__menuObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__menuObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Menu Name","Url","Display Icon","Access Key","Parent","Status","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>