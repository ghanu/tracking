<?php include_once AppRoot . AppController . "cEnqueryController.php";

$pre_admissionObj = new cEnqueryController();

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

$content_details_array["page"]["heading"]=ucwords("Enquiry Report");

$content_details_array["page"]["title"]=ucwords("Enquiry Report");


if($action =="viewall"){
    
	 $html="<div class='summary'><div class='pivot_table'>";

$html.="<br/>
<table class='formbox mytable' width=100%>
<tr bgcolor='green' style='color:white; border:1px solid green;'>
    <td><b>Item Cat</td><td><b>PO Type</td><td><b>Sum of Value</td><td><b>Average of OTD</td>
</tr><tr/>
<tr>
    <td rowspan='2'><b>CH </td><td><b>PP</td><td align='right'><b>33</td><td align='right'><b>100 %</td>
</tr><tr/><tr/>
<tr>
<td ><b>CH  </td><td><b>PX</td><td align='right'><b>15</td><td align='right'><b>98.75 %</td>
</tr>
<tr>
   <td align='right'><b>CH Total :</td><td><b></td><td align='right'><b>48</td><td align='right'><b>99.41 %</td>
<tr/>
<tr>
    <td ><b>HP </td><td><b>PP</td><td align='right'><b>14</td><td align='right'><b>96.43 %</td>
</tr><tr/>

    <td ><b>HP </td><td><b>Px</td><td align='right'><b>42</td><td align='right'><b>96.22 %</td>
</tr><tr/>


<tr/>
    <td align='right'><b>HP Total: </td><td><b>Px</td><td align='right'><b>56</td><td align='right'><b>97.22 %</td>
</tr><tr/>

<tr>
    <td ><b>LP </td><td><b>PP</td><td align='right'><b>51</td><td align='right'><b>100 %</td>
</tr><tr/>

    <td ><b>LP </td><td><b>Px</td><td align='right'><b>29</td><td align='right'><b>100 %</td>
</tr><tr/>


<tr/>
    <td align='right'><b>HP Total: </td><td><b>Px</td><td align='right'><b>56</td><td align='right'><b>97.22 %</td>
</tr><tr/>



<tr bgcolor='green' style='color:white'>
    <td ><b>Grand Total</td><td><b></td><td align='right'><b>184</td><td align='right'><b>98.95 %</td>
</tr><tr/>

</table>    

</td></tr>";
$html.="</div>";
createGraph();

$imgp = 'bar-chart.jpg';
//$img = "<img src=".$imgp.">";

$html .="<div class='pivot_chart'><img src=".$imgp."></div></div>";

$content_details_array ["output"] = $html;

    $content_details_array["viewall"]["data"]=$pre_admissionObj->curd();
	//$content_details_array["viewall"]["data"]=$csvdata;
    $content_details_array["viewall"]["colcount"]=count($content_details_array["viewall"]["data"]);
    $content_details_array["viewall"]["rowcount"]=count($content_details_array["viewall"]["data"]);
  
   $content_details_array["viewall"]["columnnames"]=json_decode('["Order No","Customer","NO","Part No","Order Date","Due Date","Nav Material","Description","Order Qty",
   "Deli. Qty","Bal. Qty","Shipped Qty","Shippment Date","Req. Del. Date","Status"]');
   $data["content"] = createHTMLTable($content_details_array["viewall"]["data"]);

}

$_SESSION['login_name']=$_POST['login_name'];


function createGraph() {

require_once (AppScriptURL.'/jpgraph/src/jpgraph.php');
require_once (AppScriptURL.'jpgraph/src/jpgraph_bar.php');

// We need some data
$datay=array(100,98.75,100,96.43,100,100);
$datax=array("CH PP","CH PX","HP PP","HP PX","LP PP","LP PX");

// Setup the graph.
$graph = new Graph(600,340);
$graph->img->SetMargin(60,20,35,75);
$graph->SetScale("textlin","94","101");
$graph->SetMarginColor("lightblue:1.1");
$graph->SetShadow();

// Set up the title for the graph
$graph->title->Set("2013 OTD Details");
$graph->title->SetMargin(8);
$graph->title->SetFont(FF_VERDANA,FS_BOLD,12);
$graph->title->SetColor("darkred");

// Setup font for axis
$graph->xaxis->SetFont(FF_VERDANA,FS_NORMAL,10);
$graph->yaxis->SetFont(FF_VERDANA,FS_NORMAL,10);

// Show 0 label on Y-axis (default is not to show)
$graph->yscale->ticks->SupressZeroLabel(false);

// Setup X-axis labels
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(50);

// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.6);

// Setup color for gradient fill style
$bplot->SetFillGradient("green:0.65","green:1.85",GRAD_LEFT_REFLECTION);

// Set color for the frame of each bar
$bplot->SetColor("white");
$graph->Add($bplot);
//$graph->SetYScale('lin','95','101');
// Finally send the graph to the browser
unlink(AppRoot."/bar-chart.jpg");
$graph->Stroke(AppRoot."/bar-chart.jpg");


}


 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>