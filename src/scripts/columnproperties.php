<?php

//@todo Please add the wrapper function to set the properties of each column in run time 
include_once AppRoot . AppController . 'cReportController.php';
include_once AppRoot . AppController . 'cGridController.php';
$reportControllerObj = new cReportController();

list($action,$value)=explode('_',$_GET['action']);
$reportControllerObj->setColumnProperties($_GET['cid'],$action,$value);


?>
