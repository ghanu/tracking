<?php

include_once AppRoot . AppController . "cMpayment_modeController.php";

$mpayment_modeObj = new cmpayment_modeController();

$action = $_POST["action"] ? $_POST["action"] : $_GET["action"];

if ($_POST) {
    unset($_POST["action"]);
    if ($action == "add") {
        unset($_POST["id"]);
    }
    $content_details_array["page"] = $mpayment_modeObj->curd($action, $_POST["id"]);

    if ($action == "delete") {
        redirect("home");
    }
} elseif ($get["id"]) {
    $id = $get["id"];
    if ($action == "view" || $action == "edit" || $action == "delete") {

        $defaultdata = $mpayment_modeObj->curd("view", $get["id"]);
        $defaultdata = $defaultdata[0];
    }
}


$content_details_array["page"][heading] = "{$id} - Payment Mode";

$content_details_array["page"][title] = ucwords("{$action} Payment Mode");


//ADD OR EDIT
if ($action == 'add' || $action == 'edit') {
    $content_details_array["formelements"]["payment_mode_name"] = array("type" => "text", "name" => "payment_mode_name", "id" => "payment_mode_name", "class", "style", "error", "required" => "required", "value" => $mpayment_modeObj->setDefaultValue("payment_mode_name", $defaultdata), "pattern" => "");
}

//VIEW OR DELETE
if ($action == 'view' || $action == 'delete') {
    $content_details_array["formelements"]["payment_mode_name"] = array("type" => "text", "name" => "payment_mode_name", "id" => "payment_mode_name", "value" => $mpayment_modeObj->setDefaultValue("payment_mode_name", $defaultdata), "readonly" => "readonly");
}

if ($action == 'edit') {

    $content_details_array["formelements"]["id"] = array("type" => "hidden", "name" => "id", "id" => "id", value => $mpayment_modeObj->setDefaultValue("id", $defaultdata));
    $content_details_array["form"]['action'] = $action;
}
?>