<?php include_once AppRoot . AppController . "cSales_orders_trackingController.php";

$pre_admissionObj = new cSales_orders_trackingController();

$action = $get["action"]?$get["action"]:"viewall";
    $pre_admissionObj->id = $id = $get["id"]; 

if($post){
    
$pre_admissionObj->action = $post["formaction"];
    $content_details_array["page"] = $pre_admissionObj->curd();
    $pre_admissionObj->afterWrite();
    if ($get["dataType"] == "") {
        redirect("pre_admission&id=".$pre_admissionObj->id."&action=view");
    }else{
    $data=$pre_admissionObj->getSelectData($get["file"], $get["columns"], "id=".$pre_admissionObj->id, "");
        echo json_encode($data);
        exit;
    }
    
} else {
    
     if ($action == "view" || $action == "edit") {
     
        if($action == "edit"){
            $pre_admissionObj->action = "editview";
         }else{
            $pre_admissionObj->action = "view";
         }
     
        
        $defaultdata = $pre_admissionObj->curd();
        $defaultdata = $defaultdata[0];
    } elseif ($action == "delete") {
    $pre_admissionObj->action=$action;
    $content_details_array["page"] = $pre_admissionObj->curd();
    redirect("pre_admission&action=viewall");
    }
    
}


$pre_admissionObj->beforeWrite();

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("Gantt Chart");

$content_details_array["page"]["title"]=ucwords("Gantt Chart");




if($action =="viewall"){

   

     $array [0] = array('application_no' => 23, 'how_did_you_heard_about_us' => 'GE Vetco Gray','child_name' => '31/8/2012',
	 'child_date_of_birth' => 'PX16915','class_to_be_admitted'=> '2','parent_name' => 'A110004-66APA1', 'mail' => 'A','mobile' => 'FGGE01-0033','date_of_issue' => 'CONNECTOR-WELLHEAD PART,HT-H4','date_of_returning' => '4','amount_paid' => 'LOWER2BODY' ,'payment_mode' => '18-3/4','cheque_no' => '2', 'bank_name' => '100002' ,'bill_no' => '0001','date_of_pre_screening' => '30/03/2012');
	 
    $array [1] = array('application_no' => 23, 'how_did_you_heard_about_us' => 'GE Vetco Gray','child_name' => '31/8/2012',
	 'child_date_of_birth' => 'PX16915','class_to_be_admitted'=> '2','parent_name' => 'A110004-66APA1', 'mail' => 'A','mobile' => 'FGGE01-0033','date_of_issue' => 'CONNECTOR-WELLHEAD PART,HT-H4','date_of_returning' => '4','amount_paid' => 'LOWER2BODY' ,'payment_mode' => '18-3/4','cheque_no' => '2', 'bank_name' => '100002' ,'bill_no' => '0001','date_of_pre_screening' => '30/03/2012');
	 
     $csvdata = csvRead();//print_r($csvdata[0]);
	 
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
$graph->SetDateRange('2012-05-04','2012-05-31');

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
    array('Seq. Text','Work Center','Start','Finish'),array(100));
$graph->scale->actinfo->SetBackgroundColor('green:0.5@0.5');
$graph->scale->actinfo->SetFont(FF_ARIAL,FS_NORMAL,10);
$graph->scale->actinfo->vgrid->SetStyle('solid');
$graph->scale->actinfo->vgrid->SetColor('gray');

// Data for our example activities
$data1 = array(
	array(0,array("Pre-study","102 days","23 Nov '01","1 Mar '02")
	      , "2001-11-23","2002-03-1",FF_ARIAL,FS_NORMAL,8),
	array(1,array("Prototype","21 days","26 Oct '01","16 Nov '01"),
	      "2001-10-26","2001-11-16",FF_ARIAL,FS_NORMAL,8),
	array(2,array("Report","12 days","1 Mar '02","13 Mar '02"),
	      "2002-03-01","2002-03-13",FF_ARIAL,FS_NORMAL,8),
	array(3,array("Pre-study","102 days","23 Nov '01","1 Mar '02")
	      , "2001-11-23","2002-03-1",FF_ARIAL,FS_NORMAL,8),
	array(4,array("Prototype","21 days","26 Oct '01","16 Nov '01"),
	      "2001-10-26","2001-11-16",FF_ARIAL,FS_NORMAL,8),
	array(5,array("Report","12 days","1 Mar '02","13 Mar '02"),
	      "2002-03-01","2002-03-13",FF_ARIAL,FS_NORMAL,8)
);
//print_r($data1);

//echo "<br>";

$csvdata = csvRead();//	r
//int_r($csvdata);exit;
$i=0;
//print_r($csvdata);	
foreach($csvdata as $csv) {
 // print_r($csv[0]);
 // $data[] = array($i,array($csv[0],$csv[1],$csv[2],$csv[3]),$csv[2],$csv[3],FF_ARIAL,FS_NORMAL,8);
  $i++;
}
  $data1 = $pre_admissionObj->curd();
$i=0;
foreach($data1 as $csv) {
  //print_r($csv);echo"<br><br>";
  $data[] = array($i,array($csv['operation_text'],$csv['work_center'],$csv['start_date'],$csv['end_date']),$csv['start_date'],$csv['end_date'],FF_ARIAL,FS_NORMAL,8);
  $i++;
}
//	print_r($data);
//$data = $csvdata;
// Create the bars and add them to the gantt chart
for($i=0; $i<count($data); ++$i) {
	
	//$bar = new GanttBar($data[$i][0],$data[$i][1],date('Y-m-d', strtotime($data[$i][2])),date('Y-m-d', strtotime($data[$i][3])),"[".($i*10)."%]",15);
	$bar = new GanttBar($data[$i][0],$data[$i][1],date('Y-m-d', strtotime($data[$i][2])),date('Y-m-d', strtotime($data[$i][3])),"",15);
	
	
	if( count($data[$i])>4 )
		$bar->title->SetFont($data[$i][4],$data[$i][5],$data[$i][6]);
	$bar->SetPattern(BAND_RDIAG,"yellow");
	$bar->SetFillColor("gray");
	$bar->progress->Set(0.5);
	$bar->progress->SetPattern(GANTT_SOLID,"darkgreen");
	$graph->Add($bar);
}
unlink(AppRoot."/src/img/gantt.jpg");
$graph->Stroke(AppRoot."/src/img/gantt.jpg");



}
function csvRead() {

		//define('CSV_PATH','/home/developer/Documents/');

		// path where your CSV file is located

		 
$csv_file = AppRoot.AppScriptURL;
		$csv_file .="gantt.csv"; // Name of your CSV file
		//print_r($csv_file);
		if(file_exists($csv_file)) {

		$csvfile = fopen($csv_file, 'r');

		$theData = fgets($csvfile);

		$i = 0;
$csv_array = array();
		while (!feof($csvfile)) {

		$csv_data[] = fgets($csvfile, 1024);

		$csv_array[] = explode(",", $csv_data[$i]);
	
		$i++;
if($i==8){break;}
		}

		fclose($csvfile);
		return $csv_array;
}
else
{
echo "file not found";
}
}




 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>
