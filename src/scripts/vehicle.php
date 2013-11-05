<?php include_once AppRoot . AppController . "cVehicleController.php";

$vehicleObj = new cvehicleController();

$action = $get["action"]?$get["action"]:"viewall";
    $vehicleObj->id = $id = $get["id"]; 

if($post){
    
$vehicleObj->action = $post["formaction"];
    $content_details_array["page"] = $vehicleObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("vehicle&id=".$vehicleObj->id."&action=view");
    }else{
    $data=$vehicleObj->getSelectData($get["file"], $get["columns"], "id=".$vehicleObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $vehicleObj->action = "view";
        
        $defaultdata = $vehicleObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Vehicle");

$content_details_array["page"]["title"]=ucwords("Vehicle");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["registration_no"]=array("displayName"=>"Registration No","type"=>"text","name"=>"registration_no","id"=>"registration_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("registration_no",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["owners_name"]=array("displayName"=>"Owners Name","type"=>"text","name"=>"owners_name","id"=>"owners_name","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("owners_name",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["s_w_d_o"]=array("displayName"=>"S W D O","type"=>"text","name"=>"s_w_d_o","id"=>"s_w_d_o","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("s_w_d_o",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["permanent_address"]=array("displayName"=>"Permanent Address","type"=>"text","name"=>"permanent_address","id"=>"permanent_address","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permanent_address",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["dealer"]=array("displayName"=>"Dealer","type"=>"text","name"=>"dealer","id"=>"dealer","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("dealer",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["registered_date"]=array("displayName"=>"Registered Date","type"=>"date","name"=>"registered_date","id"=>"registered_date","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("registered_date",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["life_time_tax_paid"]=array("displayName"=>"Life Time Tax Paid","type"=>"text","name"=>"life_time_tax_paid","id"=>"life_time_tax_paid","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("life_time_tax_paid",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["challan_no"]=array("displayName"=>"Challan No","type"=>"number","name"=>"challan_no","id"=>"challan_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("challan_no",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["valid_from"]=array("displayName"=>"Valid From","type"=>"date","name"=>"valid_from","id"=>"valid_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("valid_from",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["valid_upto"]=array("displayName"=>"Valid Upto","type"=>"date","name"=>"valid_upto","id"=>"valid_upto","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("valid_upto",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["class_of_vehicle"]=array("displayName"=>"Class Of Vehicle","type"=>"text","name"=>"class_of_vehicle","id"=>"class_of_vehicle","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("class_of_vehicle",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["makers_name"]=array("displayName"=>"Makers Name","type"=>"text","name"=>"makers_name","id"=>"makers_name","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("makers_name",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["month_year"]=array("displayName"=>"Month Year","type"=>"text","name"=>"month_year","id"=>"month_year","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("month_year",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["chassis_no"]=array("displayName"=>"Chassis No","type"=>"text","name"=>"chassis_no","id"=>"chassis_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("chassis_no",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["engine_number"]=array("displayName"=>"Engine Number","type"=>"text","name"=>"engine_number","id"=>"engine_number","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("engine_number",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["fuel_used"]=array("displayName"=>"Fuel Used","type"=>"text","name"=>"fuel_used","id"=>"fuel_used","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("fuel_used",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["makers_class"]=array("displayName"=>"Makers Class","type"=>"text","name"=>"makers_class","id"=>"makers_class","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("makers_class",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["seating_capacity"]=array("displayName"=>"Seating Capacity","type"=>"text","name"=>"seating_capacity","id"=>"seating_capacity","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("seating_capacity",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["colour"]=array("displayName"=>"Colour","type"=>"text","name"=>"colour","id"=>"colour","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("colour",$defaultdata,$dummy),"pattern"=>"");
$selectboxdata=array("yes"=>"yes", "no"=>"no");$content_details_array["formelements"]["hypothecation"]=array("displayName"=>"Hypothecation","type"=>"text","name"=>"hypothecation","id"=>"hypothecation","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$vehicleObj->setDefaultValue("hypothecation",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["finance_company"]=array("displayName"=>"Finance Company","type"=>"text","name"=>"finance_company","id"=>"finance_company","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("finance_company",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["address"]=array("displayName"=>"Address","type"=>"text","name"=>"address","id"=>"address","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("address",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["contract_no"]=array("displayName"=>"Contract No","type"=>"text","name"=>"contract_no","id"=>"contract_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("contract_no",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["customer_code"]=array("displayName"=>"Customer Code","type"=>"number","name"=>"customer_code","id"=>"customer_code","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("customer_code",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["original_loan_amount"]=array("displayName"=>"Original Loan Amount","type"=>"number","name"=>"original_loan_amount","id"=>"original_loan_amount","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_loan_amount",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["original_interest_amount"]=array("displayName"=>"Original Interest Amount","type"=>"number","name"=>"original_interest_amount","id"=>"original_interest_amount","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_interest_amount",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["original_amount_payable"]=array("displayName"=>"Original Amount Payable","type"=>"number","name"=>"original_amount_payable","id"=>"original_amount_payable","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_amount_payable",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["original_tenure"]=array("displayName"=>"Original Tenure","type"=>"number","name"=>"original_tenure","id"=>"original_tenure","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_tenure",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["monthly_instalment"]=array("displayName"=>"Monthly Instalment","type"=>"number","name"=>"monthly_instalment","id"=>"monthly_instalment","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("monthly_instalment",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["agreement_date"]=array("displayName"=>"Agreement Date","type"=>"date","name"=>"agreement_date","id"=>"agreement_date","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("agreement_date",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["first_instalment_due_on"]=array("displayName"=>"First Instalment Due On","type"=>"date","name"=>"first_instalment_due_on","id"=>"first_instalment_due_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("first_instalment_due_on",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["last_instalment_due_on"]=array("displayName"=>"Last Instalment Due On","type"=>"date","name"=>"last_instalment_due_on","id"=>"last_instalment_due_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("last_instalment_due_on",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["fc_expires_on"]=array("displayName"=>"Fc Expires On","type"=>"date","name"=>"fc_expires_on","id"=>"fc_expires_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("fc_expires_on",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["insurance_company"]=array("displayName"=>"Insurance Company","type"=>"text","name"=>"insurance_company","id"=>"insurance_company","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("insurance_company",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["iaddress"]=array("displayName"=>"Iaddress","type"=>"text","name"=>"iaddress","id"=>"iaddress","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("iaddress",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["policy_no"]=array("displayName"=>"Policy No","type"=>"text","name"=>"policy_no","id"=>"policy_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("policy_no",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["date_of_issuance"]=array("displayName"=>"Date Of Issuance","type"=>"date","name"=>"date_of_issuance","id"=>"date_of_issuance","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("date_of_issuance",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["ivalid_from"]=array("displayName"=>"Ivalid From","type"=>"date","name"=>"ivalid_from","id"=>"ivalid_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("ivalid_from",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["ivalid_upto"]=array("displayName"=>"Ivalid Upto","type"=>"date","name"=>"ivalid_upto","id"=>"ivalid_upto","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("ivalid_upto",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["permit_from"]=array("displayName"=>"Permit From","type"=>"date","name"=>"permit_from","id"=>"permit_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permit_from",$defaultdata,$dummy),"pattern"=>"");

$content_details_array["formelements"]["permit_to"]=array("displayName"=>"Permit To","type"=>"date","name"=>"permit_to","id"=>"permit_to","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permit_to",$defaultdata,$dummy),"pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["registration_no"]=array("displayName"=>"Registration No","type"=>"text","name"=>"registration_no","id"=>"registration_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("registration_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["owners_name"]=array("displayName"=>"Owners Name","type"=>"text","name"=>"owners_name","id"=>"owners_name","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("owners_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["s_w_d_o"]=array("displayName"=>"S W D O","type"=>"text","name"=>"s_w_d_o","id"=>"s_w_d_o","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("s_w_d_o",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["permanent_address"]=array("displayName"=>"Permanent Address","type"=>"text","name"=>"permanent_address","id"=>"permanent_address","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permanent_address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dealer"]=array("displayName"=>"Dealer","type"=>"text","name"=>"dealer","id"=>"dealer","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("dealer",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["registered_date"]=array("displayName"=>"Registered Date","type"=>"text","name"=>"registered_date","id"=>"registered_date","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("registered_date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["life_time_tax_paid"]=array("displayName"=>"Life Time Tax Paid","type"=>"text","name"=>"life_time_tax_paid","id"=>"life_time_tax_paid","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("life_time_tax_paid",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["challan_no"]=array("displayName"=>"Challan No","type"=>"text","name"=>"challan_no","id"=>"challan_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("challan_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["valid_from"]=array("displayName"=>"Valid From","type"=>"text","name"=>"valid_from","id"=>"valid_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("valid_from",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["valid_upto"]=array("displayName"=>"Valid Upto","type"=>"text","name"=>"valid_upto","id"=>"valid_upto","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("valid_upto",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["class_of_vehicle"]=array("displayName"=>"Class Of Vehicle","type"=>"text","name"=>"class_of_vehicle","id"=>"class_of_vehicle","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("class_of_vehicle",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["makers_name"]=array("displayName"=>"Makers Name","type"=>"text","name"=>"makers_name","id"=>"makers_name","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("makers_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["month_year"]=array("displayName"=>"Month Year","type"=>"text","name"=>"month_year","id"=>"month_year","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("month_year",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["chassis_no"]=array("displayName"=>"Chassis No","type"=>"text","name"=>"chassis_no","id"=>"chassis_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("chassis_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["engine_number"]=array("displayName"=>"Engine Number","type"=>"text","name"=>"engine_number","id"=>"engine_number","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("engine_number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["fuel_used"]=array("displayName"=>"Fuel Used","type"=>"text","name"=>"fuel_used","id"=>"fuel_used","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("fuel_used",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["makers_class"]=array("displayName"=>"Makers Class","type"=>"text","name"=>"makers_class","id"=>"makers_class","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("makers_class",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["seating_capacity"]=array("displayName"=>"Seating Capacity","type"=>"text","name"=>"seating_capacity","id"=>"seating_capacity","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("seating_capacity",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["colour"]=array("displayName"=>"Colour","type"=>"text","name"=>"colour","id"=>"colour","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("colour",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["hypothecation"] = array("displayName" => "Hypothecation", "type" => "text", "name" => "hypothecation", "id" => "hypothecation", "class", "style", "error", "required" => "", data => $selectboxdata, value => $vehicleObj->setDefaultValue("hypothecation", $defaultdata), "readonly" => "readonly");
                
$content_details_array["formelements"]["finance_company"]=array("displayName"=>"Finance Company","type"=>"text","name"=>"finance_company","id"=>"finance_company","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("finance_company",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["address"]=array("displayName"=>"Address","type"=>"text","name"=>"address","id"=>"address","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["contract_no"]=array("displayName"=>"Contract No","type"=>"text","name"=>"contract_no","id"=>"contract_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("contract_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["customer_code"]=array("displayName"=>"Customer Code","type"=>"text","name"=>"customer_code","id"=>"customer_code","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("customer_code",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["original_loan_amount"]=array("displayName"=>"Original Loan Amount","type"=>"text","name"=>"original_loan_amount","id"=>"original_loan_amount","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_loan_amount",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["original_interest_amount"]=array("displayName"=>"Original Interest Amount","type"=>"text","name"=>"original_interest_amount","id"=>"original_interest_amount","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_interest_amount",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["original_amount_payable"]=array("displayName"=>"Original Amount Payable","type"=>"text","name"=>"original_amount_payable","id"=>"original_amount_payable","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_amount_payable",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["original_tenure"]=array("displayName"=>"Original Tenure","type"=>"text","name"=>"original_tenure","id"=>"original_tenure","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("original_tenure",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["monthly_instalment"]=array("displayName"=>"Monthly Instalment","type"=>"text","name"=>"monthly_instalment","id"=>"monthly_instalment","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("monthly_instalment",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["agreement_date"]=array("displayName"=>"Agreement Date","type"=>"text","name"=>"agreement_date","id"=>"agreement_date","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("agreement_date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["first_instalment_due_on"]=array("displayName"=>"First Instalment Due On","type"=>"text","name"=>"first_instalment_due_on","id"=>"first_instalment_due_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("first_instalment_due_on",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["last_instalment_due_on"]=array("displayName"=>"Last Instalment Due On","type"=>"text","name"=>"last_instalment_due_on","id"=>"last_instalment_due_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("last_instalment_due_on",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["fc_expires_on"]=array("displayName"=>"Fc Expires On","type"=>"text","name"=>"fc_expires_on","id"=>"fc_expires_on","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("fc_expires_on",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["insurance_company"]=array("displayName"=>"Insurance Company","type"=>"text","name"=>"insurance_company","id"=>"insurance_company","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("insurance_company",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["iaddress"]=array("displayName"=>"Iaddress","type"=>"text","name"=>"iaddress","id"=>"iaddress","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("iaddress",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["policy_no"]=array("displayName"=>"Policy No","type"=>"text","name"=>"policy_no","id"=>"policy_no","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("policy_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_issuance"]=array("displayName"=>"Date Of Issuance","type"=>"text","name"=>"date_of_issuance","id"=>"date_of_issuance","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("date_of_issuance",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["ivalid_from"]=array("displayName"=>"Ivalid From","type"=>"text","name"=>"ivalid_from","id"=>"ivalid_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("ivalid_from",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["ivalid_upto"]=array("displayName"=>"Ivalid Upto","type"=>"text","name"=>"ivalid_upto","id"=>"ivalid_upto","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("ivalid_upto",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["permit_from"]=array("displayName"=>"Permit From","type"=>"text","name"=>"permit_from","id"=>"permit_from","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permit_from",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["permit_to"]=array("displayName"=>"Permit To","type"=>"text","name"=>"permit_to","id"=>"permit_to","class","style","error","required"=>"","value"=>$vehicleObj->setDefaultValue("permit_to",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$vehicleObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$vehicleObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~Registration No~~~Owners Name~~~Makers Name~~~Makers Class~~~Finance Company~~~Fc Expires On~~~Insurance Company~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>