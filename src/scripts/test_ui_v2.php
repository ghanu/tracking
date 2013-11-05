<?php include_once AppRoot . AppController . "cTest_uiController.php";
$test_uiObj = new ctest_uiController();
$action = $get["action"]?$get["action"]:"viewall";
    $test_uiObj->id = $id = $get["id"]; 

if($post){
    
$test_uiObj->action = $post["formaction"];
    $content_details_array["page"] = $test_uiObj->curd();
    $test_uiObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("test_ui&id=".$test_uiObj->id."&action=view");
    }else{
    $data=$test_uiObj->getSelectData($get["file"], $get["columns"], "id=".$test_uiObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $test_uiObj->action = "editview";
         }else{
            $test_uiObj->action = "view";
         }
     
        
        $defaultdata = $test_uiObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $test_uiObj->action=$action;
    $content_details_array["page"] = $test_uiObj->curd();
    redirect("test_ui&action=viewall");
    }
    
}


$test_uiObj->beforeWrite();
$content_details_array["page"]["request_type"]=$get["dataType"];$content_details_array["page"]["action"]=$get["action"];$content_details_array["page"]["heading"]=ucwords("Test UI");$content_details_array["page"]["title"]=ucwords("Test UI");$content_details_array["formelements"]["text"]=array("type"=>"text","name"=>"text","required"=>"","value"=>$test_uiObj->setDefaultValue("text",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["number"]=array("type"=>"text","name"=>"number","required"=>"","value"=>$test_uiObj->setDefaultValue("number",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["date"]=array("type"=>"text","name"=>"date","required"=>"","value"=>$test_uiObj->setDefaultValue("date",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["check_box"]=array("type"=>"text","name"=>"check_box","required"=>"","value"=>$test_uiObj->setDefaultValue("check_box",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["radio"]=array("type"=>"text","name"=>"radio","required"=>"","value"=>$test_uiObj->setDefaultValue("radio",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["photo"]=array("type"=>"text","name"=>"photo","required"=>"","value"=>$test_uiObj->setDefaultValue("photo",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["read_only"]=array("type"=>"text","name"=>"read_only","required"=>"","value"=>$test_uiObj->setDefaultValue("read_only",$defaultdata,""),"placeholder"=>"");$content_details_array["formelements"]["select_array"]=array("type"=>"text","name"=>"select_array","required"=>"","value"=>$test_uiObj->setDefaultValue("select_array",$defaultdata,""),"placeholder"=>"");
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$test_uiObj->setDefaultValue("id",$defaultdata));
            
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$test_uiObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Text","Select Foregin","Number","Date","Check Box","Radio","Photo","Read Only","Select Array"]');
}?>