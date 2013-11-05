<?php
include_once AppRoot . AppController . "cTime_tableController.php";

$time_tableObj = new ctime_tableController();

$action = $get["action"] ? $get["action"] : "viewall";
$time_tableObj->id = $id = $get["id"];

if ($post) {

    $time_tableObj->action = $post["formaction"];
    $content_details_array["page"] = $time_tableObj->curd();
    $time_tableObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("time_table&id=" . $time_tableObj->id . "&action=view");
    } else {
        $data = $time_tableObj->getSelectData($get["file"], $get["columns"], "id=" . $time_tableObj->id, "");
        echo json_encode($data);
        exit;
    }
} else {

    if ($action == "view" || $action == "edit") {
        $time_tableObj->action = "view";

        $defaultdata = $time_tableObj->curd();
        $defaultdata = $defaultdata[0];
    }
}


$time_tableObj->beforeWrite();

$content_details_array["page"]["request_type"] = $get["dataType"];

$content_details_array["page"]["action"] = $get["action"];

$content_details_array["page"]["heading"] = ucwords("Time Table");

$content_details_array["page"]["title"] = ucwords("Time Table");

    $class_section_relation = $time_tableObj->getSelectData('class_section_relation', 'id,concat((select class from mclass where id=class_id),\' - \',(select section from sections where id=section_id)) as col2', '', 'class_id,section_id');
    
    $content_details_array["formelements"]["class"] = $class_section_relation;

    $content_details_array["formelements"]["branch_id"] = array("displayName" => "Branch Id", "type" => "hidden", "name" => "branch_id", "id" => "branch_id", "class", "style", "error", "required" => "", "value" => $time_tableObj->setDefaultValue("branch_id", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");
    $content_details_array["formelements"]["subject_id"] =$time_tableObj->getSelectData('subjects', 'id,name', '', 'name');
    
    
     


    $content_details_array["formelements"]["last_updated"] = array("displayName" => "Last Updated", "type" => "hidden", "name" => "last_updated", "id" => "last_updated", "class", "style", "error", "required" => "", "value" => $time_tableObj->setDefaultValue("last_updated", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");

    $content_details_array["formelements"]["status"] = array("displayName" => "Status", "type" => "hidden", "name" => "status", "id" => "status", "class", "style", "error", "required" => "", "value" => $time_tableObj->setDefaultValue("status", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");

?><script>
     var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>