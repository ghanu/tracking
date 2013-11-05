<?php
include_once AppRoot . AppController . "cTime_table_settingsController.php";

$time_table_settingsObj = new ctime_table_settingsController();

$action = $get["action"] ? $get["action"] : "viewall";
$time_table_settingsObj->id = $id = $get["id"];

if ($post) {
    $post["no_of_days"] = count($post["week_days"]);
    $post["week_days"] = json_encode($post["week_days"]);
    $time_table_settingsObj->action = $post["formaction"];
    $content_details_array["page"] = $time_table_settingsObj->curd();
    $time_table_settingsObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("time_table_settings&id=" . $time_table_settingsObj->id . "&action=view");
    } else {
        $data = $time_table_settingsObj->getSelectData($get["file"], $get["columns"], "id=" . $time_table_settingsObj->id, "");
        echo json_encode($data);
        exit;
    }
} else {

    if ($action == "view" || $action == "edit") {
        $time_table_settingsObj->action = "view";

        $defaultdata = $time_table_settingsObj->curd();
        $defaultdata = $defaultdata[0];
    }
}


$time_table_settingsObj->beforeWrite();

$content_details_array["page"]["request_type"] = $get["dataType"];

$content_details_array["page"]["action"] = $get["action"];

$content_details_array["page"]["heading"] = ucwords("Time table Settings");

$content_details_array["page"]["title"] = ucwords("Time table Settings");

if ($action == "add" || $action == "edit") {
    $content_details_array["formelements"]["no_of_periods"] = array("displayName" => "No Of Periods", "type" => "text", "name" => "no_of_periods", "id" => "no_of_periods", "class", "style", "error", "required" => "required", "value" => $time_table_settingsObj->setDefaultValue("no_of_periods", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");

    $content_details_array["formelements"]["no_of_days"] = array("displayName" => "No Of Days", "type" => "number", "name" => "no_of_days", "id" => "no_of_days", "class", "style", "error", "required" => "required", "value" => $time_table_settingsObj->setDefaultValue("no_of_days", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");
    $selectboxdata = array("1" => "Sunday", "2" => "Monday", "3" => "Tuesday", "4" => "Wednesday", "5" => "Thursday", "6" => "Friday", "7" => "Saturday");
    $content_details_array["formelements"]["week_days"] = array("displayName" => "Week Days", "type" => "multiselect", "name" => "week_days", "id" => "week_days", "class", "style" => "width:550px;height:150px;", "nodefaulttext" => true, "error", "required" => "required", "data" => $selectboxdata, "value" => $time_table_settingsObj->setDefaultValue("week_days", $defaultdata), "addonfly" => "", "multiple" => "true");


    $content_details_array["formelements"]["last_updated"] = array("displayName" => "Last Updated", "type" => "hidden", "name" => "last_updated", "id" => "last_updated", "class", "style", "error", "required" => "", "value" => $time_table_settingsObj->setDefaultValue("last_updated", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");

    $content_details_array["formelements"]["user_id"] = array("displayName" => "User Id", "type" => "hidden", "name" => "user_id", "id" => "user_id", "class", "style", "error", "required" => "", "value" => $time_table_settingsObj->setDefaultValue("user_id", $defaultdata, $dummy), "max" => "", "min" => "", "pattern" => "");
}

if ($action == "view") {
    $content_details_array["page"]["viewactions"] = '';
    $content_details_array["formelements"]["no_of_periods"] = array("displayName" => "No Of Periods", "type" => "text", "name" => "no_of_periods", "id" => "no_of_periods", "class" => "textalignleft", "style", "error", "required" => "required", "value" => $time_table_settingsObj->setDefaultValue("no_of_periods", $defaultdata, $dummy), "readonly" => "readonly");
    $content_details_array["formelements"]["no_of_days"] = array("displayName" => "No Of Days", "type" => "text", "name" => "no_of_days", "id" => "no_of_days", "class" => "textalignleft", "style", "error", "required" => "required", "value" => $time_table_settingsObj->setDefaultValue("no_of_days", $defaultdata, $dummy), "readonly" => "readonly");
    
    $content_details_array["formelements"]["week_days"] = array("type" => "text", "name" => "week_days", "id" => "week_days", "value" => implode(',',json_decode($time_table_settingsObj->setDefaultValue("week_days", $defaultdata, "", $selectboxdata))));

    $content_details_array["formelements"]["last_updated"] = array("displayName" => "Last Updated", "type" => "hidden", "name" => "last_updated", "id" => "last_updated", "class" => "textalignleft", "style", "error", "required" => "", "value" => $time_table_settingsObj->setDefaultValue("last_updated", $defaultdata, $dummy), "readonly" => "readonly");
    $content_details_array["formelements"]["user_id"] = array("displayName" => "User Id", "type" => "hidden", "name" => "user_id", "id" => "user_id", "class" => "textalignleft", "style", "error", "required" => "", "value" => $time_table_settingsObj->setDefaultValue("user_id", $defaultdata, $dummy), "readonly" => "readonly");
}

if ($action == "edit" || $action == "add" || $action == "view") {
    $content_details_array["formelements"]["id"] = array("type" => "hidden", "name" => "id", "id" => "id", value => $time_table_settingsObj->setDefaultValue("id", $defaultdata));
}

if ($action == "viewall") {
    $content_details_array["viewall"]["data"] = $time_table_settingsObj->curd();
    $content_details_array["viewall"]["colcount"] = count($content_details_array["viewall"]["data"][0]);
    $content_details_array["viewall"]["rowcount"] = count($content_details_array["viewall"]["data"]);

    $content_details_array["viewall"]["columnnames"] = json_decode('["Id","No Of Periods","No Of Days","Week Days","Last Updated","User Id","Action"]');
}
?><script>
    var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>