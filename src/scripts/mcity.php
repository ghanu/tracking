<?php include_once AppRoot . AppController . "cMcityController.php";

$mcityObj = new cmcityController();

$action = $get["action"]?$get["action"]:"viewall";
    $mcityObj->id = $id = $get["id"]; 

if($post){
    
$mcityObj->action = $post["formaction"];
    $content_details_array["page"] = $mcityObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mcity&id=".$mcityObj->id."&action=view");
    }else{
    $data=$mcityObj->getSelectData($get["file"], $get["columns"], "id=".$mcityObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mcityObj->action = "view";
        
        $defaultdata = $mcityObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("City");

$content_details_array["page"]["title"]=ucwords("City");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["city_name"]=array("displayName"=>"City Name","type"=>"text","name"=>"city_name","id"=>"city_name","class","style","error","required"=>"required","value"=>$mcityObj->setDefaultValue("city_name",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["city_code"]=array("displayName"=>"City Code","type"=>"text","name"=>"city_code","id"=>"city_code","class","style","error","required"=>"required","value"=>$mcityObj->setDefaultValue("city_code",$defaultdata,$dummy),"pattern"=>"");
$content_details_array["formelements"]["state_id"]=array("displayName"=>"State Id","type"=>"text","name"=>"state_id","id"=>"state_id","class","style","error","required"=>"","data"=>$dummy,"value"=>$mcityObj->setDefaultValue("state_id",$defaultdata),"addonfly"=>array("","") );}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["city_name"]=array("displayName"=>"City Name","type"=>"text","name"=>"city_name","id"=>"city_name","class","style","error","required"=>"required","value"=>$mcityObj->setDefaultValue("city_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["city_code"]=array("displayName"=>"City Code","type"=>"text","name"=>"city_code","id"=>"city_code","class","style","error","required"=>"required","value"=>$mcityObj->setDefaultValue("city_code",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["state_id"]=array("displayName"=>"State Id","type"=>"text","name"=>"state_id","id"=>"state_id","class","style","error","required"=>"",data=>$dummy,value=>$mcityObj->setDefaultValue("state_id",$defaultdata),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mcityObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mcityObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~City Name~~~City Code~~~State Id~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>