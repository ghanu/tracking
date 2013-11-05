<?php include_once AppRoot . AppController . "c__user_detailsController.php";

$__user_detailsObj = new c__user_detailsController();

$action = $get["action"]?$get["action"]:"viewall";
    $__user_detailsObj->id = $id = $get["id"]; 

if($post){
    
$__user_detailsObj->action = $post["formaction"];
    $content_details_array["page"] = $__user_detailsObj->curd();
    $__user_detailsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("__user_details&id=".$__user_detailsObj->id."&action=view");
    }else{
    $data=$__user_detailsObj->getSelectData($get["file"], $get["columns"], "id=".$__user_detailsObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $__user_detailsObj->action = "editview";
         }else{
            $__user_detailsObj->action = "view";
         }
     
        
        $defaultdata = $__user_detailsObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $__user_detailsObj->action=$action;
    $content_details_array["page"] = $__user_detailsObj->curd();
    redirect("__user_details&action=viewall");
    }
    
}


$__user_detailsObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("User Details");

$content_details_array["page"]["title"]=ucwords("User Details");

if($action=="add"||$action=="edit")
{
$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("first_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("last_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("middle_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_of_birth"]=array("displayName"=>"Date Of Birth","type"=>"text","name"=>"date_of_birth","id"=>"date_of_birth","class","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("date_of_birth",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("email",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("mobile",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("work_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=$__user_detailsObj->getSelectData('__designation','id,designation_name','','');$content_details_array["formelements"]["deignation"]=array("displayName"=>"Deignation","type"=>"text","name"=>"deignation","id"=>"deignation","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("deignation",$defaultdata),"addonfly"=>array("__designation","designation_name") );
                

$content_details_array["formelements"]["taddress_1"]=array("displayName"=>"Taddress 1","type"=>"text","name"=>"taddress_1","id"=>"taddress_1","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("taddress_1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["taddress_2"]=array("displayName"=>"Taddress 2","type"=>"text","name"=>"taddress_2","id"=>"taddress_2","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("taddress_2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["tcity_id"]=array("displayName"=>"Tcity Id","type"=>"text","name"=>"tcity_id","id"=>"tcity_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tcity_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["tstate_id"]=array("displayName"=>"Tstate Id","type"=>"text","name"=>"tstate_id","id"=>"tstate_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tstate_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["tcountry_id"]=array("displayName"=>"Tcountry Id","type"=>"text","name"=>"tcountry_id","id"=>"tcountry_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tcountry_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["paddress_1"]=array("displayName"=>"Paddress 1","type"=>"text","name"=>"paddress_1","id"=>"paddress_1","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("paddress_1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["paddress_2"]=array("displayName"=>"Paddress 2","type"=>"text","name"=>"paddress_2","id"=>"paddress_2","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("paddress_2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pcity_id"]=array("displayName"=>"Pcity Id","type"=>"text","name"=>"pcity_id","id"=>"pcity_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pcity_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pstate_id"]=array("displayName"=>"Pstate Id","type"=>"text","name"=>"pstate_id","id"=>"pstate_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pstate_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pcountry_id"]=array("displayName"=>"Pcountry Id","type"=>"text","name"=>"pcountry_id","id"=>"pcountry_id","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pcountry_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=$__user_detailsObj->getSelectData('__company','id,company_name','','');$content_details_array["formelements"]["organization_id"]=array("displayName"=>"Organization Id","type"=>"text","name"=>"organization_id","id"=>"organization_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("organization_id",$defaultdata),"addonfly"=>array("__company","company_name") );
                
$selectboxdata=$__user_detailsObj->getSelectData('__blood_group','id,blood_group','','');$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("blood_group",$defaultdata),"addonfly"=>array("__blood_group","blood_group") );
                
$content_details_array["formelements"]["photo"]=array(
                    "photoimage" => array("src"=>($__user_detailsObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$__user_detailsObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"photo_image","id"=>"photo_image","alt"=>"photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"__user_details","column"=>"photo"),
                    "photoimage_hidden"=>array("name"=>"photo","type"=>"hidden","value"=>$__user_detailsObj->setDefaultValue("photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["is_physically_challenged"]=array("displayName"=>"Is Physically Challenged","type"=>"text","name"=>"is_physically_challenged","id"=>"is_physically_challenged","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("is_physically_challenged",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["physically_challanged_remarks"]=array("displayName"=>"Physically Challanged Remarks","type"=>"text","name"=>"physically_challanged_remarks","id"=>"physically_challanged_remarks","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("physically_challanged_remarks",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Male"=>"Male","Female"=>"Female");$content_details_array["formelements"]["sex"]=array("displayName"=>"Sex","type"=>"text","name"=>"sex","id"=>"sex","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("sex",$defaultdata),"addonfly"=>"");
                
$selectboxdata=$__user_detailsObj->getSelectData('__user_type','id,user_type_name','','');$content_details_array["formelements"]["user_type"]=array("displayName"=>"User Type","type"=>"text","name"=>"user_type","id"=>"user_type","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("user_type",$defaultdata),"addonfly"=>array("__user_type","user_type_name") );
                
$selectboxdata=$__user_detailsObj->getSelectData('__branch_details','id,branch_name','','');$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"text","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"required","data"=>$selectboxdata,"value"=>$__user_detailsObj->setDefaultValue("branch_id",$defaultdata),"addonfly"=>array("__branch_details","branch_name") );
                

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_added"]=array("displayName"=>"Date Added","type"=>"hidden","name"=>"date_added","id"=>"date_added","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("date_added",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["date_last_updated"]=array("displayName"=>"Date Last Updated","type"=>"hidden","name"=>"date_last_updated","id"=>"date_last_updated","class","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("date_last_updated",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("first_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class"=>"textalignleft","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("last_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("middle_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_of_birth"]=array("displayName"=>"Date Of Birth","type"=>"text","name"=>"date_of_birth","id"=>"date_of_birth","class"=>"textalignleft","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("date_of_birth",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("email",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mobile"]=array("displayName"=>"Mobile","type"=>"text","name"=>"mobile","id"=>"mobile","class"=>"textalignleft","style","error","required"=>"required","value"=>$__user_detailsObj->setDefaultValue("mobile",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("work_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$__user_detailsObj->getSelectData('__designation','id,designation_name','','');$content_details_array["formelements"]["deignation"] = array("type" => "text", "name" => "deignation", "id" => "deignation","value" => $__user_detailsObj->setDefaultValue("deignation", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["taddress_1"]=array("displayName"=>"Taddress 1","type"=>"text","name"=>"taddress_1","id"=>"taddress_1","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("taddress_1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["taddress_2"]=array("displayName"=>"Taddress 2","type"=>"text","name"=>"taddress_2","id"=>"taddress_2","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("taddress_2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["tcity_id"]=array("displayName"=>"Tcity Id","type"=>"text","name"=>"tcity_id","id"=>"tcity_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tcity_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["tstate_id"]=array("displayName"=>"Tstate Id","type"=>"text","name"=>"tstate_id","id"=>"tstate_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tstate_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["tcountry_id"]=array("displayName"=>"Tcountry Id","type"=>"text","name"=>"tcountry_id","id"=>"tcountry_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("tcountry_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["paddress_1"]=array("displayName"=>"Paddress 1","type"=>"text","name"=>"paddress_1","id"=>"paddress_1","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("paddress_1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["paddress_2"]=array("displayName"=>"Paddress 2","type"=>"text","name"=>"paddress_2","id"=>"paddress_2","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("paddress_2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pcity_id"]=array("displayName"=>"Pcity Id","type"=>"text","name"=>"pcity_id","id"=>"pcity_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pcity_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pstate_id"]=array("displayName"=>"Pstate Id","type"=>"text","name"=>"pstate_id","id"=>"pstate_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pstate_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pcountry_id"]=array("displayName"=>"Pcountry Id","type"=>"text","name"=>"pcountry_id","id"=>"pcountry_id","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("pcountry_id",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$__user_detailsObj->getSelectData('__company','id,company_name','','');$content_details_array["formelements"]["organization_id"] = array("type" => "text", "name" => "organization_id", "id" => "organization_id","value" => $__user_detailsObj->setDefaultValue("organization_id", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$__user_detailsObj->getSelectData('__blood_group','id,blood_group','','');$content_details_array["formelements"]["blood_group"] = array("type" => "text", "name" => "blood_group", "id" => "blood_group","value" => $__user_detailsObj->setDefaultValue("blood_group", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["photo"]=array("src"=>($__user_detailsObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$__user_detailsObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$selectboxdata=array("Yes"=>"Yes","No"=>"No");$content_details_array["formelements"]["is_physically_challenged"] = array("type" => "text", "name" => "is_physically_challenged", "id" => "is_physically_challenged","value" => $__user_detailsObj->setDefaultValue("is_physically_challenged", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["physically_challanged_remarks"]=array("displayName"=>"Physically Challanged Remarks","type"=>"text","name"=>"physically_challanged_remarks","id"=>"physically_challanged_remarks","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("physically_challanged_remarks",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Male"=>"Male","Female"=>"Female");$content_details_array["formelements"]["sex"] = array("type" => "text", "name" => "sex", "id" => "sex","value" => $__user_detailsObj->setDefaultValue("sex", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$__user_detailsObj->getSelectData('__user_type','id,user_type_name','','');$content_details_array["formelements"]["user_type"] = array("type" => "text", "name" => "user_type", "id" => "user_type","value" => $__user_detailsObj->setDefaultValue("user_type", $defaultdata,"",$selectboxdata));
                
$selectboxdata=$__user_detailsObj->getSelectData('__branch_details','id,branch_name','','');$content_details_array["formelements"]["branch_id"] = array("type" => "text", "name" => "branch_id", "id" => "branch_id","value" => $__user_detailsObj->setDefaultValue("branch_id", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_added"]=array("displayName"=>"Date Added","type"=>"hidden","name"=>"date_added","id"=>"date_added","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("date_added",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["date_last_updated"]=array("displayName"=>"Date Last Updated","type"=>"hidden","name"=>"date_last_updated","id"=>"date_last_updated","class"=>"textalignleft","style","error","required"=>"","value"=>$__user_detailsObj->setDefaultValue("date_last_updated",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$__user_detailsObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$__user_detailsObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","First Name","Last Name","Middle Name","Date Of Birth","Email","Mobile","Work Phone","Designation","Door No.","Street Name","City","State","Country","Door No.","Street Name","City","State","Country","Organization","Blood Group","Photo","Is Physically Challenged","Physically Challanged Remarks","Sex","User Type","Branch","Status","Date Added","Date Last Updated","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>