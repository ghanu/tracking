<?php include_once AppRoot . AppController . "cTransportationController.php";

$transportationObj = new ctransportationController();

$action = $get["action"]?$get["action"]:"viewall";
    $transportationObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$transportationObj->action = $action;
    $content_details_array["page"] = $transportationObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("transportation");
    }else{
    $data=$transportationObj->getSelectData($get["file"], $get["columns"], "id=".$transportationObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $transportationObj->action = "view";
        
        $defaultdata = $transportationObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Transportation");

$content_details_array["page"][title]=ucwords("Transportation");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("application_no",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["registration_date"]=array("displayName"=>"Registration Date","type"=>"date","name"=>"registration_date","id"=>"registration_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("registration_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["enrollment"]=array("displayName"=>"Enrollment","type"=>"text","name"=>"enrollment","id"=>"enrollment","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("enrollment",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"number","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("user_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["start_date"]=array("displayName"=>"Start Date","type"=>"date","name"=>"start_date","id"=>"start_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("start_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["landmark1"]=array("displayName"=>"Landmark1","type"=>"text","name"=>"landmark1","id"=>"landmark1","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("landmark1",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["landmark2"]=array("displayName"=>"Landmark2","type"=>"text","name"=>"landmark2","id"=>"landmark2","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("landmark2",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["pickup"]=array("displayName"=>"Pickup","type"=>"text","name"=>"pickup","id"=>"pickup","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["drop_point"]=array("displayName"=>"Drop Point","type"=>"text","name"=>"drop_point","id"=>"drop_point","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_point",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["zone"]=array("displayName"=>"Zone","type"=>"text","name"=>"zone","id"=>"zone","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("zone",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["total_km"]=array("displayName"=>"Total Km","type"=>"number","name"=>"total_km","id"=>"total_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("total_km",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["pickup_km"]=array("displayName"=>"Pickup Km","type"=>"number","name"=>"pickup_km","id"=>"pickup_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup_km",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["drop_km"]=array("displayName"=>"Drop Km","type"=>"number","name"=>"drop_km","id"=>"drop_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_km",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["fees"]=array("displayName"=>"Fees","type"=>"text","name"=>"fees","id"=>"fees","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("fees",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"date","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("last_updated",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("status",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["remarks"]=array("displayName"=>"Remarks","type"=>"text","name"=>"remarks","id"=>"remarks","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("remarks",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["pickup_time"]=array("displayName"=>"Pickup Time","type"=>"text","name"=>"pickup_time","id"=>"pickup_time","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup_time",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["drop_time"]=array("displayName"=>"Drop Time","type"=>"text","name"=>"drop_time","id"=>"drop_time","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_time",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["application_date"]=array("displayName"=>"Application Date","type"=>"text","name"=>"application_date","id"=>"application_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("application_date",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("application_no",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["registration_date"]=array("displayName"=>"Registration Date","type"=>"text","name"=>"registration_date","id"=>"registration_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("registration_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["enrollment"]=array("displayName"=>"Enrollment","type"=>"text","name"=>"enrollment","id"=>"enrollment","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("enrollment",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("user_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["start_date"]=array("displayName"=>"Start Date","type"=>"text","name"=>"start_date","id"=>"start_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("start_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["landmark1"]=array("displayName"=>"Landmark1","type"=>"text","name"=>"landmark1","id"=>"landmark1","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("landmark1",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["landmark2"]=array("displayName"=>"Landmark2","type"=>"text","name"=>"landmark2","id"=>"landmark2","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("landmark2",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["pickup"]=array("displayName"=>"Pickup","type"=>"text","name"=>"pickup","id"=>"pickup","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["drop_point"]=array("displayName"=>"Drop Point","type"=>"text","name"=>"drop_point","id"=>"drop_point","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_point",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["zone"]=array("displayName"=>"Zone","type"=>"text","name"=>"zone","id"=>"zone","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("zone",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["total_km"]=array("displayName"=>"Total Km","type"=>"text","name"=>"total_km","id"=>"total_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("total_km",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["pickup_km"]=array("displayName"=>"Pickup Km","type"=>"text","name"=>"pickup_km","id"=>"pickup_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup_km",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["drop_km"]=array("displayName"=>"Drop Km","type"=>"text","name"=>"drop_km","id"=>"drop_km","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_km",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["fees"]=array("displayName"=>"Fees","type"=>"text","name"=>"fees","id"=>"fees","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("fees",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["last_updated"]=array("displayName"=>"Last Updated","type"=>"text","name"=>"last_updated","id"=>"last_updated","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("last_updated",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("status",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["remarks"]=array("displayName"=>"Remarks","type"=>"text","name"=>"remarks","id"=>"remarks","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("remarks",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["pickup_time"]=array("displayName"=>"Pickup Time","type"=>"text","name"=>"pickup_time","id"=>"pickup_time","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("pickup_time",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["drop_time"]=array("displayName"=>"Drop Time","type"=>"text","name"=>"drop_time","id"=>"drop_time","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("drop_time",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["application_date"]=array("displayName"=>"Application Date","type"=>"text","name"=>"application_date","id"=>"application_date","class","style","error","required"=>"required","value"=>$transportationObj->setDefaultValue("application_date",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$transportationObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$transportationObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>