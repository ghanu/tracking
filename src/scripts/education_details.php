<?php include_once AppRoot . AppController . "cEducation_detailsController.php";

$education_detailsObj = new ceducation_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $education_detailsObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$education_detailsObj->action = $action;
    $content_details_array["page"] = $education_detailsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("education_details");
    }else{
    $data=$education_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$education_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $education_detailsObj->action = "view";
        
        $defaultdata = $education_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("{$id} - Education Details ");

$content_details_array["page"][title]=ucwords("{$action} Education Details");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["certificate_name_or_degree"]=array("displayName"=>"Certificate Name Or Degree","type"=>"text","name"=>"certificate_name_or_degree","id"=>"certificate_name_or_degree","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("certificate_name_or_degree",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["mark_or_grade"]=array("displayName"=>"Mark Or Grade","type"=>"text","name"=>"mark_or_grade","id"=>"mark_or_grade","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("mark_or_grade",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["reference_id"]=array("displayName"=>"Reference Id","type"=>"number","name"=>"reference_id","id"=>"reference_id","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("reference_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["remarks"]=array("displayName"=>"Remarks","type"=>"text","name"=>"remarks","id"=>"remarks","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("remarks",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["photo_copy_image"]=array("displayName"=>"Photo Copy Image","type"=>"text","name"=>"photo_copy_image","id"=>"photo_copy_image","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("photo_copy_image",$defaultdata),"pattern"=>"",);

$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"date_timestamp","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("last_updated",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["major"]=array("displayName"=>"Major","type"=>"text","name"=>"major","id"=>"major","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("major",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["year_completed"]=array("displayName"=>"Year Completed","type"=>"date","name"=>"year_completed","id"=>"year_completed","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("year_completed",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["certificate_name_or_degree"]=array("displayName"=>"Certificate Name Or Degree","type"=>"text","name"=>"certificate_name_or_degree","id"=>"certificate_name_or_degree","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("certificate_name_or_degree",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["mark_or_grade"]=array("displayName"=>"Mark Or Grade","type"=>"text","name"=>"mark_or_grade","id"=>"mark_or_grade","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("mark_or_grade",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["reference_id"]=array("displayName"=>"Reference Id","type"=>"text","name"=>"reference_id","id"=>"reference_id","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("reference_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["remarks"]=array("displayName"=>"Remarks","type"=>"text","name"=>"remarks","id"=>"remarks","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("remarks",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["photo_copy_image"]=array("displayName"=>"Photo Copy Image","type"=>"text","name"=>"photo_copy_image","id"=>"photo_copy_image","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("photo_copy_image",$defaultdata,''),"readonly"=>"readonly");

$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"text","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("last_updated",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["major"]=array("displayName"=>"Major","type"=>"text","name"=>"major","id"=>"major","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("major",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["year_completed"]=array("displayName"=>"Year Completed","type"=>"text","name"=>"year_completed","id"=>"year_completed","class","style","error","required"=>"required","value"=>$education_detailsObj->setDefaultValue("year_completed",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$education_detailsObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$education_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>