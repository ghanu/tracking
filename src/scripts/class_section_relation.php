<?php include_once AppRoot . AppController . "cClass_section_relationController.php";

$class_section_relationObj = new cclass_section_relationController();

$action = $get["action"]?$get["action"]:"viewall";
    $class_section_relationObj->id = $id = $get["id"]; 

if($post){
    
$class_section_relationObj->action = $post["formaction"];
    $content_details_array["page"] = $class_section_relationObj->curd();
    $class_section_relationObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("class_section_relation&id=".$class_section_relationObj->id."&action=view");
    }else{
    $data=$class_section_relationObj->getSelectData($get["file"], $get["columns"], "id=".$class_section_relationObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $class_section_relationObj->action = "view";
        
        $defaultdata = $class_section_relationObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$class_section_relationObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Class Section Relation");

$content_details_array["page"]["title"]=ucwords("Class Section Relation");

if($action=="add"||$action=="edit")
{$selectboxdata=$class_section_relationObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"text","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_section_relationObj->setDefaultValue("class_id",$defaultdata),"addonfly"=>array("mclass","class") );
                
$selectboxdata=$class_section_relationObj->getSelectData('sections','id,section','','');$content_details_array["formelements"]["section_id"]=array("displayName"=>"Section Id","type"=>"text","name"=>"section_id","id"=>"section_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_section_relationObj->setDefaultValue("section_id",$defaultdata),"addonfly"=>array("sections","section") );
                
$selectboxdata=$class_section_relationObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["teacher_id"]=array("displayName"=>"Teacher Id","type"=>"text","name"=>"teacher_id","id"=>"teacher_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_section_relationObj->setDefaultValue("teacher_id",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$class_section_relationObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$class_section_relationObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class_id"] = array("displayName" => "Class Id", "type" => "text", "name" => "class_id", "id" => "class_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_section_relationObj->setDefaultValue("class_id", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$class_section_relationObj->getSelectData('sections','id,section','','');$content_details_array["formelements"]["section_id"] = array("displayName" => "Section Id", "type" => "text", "name" => "section_id", "id" => "section_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_section_relationObj->setDefaultValue("section_id", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$class_section_relationObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["teacher_id"] = array("displayName" => "Teacher Id", "type" => "text", "name" => "teacher_id", "id" => "teacher_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_section_relationObj->setDefaultValue("teacher_id", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$class_section_relationObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$class_section_relationObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$class_section_relationObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Class Id","Section Id","Teacher Id","Status","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>