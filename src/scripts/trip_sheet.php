<?php include_once AppRoot . AppController . "cTrip_sheetController.php";

$trip_sheetObj = new ctrip_sheetController();

$action = $get["action"]?$get["action"]:"viewall";
    $trip_sheetObj->id = $id = $get["id"]; 

if($post){
    
$trip_sheetObj->action = $post["formaction"];
    $content_details_array["page"] = $trip_sheetObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("trip_sheet&id=".$trip_sheetObj->id."&action=view");
    }else{
    $data=$trip_sheetObj->getSelectData($get["file"], $get["columns"], "id=".$trip_sheetObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $trip_sheetObj->action = "view";
        
        $defaultdata = $trip_sheetObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Trip Sheet");

$content_details_array["page"]["title"]=ucwords("Trip Sheet");

if($action=="add"||$action=="edit")
{$selectboxdata=$trip_sheetObj->getSelectData('vehicle','id,registration_no','','');$sql_vehicle_no=base64_encode('SELECT id,driver_name AS value
FROM route_allocation where id={$id}');$content_details_array["formelements"]["vehicle_no"]=array("displayName"=>"Vehicle No","type"=>"text","name"=>"vehicle_no","id"=>"vehicle_no","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$trip_sheetObj->setDefaultValue("vehicle_no",$defaultdata),"addonfly"=>array("vehicle","registration_no") ,"event"=>"onChange='geoJs.loaddependentValues(this,\"driver_name\",\"$sql_vehicle_no\")'");
                
$selectboxdata=$trip_sheetObj->getSelectData('driver','id,first_name','','');$content_details_array["formelements"]["driver_name"]=array("displayName"=>"Driver Name","type"=>"text","name"=>"driver_name","id"=>"driver_name","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$trip_sheetObj->setDefaultValue("driver_name",$defaultdata),"addonfly"=>array("driver","first_name") );
                
$selectboxdata=$trip_sheetObj->getSelectData('route_details','id,route_name','','');$content_details_array["formelements"]["route"]=array("displayName"=>"Route","type"=>"text","name"=>"route","id"=>"route","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$trip_sheetObj->setDefaultValue("route",$defaultdata),"addonfly"=>array("route_details","route_name") );
                

$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"date","name"=>"date","id"=>"date","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("date",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["morning_pickup"]=array("displayName"=>"Morning Pickup","type"=>"text","name"=>"morning_pickup","id"=>"morning_pickup","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("morning_pickup",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["morning_drop"]=array("displayName"=>"Morning Drop","type"=>"text","name"=>"morning_drop","id"=>"morning_drop","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("morning_drop",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["evening_pickup"]=array("displayName"=>"Evening Pickup","type"=>"text","name"=>"evening_pickup","id"=>"evening_pickup","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("evening_pickup",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["evening_drop"]=array("displayName"=>"Evening Drop","type"=>"text","name"=>"evening_drop","id"=>"evening_drop","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("evening_drop",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["total_km"]=array("displayName"=>"Total Km","type"=>"text","name"=>"total_km","id"=>"total_km","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("total_km",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["diesel_litre"]=array("displayName"=>"Diesel Litre","type"=>"number","name"=>"diesel_litre","id"=>"diesel_litre","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("diesel_litre",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["diesel_price"]=array("displayName"=>"Diesel Price","type"=>"number","name"=>"diesel_price","id"=>"diesel_price","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("diesel_price",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$trip_sheetObj->getSelectData('vehicle','id,registration_no','','');$content_details_array["formelements"]["vehicle_no"] = array("displayName" => "Vehicle No", "type" => "text", "name" => "vehicle_no", "id" => "vehicle_no", "class", "style", "error", "required" => "", data => $selectboxdata, value => $trip_sheetObj->setDefaultValue("vehicle_no", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$trip_sheetObj->getSelectData('driver','id,first_name','','');$content_details_array["formelements"]["driver_name"] = array("displayName" => "Driver Name", "type" => "text", "name" => "driver_name", "id" => "driver_name", "class", "style", "error", "required" => "", data => $selectboxdata, value => $trip_sheetObj->setDefaultValue("driver_name", $defaultdata), "readonly" => "readonly");
                
$selectboxdata=$trip_sheetObj->getSelectData('route_details','id,route_name','','');$content_details_array["formelements"]["route"] = array("displayName" => "Route", "type" => "text", "name" => "route", "id" => "route", "class", "style", "error", "required" => "", data => $selectboxdata, value => $trip_sheetObj->setDefaultValue("route", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"text","name"=>"date","id"=>"date","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["morning_pickup"]=array("displayName"=>"Morning Pickup","type"=>"text","name"=>"morning_pickup","id"=>"morning_pickup","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("morning_pickup",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["morning_drop"]=array("displayName"=>"Morning Drop","type"=>"text","name"=>"morning_drop","id"=>"morning_drop","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("morning_drop",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["evening_pickup"]=array("displayName"=>"Evening Pickup","type"=>"text","name"=>"evening_pickup","id"=>"evening_pickup","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("evening_pickup",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["evening_drop"]=array("displayName"=>"Evening Drop","type"=>"text","name"=>"evening_drop","id"=>"evening_drop","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("evening_drop",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["total_km"]=array("displayName"=>"Total Km","type"=>"text","name"=>"total_km","id"=>"total_km","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("total_km",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["diesel_litre"]=array("displayName"=>"Diesel Litre","type"=>"text","name"=>"diesel_litre","id"=>"diesel_litre","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("diesel_litre",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["diesel_price"]=array("displayName"=>"Diesel Price","type"=>"text","name"=>"diesel_price","id"=>"diesel_price","class","style","error","required"=>"","value"=>$trip_sheetObj->setDefaultValue("diesel_price",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$trip_sheetObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$trip_sheetObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Vehicle No~~~Driver Name~~~Route~~~Date~~~Morning Pickup~~~Morning Drop~~~Evening Pickup~~~Evening Drop~~~Total Km~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>