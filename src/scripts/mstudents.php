<?php include_once AppRoot . AppController . "cMstudentsController.php";

$mstudentsObj = new cmstudentsController();

$action = $get["action"]?$get["action"]:"viewall";
    $mstudentsObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$mstudentsObj->action = $action;
    $content_details_array["page"] = $mstudentsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mstudents");
    }else{
    $data=$mstudentsObj->getSelectData($get["file"], $get["columns"], "id=".$mstudentsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mstudentsObj->action = "view";
        
        $defaultdata = $mstudentsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Students");

$content_details_array["page"][title]=ucwords("Students details");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["student_name"]=array("displayName"=>"Student Name","type"=>"text","name"=>"student_name","id"=>"student_name","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("student_name",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"number","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("class_id",$defaultdata),"pattern"=>"",);
$selectboxdata=$mstudentsObj->getSelectData('user_details','id,id','','id');$content_details_array["formelements"]["parent_id"]=array("displayName"=>"Parent Id","type"=>"text","name"=>"parent_id","id"=>"parent_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$mstudentsObj->setDefaultValue("parent_id",$defaultdata),"addonfly"=>array("user_details","id") );
$content_details_array["formelements"]["date_of_joining"]=array("displayName"=>"Date Of Joining","type"=>"date","name"=>"date_of_joining","id"=>"date_of_joining","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("date_of_joining",$defaultdata),"pattern"=>"",);
$selectboxdata=$mstudentsObj->getSelectData('user_details','id,id','','id');$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$mstudentsObj->setDefaultValue("user_id",$defaultdata),"addonfly"=>array("user_details","id") );}

if($action=="view"){$content_details_array["formelements"]["student_name"]=array("displayName"=>"Student Name","type"=>"text","name"=>"student_name","id"=>"student_name","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("student_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"text","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("class_id",$defaultdata,''),"readonly"=>"readonly");
$selectboxdata=$mstudentsObj->getSelectData('user_details','id,id','','id');$content_details_array["formelements"]["parent_id"]=array("displayName"=>"Parent Id","type"=>"text","name"=>"parent_id","id"=>"parent_id","class","style","error","required"=>"",data=>$selectboxdata,value=>$mstudentsObj->setDefaultValue("parent_id",$defaultdata),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_joining"]=array("displayName"=>"Date Of Joining","type"=>"text","name"=>"date_of_joining","id"=>"date_of_joining","class","style","error","required"=>"","value"=>$mstudentsObj->setDefaultValue("date_of_joining",$defaultdata,''),"readonly"=>"readonly");
$selectboxdata=$mstudentsObj->getSelectData('user_details','id,id','','id');$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"",data=>$selectboxdata,value=>$mstudentsObj->setDefaultValue("user_id",$defaultdata),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mstudentsObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mstudentsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>