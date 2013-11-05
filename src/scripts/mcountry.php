<?php include_once AppRoot . AppController . "cMcountryController.php";

$mcountryObj = new cmcountryController();

$action = $get["action"]?$get["action"]:"viewall";
    $mcountryObj->id = $id = $get["id"]; 

if($post){
    
$mcountryObj->action = $post["formaction"];
    $content_details_array["page"] = $mcountryObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mcountry");
    }else{
    $data=$mcountryObj->getSelectData($get["file"], $get["columns"], "id=".$mcountryObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mcountryObj->action = "view";
        
        $defaultdata = $mcountryObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"][heading]=ucwords("{$id} - Country Details");

$content_details_array["page"][title]=ucwords("{$action} Country Details");

if($action=="add"||$action=="edit"){
$content_details_array["formelements"]["country_name"]=array("displayName"=>"Country Name","type"=>"text","name"=>"country_name","id"=>"country_name","class","style","error","required"=>"required","value"=>$mcountryObj->setDefaultValue("country_name",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["country_code"]=array("displayName"=>"Country Code","type"=>"text","name"=>"country_code","id"=>"country_code","class","style","error","required"=>"required","value"=>$mcountryObj->setDefaultValue("country_code",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view"){$content_details_array["formelements"]["country_name"]=array("displayName"=>"Country Name","type"=>"text","name"=>"country_name","id"=>"country_name","class","style","error","required"=>"required","value"=>$mcountryObj->setDefaultValue("country_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["country_code"]=array("displayName"=>"Country Code","type"=>"text","name"=>"country_code","id"=>"country_code","class","style","error","required"=>"required","value"=>$mcountryObj->setDefaultValue("country_code",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mcountryObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mcountryObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Name~~~Code~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>