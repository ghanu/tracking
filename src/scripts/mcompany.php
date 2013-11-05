<?php include_once AppRoot . AppController . "cMcompanyController.php";

$mcompanyObj = new cmcompanyController();

$action = $get["action"]?$get["action"]:"viewall";
    $mcompanyObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$mcompanyObj->action = $action;
    $content_details_array["page"] = $mcompanyObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("mcompany");
    }else{
    $data=$mcompanyObj->getSelectData($get["file"], $get["columns"], "id=".$mcompanyObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $mcompanyObj->action = "view";
        
        $defaultdata = $mcompanyObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("School");

$content_details_array["page"][title]=ucwords("School Details");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["company_name"]=array("displayName"=>"Company Name","type"=>"text","name"=>"company_name","id"=>"company_name","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("company_name",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["company_code"]=array("displayName"=>"Company Code","type"=>"text","name"=>"company_code","id"=>"company_code","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("company_code",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["branch_name"]=array("displayName"=>"Branch Name","type"=>"text","name"=>"branch_name","id"=>"branch_name","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("branch_name",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["parent_company"]=array("displayName"=>"Parent Company","type"=>"number","name"=>"parent_company","id"=>"parent_company","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("parent_company",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["factory_address_id"]=array("displayName"=>"Factory Address Id","type"=>"number","name"=>"factory_address_id","id"=>"factory_address_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("factory_address_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["office_address_id"]=array("displayName"=>"Office Address Id","type"=>"number","name"=>"office_address_id","id"=>"office_address_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("office_address_id",$defaultdata),"pattern"=>"",);

$content_details_array["formelements"]["company_currency"]=array("displayName"=>"Company Currency","type"=>"text","name"=>"company_currency","id"=>"company_currency","class","style","error","required"=>"","data"=>$dummy,"value"=>$mcompanyObj->setDefaultValue("company_currency",$defaultdata),"addonfly"=>array("","") );
$content_details_array["formelements"]["website"]=array("displayName"=>"Website","type"=>"text","name"=>"website","id"=>"website","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("website",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["tax_id"]=array("displayName"=>"Tax Id","type"=>"number","name"=>"tax_id","id"=>"tax_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("tax_id",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["phone1"]=array("displayName"=>"Phone1","type"=>"text","name"=>"phone1","id"=>"phone1","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone1",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["phone2"]=array("displayName"=>"Phone2","type"=>"text","name"=>"phone2","id"=>"phone2","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone2",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["phone3"]=array("displayName"=>"Phone3","type"=>"text","name"=>"phone3","id"=>"phone3","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone3",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["phone4"]=array("displayName"=>"Phone4","type"=>"text","name"=>"phone4","id"=>"phone4","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone4",$defaultdata),"pattern"=>"",);
$content_details_array["formelements"]["phone5"]=array("displayName"=>"Phone5","type"=>"text","name"=>"phone5","id"=>"phone5","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone5",$defaultdata),"pattern"=>"",);}

if($action=="view"){$content_details_array["formelements"]["company_name"]=array("displayName"=>"Company Name","type"=>"text","name"=>"company_name","id"=>"company_name","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("company_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["company_code"]=array("displayName"=>"Company Code","type"=>"text","name"=>"company_code","id"=>"company_code","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("company_code",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_name"]=array("displayName"=>"Branch Name","type"=>"text","name"=>"branch_name","id"=>"branch_name","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("branch_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["parent_company"]=array("displayName"=>"Parent Company","type"=>"text","name"=>"parent_company","id"=>"parent_company","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("parent_company",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["factory_address_id"]=array("displayName"=>"Factory Address Id","type"=>"text","name"=>"factory_address_id","id"=>"factory_address_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("factory_address_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["office_address_id"]=array("displayName"=>"Office Address Id","type"=>"text","name"=>"office_address_id","id"=>"office_address_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("office_address_id",$defaultdata,''),"readonly"=>"readonly");

$content_details_array["formelements"]["company_currency"]=array("displayName"=>"Company Currency","type"=>"text","name"=>"company_currency","id"=>"company_currency","class","style","error","required"=>"",data=>$dummy,value=>$mcompanyObj->setDefaultValue("company_currency",$defaultdata),"readonly"=>"readonly");
$content_details_array["formelements"]["website"]=array("displayName"=>"Website","type"=>"text","name"=>"website","id"=>"website","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("website",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["tax_id"]=array("displayName"=>"Tax Id","type"=>"text","name"=>"tax_id","id"=>"tax_id","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("tax_id",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["phone1"]=array("displayName"=>"Phone1","type"=>"text","name"=>"phone1","id"=>"phone1","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone1",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["phone2"]=array("displayName"=>"Phone2","type"=>"text","name"=>"phone2","id"=>"phone2","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone2",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["phone3"]=array("displayName"=>"Phone3","type"=>"text","name"=>"phone3","id"=>"phone3","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone3",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["phone4"]=array("displayName"=>"Phone4","type"=>"text","name"=>"phone4","id"=>"phone4","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone4",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["phone5"]=array("displayName"=>"Phone5","type"=>"text","name"=>"phone5","id"=>"phone5","class","style","error","required"=>"","value"=>$mcompanyObj->setDefaultValue("phone5",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$mcompanyObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$mcompanyObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>