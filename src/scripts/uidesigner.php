<?php

include_once(AppRoot . AppController . "cXMLController.php");
include_once(AppRoot . AppController . "cFormController.php");

$cformCreate = new cFormController();
$xmlObj = new cXMLController();
if ($post['tablenames']) {

    $xmlObj->file = AppRoot . "/" . IncDir . 'admin/formdesigns/' . $_POST['tablenames'] . '_test.xml';
}

if ($_POST['viewactions']) {
    print_r($_POST['viewactions']);

}

$data = $cformCreate->getSelectData('information_schema.tables', 'table_name', array("TABLE_SCHEMA='" . DataBaseName . "'"), '1');
$content_details_array["formelements"]["tablenames"] = array("displayName" => "Tables/Views", "name" => "tablenames", "id" => "tablenames", "class", "style", "error", "mandatory" => true, 'data' => $data, 'event' => 'onChange="this.form.submit()"', 'value' => $_POST['tablenames']);

if ($post['tablenames']) {
    $fileDetailsArray = $xmlObj->xmlstrToArray();
    $table_list = array_keys($fileDetailsArray['tables']);
    $columns_details = $fileDetailsArray['tables'][$table_list[0]]['columns'];
    $formelements = '<div id="available_controls" contentEditable=false style="background-color:#ffaaff";height:150px;> Available Controls </br>';
    foreach ($columns_details as $column => $value) {
        $formelements.='<input type="readonly" style="border-color:green;font-weight:bold;" id="' . $column . '_label" value="{' . $column . '_label}" > ';
        $formelements.='<input type="readonly" style="background-color:yellow;border-color:black;text-color:white" id="' . $column . '" value="[' . $column . ']" />';
    }
    $formelements .= '</div><div id="layout" style="height:300px;background-color:green"></br></div>';
    $content_details_array["formelements"]["submit"] = array("name" => "button", 'value' => 'Submit', "event"=>"onclick='getPageDesign()'");
    $content_details_array["formelements"]["designer"] = array("name" => "viewactions", 'value' => $formelements);
}
?>
