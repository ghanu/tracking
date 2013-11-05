<?php include_once AppRoot . AppController . "cTest_allController.php";

$test_allObj = new ctest_allController();

$action = $get["action"]?$get["action"]:"viewall";
    $test_allObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$test_allObj->action = $action;
    $content_details_array["page"] = $test_allObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("test_all");
    }else{
    $data=$test_allObj->getSelectData($get["file"], $get["columns"], "id=".$test_allObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $test_allObj->action = "view";
        
        $defaultdata = $test_allObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("{$id} - Test");

$content_details_array["page"][title]=ucwords("{$action} Test");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["col_text"]=array("displayName"=>"Col Text","type"=>"text","name"=>"col_text","id"=>"col_text","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_text",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_date_time"]=array("displayName"=>"Col Date Time","type"=>"text","name"=>"col_date_time","id"=>"col_date_time","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_date_time",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_date"]=array("displayName"=>"Col Date","type"=>"date","name"=>"col_date","id"=>"col_date","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_number"]=array("displayName"=>"Col Number","type"=>"text","name"=>"col_number","id"=>"col_number","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_number",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_email"]=array("displayName"=>"Col Email","type"=>"email","name"=>"col_email","id"=>"col_email","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_email",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_url"]=array("displayName"=>"Col Url","type"=>"url","name"=>"col_url","id"=>"col_url","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_url",$defaultdata),"pattern"=>"",);

$content_details_array["formelements"]["col_pattern_valid"]=array("displayName"=>"Col Pattern Valid","type"=>"pattern","name"=>"col_pattern_valid","id"=>"col_pattern_valid","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_pattern_valid",$defaultdata),"pattern"=>"",);
$selectboxdata=$test_allObj->getSelectData('test_foreign','id,name','','name');$content_details_array["formelements"]["col_foreign_key"]=array("displayName"=>"Col Foreign Key","type"=>"text","name"=>"col_foreign_key","id"=>"col_foreign_key","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$test_allObj->setDefaultValue("col_foreign_key",$defaultdata),"addonfly"=>array("test_foreign","name") );
$content_details_array["formelements"]["col_hidden"]=array("displayName"=>"Col Hidden","type"=>"hidden","name"=>"col_hidden","id"=>"col_hidden","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_hidden",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["col_textarea"]=array("displayName"=>"Col Textarea","type"=>"text","name"=>"col_textarea","id"=>"col_textarea","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_textarea",$defaultdata),"pattern"=>"",);

$content_details_array["formelements"]["col_direct_select"]=array("displayName"=>"Col Direct Select","type"=>"text","name"=>"col_direct_select","id"=>"col_direct_select","class","style","error","required"=>"required","data"=>$dummy,"value"=>$test_allObj->setDefaultValue("col_direct_select",$defaultdata),"addonfly"=>array("","") );}

if($action=="view"){$content_details_array["formelements"]["col_text"]=array("displayName"=>"Col Text","type"=>"text","name"=>"col_text","id"=>"col_text","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_text",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_date_time"]=array("displayName"=>"Col Date Time","type"=>"text","name"=>"col_date_time","id"=>"col_date_time","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_date_time",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_date"]=array("displayName"=>"Col Date","type"=>"text","name"=>"col_date","id"=>"col_date","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_number"]=array("displayName"=>"Col Number","type"=>"text","name"=>"col_number","id"=>"col_number","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_number",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_email"]=array("displayName"=>"Col Email","type"=>"text","name"=>"col_email","id"=>"col_email","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_email",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_url"]=array("displayName"=>"Col Url","type"=>"text","name"=>"col_url","id"=>"col_url","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_url",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_free_field"]=array("value"=>$test_allObj->setDefaultValue("col_free_field",$defaultdata,''));
$content_details_array["formelements"]["col_pattern_valid"]=array("displayName"=>"Col Pattern Valid","type"=>"text","name"=>"col_pattern_valid","id"=>"col_pattern_valid","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_pattern_valid",$defaultdata,''),"readonly"=>"readonly");
$selectboxdata=$test_allObj->getSelectData('test_foreign','id,name','','name');$content_details_array["formelements"]["col_foreign_key"]=array("displayName"=>"Col Foreign Key","type"=>"text","name"=>"col_foreign_key","id"=>"col_foreign_key","class","style","error","required"=>"required",data=>$selectboxdata,value=>$test_allObj->setDefaultValue("col_foreign_key",$defaultdata),"readonly"=>"readonly");
$content_details_array["formelements"]["col_hidden"]=array("displayName"=>"Col Hidden","type"=>"text","name"=>"col_hidden","id"=>"col_hidden","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_hidden",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["col_textarea"]=array("displayName"=>"Col Textarea","type"=>"text","name"=>"col_textarea","id"=>"col_textarea","class","style","error","required"=>"required","value"=>$test_allObj->setDefaultValue("col_textarea",$defaultdata,''),"readonly"=>"readonly");

$content_details_array["formelements"]["col_direct_select"]=array("displayName"=>"Col Direct Select","type"=>"text","name"=>"col_direct_select","id"=>"col_direct_select","class","style","error","required"=>"required",data=>$dummy,value=>$test_allObj->setDefaultValue("col_direct_select",$defaultdata),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$test_allObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$test_allObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>