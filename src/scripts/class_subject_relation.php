<?php include_once AppRoot . AppController . "cClass_subject_relationController.php";

$class_subject_relationObj = new cclass_subject_relationController();

$action = $get["action"]?$get["action"]:"viewall";
    $class_subject_relationObj->id = $id = $get["id"]; 

if($post){
    
$class_subject_relationObj->action = $post["formaction"];
    $content_details_array["page"] = $class_subject_relationObj->curd();
    $class_subject_relationObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("class_subject_relation&id=".$class_subject_relationObj->id."&action=view");
    }else{
    $data=$class_subject_relationObj->getSelectData($get["file"], $get["columns"], "id=".$class_subject_relationObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $class_subject_relationObj->action = "view";
        
        $defaultdata = $class_subject_relationObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$class_subject_relationObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Class Subject Relation");

$content_details_array["page"]["title"]=ucwords("Class Subject Relation");

if($action=="add"||$action=="edit")
{$selectboxdata=$class_subject_relationObj->getSelectData('class_section_relation','id,class_id','','');$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"text","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_subject_relationObj->setDefaultValue("class_id",$defaultdata),"addonfly"=>array("class_section_relation","class_id") );
                
$selectboxdata=$class_subject_relationObj->getSelectData('subjects','id,name','','');$content_details_array["formelements"]["subject_id"]=array("displayName"=>"Subject Id","type"=>"text","name"=>"subject_id","id"=>"subject_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_subject_relationObj->setDefaultValue("subject_id",$defaultdata),"addonfly"=>array("subjects","name") );
                
$selectboxdata=$class_subject_relationObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["teacher_id"]=array("displayName"=>"Teacher Id","type"=>"text","name"=>"teacher_id","id"=>"teacher_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$class_subject_relationObj->setDefaultValue("teacher_id",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"text","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$class_subject_relationObj->setDefaultValue("last_updated",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$class_subject_relationObj->getSelectData('class_section_relation','id,class_id','','');$content_details_array["formelements"]["class_id"] = array("displayName" => "Class Id", "type" => "text", "name" => "class_id", "id" => "class_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_subject_relationObj->setDefaultValue("class_id", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$class_subject_relationObj->getSelectData('subjects','id,name','','');$content_details_array["formelements"]["subject_id"] = array("displayName" => "Subject Id", "type" => "text", "name" => "subject_id", "id" => "subject_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_subject_relationObj->setDefaultValue("subject_id", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$class_subject_relationObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["teacher_id"] = array("displayName" => "Teacher Id", "type" => "text", "name" => "teacher_id", "id" => "teacher_id", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $class_subject_relationObj->setDefaultValue("teacher_id", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"text","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$class_subject_relationObj->setDefaultValue("last_updated",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$class_subject_relationObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$class_subject_relationObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Class Id","Subject Id","Teacher Id","Last Updated","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>