<?php include_once AppRoot . AppController . "cAdmissionController.php";

$admissionObj = new cadmissionController();

$action = $get["action"]?$get["action"]:"viewall";
    $admissionObj->id = $id = $get["id"]; 

if($post){
    
$admissionObj->action = $post["formaction"];
    $content_details_array["page"] = $admissionObj->curd();
    $admissionObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("admission&id=".$admissionObj->id."&action=view");
    }else{
    $data=$admissionObj->getSelectData($get["file"], $get["columns"], "id=".$admissionObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $admissionObj->action = "editview";
         }else{
            $admissionObj->action = "view";
         }
     
        
        $defaultdata = $admissionObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $admissionObj->action=$action;
    $content_details_array["page"] = $admissionObj->curd();
    redirect("admission&action=viewall");
    }
    
}


$admissionObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("admission");

$content_details_array["page"]["title"]=ucwords("admission");

if($action=="add"||$action=="edit")
{$content_details_array["formelements"]["photo"]=array(
                    "photoimage" => array("src"=>($admissionObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"photo_image","id"=>"photo_image","alt"=>"photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"admission","column"=>"photo"),
                    "photoimage_hidden"=>array("name"=>"photo","type"=>"hidden","value"=>$admissionObj->setDefaultValue("photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class","style","error","required"=>"required","value"=>$admissionObj->setDefaultValue("application_no",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["registration_date"]=array("displayName"=>"Registration Date","type"=>"no_validations","name"=>"registration_date","id"=>"registration_date","class","style","error","required"=>"required","value"=>$admissionObj->setDefaultValue("registration_date",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["enrollment"]=array("displayName"=>"Enrollment","type"=>"text","name"=>"enrollment","id"=>"enrollment","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("enrollment",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("first_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("last_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("middle_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=$admissionObj->getSelectData('mclass','id,class','','id');$content_details_array["formelements"]["current_class"]=array("displayName"=>"Current Class","type"=>"text","name"=>"current_class","id"=>"current_class","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$admissionObj->setDefaultValue("current_class",$defaultdata),"addonfly"=>array("mclass","class") );
                

$content_details_array["formelements"]["date_of_birth"]=array("displayName"=>"Date Of Birth","type"=>"no_validations","name"=>"date_of_birth","id"=>"date_of_birth","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("date_of_birth",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["height"]=array("displayName"=>"Height","type"=>"text","name"=>"height","id"=>"height","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("height",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["weight"]=array("displayName"=>"Weight","type"=>"text","name"=>"weight","id"=>"weight","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("weight",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Male"=>"Male","Female"=>"Female");$content_details_array["formelements"]["sex"]=array("displayName"=>"Sex","type"=>"text","name"=>"sex","id"=>"sex","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$admissionObj->setDefaultValue("sex",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["nationality"]=array("displayName"=>"Nationality","type"=>"text","name"=>"nationality","id"=>"nationality","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("nationality",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["religion"]=array("displayName"=>"Religion","type"=>"text","name"=>"religion","id"=>"religion","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("religion",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["caste"]=array("displayName"=>"Caste","type"=>"text","name"=>"caste","id"=>"caste","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("caste",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["community"]=array("displayName"=>"Community","type"=>"text","name"=>"community","id"=>"community","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("community",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("blood_group",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mother_tongue"]=array("displayName"=>"Mother Tongue","type"=>"text","name"=>"mother_tongue","id"=>"mother_tongue","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mother_tongue",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["lang_speak_at_home"]=array("displayName"=>"Lang Speak At Home","type"=>"text","name"=>"lang_speak_at_home","id"=>"lang_speak_at_home","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("lang_speak_at_home",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$content_details_array["formelements"]["father_photo"]=array(
                    "photoimage" => array("src"=>($admissionObj->setDefaultValue("father_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("father_photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"father_photo_image","id"=>"father_photo_image","alt"=>"father_photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"admission","column"=>"father_photo"),
                    "photoimage_hidden"=>array("name"=>"father_photo","type"=>"hidden","value"=>$admissionObj->setDefaultValue("father_photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["father_name"]=array("displayName"=>"Father Name","type"=>"text","name"=>"father_name","id"=>"father_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("father_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mobile_phone"]=array("displayName"=>"Mobile Phone","type"=>"text","name"=>"mobile_phone","id"=>"mobile_phone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mobile_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("work_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("email",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["employer"]=array("displayName"=>"Employer","type"=>"text","name"=>"employer","id"=>"employer","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("employer",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["occupation"]=array("displayName"=>"Occupation","type"=>"text","name"=>"occupation","id"=>"occupation","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("occupation",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["annual_income"]=array("displayName"=>"Annual Income","type"=>"text","name"=>"annual_income","id"=>"annual_income","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("annual_income",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$content_details_array["formelements"]["mother_photo"]=array(
                    "photoimage" => array("src"=>($admissionObj->setDefaultValue("mother_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("mother_photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"mother_photo_image","id"=>"mother_photo_image","alt"=>"mother_photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"admission","column"=>"mother_photo"),
                    "photoimage_hidden"=>array("name"=>"mother_photo","type"=>"hidden","value"=>$admissionObj->setDefaultValue("mother_photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["mother_name"]=array("displayName"=>"Mother Name","type"=>"text","name"=>"mother_name","id"=>"mother_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mother_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mmobile_phone"]=array("displayName"=>"Mmobile Phone","type"=>"text","name"=>"mmobile_phone","id"=>"mmobile_phone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mmobile_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mwork_phone"]=array("displayName"=>"Mwork Phone","type"=>"text","name"=>"mwork_phone","id"=>"mwork_phone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mwork_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["memail"]=array("displayName"=>"Memail","type"=>"text","name"=>"memail","id"=>"memail","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("memail",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["memployer"]=array("displayName"=>"Memployer","type"=>"text","name"=>"memployer","id"=>"memployer","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("memployer",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["moccupation"]=array("displayName"=>"Moccupation","type"=>"text","name"=>"moccupation","id"=>"moccupation","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("moccupation",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["mannual_income"]=array("displayName"=>"Mannual Income","type"=>"text","name"=>"mannual_income","id"=>"mannual_income","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mannual_income",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["home_address"]=array("displayName"=>"Home Address","type"=>"text","name"=>"home_address","id"=>"home_address","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("home_address",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["haddress_line2"]=array("displayName"=>"Haddress Line2","type"=>"text","name"=>"haddress_line2","id"=>"haddress_line2","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("haddress_line2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["haddress_city"]=array("displayName"=>"Haddress City","type"=>"text","name"=>"haddress_city","id"=>"haddress_city","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("haddress_city",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pincode"]=array("displayName"=>"Pincode","type"=>"text","name"=>"pincode","id"=>"pincode","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pincode",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["home_phone"]=array("displayName"=>"Home Phone","type"=>"text","name"=>"home_phone","id"=>"home_phone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("home_phone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["landmark"]=array("displayName"=>"Landmark","type"=>"text","name"=>"landmark","id"=>"landmark","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("landmark",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["doctors_name"]=array("displayName"=>"Doctors Name","type"=>"text","name"=>"doctors_name","id"=>"doctors_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("doctors_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["daddress_line2"]=array("displayName"=>"Daddress Line2","type"=>"text","name"=>"daddress_line2","id"=>"daddress_line2","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("daddress_line2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["daddress_city"]=array("displayName"=>"Daddress City","type"=>"text","name"=>"daddress_city","id"=>"daddress_city","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("daddress_city",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dphone"]=array("displayName"=>"Dphone","type"=>"text","name"=>"dphone","id"=>"dphone","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("dphone",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dmobile"]=array("displayName"=>"Dmobile","type"=>"text","name"=>"dmobile","id"=>"dmobile","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("dmobile",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["doctors_address"]=array("displayName"=>"Doctors Address","type"=>"text","name"=>"doctors_address","id"=>"doctors_address","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("doctors_address",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["child_allergies"]=array("displayName"=>"Child Allergies","type"=>"text","name"=>"child_allergies","id"=>"child_allergies","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("child_allergies",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["any_special_info"]=array("displayName"=>"Any Special Info","type"=>"text","name"=>"any_special_info","id"=>"any_special_info","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("any_special_info",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Yes"=>"Yes", "No"=>"No");$content_details_array["formelements"]["physically_challenged"]=array("displayName"=>"Physically Challenged","type"=>"text","name"=>"physically_challenged","id"=>"physically_challenged","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$admissionObj->setDefaultValue("physically_challenged",$defaultdata),"addonfly"=>"");
                

$content_details_array["formelements"]["previous_school"]=array("displayName"=>"Previous School","type"=>"text","name"=>"previous_school","id"=>"previous_school","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("previous_school",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["ps_standard"]=array("displayName"=>"Ps Standard","type"=>"text","name"=>"ps_standard","id"=>"ps_standard","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("ps_standard",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["psacademic_yr"]=array("displayName"=>"Psacademic Yr","type"=>"text","name"=>"psacademic_yr","id"=>"psacademic_yr","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("psacademic_yr",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["ps_address"]=array("displayName"=>"Ps Address","type"=>"text","name"=>"ps_address","id"=>"ps_address","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("ps_address",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["saddress_line2"]=array("displayName"=>"Saddress Line2","type"=>"text","name"=>"saddress_line2","id"=>"saddress_line2","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("saddress_line2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["scity"]=array("displayName"=>"Scity","type"=>"text","name"=>"scity","id"=>"scity","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("scity",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$selectboxdata=array("Yes"=>"Yes", "No"=>"No");$content_details_array["formelements"]["transport"]=array("displayName"=>"Transport","type"=>"text","name"=>"transport","id"=>"transport","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$admissionObj->setDefaultValue("transport",$defaultdata),"addonfly"=>"");
                
$content_details_array["formelements"]["person1_photo"]=array(
                    "photoimage" => array("src"=>($admissionObj->setDefaultValue("person1_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("person1_photo",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"person1_photo_image","id"=>"person1_photo_image","alt"=>"person1_photo"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"admission","column"=>"person1_photo"),
                    "photoimage_hidden"=>array("name"=>"person1_photo","type"=>"hidden","value"=>$admissionObj->setDefaultValue("person1_photo",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["pick_up_person_1"]=array("displayName"=>"Pick Up Person 1","type"=>"text","name"=>"pick_up_person_1","id"=>"pick_up_person_1","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pick_up_person_1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["prelationship"]=array("displayName"=>"Prelationship","type"=>"text","name"=>"prelationship","id"=>"prelationship","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("prelationship",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");
$content_details_array["formelements"]["person2_phot"]=array(
                    "photoimage" => array("src"=>($admissionObj->setDefaultValue("person2_phot",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("person2_phot",$defaultdata,""):AppImgURL."noimage.jpg"),"name"=>"person2_phot_image","id"=>"person2_phot_image","alt"=>"person2_phot"),
                    "photoimage_add"=>array("src"=>AppImgURL."icon_plus.gif","class"=>"loadtakephoto","table"=>"admission","column"=>"person2_phot"),
                    "photoimage_hidden"=>array("name"=>"person2_phot","type"=>"hidden","value"=>$admissionObj->setDefaultValue("person2_phot",$defaultdata,AppImgURL."noimage.jpg"))
                    );

$content_details_array["formelements"]["pick_up_person_2"]=array("displayName"=>"Pick Up Person 2","type"=>"text","name"=>"pick_up_person_2","id"=>"pick_up_person_2","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pick_up_person_2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["prelationship2"]=array("displayName"=>"Prelationship2","type"=>"text","name"=>"prelationship2","id"=>"prelationship2","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("prelationship2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["route"]=array("displayName"=>"Route","type"=>"text","name"=>"route","id"=>"route","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("route",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["stage"]=array("displayName"=>"Stage","type"=>"text","name"=>"stage","id"=>"stage","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("stage",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["cost"]=array("displayName"=>"Cost","type"=>"text","name"=>"cost","id"=>"cost","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("cost",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sname"]=array("displayName"=>"Sname","type"=>"text","name"=>"sname","id"=>"sname","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sname",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sage"]=array("displayName"=>"Sage","type"=>"text","name"=>"sage","id"=>"sage","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sage",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sclass"]=array("displayName"=>"Sclass","type"=>"text","name"=>"sclass","id"=>"sclass","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sclass",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sschool"]=array("displayName"=>"Sschool","type"=>"text","name"=>"sschool","id"=>"sschool","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sschool",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sname1"]=array("displayName"=>"Sname1","type"=>"text","name"=>"sname1","id"=>"sname1","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sname1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sage1"]=array("displayName"=>"Sage1","type"=>"text","name"=>"sage1","id"=>"sage1","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sage1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sclass1"]=array("displayName"=>"Sclass1","type"=>"text","name"=>"sclass1","id"=>"sclass1","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sclass1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["sschool1"]=array("displayName"=>"Sschool1","type"=>"text","name"=>"sschool1","id"=>"sschool1","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sschool1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["emergency_name"]=array("displayName"=>"Emergency Name","type"=>"text","name"=>"emergency_name","id"=>"emergency_name","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("emergency_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["emergency_mobile"]=array("displayName"=>"Emergency Mobile","type"=>"text","name"=>"emergency_mobile","id"=>"emergency_mobile","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("emergency_mobile",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["relationship"]=array("displayName"=>"Relationship","type"=>"text","name"=>"relationship","id"=>"relationship","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("relationship",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["copy_birth_certificate"]=array("displayName"=>"Copy Birth Certificate","type"=>"text","name"=>"copy_birth_certificate","id"=>"copy_birth_certificate","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("copy_birth_certificate",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["tc"]=array("displayName"=>"Tc","type"=>"text","name"=>"tc","id"=>"tc","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("tc",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["assessment_report_card"]=array("displayName"=>"Assessment Report Card","type"=>"text","name"=>"assessment_report_card","id"=>"assessment_report_card","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("assessment_report_card",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("status",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["screening_id"]=array("displayName"=>"Screening Id","type"=>"hidden","name"=>"screening_id","id"=>"screening_id","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("screening_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("branch_id",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$content_details_array["formelements"]["photo"]=array("src"=>($admissionObj->setDefaultValue("photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["application_no"]=array("displayName"=>"Application No","type"=>"text","name"=>"application_no","id"=>"application_no","class"=>"textalignleft","style","error","required"=>"required","value"=>$admissionObj->setDefaultValue("application_no",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["registration_date"]=array("displayName"=>"Registration Date","type"=>"date","name"=>"registration_date","id"=>"registration_date","class"=>"textalignleft","style","error","required"=>"required","value"=>$admissionObj->setDefaultValue("registration_date",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["enrollment"]=array("displayName"=>"Enrollment","type"=>"text","name"=>"enrollment","id"=>"enrollment","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("enrollment",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["first_name"]=array("displayName"=>"First Name","type"=>"text","name"=>"first_name","id"=>"first_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("first_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["last_name"]=array("displayName"=>"Last Name","type"=>"text","name"=>"last_name","id"=>"last_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("last_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["middle_name"]=array("displayName"=>"Middle Name","type"=>"text","name"=>"middle_name","id"=>"middle_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("middle_name",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=$admissionObj->getSelectData('mclass','id,class','','id');$content_details_array["formelements"]["current_class"] = array("type" => "text", "name" => "current_class", "id" => "current_class","value" => $admissionObj->setDefaultValue("current_class", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["date_of_birth"]=array("displayName"=>"Date Of Birth","type"=>"date","name"=>"date_of_birth","id"=>"date_of_birth","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("date_of_birth",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["height"]=array("displayName"=>"Height","type"=>"text","name"=>"height","id"=>"height","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("height",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["weight"]=array("displayName"=>"Weight","type"=>"text","name"=>"weight","id"=>"weight","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("weight",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Male"=>"Male","Female"=>"Female");$content_details_array["formelements"]["sex"] = array("type" => "text", "name" => "sex", "id" => "sex","value" => $admissionObj->setDefaultValue("sex", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["nationality"]=array("displayName"=>"Nationality","type"=>"text","name"=>"nationality","id"=>"nationality","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("nationality",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["religion"]=array("displayName"=>"Religion","type"=>"text","name"=>"religion","id"=>"religion","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("religion",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["caste"]=array("displayName"=>"Caste","type"=>"text","name"=>"caste","id"=>"caste","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("caste",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["community"]=array("displayName"=>"Community","type"=>"text","name"=>"community","id"=>"community","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("community",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["blood_group"]=array("displayName"=>"Blood Group","type"=>"text","name"=>"blood_group","id"=>"blood_group","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("blood_group",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mother_tongue"]=array("displayName"=>"Mother Tongue","type"=>"text","name"=>"mother_tongue","id"=>"mother_tongue","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mother_tongue",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["lang_speak_at_home"]=array("displayName"=>"Lang Speak At Home","type"=>"text","name"=>"lang_speak_at_home","id"=>"lang_speak_at_home","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("lang_speak_at_home",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["father_photo"]=array("src"=>($admissionObj->setDefaultValue("father_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("father_photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["father_name"]=array("displayName"=>"Father Name","type"=>"text","name"=>"father_name","id"=>"father_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("father_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mobile_phone"]=array("displayName"=>"Mobile Phone","type"=>"text","name"=>"mobile_phone","id"=>"mobile_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mobile_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["work_phone"]=array("displayName"=>"Work Phone","type"=>"text","name"=>"work_phone","id"=>"work_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("work_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["email"]=array("displayName"=>"Email","type"=>"text","name"=>"email","id"=>"email","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("email",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["employer"]=array("displayName"=>"Employer","type"=>"text","name"=>"employer","id"=>"employer","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("employer",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["occupation"]=array("displayName"=>"Occupation","type"=>"text","name"=>"occupation","id"=>"occupation","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("occupation",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["annual_income"]=array("displayName"=>"Annual Income","type"=>"text","name"=>"annual_income","id"=>"annual_income","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("annual_income",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mother_photo"]=array("src"=>($admissionObj->setDefaultValue("mother_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("mother_photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["mother_name"]=array("displayName"=>"Mother Name","type"=>"text","name"=>"mother_name","id"=>"mother_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mother_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mmobile_phone"]=array("displayName"=>"Mmobile Phone","type"=>"text","name"=>"mmobile_phone","id"=>"mmobile_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mmobile_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mwork_phone"]=array("displayName"=>"Mwork Phone","type"=>"text","name"=>"mwork_phone","id"=>"mwork_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mwork_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["memail"]=array("displayName"=>"Memail","type"=>"text","name"=>"memail","id"=>"memail","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("memail",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["memployer"]=array("displayName"=>"Memployer","type"=>"text","name"=>"memployer","id"=>"memployer","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("memployer",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["moccupation"]=array("displayName"=>"Moccupation","type"=>"text","name"=>"moccupation","id"=>"moccupation","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("moccupation",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["mannual_income"]=array("displayName"=>"Mannual Income","type"=>"text","name"=>"mannual_income","id"=>"mannual_income","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("mannual_income",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["home_address"]=array("displayName"=>"Home Address","type"=>"text","name"=>"home_address","id"=>"home_address","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("home_address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["haddress_line2"]=array("displayName"=>"Haddress Line2","type"=>"text","name"=>"haddress_line2","id"=>"haddress_line2","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("haddress_line2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["haddress_city"]=array("displayName"=>"Haddress City","type"=>"text","name"=>"haddress_city","id"=>"haddress_city","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("haddress_city",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pincode"]=array("displayName"=>"Pincode","type"=>"text","name"=>"pincode","id"=>"pincode","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pincode",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["home_phone"]=array("displayName"=>"Home Phone","type"=>"text","name"=>"home_phone","id"=>"home_phone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("home_phone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["landmark"]=array("displayName"=>"Landmark","type"=>"text","name"=>"landmark","id"=>"landmark","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("landmark",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["doctors_name"]=array("displayName"=>"Doctors Name","type"=>"text","name"=>"doctors_name","id"=>"doctors_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("doctors_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["daddress_line2"]=array("displayName"=>"Daddress Line2","type"=>"text","name"=>"daddress_line2","id"=>"daddress_line2","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("daddress_line2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["daddress_city"]=array("displayName"=>"Daddress City","type"=>"text","name"=>"daddress_city","id"=>"daddress_city","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("daddress_city",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dphone"]=array("displayName"=>"Dphone","type"=>"text","name"=>"dphone","id"=>"dphone","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("dphone",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dmobile"]=array("displayName"=>"Dmobile","type"=>"text","name"=>"dmobile","id"=>"dmobile","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("dmobile",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["doctors_address"]=array("displayName"=>"Doctors Address","type"=>"text","name"=>"doctors_address","id"=>"doctors_address","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("doctors_address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["child_allergies"]=array("displayName"=>"Child Allergies","type"=>"text","name"=>"child_allergies","id"=>"child_allergies","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("child_allergies",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["any_special_info"]=array("displayName"=>"Any Special Info","type"=>"text","name"=>"any_special_info","id"=>"any_special_info","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("any_special_info",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Yes"=>"Yes", "No"=>"No");$content_details_array["formelements"]["physically_challenged"] = array("type" => "text", "name" => "physically_challenged", "id" => "physically_challenged","value" => $admissionObj->setDefaultValue("physically_challenged", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["previous_school"]=array("displayName"=>"Previous School","type"=>"text","name"=>"previous_school","id"=>"previous_school","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("previous_school",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["ps_standard"]=array("displayName"=>"Ps Standard","type"=>"text","name"=>"ps_standard","id"=>"ps_standard","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("ps_standard",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["psacademic_yr"]=array("displayName"=>"Psacademic Yr","type"=>"text","name"=>"psacademic_yr","id"=>"psacademic_yr","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("psacademic_yr",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["ps_address"]=array("displayName"=>"Ps Address","type"=>"text","name"=>"ps_address","id"=>"ps_address","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("ps_address",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["saddress_line2"]=array("displayName"=>"Saddress Line2","type"=>"text","name"=>"saddress_line2","id"=>"saddress_line2","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("saddress_line2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["scity"]=array("displayName"=>"Scity","type"=>"text","name"=>"scity","id"=>"scity","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("scity",$defaultdata,$dummy),"readonly"=>"readonly");
$selectboxdata=array("Yes"=>"Yes", "No"=>"No");$content_details_array["formelements"]["transport"] = array("type" => "text", "name" => "transport", "id" => "transport","value" => $admissionObj->setDefaultValue("transport", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["person1_photo"]=array("src"=>($admissionObj->setDefaultValue("person1_photo",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("person1_photo",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["pick_up_person_1"]=array("displayName"=>"Pick Up Person 1","type"=>"text","name"=>"pick_up_person_1","id"=>"pick_up_person_1","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pick_up_person_1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["prelationship"]=array("displayName"=>"Prelationship","type"=>"text","name"=>"prelationship","id"=>"prelationship","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("prelationship",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["person2_phot"]=array("src"=>($admissionObj->setDefaultValue("person2_phot",$defaultdata,"")!=""?AppViewUploadsURL.$admissionObj->setDefaultValue("person2_phot",$defaultdata,""):AppImgURL."noimage.jpg"));
$content_details_array["formelements"]["pick_up_person_2"]=array("displayName"=>"Pick Up Person 2","type"=>"text","name"=>"pick_up_person_2","id"=>"pick_up_person_2","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("pick_up_person_2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["prelationship2"]=array("displayName"=>"Prelationship2","type"=>"text","name"=>"prelationship2","id"=>"prelationship2","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("prelationship2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["route"]=array("displayName"=>"Route","type"=>"text","name"=>"route","id"=>"route","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("route",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["stage"]=array("displayName"=>"Stage","type"=>"text","name"=>"stage","id"=>"stage","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("stage",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["cost"]=array("displayName"=>"Cost","type"=>"text","name"=>"cost","id"=>"cost","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("cost",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sname"]=array("displayName"=>"Sname","type"=>"text","name"=>"sname","id"=>"sname","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sname",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sage"]=array("displayName"=>"Sage","type"=>"text","name"=>"sage","id"=>"sage","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sage",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sclass"]=array("displayName"=>"Sclass","type"=>"text","name"=>"sclass","id"=>"sclass","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sclass",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sschool"]=array("displayName"=>"Sschool","type"=>"text","name"=>"sschool","id"=>"sschool","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sschool",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sname1"]=array("displayName"=>"Sname1","type"=>"text","name"=>"sname1","id"=>"sname1","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sname1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sage1"]=array("displayName"=>"Sage1","type"=>"text","name"=>"sage1","id"=>"sage1","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sage1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sclass1"]=array("displayName"=>"Sclass1","type"=>"text","name"=>"sclass1","id"=>"sclass1","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sclass1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["sschool1"]=array("displayName"=>"Sschool1","type"=>"text","name"=>"sschool1","id"=>"sschool1","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("sschool1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["emergency_name"]=array("displayName"=>"Emergency Name","type"=>"text","name"=>"emergency_name","id"=>"emergency_name","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("emergency_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["emergency_mobile"]=array("displayName"=>"Emergency Mobile","type"=>"text","name"=>"emergency_mobile","id"=>"emergency_mobile","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("emergency_mobile",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["relationship"]=array("displayName"=>"Relationship","type"=>"text","name"=>"relationship","id"=>"relationship","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("relationship",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["copy_birth_certificate"]=array("displayName"=>"Copy Birth Certificate","type"=>"text","name"=>"copy_birth_certificate","id"=>"copy_birth_certificate","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("copy_birth_certificate",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["tc"]=array("displayName"=>"Tc","type"=>"text","name"=>"tc","id"=>"tc","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("tc",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["assessment_report_card"]=array("displayName"=>"Assessment Report Card","type"=>"text","name"=>"assessment_report_card","id"=>"assessment_report_card","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("assessment_report_card",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["status"]=array("displayName"=>"Status","type"=>"hidden","name"=>"status","id"=>"status","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("status",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["screening_id"]=array("displayName"=>"Screening Id","type"=>"hidden","name"=>"screening_id","id"=>"screening_id","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("screening_id",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["branch_id"]=array("displayName"=>"Branch Id","type"=>"hidden","name"=>"branch_id","id"=>"branch_id","class"=>"textalignleft","style","error","required"=>"","value"=>$admissionObj->setDefaultValue("branch_id",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$admissionObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$admissionObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","Photo","Application No","Registration Date","Enrollment","First Name","Last Name","Middle Name","Current Class","Date Of Birth","Height","Weight","Sex","Nationality","Religion","Caste","Community","Blood Group","Mother Tongue","Lang Speak At Home","Father Photo","Father Name","Mobile Phone","Work Phone","Email","Employer","Occupation","Annual Income","Mother Photo","Mother Name","Mobile Phone","Work Phone","Email","Employer","Occupation","Annual Income","Home Address","Street Name","City","Pincode","Home Phone","Landmark","Doctors Name","Street Name","City","Phone","Mobile","Doctors Address","Child Allergies","Any Special Info","Physically Challenged","Previous School","Standard","Academic Yr","Address","Street Name","City","Transport","Pick Up Person 1Pick Up Person 1 Photo","Pick Up Person 1","Prelationship","Pick Up Person 2 Photo","Pick Up Person 2","Relationship","Route","Stage","Cost","Name","Age","Class","School","Name","Age","Class","School","Emergency Name","Emergency Mobile","Relationship","Copy of Birth Certificate","Original Transfer Certificate","Assessment Report Card","Status","Screening Id","Branch Id","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>