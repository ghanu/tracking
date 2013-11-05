<?php include_once AppRoot . AppController . "cSubjectsController.php";

$subjectsObj = new csubjectsController();

$action = $get["action"]?$get["action"]:"viewall";
    $subjectsObj->id = $id = $get["id"]; 

if($post){
    
$subjectsObj->action = $post["formaction"];
    $content_details_array["page"] = $subjectsObj->curd();
    $subjectsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("subjects&id=".$subjectsObj->id."&action=view");
    }else{
    $data=$subjectsObj->getSelectData($get["file"], $get["columns"], "id=".$subjectsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $subjectsObj->action = "view";
        
        $defaultdata = $subjectsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$subjectsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Subjects");

$content_details_array["page"]["title"]=ucwords("Subjects");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["code"]=array("displayName"=>"Code","type"=>"text","name"=>"code","id"=>"code","class","style","error","required"=>"required","value"=>$subjectsObj->setDefaultValue("code",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["name"]=array("displayName"=>"Name","type"=>"text","name"=>"name","id"=>"name","class","style","error","required"=>"required","value"=>$subjectsObj->setDefaultValue("name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["code"]=array("displayName"=>"Code","type"=>"text","name"=>"code","id"=>"code","class","style","error","required"=>"required","value"=>$subjectsObj->setDefaultValue("code",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["name"]=array("displayName"=>"Name","type"=>"text","name"=>"name","id"=>"name","class","style","error","required"=>"required","value"=>$subjectsObj->setDefaultValue("name",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$subjectsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$subjectsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Code","Name","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>