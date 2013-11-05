<?php include_once AppRoot . AppController . "c__report_columnsController.php";

$__report_columnsObj = new c__report_columnsController();

$action = $get["action"]?$get["action"]:"viewall";
    $__report_columnsObj->id = $id = $get["id"]; 

if($post){
    
$__report_columnsObj->action = $post["formaction"];
    $content_details_array["page"] = $__report_columnsObj->curd();
    $__report_columnsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__report_columns&id=".$__report_columnsObj->id."&action=view");
    }else{
    $data=$__report_columnsObj->getSelectData($get["file"], $get["columns"], "id=".$__report_columnsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__report_columnsObj->action = "view";
        
        $defaultdata = $__report_columnsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$__report_columnsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Report Columns");

$content_details_array["page"]["title"]=ucwords("Report Columns");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["customization_id"]=array("displayName"=>"Customization Id","type"=>"number","name"=>"customization_id","id"=>"customization_id","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("customization_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["column_name"]=array("displayName"=>"Column Name","type"=>"text","name"=>"column_name","id"=>"column_name","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("column_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["display_name"]=array("displayName"=>"Display Name","type"=>"text","name"=>"display_name","id"=>"display_name","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("display_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["alignment"]=array("displayName"=>"Alignment","type"=>"text","name"=>"alignment","id"=>"alignment","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("alignment",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["format_as"]=array("displayName"=>"Format As","type"=>"text","name"=>"format_as","id"=>"format_as","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("format_as",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["is_visible"]=array("displayName"=>"Is Visible","type"=>"text","name"=>"is_visible","id"=>"is_visible","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("is_visible",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["display_order"]=array("displayName"=>"Display Order","type"=>"number","name"=>"display_order","id"=>"display_order","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("display_order",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["customization_id"]=array("displayName"=>"Customization Id","type"=>"text","name"=>"customization_id","id"=>"customization_id","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("customization_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["column_name"]=array("displayName"=>"Column Name","type"=>"text","name"=>"column_name","id"=>"column_name","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("column_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["display_name"]=array("displayName"=>"Display Name","type"=>"text","name"=>"display_name","id"=>"display_name","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("display_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["alignment"]=array("displayName"=>"Alignment","type"=>"text","name"=>"alignment","id"=>"alignment","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("alignment",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["format_as"]=array("displayName"=>"Format As","type"=>"text","name"=>"format_as","id"=>"format_as","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("format_as",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["is_visible"]=array("displayName"=>"Is Visible","type"=>"text","name"=>"is_visible","id"=>"is_visible","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("is_visible",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["display_order"]=array("displayName"=>"Display Order","type"=>"text","name"=>"display_order","id"=>"display_order","class","style","error","required"=>"","value"=>$__report_columnsObj->setDefaultValue("display_order",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__report_columnsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__report_columnsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Customization Id","Column Name","Display Name","Alignment","Format As","Is Visible","Display Order","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>