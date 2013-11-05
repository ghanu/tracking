<?php

 $reportPageType = $_GET['type'];
if ($reportPageType == 'report') {
    $smarty->assign('reportPageType',$reportPageType); 
} else {
    include_once AppRoot . AppController . 'cReportController.php';
    
    $reportControllerObj = new cReportController();
    $reportControllerObj->cid = $_GET['id'];
    $reportControllerObj->getReportSchemaDetails();
    if ($reportControllerObj->reportType == 'normal' || $reportControllerObj->reportType == 'summary') {

        include_once AppRoot . AppController . 'cGridController.php';
        $gridControllerObj = new cGridController();
        $gridControllerObj->gridId = 'geogrid';
//     $gridControllerObj->properties['caption']=$reportControllerObj->customizationName.'['.$reportControllerObj->reportName.']';
        $gridControllerObj->properties['url'] = 'index.php?dataType=json&file=data&cid=' . $_GET['id'];
        $gridControllerObj->properties['sortorder'] = 'desc';
        $gridControllerObj->properties['altRows'] = 'true';
        $gridControllerObj->properties['height'] = '500';
        $gridControllerObj->properties['autowidth'] = 'true';
        $gridControllerObj->properties['datatype'] = 'json';
        $gridControllerObj->properties['mtype'] = 'GET';
        $gridControllerObj->properties['pager'] = 'pagerbar';
        $gridControllerObj->properties['viewrecords'] = 'true';
// sortable: true,
        $gridControllerObj->properties['sortable'] = 'true';


//     $gridControllerObj->properties['toolbar']='top';
//     $gridControllerObj->properties['toolbar_content_top']="<span id='toolbar' class=''><button title='Add or Remove Columns' >Show / Hide Columns</button></span>";
// toolbar: [true,"bottom"],
//print_r($reportControllerObj->reportCustomizationDetails);
//          (
//            [iColumnCustomizationId] => 1
//            [vDisplayName] => invid
//            [vDataFormat] => 
//            [vStyleDetails] => 
//            [vMathFunction] => 
//            [bIsVisible] => 0
//            [bIsGroup] => 0
//            [iDisplayOrder] => 1
//            [vDbColumnName] => invid
//            [vScriptVariableName] => invid
//            [vDataType] => integer
//            [tCondition] => 
//        )

        foreach ($reportControllerObj->reportCustomizationDetails as $key => $value) {
            $gridControllerObj->properties['colNames'].="'" . $value['vDisplayName'] . "',";
            $gridControllerObj->properties['sortname'] = $gridControllerObj->properties['sortname'] ? $gridControllerObj->properties['sortname'] : $value['vScriptVariableName'];
            $gridControllerObj->properties['colModel'][].='{name:"' . $value['vScriptVariableName'] . '",index:"' . $value['vScriptVariableName'] . '",width:172,datatype:"' . $value['vDataType'] . '"}';
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['name'] = $value['iColumnCustomizationId'];
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['align'] = $value['vAlign'];
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['classes'] = '';
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['datefmt'] = $value['vDataFormat'];
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['defval'] = '';
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['firstsortorder'] = 'asc';
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['formoptions'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['formatoptions'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['formatter'
//                
//                
//                
//                
//                
//                ] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['hidedlg'] = $value['vScriptVariableName'];
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['index'] = $value['vScriptVariableName'];
            $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['sorttype'] = $value['vDataType'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['surl'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['width'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['sortable'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['stype'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['edittype'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['edittable'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['editrules'] = $value['vScriptVariableName'];
//                $gridControllerObj->properties['columnDetails'][$value['vScriptVariableName']]['editoptions'] = $value['vScriptVariableName'];
//     if($value['vStyleDetails'])
//        $gridControllerObj->properties['colModel']['align']=$value['vStyleDetails'];
        }

        $gridControllerObj->properties['colNames'] = rtrim($gridControllerObj->properties['colNames'], ',');
//        $gridControllerObj->properties['colModel'] = implode(',', $gridControllerObj->properties['colModel']);
        $gridControllerObj->createGrid();
        $gridControllerObj->js.='jQuery("#toolbar :first").button().click(function(e){jQuery("#' . $gridControllerObj->gridId . '").jqGrid("setColumns");e.preventDefault();}).next().button().click(function(){alert("Coming Soon !!!!!!")});';
        $js = $gridControllerObj->js;
        $html = $gridControllerObj->html;
    } elseif ($reportControllerObj->reportType == 'crosstab') {
        $crosstabArray = $reportControllerObj->getCrossTabDetails();
    } elseif ($reportControllerObj->reportType == 'chart') {
        
    }

    $smarty->assign('gridJsScript', $js);
    $smarty->assign('gridHTML', $html);
    $smarty->assign('reportType', $reportControllerObj->reportType);
    $smarty->assign('customizationId', $reportControllerObj->cid);
    $smarty->assign('formName', $reportControllerObj->customizationName . '[' . $reportControllerObj->reportName . ']');
}
?>
