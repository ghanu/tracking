<?php include_once AppRoot . AppController . "cTest_ui_childController.php";

$test_ui_childObj = new ctest_ui_childController();

$action = $get["action"]?$get["action"]:"viewall";
    $test_ui_childObj->id = $id = $get["id"]; 

if($post){
    
$test_ui_childObj->action = $post["formaction"];
    $content_details_array["page"] = $test_ui_childObj->curd();
    $test_ui_childObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("test_ui_child&id=".$test_ui_childObj->id."&action=view");
    }else{
    $data=$test_ui_childObj->getSelectData($get["file"], $get["columns"], "id=".$test_ui_childObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $test_ui_childObj->action = "view";
        
        $defaultdata = $test_ui_childObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$test_ui_childObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Test child");

$content_details_array["page"]["title"]=ucwords("Test child");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["data"]=array("displayName"=>"Data","type"=>"text","name"=>"data","id"=>"data","class","style","error","required"=>"","value"=>$test_ui_childObj->setDefaultValue("data",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["data"]=array("displayName"=>"Data","type"=>"text","name"=>"data","id"=>"data","class"=>"textalignleft","style","error","required"=>"","value"=>$test_ui_childObj->setDefaultValue("data",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$test_ui_childObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$test_ui_childObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Data","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>