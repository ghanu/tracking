<?php include_once AppRoot . AppController . "cMclassController.php";

$mclassObj = new cmclassController();

$action = $get["action"]?$get["action"]:"viewall";
    $mclassObj->id = $id = $get["id"]; 

if($post){
    
$mclassObj->action = $post["formaction"];
    $content_details_array["page"] = $mclassObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mclass&id=".$mclassObj->id."&action=view");
    }else{
    $data=$mclassObj->getSelectData($get["file"], $get["columns"], "id=".$mclassObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mclassObj->action = "view";
        
        $defaultdata = $mclassObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - Country Details");

$content_details_array["page"]["title"]=ucwords("{$action} Country Details");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("class",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["group"]=array("displayName"=>"Group","type"=>"text","name"=>"group","id"=>"group","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("group",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("status",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("class",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["group"]=array("displayName"=>"Group","type"=>"text","name"=>"group","id"=>"group","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("group",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$mclassObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mclassObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mclassObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Class~~~Group~~~Status~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>