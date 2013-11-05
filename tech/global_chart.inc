<?php
//created by G.M.Sundar
//on 10/05/2008
//Description:Used to create graph(swf)


/**
 * This class manages all functions of the open flash chart api.
 */
class cGraph
{
	/**
	* Constructer for the open_flash_chart_api
	* Sets our default variables
	*/
	function cGraph()
	{
		$this->data_sets = array();
		$this->id="graph1";
		$this->variables=array();
		$this->data = array();
		$this->links = array();
		$this->width = 250;
		$this->height = 200;
		$this->js_path = 'js/';
		$this->swf_path = '../images/chart.swf';
		$this->x_labels = array();
		$this->y_min = '';
		$this->y_max = '';
		$this->x_min = '';
		$this->x_max = '';
		$this->y_steps = '';
		$this->title = '';
		$this->title_style = '';
		$this->occurence = 0;

		$this->x_offset = '';

		$this->x_tick_size = -1;

		$this->y2_max = '';
		$this->y2_min = '';

		// GRID styles:
		$this->x_axis_colour = '';
		$this->x_axis_3d = '';
		$this->x_grid_colour = '';
		$this->x_axis_steps = 1;
		$this->y_axis_colour = '';
		$this->y_grid_colour = '';
		$this->y2_axis_colour = '';

		// AXIS LABEL styles:
		$this->x_label_style = '';
		$this->y_label_style = '';
		$this->y_label_style_right = '';


		// AXIS LEGEND styles:
		$this->x_legend = '';
		$this->x_legend_size = 20;
		$this->x_legend_colour = '#000000';

		$this->y_legend = '';
		$this->y_legend_right = '';
		//$this->y_legend_size = 20;
		//$this->y_legend_colour = '#000000';

		$this->lines = array();
		$this->line_default['type'] = 'line';
		$this->line_default['values'] = '3,#87421F';
		$this->js_line_default = 'so.addVariable("line","3,#87421F");';

		$this->bg_colour = '#FFFFFF';
		$this->bg_image = '';

		$this->inner_bg_colour = '';
		$this->inner_bg_colour_2 = '';
		$this->inner_bg_angle = '';

		// PIE chart ------------
		$this->pie = '';
		$this->pie_values = '';
		$this->pie_colours = '';
		$this->pie_labels = '';

		$this->tool_tip = '';

		// which data lines are attached to the
		// right Y axis?
		$this->y2_lines = array();

		// Number formatting:
		$this->y_format='';
		$this->num_decimals='';
		$this->is_fixed_num_decimals_forced='';
		$this->is_decimal_separator_comma='';
		$this->is_thousand_separator_disabled='';

		$this->output_type = '';
		$this->output_string='';
		//
		// set some default value incase the user forgets
		// to set them, so at least they see *something*
		// even is it is only the axis and some ticks
		//
// 		$this->set_y_min( 0 );
// 		$this->set_y_max( 20 );
// 		$this->set_x_axis_steps( 1 );
// 		$this->y_label_steps( 5 );
	}


function renderGraph()
	{
		$this->output_string="<div id=\"".$this->id."\" style=\"align:left;border: 5px solid rgb(209, 239, 209); padding: 10px; cursor: move;width: ".(int)($this->width)."px; height: ".(int)$this->height."px;\" > </div>";

		$this->createJsSwfObject();
		
		$this->setChartType();
		$this->setData();
		if($this->variables)
			{
			$this->addVariable();
			$this->formatOutput();
			}
		
		$this->output_string.="so.addParam(\"allowScriptAccess\", \"always\" );";
		$this->output_string.="so.write(\"".$this->id."\");</script>";
		return $this->output_string;
	}

function createJsSwfObject()
	{
	$this->output_string.="<script type=\"text/javascript\">
	var so = new SWFObject(\"".$this->swf_path."\", \"".$this->id."\", \"".(int)($this->width)."\", \"".(int)$this->height."\", \"9\", \"".$this->bg_colour."\");";
	}
function addVariable()
	{
	$this->output_string.="so.addVariable(\"variables\",\"true\");";
	}

/**
 * Format the text to the type of output.
 */
function formatOutput()
	{
	foreach($this->variables as $key=>$value)
		$this->output_string.= 'so.addVariable("'. $key .'","'. $value . '");';
	}



function setData()
	{
	$this->setXData();
	$this->setYData();
	}
function setYData()
	{
	$num = 1;
	if(is_array($this->data['y']))
	foreach($this->data['y'] as $key=>$data )
		{
		if( $num==1 )
			{
			$this->variables['values']=$data;
			}
		else
			{
			$this->variables['values_'. $num]=$data;
			$graph->variables['bar_2']="50,"."#ff55ee"."$chart_options";
			}
	
		$num++;
		}
	}
function setXData()
	{
	$this->variables["x_labels"]=$this->data['x'];
	}

function setChartType()
{
if(count($this->data_sets)==1)
	$this->variables['y_legend']=$this->data_sets[0]['ylegend'].",".$this->data_sets[0]['colour'].",".$this->data_sets[0]['font_size'];
	$num=1;

	foreach($this->data_sets as $key=>$data)
		{
		if($this->chart_type=='pie')
			{
			$options='60,'.$data['colour'].','.'{font-size: '.$data['font_size'].';}';
			}
		elseif($this->chart_type=='line')
			{
			$options=$data['thickness'].','.$data['colour'].','.$data['ylegend'].','.$data['ylegend_size'];
			}
		elseif($this->chart_type=='line_hollow')
			{
			$options=$data['thickness'].','.$data['colour'].','.$data['ylegend'].','.$data['ylegend_size'].','.$data['circle_size'];
			}
		elseif($this->chart_type=='line_dot')
			{
			$options=$data['thickness'].','.$data['colour'].','.$data['ylegend'].','.$data['ylegend_size'].','.$data['circle_size'];
			}
		else
			{
			$options=$data['shade'].','.$data['colour'].','.$data['ylegend'].','.$data['font_size'];
			}
		if($num==1 )
			{
			$this->variables[$this->chart_type]=$options;
			}
		elseif($this->chart_type!='pie')
			{
			$this->variables[$this->chart_type.'_'.$num]=$options;
			}
	
		$num++;
		}


}

}

?>
