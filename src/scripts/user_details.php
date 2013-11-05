<?php include_once AppRoot . AppController . "cUser_detailsController.php";

$user_detailsObj = new cuser_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $user_detailsObj->id = $id = $get["id"]; 

if($post){
        
    if($post["id"]){
        $action="edit";
    }
$user_detailsObj->action = $action;
    $content_details_array["page"] = $user_detailsObj->curd();
    
    if ($get["dataType"] == "") {
        redirect("user_details");
    }else{
    $data=$user_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$user_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $user_detailsObj->action = "view";
        
        $defaultdata = $user_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}




$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"][heading]=ucwords("User Details");

$content_details_array["page"][title]=ucwords("User Details");

if($action=="add"||$action=="edit"){$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("first_name",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','first_name')\"");
$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("last_name",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','last_name')\"");
$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("middle_name",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','last_name')\"");
$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"email","name"=>"email","id"=>"email","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("email",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','last_name')\"");
$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("mobile",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','mobile')\"");
$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("work_phone",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");
$selectboxdata=$user_detailsObj->getSelectData('maddress','id,id','','id');$content_details_array["formelements"]["address_id"]=array("displayName"=>"Address Id","type"=>"text","name"=>"address_id","id"=>"address_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$user_detailsObj->setDefaultValue("address_id",$defaultdata),"addonfly"=>array("maddress","id") );
$selectboxdata=$user_detailsObj->getSelectData('__company','id,id','','id');$content_details_array["formelements"]["organization_id"]=array("displayName"=>"Organization Id","type"=>"text","name"=>"organization_id","id"=>"organization_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$user_detailsObj->setDefaultValue("organization_id",$defaultdata),"addonfly"=>array("__company","id") );
$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("blood_group",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");

$content_details_array["formelements"]["is_physically_challenged"]=array("displayName"=>"Is Physically Challenged","type"=>"text","name"=>"is_physically_challenged","id"=>"is_physically_challenged","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("is_physically_challenged",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");
$content_details_array["formelements"]["physically_challanged_remarks"]=array("displayName"=>"Physically Challanged Remarks","type"=>"text","name"=>"physically_challanged_remarks","id"=>"physically_challanged_remarks","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("physically_challanged_remarks",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");
$content_details_array["formelements"]["sex"]=array("displayName"=>"Sex","type"=>"text","name"=>"sex","id"=>"sex","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("sex",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");
$content_details_array["formelements"]["user_type"]=array("displayName"=>"User Type","type"=>"number","name"=>"user_type","id"=>"user_type","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("user_type",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");
$content_details_array["formelements"]["father_spouse_name"]=array("displayName"=>"Father Spouse Name","type"=>"text","name"=>"father_spouse_name","id"=>"father_spouse_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("father_spouse_name",$defaultdata),"pattern"=>"",event=>"onblur=\"geoJs.checkUniqueData('user_details','work_phone')\"");}

if($action=="view"){$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("first_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("last_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("middle_name",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("email",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("mobile",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("work_phone",$defaultdata,''),"readonly"=>"readonly");
$selectboxdata=$user_detailsObj->getSelectData('maddress','id,id','','id');$content_details_array["formelements"]["address_id"]=array("displayName"=>"Address Id","type"=>"text","name"=>"address_id","id"=>"address_id","class","style","error","required"=>"",data=>$selectboxdata,value=>$user_detailsObj->setDefaultValue("address_id",$defaultdata),"readonly"=>"readonly");
$selectboxdata=$user_detailsObj->getSelectData('__company','id,id','','id');$content_details_array["formelements"]["organization_id"]=array("displayName"=>"Organization Id","type"=>"text","name"=>"organization_id","id"=>"organization_id","class","style","error","required"=>"",data=>$selectboxdata,value=>$user_detailsObj->setDefaultValue("organization_id",$defaultdata),"readonly"=>"readonly");
$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("blood_group",$defaultdata,''),"readonly"=>"readonly");

$content_details_array["formelements"]["is_physically_challenged"]=array("displayName"=>"Is Physically Challenged","type"=>"text","name"=>"is_physically_challenged","id"=>"is_physically_challenged","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("is_physically_challenged",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["physically_challanged_remarks"]=array("displayName"=>"Physically Challanged Remarks","type"=>"text","name"=>"physically_challanged_remarks","id"=>"physically_challanged_remarks","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("physically_challanged_remarks",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["sex"]=array("displayName"=>"Sex","type"=>"text","name"=>"sex","id"=>"sex","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("sex",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["user_type"]=array("displayName"=>"User Type","type"=>"text","name"=>"user_type","id"=>"user_type","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("user_type",$defaultdata,''),"readonly"=>"readonly");
$content_details_array["formelements"]["father_spouse_name"]=array("displayName"=>"Father Spouse Name","type"=>"text","name"=>"father_spouse_name","id"=>"father_spouse_name","class","style","error","required"=>"","value"=>$user_detailsObj->setDefaultValue("father_spouse_name",$defaultdata,''),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view"){
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$user_detailsObj->setDefaultValue("id",$defaultdata));
            }
if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$user_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["columnnames"]=explode("~~~","Id~~~~~~Action");
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>