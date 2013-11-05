<?php include_once AppRoot . AppController . "cPre_admissionController.php";

$pre_admissionObj = new cpre_admissionController();

$action = $get["action"]?$get["action"]:"viewall";
    $pre_admissionObj->id = $id = $get["id"]; 

if($post){
    
$pre_admissionObj->action = $post["formaction"];
    $content_details_array["page"] = $pre_admissionObj->curd();
    $pre_admissionObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("pre_admission&id=".$pre_admissionObj->id."&action=view");
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
$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("application_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["how_did_you_heard_about_us"]=array("displayName"=>"How Did You Heard About Us","type"=>"text","name"=>"how_did_you_heard_about_us","id"=>"how_did_you_heard_about_us","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("how_did_you_heard_about_us",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["child_name"]=array("displayName"=>"Child Name","type"=>"text","name"=>"child_name","id"=>"child_name","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("child_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["child_date_of_birth"]=array("displayName"=>"Child Date Of Birth","type"=>"date","name"=>"child_date_of_birth","id"=>"child_date_of_birth","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("child_date_of_birth",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=$pre_admissionObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class_to_be_admitted"]=array("displayName"=>"Class To Be Admitted","type"=>"text","name"=>"class_to_be_admitted","id"=>"class_to_be_admitted","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("class_to_be_admitted",$defaultdata),"addonfly"=>array("mclass","class") );
                

$content_details_array["formelements"]["parent_name"]=array("displayName"=>"Parent Name","type"=>"text","name"=>"parent_name","id"=>"parent_name","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("parent_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("email",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("mobile",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_of_issue"]=array("displayName"=>"Date Of Issue","type"=>"date","name"=>"date_of_issue","id"=>"date_of_issue","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_issue",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_of_returning"]=array("displayName"=>"Date Of Returning","type"=>"date","name"=>"date_of_returning","id"=>"date_of_returning","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_returning",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["amount_paid"]=array("displayName"=>"Amount Paid","type"=>"text","name"=>"amount_paid","id"=>"amount_paid","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("amount_paid",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Cheque"=>"Cheque", "Cash"=>"Cash");$content_details_array["formelements"]["payment_mode"]=array("displayName"=>"Payment Mode","type"=>"text","name"=>"payment_mode","id"=>"payment_mode","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("payment_mode",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"text","name"=>"cheque_no","id"=>"cheque_no","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("cheque_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["bank_name"]=array("displayName"=>"Bank Name","type"=>"text","name"=>"bank_name","id"=>"bank_name","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("bank_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$seqval=$pre_admissionObj->getNextVal("bill_no");
$content_details_array["formelements"]["bill_no"]=array("displayName"=>"Bill No","type"=>"text","name"=>"bill_no","id"=>"bill_no","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("bill_no",$defaultdata,$seqval),"max"=>"","min"=>"","pattern"=>"","readonly"=>"readonly");

$content_details_array["formelements"]["date_of_pre_screening"]=array("displayName"=>"Date Of Pre Screening","type"=>"date","name"=>"date_of_pre_screening","id"=>"date_of_pre_screening","class","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_pre_screening",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$selectboxdata=array("08:00 am"=>"08:00 am","08:20 am"=>"08:20 am","08:40 am"=>"08:40 am","09:00 am"=>"09:00 am","09:20 am"=>"09:20 am","09:40 am"=>"09:40 am","10:00 am"=>"10:00 am","10:20 am"=>"10:20 am","10:40 am"=>"10:40 am","11:00 am"=>"11:00 am","11:20 am"=>"11:20 am","11:40 am"=>"11:40 am","12:00 am"=>"12:00 am","12:20 am"=>"12:20 pm","12:40 pm"=>"12:40 pm","01:00 pm"=>"01:00 pm","01:20 pm"=>"01:20 pm","01:40 pm"=>"01:40 pm","02:00 pm"=>"02:00 pm","02:20 pm"=>"02:20 pm","02:40 pm"=>"02:40 pm","03:00 pm"=>"03:00 pm","03:20 pm"=>"03:20 pm","03:40 pm"=>"03:40 pm","04:00 pm"=>"04:00 pm","04:20 pm"=>"04:20 pm","04:40 pm"=>"04:40 pm");$content_details_array["formelements"]["time_of_pre_screening"]=array("displayName"=>"Time Of Pre Screening","type"=>"text","name"=>"time_of_pre_screening","id"=>"time_of_pre_screening","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$pre_admissionObj->setDefaultValue("time_of_pre_screening",$defaultdata),"addonfly"=>"");

$content_details_array["formelements"]["screening_id"]=array("displayName"=>"Screening Id","type"=>"hidden","name"=>"screening_id","id"=>"screening_id","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("screening_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"hidden","name"=>"date_timestamp","id"=>"date_timestamp","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("date_timestamp",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='<div id="nav-menu" class="toolbar">
<ul>
<li><a href="'.AppURL.'index.php?file=pre_admission&action=edit&id='.$id.'" ><img src="'.AppImgURL.'edit.png"> Edit</a> </li>
<li><a href="'.AppURL.'index.php?file=pre_admission&action=delete&id='.$id.'" ><img src="'.AppImgURL.'delete.png"> Delete</a> </li>     
<li><a href="'.AppURL.'index.php?file=report&id=2&ppid='.$id.'" ><img src="'.AppImgURL.'inv1.png"> Generate Bill</a>    </li>
<li><a href="'.AppURL.'index.php?file=report&id=2&ppid='.$id.'&dataType=no&format=pdf" ><img src="'.AppImgURL.'pdf.png">PDF</a></li>
</ul>
</div>';$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("application_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["how_did_you_heard_about_us"]=array("displayName"=>"How Did You Heard About Us","type"=>"text","name"=>"how_did_you_heard_about_us","id"=>"how_did_you_heard_about_us","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("how_did_you_heard_about_us",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["child_name"]=array("displayName"=>"Child Name","type"=>"text","name"=>"child_name","id"=>"child_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("child_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["child_date_of_birth"]=array("displayName"=>"Child Date Of Birth","type"=>"date","name"=>"child_date_of_birth","id"=>"child_date_of_birth","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("child_date_of_birth",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$pre_admissionObj->getSelectData('mclass','id,class','','');$content_details_array["formelements"]["class_to_be_admitted"] = array("type" => "text", "name" => "class_to_be_admitted", "id" => "class_to_be_admitted","value" => $pre_admissionObj->setDefaultValue("class_to_be_admitted", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["parent_name"]=array("displayName"=>"Parent Name","type"=>"text","name"=>"parent_name","id"=>"parent_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("parent_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("email",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("mobile",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_issue"]=array("displayName"=>"Date Of Issue","type"=>"date","name"=>"date_of_issue","id"=>"date_of_issue","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_issue",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_returning"]=array("displayName"=>"Date Of Returning","type"=>"date","name"=>"date_of_returning","id"=>"date_of_returning","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_returning",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["amount_paid"]=array("displayName"=>"Amount Paid","type"=>"text","name"=>"amount_paid","id"=>"amount_paid","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("amount_paid",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Cheque"=>"Cheque", "Cash"=>"Cash");$content_details_array["formelements"]["payment_mode"] = array("type" => "text", "name" => "payment_mode", "id" => "payment_mode","value" => $pre_admissionObj->setDefaultValue("payment_mode", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["cheque_no"]=array("displayName"=>"Cheque No","type"=>"text","name"=>"cheque_no","id"=>"cheque_no","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("cheque_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["bank_name"]=array("displayName"=>"Bank Name","type"=>"text","name"=>"bank_name","id"=>"bank_name","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("bank_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["bill_no"]=array("displayName"=>"Bill No","type"=>"readonly","name"=>"bill_no","id"=>"bill_no","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("bill_no",$defaultdata,$seqval),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_pre_screening"]=array("displayName"=>"Date Of Pre Screening","type"=>"date","name"=>"date_of_pre_screening","id"=>"date_of_pre_screening","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("date_of_pre_screening",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["time_of_pre_screening"]=array("displayName"=>"Time Of Pre Screening","type"=>"text","name"=>"time_of_pre_screening","id"=>"time_of_pre_screening","class"=>"textalignleft","style","error","required"=>"required","value"=>$pre_admissionObj->setDefaultValue("time_of_pre_screening",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["screening_id"]=array("displayName"=>"Screening Id","type"=>"hidden","name"=>"screening_id","id"=>"screening_id","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("screening_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_timestamp"]=array("displayName"=>"Date Timestamp","type"=>"hidden","name"=>"date_timestamp","id"=>"date_timestamp","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("date_timestamp",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$pre_admissionObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$pre_admissionObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
     $array [0] = array('application_no' => 23, 'how_did_you_heard_about_us' => 'GE Vetco Gray','child_name' => '31/8/2012',
	 'child_date_of_birth' => 'PX16915','class_to_be_admitted'=> '2','parent_name' => 'A110004-66APA1', 'mail' => 'A','mobile' => 'FGGE01-0033','date_of_issue' => 'CONNECTOR-WELLHEAD PART,HT-H4','date_of_returning' => '4','amount_paid' => 'LOWER2BODY' ,'payment_mode' => '18-3/4','cheque_no' => '2', 'bank_name' => '100002' ,'bill_no' => '0001','date_of_pre_screening' => '30/03/2012');
	 
    $array [1] = array('application_no' => 23, 'how_did_you_heard_about_us' => 'GE Vetco Gray','child_name' => '31/8/2012',
	 'child_date_of_birth' => 'PX16915','class_to_be_admitted'=> '2','parent_name' => 'A110004-66APA1', 'mail' => 'A','mobile' => 'FGGE01-0033','date_of_issue' => 'CONNECTOR-WELLHEAD PART,HT-H4','date_of_returning' => '4','amount_paid' => 'LOWER2BODY' ,'payment_mode' => '18-3/4','cheque_no' => '2', 'bank_name' => '100002' ,'bill_no' => '0001','date_of_pre_screening' => '30/03/2012');
	 
     $csvdata = csvRead();//print_r($csvdata[0]);
//print_r($csvdata);	 
    $content_details_array["viewall"]["data"]=$pre_admissionObj->curd();
	$content_details_array["viewall"]["data"]=$csvdata;
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    //"PO Del Date","Status""Actual  M/C Fin Date","Target M/C Fin Date","NDT	M/C	Vam Top	Cladding","Phosphating","Painting","Shipping","Actual Fin Date","GE Dock Date26th June","GE Revised Dock Date","Remarks"
//"Status","Target ","GE Revised Dock Date","PO Del Date","Status","Actual  M/C Fin Date","Target M/C Fin Date","NDT	M/C	Vam Top	Cladding","Phosphating","Painting","Shipping","Actual Fin Date","GE Dock Date26th June","GE Revised Dock Date","Remarks"
   $content_details_array["viewall"]["columnnames"]=json_decode('["SI No","Customer","PO Date","PO Number","PO Line","Part No","Rev","Nav Material","PO Qty","Delivered Qty","Bal. Qty","Planned Delivery","Status","Actual  M/C Fin Date","Target M/C Fin Date","Actual Fin","Remarks"]');
   
    //$content_details_array["viewall"]["columnnames"]=json_decode('["SI No","Customer","PO Date","PO Number","PO Line","Part No","Rev","Nav Material","PO Qty","Delivered Qty","Bal. Qty","Planned Delivery"]');
	//print_r($content_details_array["viewall"]["columnnames"]);
}
function csvRead() {

		//define('CSV_PATH','/home/developer/Documents/');

		// path where your CSV file is located

		 
$csv_file = AppRoot.AppScriptURL;
		$csv_file .="GE-import-1.csv"; // Name of your CSV file
		//print_r($csv_file);
		if(file_exists($csv_file)) {

		$csvfile = fopen($csv_file, 'r');

		$theData = fgets($csvfile);

		$i = 0;
$csv_array = array();
		while (!feof($csvfile)) {

		$csv_data[] = fgets($csvfile, 1024);

		$csv_array[] = explode(",", $csv_data[$i]);
	
		$i++;
if($i==8){break;}
		}

		fclose($csvfile);
		return $csv_array;
}
else
{
echo "file not found";
}
}




 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>
