<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of formcreate
 *
 * @author gt
 */
define('AppRoot', dirname(dirname(dirname(__FILE__))));
include_once("../config/config.php");
include_once("../controller/cFormController.php");
include_once("../controller/cXMLController.php");
include_once("../smarty/Smarty.class.php");
$smarty = new Smarty();
$cFormCreate = new cFormController();
$xmlObj = new cXMLController();



$xmlObj->file = 'formdesigns/' . $_POST['page_settings']['tablenames'] . '_v2.xml';

if ($_POST['submit']) {

    unset($_POST['submit']);
    $cFormCreate->designerSource = $xmlObj->data = $_POST;

    $cFormCreate->createView();
    $cFormCreate->createScript();
    $cFormCreate->createController();

    $xmlObj->writeArrayToXML();

    file_put_contents(AppRoot . AppScriptURL . $_POST['page_settings']['tablenames'] . "_v2.php", $cFormCreate->scriptCode);

    file_put_contents(AppRoot . AppController . 'c' . ucwords($_POST['page_settings']['tablenames']) . "Controller_v2.php", $cFormCreate->controllerScript);
    file_put_contents(AppRoot . AppLocalizationURL . $_POST['page_settings']['tablenames'] . "_v2.lang", json_encode($cFormCreate->localizationStrings[AppLang]));

    file_put_contents($smarty->template_dir . "/" . $_POST['page_settings']['tablenames'] . "_v2.tpl", $cFormCreate->viewScript);



    echo "configuration saved successfully !!!!";
    exit;
} else {

    $data = $cFormCreate->getSelectData('information_schema.tables', 'table_name', array("TABLE_SCHEMA='" . DataBaseName . "'"), '1');
    $content_details_array["formelements"]["tablenames"] = array("displayName" => "Tables/Views", "name" => "page_settings[tablenames]", "id" => "tablenames", "class", "style", "error", "mandatory" => true, 'data' => $data, 'event' => 'onChange="this.form.submit()"', 'value' => $_POST['page_settings']['tablenames']);


    if ($_POST['page_settings']['tablenames']) {

        $saveddata = $xmlObj->readXmlFile();

        $current_table_name = $_POST['page_settings']['tablenames'];
        $columndata = $cFormCreate->getColumnDetails($_POST['page_settings']['tablenames']);



        $content_details_array["formelements"]["submit"] = array("name" => "submit", "id" => "submit", 'value' => 'Submit');

        $content_details_array["formelements"]["pagetitle"] = array("name" => "page_settings[pagetitle]", 'required' => 'required', 'value' => $saveddata->page_settings->pagetitle);
        $content_details_array["formelements"]["pageheading"] = array("name" => "page_settings[pageheading]", 'required' => 'required', 'value' => $saveddata->page_settings->pageheading);
        $content_details_array["formelements"]["viewallactions"] = array("name" => "page_settings[viewallactions]", 'value' => ($saveddata->page_settings->viewallactions ? urldecode($saveddata->page_settings->viewallactions) : '
            "<a href=\'"+AppURL+"index.php?file=' . $current_table_name . '&action=view&id="+ oObj.aData[0] +"\' >
                <img src=\'"+AppImgURL+"/view.png\' /></a>  
            <a href=\'"+AppURL+"index.php?file=' . $current_table_name . '&action=edit&id="+ oObj.aData[0] +"\' >
                <img src=\'"+AppImgURL+"/edit.png\' /></a>  
            <a href=\'"+AppURL+"index.php?file=' . $current_table_name . '&action=delete&id="+ oObj.aData[0] +"\' >
                <img src=\'"+AppImgURL+"/delete2.png\' /></a>'));
        $content_details_array["formelements"]["viewactions"] = array("name" => "page_settings[viewactions]", 'value' => urldecode($saveddata->page_settings->viewactions));
        $default_controls = array('text' => 'text', 'label' => 'Label', 'hidden' => 'hidden', 'select' => 'select', 'image' => 'image', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'radio' => 'radio', 'nocontrol' => 'No Control', 'camera' => 'Take Photo', 'readonly' => 'Read Only', 'textarea' => 'Text Area');
        $content_details_array["formelements"]["beforewrite"] = array("name" => "page_settings[beforewrite]", 'value' => urldecode($saveddata->page_settings->beforewrite));
        $content_details_array["formelements"]["afterwrite"] = array("name" => "page_settings[afterwrite]", 'value' => urldecode($saveddata->page_settings->afterwrite));
        $content_details_array["formelements"]["afterwrite"] = array("name" => "page_settings[dynamic_condition]", 'value' => urldecode($saveddata->page_settings->dynamic_condition));
        $content_details_array["formelements"]["afterwrite"] = array("name" => "page_settings[menu]", 'value' => urldecode($saveddata->page_settings->menu));


        /**
         * Controls
         */
        $default_controls = array('text' => 'text', 'select' => 'select', 'hidden' => 'hidden', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'date' => 'date', 'radio' => 'radio', 'camera' => 'Take Photo', 'readonly' => 'Read Only', 'textarea' => 'Text Area');
        $default_view_controls = array('label' => 'Label', 'date' => 'Date', 'hyperlink' => 'Hyper Link', 'image' => 'Image', 'file' => 'File', 'html' => 'HTML', 'audio' => 'Audio', 'video' => 'Video', 'custom' => 'Custom');

        $relational_controls = array('select' => 'select', 'multiselect' => 'Multi Select', 'checkbox' => 'checkbox', 'radio' => 'radio', 'readonly' => 'Read Only', 'hidden' => 'hidden');
        $intvalidations = array('number' => 'Number', 'no_validations' => 'No validations', 'pattern' => 'Pattern');
        $varcharvalidations = array('no_validations' => 'No validations', 'url' => 'URL', 'email' => 'Email', 'pattern' => 'pattern', 'color' => 'color', 'unique' => 'Unique from DB');
        $datevalidations = array('no_validations' => 'No validations', 'date' => "Date", "timestamp" => "Time Stamp", "date_timestamp" => "Date with Time Stamp", 'pattern' => 'pattern');
        $javascriptevents = array('date' => "Date", "timestamp" => "Time Stamp", "date_timestamp" => "Date with Time Stamp", 'pattern' => 'pattern');

        $dependencyArray = array_keys($columndata);
        unset($dependencyArray['0']);

        foreach ($dependencyArray as $key => $currentcolumn) {
            $temp[$currentcolumn] = $currentcolumn;
        }
        $dependencyArray = $temp;
        arsort($dependencyArray);
        $count = 0;
        foreach ($columndata as $columnName => $value) {
            $count++;
            $data = $default_controls;
            $defaultcontrol = 'text';
            if ($columnName != 'id') {

                if (is_array($value['referencetabledetails'])) {
                    $content_details_array["formelements"]['column'][$columnName]['reference_table'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->reference_table, $value['REFERENCED_TABLE_NAME']), "type" => "text", "readonly" => "readonly", "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][reference_table]");

                    $content_details_array["formelements"]['column'][$columnName]['addonfly'] = array("checked" => (setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->addonfly, "checked") != '' ? 'checked' : ''), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][addonfly]", 'type' => 'checkbox');

                    $content_details_array["formelements"]['column'][$columnName]['reference_column'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->reference_column, "", $saveddata), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][reference_column]");

                    $content_details_array["formelements"]['column'][$columnName]['reference_column_condition'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->reference_column_condition), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][reference_column_condition]");

                    $content_details_array["formelements"]['column'][$columnName]['reference_column_orderby'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->reference_column_order_by), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][reference_column_order_by]");
                    $defaultcontrol = 'select';
                }


                $validationdata = $varcharvalidations;
                $content_details_array["formelements"]['column'][$columnName]['details'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->display_name, makeDisplayName($columnName), $saveddata), "type" => "text", "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][display_name]", "id" => $columnName, 'reference_details' => $reference_details, 'required' => 'required');
                $content_details_array["formelements"]['column'][$columnName]['type'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->add_edit_type, $defaultcontrol), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][add_edit_type]", 'required' => 'required', 'data' => $data);
                $content_details_array["formelements"]['column'][$columnName]['view_type'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->view_type, "label"), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][view_type]", 'required' => 'required', 'data' => $default_view_controls);
                $content_details_array["formelements"]['column'][$columnName]['static_data'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->static_data), "type" => "text", "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][static_data]", "id" => $columnName . "_static_data");

                $content_details_array["formelements"]['column'][$columnName]['is_mandatory'] = array("checked" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->is_mandatory, "checked"), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][is_mandatory]", 'type' => 'checkbox');
                $content_details_array["formelements"]['column'][$columnName]['placeholder'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->placeholder), "type" => "text", "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][placeholder]");
                $content_details_array["formelements"]['column'][$columnName]['default_value'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->default_value), "type" => "text", "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][default_value]");
                $content_details_array["formelements"]['column'][$columnName]['formatting_type'] =
                        array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->data_formatting, "textalignleft"), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][data_formatting]", 'required' => 'required', 'data' => array("textalignleft" => "Align Left", "textalignright" => "Align right", "textalignjustify" => "Justify", "textformatbold" => "Bold", "textformatitalic" => "Italic", "textformatunderline" => "Underline"));

                $content_details_array["formelements"]['column'][$columnName]['validations'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->validation, "no_validations"), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][validation]", 'required' => 'required', 'data' => $validationdata);

                $content_details_array["formelements"]['column'][$columnName]['dependentshowhide_condition'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->javascript), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][javascript]");

                $content_details_array["formelements"]['column'][$columnName]['dependent'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->dependent), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][dependent]", 'data' => $dependencyArray_temp);

                $content_details_array["formelements"]['column'][$columnName]['dependent_query'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->dependent_query), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][dependent_query]");


                $content_details_array["formelements"]['column'][$columnName]['viewallcolumns'] = array("checked" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->viewallcolumns, "checked"), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][viewallcolumns]", 'type' => 'checkbox');



                $content_details_array["formelements"]['column'][$columnName]['pattern'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->validation_pattern_value), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][validation_pattern_value]");
                $content_details_array["formelements"]['column'][$columnName]['min'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->min), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][min]");
                $content_details_array["formelements"]['column'][$columnName]['max'] = array("value" => setDefaultValues($saveddata->tables->{$current_table_name}->columns->{$columnName}->max), "name" => "tables[" . $current_table_name . "][columns][" . $columnName . "][max]");
            }
        }
        $content_details_array["formelements"]["designer"] = array("name" => "tables[" . $current_table_name . "][layout]", 'value' => setDefaultValues($saveddata->tables->{$current_table_name}->layout, createLayout($columndata)), "id" => "layout");
    }

    $smarty->assign('AppCssURL', AppCssURL);
    $smarty->assign('AppImgURL', AppImgURL);
    $smarty->assign('AppJsURL', AppJsURL);
    $smarty->assign('AppTheme', AppTheme);
    $smarty->assign('AppThemeCss', AppThemeCss);
    $smarty->assign('AppThemeJs', AppThemeJs);
    $smarty->assign('AppJqueryTheme', AppJqueryTheme);
    $smarty->assign('AppThemeImg', AppThemeImg);
    $smarty->assign('columns', $columns);
    $smarty->assign('current_table_name', $current_table_name);
    $smarty->assign('content_details_array', $content_details_array);

    $smarty->display(AppTheme . 'header.tpl');
    $smarty->display('formcreatev2.tpl');
    $smarty->display(AppTheme . 'footer.tpl');
    
}

function makeDisplayName($columnName) {
    return ucwords(str_replace('_', ' ', $columnName));
}

function setDefaultValues($savedcolumndata, $default="") {
    return $savedcolumndata ? $savedcolumndata : $default;
}

function createLayout($columnDetails) {


    $formDetails = '<table>';
    foreach ($columnDetails as $columnName => $value) {
        if ($columnName != 'id') {
            $formDetails.='<tr>';
            $formDetails.='<td>' . '<input type="readonly" style="border-color:green;font-weight:bold;" id="' . $columnName . '_label" value="{' . $columnName . '_label}" > ' . '</td>';
            $formDetails.='<td>' . '<input type="readonly" style="background-color:yellow;border-color:black;text-color:white" id="' . $columnName . '" value="[' . $columnName . ']" />' . '</td>';
            $formDetails.='</tr>';
        }
    }
    $formDetails.="</table>";
    
    return $formDetails;
}

?>
