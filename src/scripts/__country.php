<?php include_once AppRoot . AppController . "c__countryController.php";
print_r($_SESSION);
$__countryObj = new c__countryController();

$action = $get["action"]?$get["action"]:"viewall";
    $__countryObj->id = $id = $get["id"]; 

if($post){
    
$__countryObj->action = $post["formaction"];
    $content_details_array["page"] = $__countryObj->curd();
    $__countryObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__country&id=".$__countryObj->id."&action=view");
    }else{
    $data=$__countryObj->getSelectData($get["file"], $get["columns"], "id=".$__countryObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__countryObj->action = "view";
        
        $defaultdata = $__countryObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__countryObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("country");

$content_details_array["page"]["title"]=ucwords("country");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["country_name"]=array("displayName"=>"Country Name","type"=>"text","name"=>"country_name","id"=>"country_name","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("country_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["nationality"]=array("displayName"=>"Nationality","type"=>"text","name"=>"nationality","id"=>"nationality","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("nationality",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["languages"]=array("displayName"=>"Languages","type"=>"text","name"=>"languages","id"=>"languages","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("languages",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["country_name"]=array("displayName"=>"Country Name","type"=>"text","name"=>"country_name","id"=>"country_name","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("country_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["nationality"]=array("displayName"=>"Nationality","type"=>"text","name"=>"nationality","id"=>"nationality","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("nationality",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["languages"]=array("displayName"=>"Languages","type"=>"text","name"=>"languages","id"=>"languages","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("languages",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"text","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$__countryObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__countryObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__countryObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Country Name","Nationality","Languages","Branch Id","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>