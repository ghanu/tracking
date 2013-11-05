<?php include_once AppRoot . AppController . "cMstateController.php";

$mstateObj = new cmstateController();

$action = $get["action"]?$get["action"]:"viewall";
    $mstateObj->id = $id = $get["id"]; 

if($post){
    
$mstateObj->action = $post["formaction"];
    $content_details_array["page"] = $mstateObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mstateid=".$mstateObj->id."&action=view");
    }else{
    $data=$mstateObj->getSelectData($get["file"], $get["columns"], "id=".$mstateObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mstateObj->action = "view";
        
        $defaultdata = $mstateObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("{$id} - State ");

$content_details_array["page"]["title"]=ucwords("{$action} - State");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["state_code"]=array("displayName"=>"State Code","type"=>"text","name"=>"state_code","id"=>"state_code","class","style","error","required"=>"required","value"=>$mstateObj->setDefaultValue("state_code",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["state_name"]=array("displayName"=>"State Name","type"=>"text","name"=>"state_name","id"=>"state_name","class","style","error","required"=>"required","value"=>$mstateObj->setDefaultValue("state_name",$defaultdata,$dummy),"pattern"=>"");
$selectboxdata=$mstateObj->getSelectData('mcountry','id,country_name','','country_name');$content_details_array["formelements"]["country_id"]=array("displayName"=>"Country Id","type"=>"text","name"=>"country_id","id"=>"country_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$mstateObj->setDefaultValue("country_id",$defaultdata),"addonfly"=>array("mcountry","country_name") );}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["state_code"]=array("displayName"=>"State Code","type"=>"text","name"=>"state_code","id"=>"state_code","class","style","error","required"=>"required","value"=>$mstateObj->setDefaultValue("state_code",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["state_name"]=array("displayName"=>"State Name","type"=>"text","name"=>"state_name","id"=>"state_name","class","style","error","required"=>"required","value"=>$mstateObj->setDefaultValue("state_name",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$mstateObj->getSelectData('mcountry','id,country_name','','country_name');$content_details_array["formelements"]["country_id"]=array("displayName"=>"Country Id","type"=>"text","name"=>"country_id","id"=>"country_id","class","style","error","required"=>"required",data=>$selectboxdata,value=>$mstateObj->setDefaultValue("country_id",$defaultdata),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mstateObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mstateObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Code~~~Name~~~Country~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>