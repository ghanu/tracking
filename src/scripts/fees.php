<?php include_once AppRoot . AppController . "cFeesController.php";

$feesObj = new cfeesController();

$action = $get["action"]?$get["action"]:"viewall";
    $feesObj->student_id = $get["student_id"]; 
    $feesObj->id = $id = $get["id"]; 

if($post){
    
$feesObj->action = $post["formaction"];
    $content_details_array["page"] = $feesObj->curd();
    $feesObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("fees&id=".$feesObj->id."&action=view");
    }else{
    $data=$feesObj->getSelectData($get["file"], $get["columns"], "id=".$feesObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $feesObj->action = "view";
        
        $defaultdata = $feesObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}

$feesObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Fees");

$content_details_array["page"]["title"]=ucwords("Fees");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"hidden","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("class_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["student_id"]=array("displayName"=>"Student Id","type"=>"hidden","name"=>"student_id","id"=>"student_id","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("student_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$seqval=$feesObj->getNextVal("bill_no");
$content_details_array["formelements"]["bill_no"]=array("displayName"=>"Bill No","type"=>"number","name"=>"bill_no","id"=>"bill_no","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("bill_no",$defaultdata,$seqval),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Cheque"=>"Cheque", "Cash"=>"Cash");$content_details_array["formelements"]["payment_mode"]=array("displayName"=>"Payment Mode","type"=>"text","name"=>"payment_mode","id"=>"payment_mode","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$feesObj->setDefaultValue("payment_mode",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"text","name"=>"cheque_no","id"=>"cheque_no","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("cheque_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["bank_name"]=array("displayName"=>"Bank Name","type"=>"text","name"=>"bank_name","id"=>"bank_name","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("bank_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["chellan_no"]=array("displayName"=>"Chellan No","type"=>"text","name"=>"chellan_no","id"=>"chellan_no","class","style","error","required"=>"required","value"=>$feesObj->setDefaultValue("chellan_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pay"]=array("displayName"=>"Pay","type"=>"text","name"=>"pay","id"=>"pay","class","style","error","required"=>"required","value"=>$feesObj->setDefaultValue("pay",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='<div id="nav-menu" class="toolbar">
<ul>
<li><a href="'.AppURL.'index.php?file=report&id=7&ppid='.$id.'" ><img src="'.AppImgURL.'inv1.png"> Invoice</a>    </li>
<li><a href="'.AppURL.'index.php?file=report&id=7&ppid='.$id.'&dataType=no&format=pdf" ><img src="'.AppImgURL.'pdf.png">PDF</a></li>
</ul>
</div>';
$content_details_array["formelements"]["class_id"]=array("displayName"=>"Class Id","type"=>"text","name"=>"class_id","id"=>"class_id","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("class_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["student_id"]=array("displayName"=>"Student Id","type"=>"text","name"=>"student_id","id"=>"student_id","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("student_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["bill_no"]=array("displayName"=>"Bill No","type"=>"text","name"=>"bill_no","id"=>"bill_no","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("bill_no",$defaultdata,$seqval),"readonly"=>"readonly");
$selectboxdata=array("Cheque"=>"Cheque", "Cash"=>"Cash");$content_details_array["formelements"]["payment_mode"] = array("displayName" => "Payment Mode", "type" => "text", "name" => "payment_mode", "id" => "payment_mode", "class", "style", "error", "required" => "required", data => $selectboxdata, value => $feesObj->setDefaultValue("payment_mode", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"text","name"=>"cheque_no","id"=>"cheque_no","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("cheque_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["bank_name"]=array("displayName"=>"Bank Name","type"=>"text","name"=>"bank_name","id"=>"bank_name","class","style","error","required"=>"","value"=>$feesObj->setDefaultValue("bank_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["chellan_no"]=array("displayName"=>"Chellan No","type"=>"text","name"=>"chellan_no","id"=>"chellan_no","class","style","error","required"=>"required","value"=>$feesObj->setDefaultValue("chellan_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pay"]=array("displayName"=>"Pay","type"=>"text","name"=>"pay","id"=>"pay","class","style","error","required"=>"required","value"=>$feesObj->setDefaultValue("pay",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$feesObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$feesObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Class Id","Student Id","Bill No","Payment Mode","Cheque No","Bank Name","Chellan No","Pay","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>