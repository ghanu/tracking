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

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Test UI");

$content_details_array["page"]["title"]=ucwords("Test UI");

if($action=="add"||$action=="edit")
{$content_details_array["formelements"]["text"]=array("name"=>"text","id"=>"text","required"=>"required","value"=>$test_uiObj->setDefaultValue("text",$defaultdata));
$selectboxdata=$test_uiObj->getSelectData('test_ui_child','id,data','','id');$content_details_array["formelements"]["select_foregin"]=array("displayName"=>"Select Foregin","type"=>"text","name"=>"select_foregin","id"=>"select_foregin","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$test_uiObj->setDefaultValue("select_foregin",$defaultdata),"addonfly"=>array("test_ui_child","data") );
                

$content_details_array["formelements"]["number"]=array("displayName"=>"Number","type"=>"number","name"=>"number","id"=>"number","class","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"date","name"=>"date","id"=>"date","class","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["check_box"]=array("displayName"=>"Check Box","type"=>"checkbox","name"=>"check_box","id"=>"check_box","class","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("check_box",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array();$content_details_array["formelements"]["radio"]=array("name"=>"radio","id"=>"radio","data"=>$selectboxdata,"value"=>$test_uiObj->setDefaultValue("radio",$defaultdata));
$content_details_array["formelements"]["photo"]=array(
                    "photoimage" => array("src"=>($test_uiObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$test_uiObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"photo_image","id"=>"photo_image","alt"=>"photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"test_ui","column"=>"photo"),
                    "photoimage_hidden"=>array("name"=>"photo","type"=>"hidden","value"=>$test_uiObj->setDefaultValue("photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["read_only"]=array("displayName"=>"Read Only","type"=>"text","name"=>"read_only","id"=>"read_only","class","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("read_only",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"","readonly"=>"readonly");
$selectboxdata=array("1"=>"one","2"=>"two");$content_details_array["formelements"]["select_array"]=array("displayName"=>"Select Array","type"=>"text","name"=>"select_array","id"=>"select_array","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$test_uiObj->setDefaultValue("select_array",$defaultdata),"addonfly"=>"");
                }

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["text"]=array("name"=>"text","id"=>"text","value"=>$test_uiObj->setDefaultValue("text",$defaultdata,''),"readonly"=>"readonly");
$selectboxdata=$test_uiObj->getSelectData('test_ui_child','id,data','','id');$content_details_array["formelements"]["select_foregin"] = array("type" => "text", "name" => "select_foregin", "id" => "select_foregin","value" => $test_uiObj->setDefaultValue("select_foregin", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["number"]=array("displayName"=>"Number","type"=>"text","name"=>"number","id"=>"number","class"=>"textalignleft","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date"]=array("displayName"=>"Date","type"=>"date","name"=>"date","id"=>"date","class"=>"textalignleft","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["check_box"]=array("displayName"=>"Check Box","type"=>"checkbox","name"=>"check_box","id"=>"check_box","class"=>"textalignleft","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("check_box",$defaultdata,$dummy),"readonly"=>"readonly");

$content_details_array["formelements"]["photo"]=array("src"=>($test_uiObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$test_uiObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["read_only"]=array("displayName"=>"Read Only","type"=>"readonly","name"=>"read_only","id"=>"read_only","class"=>"textalignleft","style","error","required"=>"required","value"=>$test_uiObj->setDefaultValue("read_only",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("1"=>"one","2"=>"two");$content_details_array["formelements"]["select_array"] = array("type" => "text", "name" => "select_array", "id" => "select_array","value" => $test_uiObj->setDefaultValue("select_array", $defaultdata,"",$selectboxdata));
                }

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$test_uiObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$test_uiObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Text","Select Foregin","Number","Date","Check Box","Radio","Photo","Read Only","Select Array","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>