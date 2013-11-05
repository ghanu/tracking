<?php include_once AppRoot . AppController . "cClassController.php";

$classObj = new cclassController();

$action = $get["action"]?$get["action"]:"viewall";
    $classObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$classObj->action = $action;
    $content_details_array["page"] = $classObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("class");
    }else{
    $data=$classObj->getSelectData($get["file"], $get["columns"], "id=".$classObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $classObj->action = "view";
        
        $defaultdata = $classObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Class");

$content_details_array["page"][title]=ucwords("Class");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","value"=>$classObj->setDefaultValue("class",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["class"]=array("displayName"=>"Class","type"=>"text","name"=>"class","id"=>"class","class","style","error","required"=>"required","value"=>$classObj->setDefaultValue("class",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$classObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$classObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>