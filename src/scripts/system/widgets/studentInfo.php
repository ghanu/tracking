<?php

include_once AppRoot . AppController . "system/c__widgetController.php";


$widgetObj = new c__widgetController();




$widgetObj->table = "sales_order";

//$data=$widgetObj->addWhereCondition("id_sales_order=".$_GET['id'])->select()->executeRead();
$data1 = $widgetObj->addLimit("5")->select()->executeRead();

include_once AppScriptURL.'jpgraph/src/jpgraph.php';
include_once AppScriptURL.'jpgraph/src/jpgraph_gantt.php';

$graph = new GanttGraph();

$graph->title->Set("Order Tracking Month Wise");

// Setup some "very" nonstandard colors
$graph->SetMarginColor('lightgreen@0.8');
$graph->SetBox(true,'yellow:0.6',2);
$graph->SetFrame(true,'darkgreen',4);
$graph->scale->divider->SetColor('yellow:0.6');
$graph->scale->dividerh->SetColor('yellow:0.6');

// Explicitely set the date range 
// (Autoscaling will of course also work)
$graph->SetDateRange('2013-06-04','2013-07-24');

// Display month and year scale with the gridlines
$graph->ShowHeaders(GANTT_HDAY | GANTT_HWEEK | GANTT_HMONTH);
$graph->scale->week->SetStyle(WEEKSTYLE_WNBR);
$graph->scale->month->grid->SetColor('gray');
$graph->scale->month->grid->Show(true);
$graph->scale->year->grid->SetColor('gray');
$graph->scale->year->grid->Show(true);


// Setup activity info

// For the titles we also add a minimum width of 100 pixels for the Task name column
$graph->scale->actinfo->SetColTitles(
    array('Po Number','Part Number','Actual MC','Actual Finish'),array(100));
$graph->scale->actinfo->SetBackgroundColor('green:0.5@0.5');
$graph->scale->actinfo->SetFont(FF_ARIAL,FS_NORMAL,10);
$graph->scale->actinfo->vgrid->SetStyle('solid');
$graph->scale->actinfo->vgrid->SetColor('gray');


$i=0;
foreach($data1 as $csv) {
  //print_r($csv);echo"<br><br>";
  $data[] = array($i,array($csv['po_number'],$csv['part_number'],$csv['actual_mc'],$csv['actual_finish']),$csv['actual_mc'],$csv['actual_finish'],FF_ARIAL,FS_NORMAL,8);
  $i++;
}
//	print_r($data);
//$data = $csvdata;
// Create the bars and add them to the gantt chart
for($i=0; $i<count($data); ++$i) {
	
	//$bar = new GanttBar($data[$i][0],$data[$i][1],date('Y-m-d', strtotime($data[$i][2])),date('Y-m-d', strtotime($data[$i][3])),"[".($i*10)."%]",15);
	$bar = new GanttBar($data[$i][0],$data[$i][1],date('Y-m-d', strtotime($data[$i][2])),date('Y-m-d', strtotime($data[$i][3])),$data[$i][5],15);
	
	
	if( count($data[$i])>4 )
		$bar->title->SetFont($data[$i][4],$data[$i][5],$data[$i][6]);
	$bar->SetPattern(BAND_RDIAG,"yellow");
	$bar->SetFillColor("gray");
	$bar->progress->Set(0.5);
	$bar->progress->SetPattern(GANTT_SOLID,"darkgreen");
	$graph->Add($bar);
}
unlink(AppRoot."/gantt1.jpg");
$graph->Stroke(AppRoot."/gantt1.jpg");
$imgp = 'gantt1.jpg';
$img = "<img src=".$imgp.">";
echo $img;


//echo $html;
//echo createHTMLTable($data);

?>
