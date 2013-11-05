<?php

include_once AppRoot . AppController . "cReportController.php";
include_once AppRoot . AppController . "cXMLController.php";
$xmlObj=new cXMLController();
$reportObj = new cReportController();
$parameters = $post ? $post : $get;

$reportObj->id = $get['id'];
$reportObj->getReportDetails();

$reportObj->report_format = $parameters['format'] ? $parameters['format'] : 'html';

unset($parameters['file'], $parameters['id'], $parameters['format']);
$reportObj->parameters = $parameters;
if ($reportObj->id == "3") {
    $reportObj->getReportFilter();
    if (is_array($post)) {
        $filters = array_keys($reportObj->filters);
        foreach ($filters as $filter_name) {

            if ($post[$filter_name] != "" || $post[$filter_name . "_date"] != "") {
                $reportObj->filters[$filter_name]['selectedvalue'] = $post[$filter_name] ? $post[$filter_name] : $post[$filter_name . "_date"];
            }
        }
    }
}
$reportObj->generateReport();
$content_details_array['page']['report']['filters'] = $reportObj->filters;


libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->preserveWhiteSpace = false;
$doc->loadHTML($reportObj->result);
$xmlObj->data = $doc->getElementsByTagName("body")->item(0);

//simplexml_import_dom($b)->asXML()
$content_details_array['page']['report']['data'] = $xmlObj->DOMinnerHTML();
$content_details_array['page']['report']['variables'] = $reportObj->reportvariables;
?>
