<?php include_once AppRoot . AppController . "cDriverController.php";

$driverObj = new cdriverController();

$action = $get["action"]?$get["action"]:"viewall";
    $driverObj->id = $id = $get["id"]; 

if($post){
    
$driverObj->action = $post["formaction"];
    $content_details_array["page"] = $driverObj->curd();
    $driverObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("driver&id=".$driverObj->id."&action=view");
    }else{
    $data=$driverObj->getSelectData($get["file"], $get["columns"], "id=".$driverObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $driverObj->action = "view";
        
        $defaultdata = $driverObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$driverObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Driver Information");

$content_details_array["page"]["title"]=ucwords("Driver Information");

if($action=="add"||$action=="edit")
{$selectboxdata=$driverObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$driverObj->setDefaultValue("user_id",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["school_name"]=array("displayName"=>"School Name","type"=>"text","name"=>"school_name","id"=>"school_name","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("school_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["standard"]=array("displayName"=>"Standard","type"=>"text","name"=>"standard","id"=>"standard","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("standard",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["year"]=array("displayName"=>"Year","type"=>"text","name"=>"year","id"=>"year","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("year",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["city2"]=array("displayName"=>"City2","type"=>"text","name"=>"city2","id"=>"city2","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("city2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["vehicle_name"]=array("displayName"=>"Vehicle Name","type"=>"text","name"=>"vehicle_name","id"=>"vehicle_name","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("vehicle_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["period_start"]=array("displayName"=>"Period Start","type"=>"text","name"=>"period_start","id"=>"period_start","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_start",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["period_end"]=array("displayName"=>"Period End","type"=>"text","name"=>"period_end","id"=>"period_end","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_end",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["accident"]=array("displayName"=>"Accident","type"=>"text","name"=>"accident","id"=>"accident","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("accident",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["vehicle_name1"]=array("displayName"=>"Vehicle Name1","type"=>"text","name"=>"vehicle_name1","id"=>"vehicle_name1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("vehicle_name1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["period_start1"]=array("displayName"=>"Period Start1","type"=>"text","name"=>"period_start1","id"=>"period_start1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("period_start1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["period_end1"]=array("displayName"=>"Period End1","type"=>"text","name"=>"period_end1","id"=>"period_end1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("period_end1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["accident1"]=array("displayName"=>"Accident1","type"=>"text","name"=>"accident1","id"=>"accident1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("accident1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["license_no"]=array("displayName"=>"License No","type"=>"text","name"=>"license_no","id"=>"license_no","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("license_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["license_address"]=array("displayName"=>"License Address","type"=>"text","name"=>"license_address","id"=>"license_address","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("license_address",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["period_start2"]=array("displayName"=>"Period Start2","type"=>"text","name"=>"period_start2","id"=>"period_start2","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_start2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["expiry_on"]=array("displayName"=>"Expiry On","type"=>"text","name"=>"expiry_on","id"=>"expiry_on","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("expiry_on",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rto"]=array("displayName"=>"Rto","type"=>"text","name"=>"rto","id"=>"rto","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rto",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["name_of_employer"]=array("displayName"=>"Name Of Employer","type"=>"text","name"=>"name_of_employer","id"=>"name_of_employer","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("name_of_employer",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["daddress"]=array("displayName"=>"Daddress","type"=>"text","name"=>"daddress","id"=>"daddress","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("daddress",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dcity"]=array("displayName"=>"Dcity","type"=>"text","name"=>"dcity","id"=>"dcity","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dcity",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dstate"]=array("displayName"=>"Dstate","type"=>"text","name"=>"dstate","id"=>"dstate","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dstate",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dpincode"]=array("displayName"=>"Dpincode","type"=>"text","name"=>"dpincode","id"=>"dpincode","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dpincode",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["employment_dates_from"]=array("displayName"=>"Employment Dates From","type"=>"date","name"=>"employment_dates_from","id"=>"employment_dates_from","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("employment_dates_from",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["employment_dates_to"]=array("displayName"=>"Employment Dates To","type"=>"date","name"=>"employment_dates_to","id"=>"employment_dates_to","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("employment_dates_to",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pay_rs"]=array("displayName"=>"Pay Rs","type"=>"number","name"=>"pay_rs","id"=>"pay_rs","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("pay_rs",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["name_of_immediate_superviser"]=array("displayName"=>"Name Of Immediate Superviser","type"=>"text","name"=>"name_of_immediate_superviser","id"=>"name_of_immediate_superviser","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("name_of_immediate_superviser",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("reason_for_leaving",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rname"]=array("displayName"=>"Rname","type"=>"text","name"=>"rname","id"=>"rname","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rname",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rrelationship"]=array("displayName"=>"Rrelationship","type"=>"text","name"=>"rrelationship","id"=>"rrelationship","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rrelationship",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["raddress"]=array("displayName"=>"Raddress","type"=>"text","name"=>"raddress","id"=>"raddress","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("raddress",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rwork_number"]=array("displayName"=>"Rwork Number","type"=>"number","name"=>"rwork_number","id"=>"rwork_number","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rwork_number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rhome_number"]=array("displayName"=>"Rhome Number","type"=>"number","name"=>"rhome_number","id"=>"rhome_number","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rhome_number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rname1"]=array("displayName"=>"Rname1","type"=>"text","name"=>"rname1","id"=>"rname1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rname1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rrelationship1"]=array("displayName"=>"Rrelationship1","type"=>"text","name"=>"rrelationship1","id"=>"rrelationship1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rrelationship1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["raddress1"]=array("displayName"=>"Raddress1","type"=>"text","name"=>"raddress1","id"=>"raddress1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("raddress1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rwork_number1"]=array("displayName"=>"Rwork Number1","type"=>"number","name"=>"rwork_number1","id"=>"rwork_number1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rwork_number1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rhome_number1"]=array("displayName"=>"Rhome Number1","type"=>"number","name"=>"rhome_number1","id"=>"rhome_number1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rhome_number1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$driverObj->getSelectData('__user_details','id,first_name','','');$content_details_array["formelements"]["user_id"] = array("displayName" => "User Id", "type" => "text", "name" => "user_id", "id" => "user_id", "class", "style", "error", "required" => "", data => $selectboxdata, value => $driverObj->setDefaultValue("user_id", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["school_name"]=array("displayName"=>"School Name","type"=>"text","name"=>"school_name","id"=>"school_name","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("school_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["standard"]=array("displayName"=>"Standard","type"=>"text","name"=>"standard","id"=>"standard","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("standard",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["year"]=array("displayName"=>"Year","type"=>"text","name"=>"year","id"=>"year","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("year",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["city2"]=array("displayName"=>"City2","type"=>"text","name"=>"city2","id"=>"city2","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("city2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["vehicle_name"]=array("displayName"=>"Vehicle Name","type"=>"text","name"=>"vehicle_name","id"=>"vehicle_name","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("vehicle_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["period_start"]=array("displayName"=>"Period Start","type"=>"text","name"=>"period_start","id"=>"period_start","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_start",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["period_end"]=array("displayName"=>"Period End","type"=>"text","name"=>"period_end","id"=>"period_end","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_end",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["accident"]=array("displayName"=>"Accident","type"=>"text","name"=>"accident","id"=>"accident","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("accident",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["vehicle_name1"]=array("displayName"=>"Vehicle Name1","type"=>"text","name"=>"vehicle_name1","id"=>"vehicle_name1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("vehicle_name1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["period_start1"]=array("displayName"=>"Period Start1","type"=>"text","name"=>"period_start1","id"=>"period_start1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("period_start1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["period_end1"]=array("displayName"=>"Period End1","type"=>"text","name"=>"period_end1","id"=>"period_end1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("period_end1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["accident1"]=array("displayName"=>"Accident1","type"=>"text","name"=>"accident1","id"=>"accident1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("accident1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["license_no"]=array("displayName"=>"License No","type"=>"text","name"=>"license_no","id"=>"license_no","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("license_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["license_address"]=array("displayName"=>"License Address","type"=>"text","name"=>"license_address","id"=>"license_address","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("license_address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["period_start2"]=array("displayName"=>"Period Start2","type"=>"text","name"=>"period_start2","id"=>"period_start2","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("period_start2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["expiry_on"]=array("displayName"=>"Expiry On","type"=>"text","name"=>"expiry_on","id"=>"expiry_on","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("expiry_on",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rto"]=array("displayName"=>"Rto","type"=>"text","name"=>"rto","id"=>"rto","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rto",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["name_of_employer"]=array("displayName"=>"Name Of Employer","type"=>"text","name"=>"name_of_employer","id"=>"name_of_employer","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("name_of_employer",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["daddress"]=array("displayName"=>"Daddress","type"=>"text","name"=>"daddress","id"=>"daddress","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("daddress",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dcity"]=array("displayName"=>"Dcity","type"=>"text","name"=>"dcity","id"=>"dcity","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dcity",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dstate"]=array("displayName"=>"Dstate","type"=>"text","name"=>"dstate","id"=>"dstate","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dstate",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dpincode"]=array("displayName"=>"Dpincode","type"=>"text","name"=>"dpincode","id"=>"dpincode","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("dpincode",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["employment_dates_from"]=array("displayName"=>"Employment Dates From","type"=>"text","name"=>"employment_dates_from","id"=>"employment_dates_from","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("employment_dates_from",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["employment_dates_to"]=array("displayName"=>"Employment Dates To","type"=>"text","name"=>"employment_dates_to","id"=>"employment_dates_to","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("employment_dates_to",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pay_rs"]=array("displayName"=>"Pay Rs","type"=>"text","name"=>"pay_rs","id"=>"pay_rs","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("pay_rs",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["name_of_immediate_superviser"]=array("displayName"=>"Name Of Immediate Superviser","type"=>"text","name"=>"name_of_immediate_superviser","id"=>"name_of_immediate_superviser","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("name_of_immediate_superviser",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("reason_for_leaving",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rname"]=array("displayName"=>"Rname","type"=>"text","name"=>"rname","id"=>"rname","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rname",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rrelationship"]=array("displayName"=>"Rrelationship","type"=>"text","name"=>"rrelationship","id"=>"rrelationship","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rrelationship",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["raddress"]=array("displayName"=>"Raddress","type"=>"text","name"=>"raddress","id"=>"raddress","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("raddress",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rwork_number"]=array("displayName"=>"Rwork Number","type"=>"text","name"=>"rwork_number","id"=>"rwork_number","class","style","error","required"=>"required","value"=>$driverObj->setDefaultValue("rwork_number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rhome_number"]=array("displayName"=>"Rhome Number","type"=>"text","name"=>"rhome_number","id"=>"rhome_number","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rhome_number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rname1"]=array("displayName"=>"Rname1","type"=>"text","name"=>"rname1","id"=>"rname1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rname1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rrelationship1"]=array("displayName"=>"Rrelationship1","type"=>"text","name"=>"rrelationship1","id"=>"rrelationship1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rrelationship1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["raddress1"]=array("displayName"=>"Raddress1","type"=>"text","name"=>"raddress1","id"=>"raddress1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("raddress1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rwork_number1"]=array("displayName"=>"Rwork Number1","type"=>"text","name"=>"rwork_number1","id"=>"rwork_number1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rwork_number1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rhome_number1"]=array("displayName"=>"Rhome Number1","type"=>"text","name"=>"rhome_number1","id"=>"rhome_number1","class","style","error","required"=>"","value"=>$driverObj->setDefaultValue("rhome_number1",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$driverObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$driverObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","User","School Name","Standard","Year","City","Vehicle Name","Period Start","Period End","Accident","Vehicle Name","Period Start","Period End","Accident","License No","License Address","Period Start","Expiry On","RTO","Name of Employer","Address","City","State","Pincode","Employment Dates From","Employment Dates To","Pay Rs","Name Of Immediate Superviser","Reason For Leaving","Name","Relationship","Address","Work Number","Home Number","Name","Relationship","Address","Work Number","Home Number","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>