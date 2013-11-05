<?php include_once AppRoot . AppController . "cFees_typeController.php";

$fees_typeObj = new cfees_typeController();

$action = $get["action"]?$get["action"]:"viewall";
    $fees_typeObj->id = $id = $get["id"]; 

if($post){
    
$fees_typeObj->action = $post["formaction"];
    $content_details_array["page"] = $fees_typeObj->curd();
    $fees_typeObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("fees_type&id=".$fees_typeObj->id."&action=view");
    }else{
    $data=$fees_typeObj->getSelectData($get["file"], $get["columns"], "id=".$fees_typeObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $fees_typeObj->action = "editview";
         }else{
            $fees_typeObj->action = "view";
         }
     
        
        $defaultdata = $fees_typeObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $fees_typeObj->action=$action;
    $content_details_array["page"] = $fees_typeObj->curd();
    redirect("fees_type&action=viewall");
    }
    
}


$fees_typeObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("fees types");

$content_details_array["page"]["title"]=ucwords("Fees Types");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["fees_type"]=array("displayName"=>"Fees Type","type"=>"text","name"=>"fees_type","id"=>"fees_type","class","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_type",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["fees_priority"]=array("displayName"=>"Fees Priority","type"=>"number","name"=>"fees_priority","id"=>"fees_priority","class","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_priority",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["fees_period"]=array("displayName"=>"Fees Period","type"=>"text","name"=>"fees_period","id"=>"fees_period","class","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_period",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["add_date"]=array("displayName"=>"Add Date","type"=>"hidden","name"=>"add_date","id"=>"add_date","class","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("add_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["fees_type"]=array("displayName"=>"Fees Type","type"=>"text","name"=>"fees_type","id"=>"fees_type","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_type",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["fees_priority"]=array("displayName"=>"Fees Priority","type"=>"text","name"=>"fees_priority","id"=>"fees_priority","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_priority",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["fees_period"]=array("displayName"=>"Fees Period","type"=>"text","name"=>"fees_period","id"=>"fees_period","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("fees_period",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["add_date"]=array("displayName"=>"Add Date","type"=>"hidden","name"=>"add_date","id"=>"add_date","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("add_date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"required","value"=>$fees_typeObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$fees_typeObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$fees_typeObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Fees Type","Fees Priority","Fees Period","Add Date","Status","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>