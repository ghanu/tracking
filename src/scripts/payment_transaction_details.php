<?php include_once AppRoot . AppController . "cPayment_transaction_detailsController.php";

$payment_transaction_detailsObj = new cpayment_transaction_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $payment_transaction_detailsObj->id = $id = $get["id"]; 

if($post){
    
$payment_transaction_detailsObj->action = $post["formaction"];
    $content_details_array["page"] = $payment_transaction_detailsObj->curd();
    $payment_transaction_detailsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("payment_transaction_details&id=".$payment_transaction_detailsObj->id."&action=view");
    }else{
    $data=$payment_transaction_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$payment_transaction_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $payment_transaction_detailsObj->action = "editview";
         }else{
            $payment_transaction_detailsObj->action = "view";
         }
     
        
        $defaultdata = $payment_transaction_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $payment_transaction_detailsObj->action=$action;
    $content_details_array["page"] = $payment_transaction_detailsObj->curd();
    redirect("payment_transaction_details&action=viewall");
    }
    
}


$payment_transaction_detailsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Transaction");

$content_details_array["page"]["title"]=ucwords("Transaction");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["transaction_table_id"]=array("displayName"=>"Transaction Table Id","type"=>"text","name"=>"transaction_table_id","id"=>"transaction_table_id","class","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_table_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["transaction_no"]=array("displayName"=>"Transaction No","type"=>"text","name"=>"transaction_no","id"=>"transaction_no","class","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["transaction_amount"]=array("displayName"=>"Transaction Amount","type"=>"text","name"=>"transaction_amount","id"=>"transaction_amount","class","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_amount",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["transaction_date"]=array("displayName"=>"Transaction Date","type"=>"text","name"=>"transaction_date","id"=>"transaction_date","class","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["transaction_table_id"]=array("displayName"=>"Transaction Table Id","type"=>"text","name"=>"transaction_table_id","id"=>"transaction_table_id","class"=>"textalignleft","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_table_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["transaction_no"]=array("displayName"=>"Transaction No","type"=>"text","name"=>"transaction_no","id"=>"transaction_no","class"=>"textalignleft","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["transaction_amount"]=array("displayName"=>"Transaction Amount","type"=>"text","name"=>"transaction_amount","id"=>"transaction_amount","class"=>"textalignleft","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_amount",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["transaction_date"]=array("displayName"=>"Transaction Date","type"=>"text","name"=>"transaction_date","id"=>"transaction_date","class"=>"textalignleft","style","error","required"=>"","value"=>$payment_transaction_detailsObj->setDefaultValue("transaction_date",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$payment_transaction_detailsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$payment_transaction_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Transaction No","Transaction Amount","Transaction Date","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>