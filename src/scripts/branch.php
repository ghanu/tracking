<?php include_once AppRoot . AppController . "cBranchController.php";

$branchObj = new cbranchController();

$action = $get["action"]?$get["action"]:"viewall";
    $branchObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$branchObj->action = $action;
    $content_details_array["page"] = $branchObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("branch");
    }else{
    $data=$branchObj->getSelectData($get["file"], $get["columns"], "id=".$branchObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $branchObj->action = "view";
        
        $defaultdata = $branchObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Location");

$content_details_array["page"][title]=ucwords("Location");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["code"]=array("displayName"=>"Code","type"=>"text","name"=>"code","id"=>"code","class","style","error","required"=>"required","value"=>$branchObj->setDefaultValue("code",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["location"]=array("displayName"=>"Location","type"=>"text","name"=>"location","id"=>"location","class","style","error","required"=>"required","value"=>$branchObj->setDefaultValue("location",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["address"]=array("name"=>"address","id"=>"address","required"=>"required","value"=>$branchObj->setDefaultValue("address",$defaultdata));}

if($action=="view"){$content_details_array["formelements"]["code"]=array("displayName"=>"Code","type"=>"text","name"=>"code","id"=>"code","class","style","error","required"=>"required","value"=>$branchObj->setDefaultValue("code",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["location"]=array("displayName"=>"Location","type"=>"text","name"=>"location","id"=>"location","class","style","error","required"=>"required","value"=>$branchObj->setDefaultValue("location",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["address"]=array("name"=>"address","id"=>"address","value"=>$branchObj->setDefaultValue("address",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$branchObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$branchObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Code~~~Location~~~Address~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>