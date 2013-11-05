<?php include_once AppRoot . AppController . "cTeacherController.php";

$teacherObj = new cteacherController();

$action = $get["action"]?$get["action"]:"viewall";
    $teacherObj->id = $id = $get["id"]; 

if($post){
    
$teacherObj->action = $post["formaction"];
    $content_details_array["page"] = $teacherObj->curd();
    $teacherObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("teacher&id=".$teacherObj->id."&action=view");
    }else{
    $data=$teacherObj->getSelectData($get["file"], $get["columns"], "id=".$teacherObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     $teacherObj->action = "view";
        
        $defaultdata = $teacherObj->curd();
        $defaultdata = $defaultdata[0];
    }
    
}


$teacherObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Teacher");

$content_details_array["page"]["title"]=ucwords("Teacher");

if($action=="add"||$action=="edit")
{$selectboxdata=$teacherObj->getSelectData('__user_details','id,first_name','deignation=1','');$content_details_array["formelements"]["user_id"]=array("displayName"=>"User Id","type"=>"text","name"=>"user_id","id"=>"user_id","class","style","error","required"=>"","data"=>$selectboxdata,"value"=>$teacherObj->setDefaultValue("user_id",$defaultdata),"addonfly"=>array("__user_details","first_name") );
                

$content_details_array["formelements"]["school_name"]=array("displayName"=>"School Name","type"=>"text","name"=>"school_name","id"=>"school_name","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("school_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["subject_major"]=array("displayName"=>"Subject Major","type"=>"text","name"=>"subject_major","id"=>"subject_major","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["year_completed"]=array("displayName"=>"Year Completed","type"=>"text","name"=>"year_completed","id"=>"year_completed","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["percentage"]=array("displayName"=>"Percentage","type"=>"text","name"=>"percentage","id"=>"percentage","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["school_name1"]=array("displayName"=>"School Name1","type"=>"text","name"=>"school_name1","id"=>"school_name1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("school_name1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["subject_major1"]=array("displayName"=>"Subject Major1","type"=>"text","name"=>"subject_major1","id"=>"subject_major1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["year_completed1"]=array("displayName"=>"Year Completed1","type"=>"text","name"=>"year_completed1","id"=>"year_completed1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["percentage1"]=array("displayName"=>"Percentage1","type"=>"text","name"=>"percentage1","id"=>"percentage1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["college_name"]=array("displayName"=>"College Name","type"=>"text","name"=>"college_name","id"=>"college_name","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("college_name",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["subject_major2"]=array("displayName"=>"Subject Major2","type"=>"text","name"=>"subject_major2","id"=>"subject_major2","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["year_completed2"]=array("displayName"=>"Year Completed2","type"=>"text","name"=>"year_completed2","id"=>"year_completed2","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["percentage2"]=array("displayName"=>"Percentage2","type"=>"text","name"=>"percentage2","id"=>"percentage2","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["college_name2"]=array("displayName"=>"College Name2","type"=>"text","name"=>"college_name2","id"=>"college_name2","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("college_name2",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["subject_major3"]=array("displayName"=>"Subject Major3","type"=>"text","name"=>"subject_major3","id"=>"subject_major3","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major3",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["year_completed3"]=array("displayName"=>"Year Completed3","type"=>"text","name"=>"year_completed3","id"=>"year_completed3","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed3",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["percentage3"]=array("displayName"=>"Percentage3","type"=>"text","name"=>"percentage3","id"=>"percentage3","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage3",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["name_of_employer"]=array("displayName"=>"Name Of Employer","type"=>"text","name"=>"name_of_employer","id"=>"name_of_employer","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("name_of_employer",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["daddress"]=array("displayName"=>"Daddress","type"=>"text","name"=>"daddress","id"=>"daddress","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("daddress",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dcity"]=array("displayName"=>"Dcity","type"=>"text","name"=>"dcity","id"=>"dcity","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dcity",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dstate"]=array("displayName"=>"Dstate","type"=>"text","name"=>"dstate","id"=>"dstate","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dstate",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["dpincode"]=array("displayName"=>"Dpincode","type"=>"text","name"=>"dpincode","id"=>"dpincode","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dpincode",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["employment_dates_from"]=array("displayName"=>"Employment Dates From","type"=>"date","name"=>"employment_dates_from","id"=>"employment_dates_from","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("employment_dates_from",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["employment_dates_to"]=array("displayName"=>"Employment Dates To","type"=>"date","name"=>"employment_dates_to","id"=>"employment_dates_to","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("employment_dates_to",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["pay_rs"]=array("displayName"=>"Pay Rs","type"=>"number","name"=>"pay_rs","id"=>"pay_rs","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("pay_rs",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["name_of_immediate_superviser"]=array("displayName"=>"Name Of Immediate Superviser","type"=>"text","name"=>"name_of_immediate_superviser","id"=>"name_of_immediate_superviser","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("name_of_immediate_superviser",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["job_title_description_of_work"]=array("displayName"=>"Job Title Description Of Work","type"=>"text","name"=>"job_title_description_of_work","id"=>"job_title_description_of_work","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("job_title_description_of_work",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("reason_for_leaving",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rname"]=array("displayName"=>"Rname","type"=>"text","name"=>"rname","id"=>"rname","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rname",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rrelationship"]=array("displayName"=>"Rrelationship","type"=>"text","name"=>"rrelationship","id"=>"rrelationship","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rrelationship",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["raddress"]=array("displayName"=>"Raddress","type"=>"text","name"=>"raddress","id"=>"raddress","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("raddress",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rwork_number"]=array("displayName"=>"Rwork Number","type"=>"number","name"=>"rwork_number","id"=>"rwork_number","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rwork_number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rhome_number"]=array("displayName"=>"Rhome Number","type"=>"number","name"=>"rhome_number","id"=>"rhome_number","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rhome_number",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rname1"]=array("displayName"=>"Rname1","type"=>"text","name"=>"rname1","id"=>"rname1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rname1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rrelationship1"]=array("displayName"=>"Rrelationship1","type"=>"text","name"=>"rrelationship1","id"=>"rrelationship1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rrelationship1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["raddress1"]=array("displayName"=>"Raddress1","type"=>"text","name"=>"raddress1","id"=>"raddress1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("raddress1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rwork_number1"]=array("displayName"=>"Rwork Number1","type"=>"number","name"=>"rwork_number1","id"=>"rwork_number1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rwork_number1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");

$content_details_array["formelements"]["rhome_number1"]=array("displayName"=>"Rhome Number1","type"=>"number","name"=>"rhome_number1","id"=>"rhome_number1","class","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rhome_number1",$defaultdata,$dummy),"max"=>"","min"=>"","pattern"=>"");}

if($action=="view")
{$content_details_array["page"]["viewactions"]='';
$selectboxdata=$teacherObj->getSelectData('__user_details','id,first_name','deignation=1','');$content_details_array["formelements"]["user_id"] = array("type" => "text", "name" => "user_id", "id" => "user_id","value" => $teacherObj->setDefaultValue("user_id", $defaultdata,"",$selectboxdata));
                
$content_details_array["formelements"]["school_name"]=array("displayName"=>"School Name","type"=>"text","name"=>"school_name","id"=>"school_name","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("school_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["subject_major"]=array("displayName"=>"Subject Major","type"=>"text","name"=>"subject_major","id"=>"subject_major","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["year_completed"]=array("displayName"=>"Year Completed","type"=>"text","name"=>"year_completed","id"=>"year_completed","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["percentage"]=array("displayName"=>"Percentage","type"=>"text","name"=>"percentage","id"=>"percentage","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["school_name1"]=array("displayName"=>"School Name1","type"=>"text","name"=>"school_name1","id"=>"school_name1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("school_name1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["subject_major1"]=array("displayName"=>"Subject Major1","type"=>"text","name"=>"subject_major1","id"=>"subject_major1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["year_completed1"]=array("displayName"=>"Year Completed1","type"=>"text","name"=>"year_completed1","id"=>"year_completed1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["percentage1"]=array("displayName"=>"Percentage1","type"=>"text","name"=>"percentage1","id"=>"percentage1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["college_name"]=array("displayName"=>"College Name","type"=>"text","name"=>"college_name","id"=>"college_name","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("college_name",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["subject_major2"]=array("displayName"=>"Subject Major2","type"=>"text","name"=>"subject_major2","id"=>"subject_major2","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["year_completed2"]=array("displayName"=>"Year Completed2","type"=>"text","name"=>"year_completed2","id"=>"year_completed2","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["percentage2"]=array("displayName"=>"Percentage2","type"=>"text","name"=>"percentage2","id"=>"percentage2","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["college_name2"]=array("displayName"=>"College Name2","type"=>"text","name"=>"college_name2","id"=>"college_name2","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("college_name2",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["subject_major3"]=array("displayName"=>"Subject Major3","type"=>"text","name"=>"subject_major3","id"=>"subject_major3","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("subject_major3",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["year_completed3"]=array("displayName"=>"Year Completed3","type"=>"text","name"=>"year_completed3","id"=>"year_completed3","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("year_completed3",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["percentage3"]=array("displayName"=>"Percentage3","type"=>"text","name"=>"percentage3","id"=>"percentage3","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("percentage3",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["name_of_employer"]=array("displayName"=>"Name Of Employer","type"=>"text","name"=>"name_of_employer","id"=>"name_of_employer","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("name_of_employer",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["daddress"]=array("displayName"=>"Daddress","type"=>"text","name"=>"daddress","id"=>"daddress","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("daddress",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dcity"]=array("displayName"=>"Dcity","type"=>"text","name"=>"dcity","id"=>"dcity","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dcity",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dstate"]=array("displayName"=>"Dstate","type"=>"text","name"=>"dstate","id"=>"dstate","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dstate",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["dpincode"]=array("displayName"=>"Dpincode","type"=>"text","name"=>"dpincode","id"=>"dpincode","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("dpincode",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["employment_dates_from"]=array("displayName"=>"Employment Dates From","type"=>"text","name"=>"employment_dates_from","id"=>"employment_dates_from","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("employment_dates_from",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["employment_dates_to"]=array("displayName"=>"Employment Dates To","type"=>"text","name"=>"employment_dates_to","id"=>"employment_dates_to","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("employment_dates_to",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["pay_rs"]=array("displayName"=>"Pay Rs","type"=>"text","name"=>"pay_rs","id"=>"pay_rs","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("pay_rs",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["name_of_immediate_superviser"]=array("displayName"=>"Name Of Immediate Superviser","type"=>"text","name"=>"name_of_immediate_superviser","id"=>"name_of_immediate_superviser","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("name_of_immediate_superviser",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["job_title_description_of_work"]=array("displayName"=>"Job Title Description Of Work","type"=>"text","name"=>"job_title_description_of_work","id"=>"job_title_description_of_work","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("job_title_description_of_work",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["reason_for_leaving"]=array("displayName"=>"Reason For Leaving","type"=>"text","name"=>"reason_for_leaving","id"=>"reason_for_leaving","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("reason_for_leaving",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rname"]=array("displayName"=>"Rname","type"=>"text","name"=>"rname","id"=>"rname","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rname",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rrelationship"]=array("displayName"=>"Rrelationship","type"=>"text","name"=>"rrelationship","id"=>"rrelationship","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rrelationship",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["raddress"]=array("displayName"=>"Raddress","type"=>"text","name"=>"raddress","id"=>"raddress","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("raddress",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rwork_number"]=array("displayName"=>"Rwork Number","type"=>"text","name"=>"rwork_number","id"=>"rwork_number","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rwork_number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rhome_number"]=array("displayName"=>"Rhome Number","type"=>"text","name"=>"rhome_number","id"=>"rhome_number","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rhome_number",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rname1"]=array("displayName"=>"Rname1","type"=>"text","name"=>"rname1","id"=>"rname1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rname1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rrelationship1"]=array("displayName"=>"Rrelationship1","type"=>"text","name"=>"rrelationship1","id"=>"rrelationship1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rrelationship1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["raddress1"]=array("displayName"=>"Raddress1","type"=>"text","name"=>"raddress1","id"=>"raddress1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("raddress1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rwork_number1"]=array("displayName"=>"Rwork Number1","type"=>"text","name"=>"rwork_number1","id"=>"rwork_number1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rwork_number1",$defaultdata,$dummy),"readonly"=>"readonly");
$content_details_array["formelements"]["rhome_number1"]=array("displayName"=>"Rhome Number1","type"=>"text","name"=>"rhome_number1","id"=>"rhome_number1","class"=>"textalignleft","style","error","required"=>"","value"=>$teacherObj->setDefaultValue("rhome_number1",$defaultdata,$dummy),"readonly"=>"readonly");}

if($action == "edit"||$action=="add"||$action=="view")
{
        $content_details_array["formelements"]["id"]=array("type"=>"hidden","name"=>"id","id"=>"id",value=>$teacherObj->setDefaultValue("id",$defaultdata));
            }

if($action =="viewall"){
    $content_details_array["viewall"]["data"]=$teacherObj->curd();
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
    
    $content_details_array["viewall"]["columnnames"]=json_decode('["Id","User ","School Name","Subject Major","Year Completed","Percentage","School Name","Subject Major","Year Completed","Percentage","College Name","Subject Major","Year Completed","Percentage","College Name","Subject Major","Year Completed","Percentage","Name Of Employer","Address"," City","State","Pincode","Employment Dates From","Employment Dates To","Pay Rs","Name Of Immediate Superviser","Job Title Description Of Work","Reason For Leaving","Name","Relationship","Address","Work Number","Home Number","Name","Relationship","Address","Work Number","Home Number","Action"]');
}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>