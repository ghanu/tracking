<?php include_once AppRoot . AppController . "cStudent_fees_detailsController.php";

$student_fees_detailsObj = new cstudent_fees_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $student_fees_detailsObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$student_fees_detailsObj->action = $action;
    $content_details_array["page"] = $student_fees_detailsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("student_fees_details");
    }else{
    $data=$student_fees_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$student_fees_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $student_fees_detailsObj->action = "view";
        
        $defaultdata = $student_fees_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("Students fee details");

$content_details_array["page"][title]=ucwords("Students fee details");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["student_id"]=array("displayName"=>"Student Id","type"=>"number","name"=>"student_id","id"=>"student_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("student_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["fees_id"]=array("displayName"=>"Fees Id","type"=>"number","name"=>"fees_id","id"=>"fees_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("fees_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["paid_date"]=array("displayName"=>"Paid Date","type"=>"date","name"=>"paid_date","id"=>"paid_date","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("paid_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["paid_amount"]=array("displayName"=>"Paid Amount","type"=>"text","name"=>"paid_amount","id"=>"paid_amount","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("paid_amount",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["balance_amount"]=array("displayName"=>"Balance Amount","type"=>"text","name"=>"balance_amount","id"=>"balance_amount","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("balance_amount",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["due_date"]=array("displayName"=>"Due Date","type"=>"date","name"=>"due_date","id"=>"due_date","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("due_date",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["receipt_no"]=array("displayName"=>"Receipt No","type"=>"text","name"=>"receipt_no","id"=>"receipt_no","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("receipt_no",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["payment_mode_id"]=array("displayName"=>"Payment Mode Id","type"=>"number","name"=>"payment_mode_id","id"=>"payment_mode_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("payment_mode_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"number","name"=>"cheque_no","id"=>"cheque_no","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("cheque_no",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["received_user_id"]=array("displayName"=>"Received User Id","type"=>"number","name"=>"received_user_id","id"=>"received_user_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("received_user_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("status",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["student_id"]=array("displayName"=>"Student Id","type"=>"text","name"=>"student_id","id"=>"student_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("student_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["fees_id"]=array("displayName"=>"Fees Id","type"=>"text","name"=>"fees_id","id"=>"fees_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("fees_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["paid_date"]=array("displayName"=>"Paid Date","type"=>"text","name"=>"paid_date","id"=>"paid_date","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("paid_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["paid_amount"]=array("displayName"=>"Paid Amount","type"=>"text","name"=>"paid_amount","id"=>"paid_amount","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("paid_amount",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["balance_amount"]=array("displayName"=>"Balance Amount","type"=>"text","name"=>"balance_amount","id"=>"balance_amount","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("balance_amount",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["due_date"]=array("displayName"=>"Due Date","type"=>"text","name"=>"due_date","id"=>"due_date","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("due_date",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["receipt_no"]=array("displayName"=>"Receipt No","type"=>"text","name"=>"receipt_no","id"=>"receipt_no","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("receipt_no",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["payment_mode_id"]=array("displayName"=>"Payment Mode Id","type"=>"text","name"=>"payment_mode_id","id"=>"payment_mode_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("payment_mode_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"text","name"=>"cheque_no","id"=>"cheque_no","class","style","error","required"=>"","value"=>$student_fees_detailsObj->setDefaultValue("cheque_no",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["received_user_id"]=array("displayName"=>"Received User Id","type"=>"text","name"=>"received_user_id","id"=>"received_user_id","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("received_user_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"required","value"=>$student_fees_detailsObj->setDefaultValue("status",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$student_fees_detailsObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$student_fees_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>