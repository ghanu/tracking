<?php

 include_once AppRoot.AppController.'cReportController.php';
 $reportControllerObj=new cReportController();
 $reportControllerObj->cid=$_GET['cid'];
 if($_GET['type']==''){


     $reportControllerObj->rows=$_GET['rows'];
     $reportControllerObj->page=$_GET['page'];
     $reportControllerObj->sortBy=$_GET['sidx'] ? $_GET['sidx'].' '.$_GET['sord'] : '';


     if($_GET['_search']){
         $filters=json_decode($_GET['filters']);
         if($filters->rules){
             foreach($filters->rules as $key=>$filterObj){

                 $reportControllerObj->dynamicCondition[]=$reportControllerObj->generateSQLCondition($filterObj->field,$filterObj->op,$filterObj->data);
             }
         }
     }

     $reportControllerObj->getReportDataDetails();


     $response->page=$reportControllerObj->metaData['page'];
     $response->total=$reportControllerObj->metaData['total'];
     $response->records=$reportControllerObj->metaData['count'];

     if($reportControllerObj->metaData['count']>0){
         foreach($reportControllerObj->data as $key=>$row){


             $response->rows[$key]['cell']=array_values($row);
         }
     }
     echo json_encode($response);
 }else{
     if($_GET['_search']){
         $filters=json_decode($_GET['filters']);
         if($filters->rules){
             foreach($filters->rules as $key=>$filterObj){

                 $reportControllerObj->dynamicCondition[]=$reportControllerObj->generateSQLCondition($filterObj->field,$filterObj->op,$filterObj->data);
             }
         }
     }

     if($_GET['type']=='chart'){
         $reportControllerObj->getChartDetails();
     }else{
         $reportControllerObj->getReportDataDetails();
     }

     echo json_encode($reportControllerObj->data);

 }
?>
