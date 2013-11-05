<?php include_once AppRoot . AppController . "cApach_orderController.php";

$pre_admissionObj = new cApach_orderController();

$action = $get["action"]?$get["action"]:"viewall";
$pre_admissionObj->id = $id = $get["id"]; 

if($post){
    
$pre_admissionObj->action = $post["formaction"];
    $content_details_array["page"] = $pre_admissionObj->curd();
    $pre_admissionObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("apach_order&id=".$pre_admissionObj->id."&action=view");
    }else{
    $data=$pre_admissionObj->getSelectData($get["file"], $get["columns"], "id=".$pre_admissionObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $pre_admissionObj->action = "editview";
         }else{
            $pre_admissionObj->action = "view";
         }
     
        
        $defaultdata = $pre_admissionObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $pre_admissionObj->action=$action;
    $content_details_array["page"] = $pre_admissionObj->curd();
    redirect("pre_admission&action=viewall");
    }
    
}


$pre_admissionObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Sales Order");

$content_details_array["page"]["title"]=ucwords("Sales Order");



if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["order_no"]=array("displayName"=>"Order No","type"=>"text","name"=>"order_no","id"=>"order_no","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("order_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["customer_name"]=array("displayName"=>"Customer Name","type"=>"text","name"=>"customer_name","id"=>"customer_name","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("customer_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["po_date"]=array("displayName"=>"Po Date","type"=>"text","name"=>"po_date","id"=>"po_date","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("po_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["po_number"]=array("displayName"=>"PO Number","type"=>"text","name"=>"po_number","id"=>"po_number","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("po_number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
//$selectboxdata=$pre_admissionObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class_to_be_admitted"]=array("displayName"=>"Class To Be Admitted","type"=>"text","name"=>"class_to_be_admitted","id"=>"class_to_be_admitted","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("class_to_be_admitted",$defaultdata),"addonfly"=>array("mclass","class") );
                

$content_details_array["formelements"]["po_line"]=array("displayName"=>"Po Line","type"=>"text","name"=>"po_line","id"=>"po_line","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("po_line",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["part_name"]=array("displayName"=>"part name","type"=>"text","name"=>"part_name","id"=>"part_name","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("part_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["navision_material"]=array("displayName"=>"navision material","type"=>"text","name"=>"navision_material","id"=>"navision_material","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("navision_material",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rev"]=array("displayName"=>"","type"=>"text","name"=>"rev","id"=>"rev","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("rev",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
//,,,status,,
$content_details_array["formelements"]["part_description"]=array("displayName"=>"Part Description","type"=>"text","name"=>"part_description","id"=>"part_description","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("part_description",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["po_qty"]=array("displayName"=>"PO qty","type"=>"text","name"=>"po_qty","id"=>"po_qty","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("po_qty",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
//$selectboxdata=array("Cheque"=>"Cheque", "Cash"=>"Cash");$content_details_array["formelements"]["payment_mode"]=array("displayName"=>"Payment Mode","type"=>"text","name"=>"payment_mode","id"=>"payment_mode","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("payment_mode",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["delivery_qty"]=array("displayName"=>"Delivery Qty","type"=>"text","name"=>"delivery_qty","id"=>"delivery_qty","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("delivery_qty",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["balance_qty"]=array("displayName"=>"Balance qty","type"=>"text","name"=>"balance_qty","id"=>"balance_qty","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("balance_qty",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
//$seqval=$pre_admissionObj->getNextVal("bill_no");
$content_details_array["formelements"]["project"]=array("displayName"=>"Project","type"=>"text","name"=>"project","id"=>"project","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("project",$defaultdata,$seqval),"max"=>"","min"=>"","pattern"=>"","readonly"=>"readonly");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"text","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

//$selectboxdata=array("08:00 am"=>"08:00 am","08:20 am"=>"08:20 am","08:40 am"=>"08:40 am","09:00 am"=>"09:00 am","09:20 am"=>"09:20 am","09:40 am"=>"09:40 am","10:00 am"=>"10:00 am","10:20 am"=>"10:20 am","10:40 am"=>"10:40 am","11:00 am"=>"11:00 am","11:20 am"=>"11:20 am","11:40 am"=>"11:40 am","12:00 am"=>"12:00 am","12:20 am"=>"12:20 pm","12:40 pm"=>"12:40 pm","01:00 pm"=>"01:00 pm","01:20 pm"=>"01:20 pm","01:40 pm"=>"01:40 pm","02:00 pm"=>"02:00 pm","02:20 pm"=>"02:20 pm","02:40 pm"=>"02:40 pm","03:00 pm"=>"03:00 pm","03:20 pm"=>"03:20 pm","03:40 pm"=>"03:40 pm","04:00 pm"=>"04:00 pm","04:20 pm"=>"04:20 pm","04:40 pm"=>"04:40 pm");$content_details_array["formelements"]["time_of_pre_screening"]=array("displayName"=>"Time Of Pre Screening","type"=>"text","name"=>"time_of_pre_screening","id"=>"time_of_pre_screening","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("time_of_pre_screening",$defaultdata),"addonfly"=>"");





$content_details_array["formelements"]["dock_date"]=array("displayName"=>"Dock Date","type"=>"text","name"=>"dock_date","id"=>"dock_date","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("dock_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["ge_dock_date"]=array("displayName"=>"GE dock date","type"=>"text","name"=>"ge_dock_date","id"=>"ge_dock_date","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("ge_dock_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}



if($action =="viewall"){
    
	 
  

    $content_details_array["viewall"]["data"]=$pre_admissionObj->curd();//print_r($content_details_array["viewall"]["data"]);
	//$csvdata = csvRead('apach.csv'); print_r($csvdata);
	//$content_details_array["viewall"]["data"]=$csvdata;
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
  
   $content_details_array["viewall"]["columnnames"]=json_decode('["Order No","Customer","PO Date","PO Number","Po Line","Part Name","Nav Material",
   "Rev","Part Description","Po Qty","Deli. Qty","Bal. Qty","Project","Status","Material Dock Date","GE Dock Date","Action"]');
   

}






 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>
