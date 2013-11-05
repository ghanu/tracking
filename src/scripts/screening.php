<?php include_once AppRoot . AppController . "cScreeningController.php";

$screeningObj = new cscreeningController();

$action = $get["action"]?$get["action"]:"viewall";
    $screeningObj->id = $id = $get["id"]; 

if($post){
    
$screeningObj->action = $post["formaction"];
    $content_details_array["page"] = $screeningObj->curd();
    $screeningObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("screening&id=".$screeningObj->id."&action=view");
    }else{
    $data=$screeningObj->getSelectData($get["file"], $get["columns"], "id=".$screeningObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $screeningObj->action = "editview";
         }else{
            $screeningObj->action = "view";
         }
     
        
        $defaultdata = $screeningObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $screeningObj->action=$action;
    $content_details_array["page"] = $screeningObj->curd();
    redirect("screening&action=viewall");
    }
    
}


$screeningObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Screening");

$content_details_array["page"]["title"]=ucwords("Screening");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("application_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["student_name"]=array("displayName"=>"Student Name","type"=>"text","name"=>"student_name","id"=>"student_name","class","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("student_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("class",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=$screeningObj->getSelectData('__user_details','id,first_name','deignation=1','id');$content_details_array["formelements"]["screening_teacher"]=array("displayName"=>"Screening Teacher","type"=>"text","name"=>"screening_teacher","id"=>"screening_teacher","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$screeningObj->setDefaultValue("screening_teacher",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["teacher_remarks"]=array("displayName"=>"Teacher Remarks","type"=>"text","name"=>"teacher_remarks","id"=>"teacher_remarks","class","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("teacher_remarks",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["selected"]=array("displayName"=>"Selected","type"=>"text","name"=>"selected","id"=>"selected","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$screeningObj->setDefaultValue("selected",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["principal_remarks"]=array("displayName"=>"Principal Remarks","type"=>"text","name"=>"principal_remarks","id"=>"principal_remarks","class","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("principal_remarks",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["admission_confirmed"]=array("displayName"=>"Admission Confirmed","type"=>"text","name"=>"admission_confirmed","id"=>"admission_confirmed","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$screeningObj->setDefaultValue("admission_confirmed",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["application_id"]=array("displayName"=>"Application Id","type"=>"hidden","name"=>"application_id","id"=>"application_id","class","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("application_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["admission_id"]=array("displayName"=>"Admission Id","type"=>"hidden","name"=>"admission_id","id"=>"admission_id","class","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("admission_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class"=>"textalignleft","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("application_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["student_name"]=array("displayName"=>"Student Name","type"=>"text","name"=>"student_name","id"=>"student_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("student_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class"=>"textalignleft","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("class",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$screeningObj->getSelectData('__user_details','id,first_name','deignation=1','id');$content_details_array["formelements"]["screening_teacher"] = array("type" => "text", "name" => "screening_teacher", "id" => "screening_teacher","value" => $screeningObj->setDefaultValue("screening_teacher", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["teacher_remarks"]=array("displayName"=>"Teacher Remarks","type"=>"text","name"=>"teacher_remarks","id"=>"teacher_remarks","class"=>"textalignleft","style","error","required"=>"required","value"=>$screeningObj->setDefaultValue("teacher_remarks",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["selected"] = array("type" => "text", "name" => "selected", "id" => "selected","value" => $screeningObj->setDefaultValue("selected", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["principal_remarks"]=array("displayName"=>"Principal Remarks","type"=>"text","name"=>"principal_remarks","id"=>"principal_remarks","class"=>"textalignleft","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("principal_remarks",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["admission_confirmed"] = array("type" => "text", "name" => "admission_confirmed", "id" => "admission_confirmed","value" => $screeningObj->setDefaultValue("admission_confirmed", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["application_id"]=array("displayName"=>"Application Id","type"=>"hidden","name"=>"application_id","id"=>"application_id","class"=>"textalignleft","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("application_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["admission_id"]=array("displayName"=>"Admission Id","type"=>"hidden","name"=>"admission_id","id"=>"admission_id","class"=>"textalignleft","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("admission_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$screeningObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$screeningObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$screeningObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Application No","Student Name","Class","Screening Teacher","Teacher Remarks","Selected","Principal Remarks","Admission Confirmed","Application Id","Admission Id","Branch Id","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>