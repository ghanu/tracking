<?php include_once AppRoot . AppController . "cMfeesController.php";

$mfeesObj = new cmfeesController();

$action = $get["action"]?$get["action"]:"viewall";
    $mfeesObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$mfeesObj->action = $action;
    $content_details_array["page"] = $mfeesObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mfees");
    }else{
    $data=$mfeesObj->getSelectData($get["file"], $get["columns"], "id=".$mfeesObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mfeesObj->action = "view";
        
        $defaultdata = $mfeesObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("mFees");

$content_details_array["page"][title]=ucwords("mFees");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["admission_fees"]=array("displayName"=>"Admission Fees","type"=>"number","name"=>"admission_fees","id"=>"admission_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("admission_fees",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["material_fees"]=array("displayName"=>"Material Fees","type"=>"number","name"=>"material_fees","id"=>"material_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("material_fees",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["refundable_fees"]=array("displayName"=>"Refundable Fees","type"=>"number","name"=>"refundable_fees","id"=>"refundable_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("refundable_fees",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["extra_curricular"]=array("displayName"=>"Extra Curricular","type"=>"number","name"=>"extra_curricular","id"=>"extra_curricular","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("extra_curricular",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["term_1"]=array("displayName"=>"Term 1","type"=>"number","name"=>"term_1","id"=>"term_1","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_1",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["term_2"]=array("displayName"=>"Term 2","type"=>"number","name"=>"term_2","id"=>"term_2","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_2",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["term_3"]=array("displayName"=>"Term 3","type"=>"number","name"=>"term_3","id"=>"term_3","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_3",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$mfeesObj->setDefaultValue("branch_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"hidden","name"=>"date_timestamp","id"=>"date_timestamp","class","style","error","required"=>"","value"=>$mfeesObj->setDefaultValue("date_timestamp",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("status",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["admission_fees"]=array("displayName"=>"Admission Fees","type"=>"text","name"=>"admission_fees","id"=>"admission_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("admission_fees",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["material_fees"]=array("displayName"=>"Material Fees","type"=>"text","name"=>"material_fees","id"=>"material_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("material_fees",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["refundable_fees"]=array("displayName"=>"Refundable Fees","type"=>"text","name"=>"refundable_fees","id"=>"refundable_fees","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("refundable_fees",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["extra_curricular"]=array("displayName"=>"Extra Curricular","type"=>"text","name"=>"extra_curricular","id"=>"extra_curricular","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("extra_curricular",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["term_1"]=array("displayName"=>"Term 1","type"=>"text","name"=>"term_1","id"=>"term_1","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_1",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["term_2"]=array("displayName"=>"Term 2","type"=>"text","name"=>"term_2","id"=>"term_2","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_2",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["term_3"]=array("displayName"=>"Term 3","type"=>"text","name"=>"term_3","id"=>"term_3","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("term_3",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"text","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$mfeesObj->setDefaultValue("branch_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"text","name"=>"date_timestamp","id"=>"date_timestamp","class","style","error","required"=>"","value"=>$mfeesObj->setDefaultValue("date_timestamp",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$mfeesObj->setDefaultValue("status",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mfeesObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mfeesObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>