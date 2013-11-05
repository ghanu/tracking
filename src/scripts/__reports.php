<?php include_once AppRoot . AppController . "c__reportsController.php";

$__reportsObj = new c__reportsController();

$action = $get["action"]?$get["action"]:"viewall";
    $__reportsObj->id = $id = $get["id"]; 

if($post){
    
$__reportsObj->action = $post["formaction"];
    $content_details_array["page"] = $__reportsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("__reportsid=".$__reportsObj->id."&action=view");
    }else{
    $data=$__reportsObj->getSelectData($get["file"], $get["columns"], "id=".$__reportsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $__reportsObj->action = "view";
        
        $defaultdata = $__reportsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"][heading]=ucwords("rstate");

$content_details_array["page"][title]=ucwords("rstate");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["report_name"]=array("displayName"=>"Report Name","type"=>"text","name"=>"report_name","id"=>"report_name","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("report_name",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["report_file"]=array("displayName"=>"Report File","type"=>"text","name"=>"report_file","id"=>"report_file","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("report_file",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["add_date"]=array("displayName"=>"Add Date","type"=>"text","name"=>"add_date","id"=>"add_date","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("add_date",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view")
{$content_details_array["formelements"]["report_name"]=array("displayName"=>"Report Name","type"=>"text","name"=>"report_name","id"=>"report_name","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("report_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["report_file"]=array("displayName"=>"Report File","type"=>"text","name"=>"report_file","id"=>"report_file","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("report_file",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["add_date"]=array("displayName"=>"Add Date","type"=>"text","name"=>"add_date","id"=>"add_date","class","style","error","required"=>"","value"=>$__reportsObj->setDefaultValue("add_date",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__reportsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__reportsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Report Name~~~Report File~~~Add Date~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>