<?php include_once AppRoot . AppController . "cExperience_detailsController.php";

$experience_detailsObj = new cexperience_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $experience_detailsObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$experience_detailsObj->action = $action;
    $content_details_array["page"] = $experience_detailsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("experience_details");
    }else{
    $data=$experience_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$experience_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $experience_detailsObj->action = "view";
        
        $defaultdata = $experience_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Experience");

$content_details_array["page"][title]=ucwords("Experience");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["organization_name"]=array("displayName"=>"Organization Name","type"=>"text","name"=>"organization_name","id"=>"organization_name","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("organization_name",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["address_id"]=array("displayName"=>"Address Id","type"=>"number","name"=>"address_id","id"=>"address_id","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("address_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["from_date"]=array("displayName"=>"From Date","type"=>"date","name"=>"from_date","id"=>"from_date","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("from_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["to_date"]=array("displayName"=>"To Date","type"=>"date","name"=>"to_date","id"=>"to_date","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("to_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["salary"]=array("displayName"=>"Salary","type"=>"text","name"=>"salary","id"=>"salary","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("salary",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["supervisor_name"]=array("displayName"=>"Supervisor Name","type"=>"text","name"=>"supervisor_name","id"=>"supervisor_name","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("supervisor_name",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("reason_for_leaving",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["reference_id"]=array("displayName"=>"Reference Id","type"=>"text","name"=>"reference_id","id"=>"reference_id","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("reference_id",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["organization_name"]=array("displayName"=>"Organization Name","type"=>"text","name"=>"organization_name","id"=>"organization_name","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("organization_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["address_id"]=array("displayName"=>"Address Id","type"=>"text","name"=>"address_id","id"=>"address_id","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("address_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["from_date"]=array("displayName"=>"From Date","type"=>"text","name"=>"from_date","id"=>"from_date","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("from_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["to_date"]=array("displayName"=>"To Date","type"=>"text","name"=>"to_date","id"=>"to_date","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("to_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["salary"]=array("displayName"=>"Salary","type"=>"text","name"=>"salary","id"=>"salary","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("salary",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["supervisor_name"]=array("displayName"=>"Supervisor Name","type"=>"text","name"=>"supervisor_name","id"=>"supervisor_name","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("supervisor_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("reason_for_leaving",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["reference_id"]=array("displayName"=>"Reference Id","type"=>"text","name"=>"reference_id","id"=>"reference_id","class","style","error","required"=>"","value"=>$experience_detailsObj->setDefaultValue("reference_id",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$experience_detailsObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$experience_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>