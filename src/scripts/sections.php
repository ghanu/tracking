<?php include_once AppRoot . AppController . "cSectionsController.php";

$sectionsObj = new csectionsController();

$action = $get["action"]?$get["action"]:"viewall";
    $sectionsObj->id = $id = $get["id"]; 

if($post){
    
$sectionsObj->action = $post["formaction"];
    $content_details_array["page"] = $sectionsObj->curd();
    $sectionsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("sections&id=".$sectionsObj->id."&action=view");
    }else{
    $data=$sectionsObj->getSelectData($get["file"], $get["columns"], "id=".$sectionsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $sectionsObj->action = "view";
        
        $defaultdata = $sectionsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$sectionsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Sections");

$content_details_array["page"]["title"]=ucwords("Sections");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["section"]=array("displayName"=>"Section","type"=>"text","name"=>"section","id"=>"section","class","style","error","required"=>"required","value"=>$sectionsObj->setDefaultValue("section",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["section"]=array("displayName"=>"Section","type"=>"text","name"=>"section","id"=>"section","class","style","error","required"=>"required","value"=>$sectionsObj->setDefaultValue("section",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$sectionsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$sectionsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Section","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>