<?php // content="text/plain; charset=utf-8"
// Example for use of JpGraph,
require_once ('../../src/jpgraph.php');
require_once ('../../src/jpgraph_bar.php');

// We need some data
$datay=array(100,98.75,100,96.43,100,100);
$datax=array("CH PP","CH PX","HP PP","HP PX","LP PP","LP PX");

// Setup the graph.
$graph = new Graph(400,240);
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
$graph->Stroke();
?>
