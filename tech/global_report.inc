<?php
class cReport
        {
        var $title=""; // heading for the table
        var $type; // p - printable report, s - summary report, '' - normal view
        var $data=array(); // data to be displayed as report
        var $preferred_rows; // no of rows preferred by user per page
        var $no_of_rows; // total no of rows in report
        var $no_of_pages; // total no of pages in report
        var $page_no; // page no of the current page
        var $query_string=array(); // query string array to be passed to the target page of a link in the report page
        var $html=""; //to store html code created by various functions
        var $customization=array();//report customization stored in the database
        var $db;//database object
        var $sql;//sql query generation object
        var $id;//report id unique identifier for the report
        var $code;//report code for programmer's shorthand for the report
        var $name;//report name for display
        var $summary=array();//summary array;
        var $highlight=true;
        var $set_column_heading=true;
        var $split_heading=true;
	var $print_vertical_heading=false;
	var $doc;
	var $xml_file="report.xml";
        var $summary_report=false;
	var $date_format="dd/mm/yyyy";
	var $date_seperator="/";
	var $template_schema;
	var $report_id;
        var $no_of_pages_in_navigation=1;
        var $form;
        function restoreDefaults()
                {
                $this->highlight=true;
                $this->set_column_heading=true;
                }

        // we want the no of rows in the data
        function getRowCount()
                {
               $this->no_of_rows=(isset($this->no_of_rows))?$this->no_of_rows:count($this->data);
                }

        function setStyle()
                {
                $this->customization["table_style"]=($this->customization["table_style"])?$this->customization["table_style"]:"width:100%;border-style:solid; border-width:thin; border-collapse:collapse;";
                $this->customization["th_style"]=($this->customization["th_style"])?$this->customization["th_style"]:"border-style:solid; border-width:thin";
                $this->customization["tr_style"]=($this->customization["tr_style"])?$this->customization["tr_style"]:"border-style:solid; border-width:thin";
                $this->customization["column_style"]=($this->customization["column_style"])?$this->customization["column_style"]:array();
                }

        function setDisplayColumnNorder()
                {
                //we want column=>display_name array, it is set by taking from the corresponding report customisation, otherwise we set it to column=>column
                foreach($this->data[0] as $key=>$value)
                        {
                        if(!$this->customization["display_columns"][$key])
                                {
                                $this->customization["display_columns"][$key]=$key;
                                }
                        }
                //we want column1, column2 array for the order of display, if not available in report customisation show the same order returned by db
                $this->customization["display_order"]=array_keys($this->data[0]);
                }


        function formatColumn($column,$data)
                {
                //the data of the column is to be formatted as set in customization based on the type of data of the column
                switch ($this->customization["data_type"][$column])
                        {
                        case 'string':
                                break;
                        case 'date':
				if(trim($data) != '')
                                	$data=$this->showDate($data,$this->customization["format_details"][$column]);
                                break;
                        case 'number':
				list($decimals,$decimal_separator,$thousand_separator) = explode("-",$this->customization["format_details"][$column]);
                                $data=number_format($data,$decimals,$decimal_separator,$thousand_separator);
                                break;
                        }
                //the data of the column is to be changed if set in customization
                if($this->customization["custom_change_details"][$column])
                        {
                        $eq_value_array=explode(",",$this->customization["custom_change_details"][$column]);
                        foreach($eq_value_array as $equivalent_value)
                                {
                                list($display_value, $replace_value)=explode("=",$equivalent_value);
                                $data=(trim($display_value)==trim($data))?$replace_value:$data;
                                }
                        }
                //return nl2br($data);
                return $data;
                }

        // returns the data in horizontal html table
        function createHorizontalTable()
                {
                if ($this->data)
                        {
                        $this->setStyle();
                        $this->html="<table style=\"".$this->customization["table_style"]."\">";
                        if($this->title)
                                $this->html.="<tr><td colspan=\"".count($this->data[0])."\" class=\"link_head\">".$this->title."</td></tr>";

                        $this->setDisplayColumnNorder();

                        if($this->set_column_heading)
                                {
                                foreach($this->customization["display_order"] as $value)
                                        $this->html.="<th class=\"link_head\" style=\"".$this->customization["th_style"]."\">".$this->customization["display_columns"][$value]."</th>";
                                }

                        $i=0;
                        foreach($this->data as $key=>$value)
                                {
                                //want different formatting for alternate rows
                                if($this->highlight)
                                        $class=($i=!$i)?"row1":"row2";
                                $this->html.="<tr class=\"$class\" style=\"".$this->customization["tr_style"]."\">";
                                foreach($this->customization["display_order"] as $column)
                                        {
                                        $this->customization["column_style"][$column]=($this->customization["column_style"][$column])?$this->customization["column_style"][$column]:"text-align:center";
                                        $this->html.="<td style=\"".$this->customization["column_style"][$column]."\">".$this->formatColumn($column,$this->data[$key][$column])."</td>";
                                        }
                                $this->html.="</tr>";
                                }

                        $this->html.="</table>";
                        unset($this->title);
                        return $this->html;
                        }
                }

        // returns the data in vertical table
        function createVerticalTable()
                {
                if ($this->data)
                        {
                        $this->setStyle();
                        $this->html="\n<table style=\"".$this->customization["table_style"]."\">";
                        if($this->title)
                                $this->html.="<tr><td colspan=\"".count($this->data[0])."\" class=\"link_head\">".$this->title."</td></tr>";
                        $this->setDisplayColumnNorder();
                        $i=0;
                        $this->data=flipArrayKeys($this->data);
                        foreach($this->customization["display_order"] as $column)
                                {
                                if($this->highlight)
                                        $class=($i=!$i)?"row1":"row2";
                                $this->html.="\n\t<tr class=\"$class\" style=\"".$this->customization["tr_style"]."\">";
                                if($this->set_column_heading)
					{
					$this->customization["column_style"][$column]=($this->customization["column_style"][$column])?$this->customization["column_style"][$column]:"text-align:left";
                                        $this->html.="\n\t\t<td class=\"link_head1\" style=\"".$this->customization["column_style"][$column]."\"><b>".$this->customization["display_columns"][$column]."</b></td>";
					}
                                foreach($this->data[$column] as $key=>$value)
                                        {
                                        $this->customization["column_style"][$column]=($this->customization["column_style"][$column])?$this->customization["column_style"][$column]:"text-align:left";
                                        $this->html.="\n\t\t<td style=\"".$this->customization["column_style"][$column]."\">".$this->formatColumn($column,$value)."</td>";
                                        }
                                $this->html.="\n\t</tr>";
                                }
                        $this->html.="\n</table>\n";
                        unset($this->title);
                        return $this->html;
                        }
                }

        // prints the data
        function printData()
                {
                echo $this->html;
                unset($this->html);
                }

        function getSummary($arrays,$group,$heading=array())
                {
                if(count($arrays) && count($group))
                        {
                        $head=key($group);
                        $grouped=$this->sortNgroupArray($arrays,array(key($group)=>current($group)),"yes");
                        array_shift($group);
                        foreach($grouped as $key=>$value)
                                {
                                $heading[$head]=$key;
                                $this->getSummary($value,$group,$heading);
                                }
                        }
                else
                        $this->summary[]=array_merge($heading,$this->sumColumnValues($arrays,$this->customization["summary_columns"]));
                }

        function doHorizontalTable()
                {
                if($this->customization["summary_columns"])
                        {
			if($this->getSummary($this->data,$this->customization["summary_group_columns"]))
				$this->data = array_merge($this->data,$this->getSummary($this->data,$this->customization["summary_group_columns"]));
                        }
                $this->createHorizontalTable();
                $this->printData();
                }

        function doVerticalTable()
                {
                if($this->customization["summary_columns"])
                        {
			if($this->getSummary($this->data,$this->customization["summary_group_columns"]))
				$this->data = array_merge($this->data,$this->getSummary($this->data,$this->customization["summary_group_columns"]));
                        }
                $this->createVerticalTable();
                $this->printData();
                }

        function printHorizontalTable($data)
                {
                $this->data=$data;
                $this->createHorizontalTable();
                $this->printData();
                }

	function printVerticalTable($data)
                {
                $this->data=$data;
                $this->createVerticalTable();
                $this->printData();
                }
        function showGroupedReport()
                {
                $this->groupNshowData($this->data,$this->customization["group_columns"],"");
                }

        function groupNshowData($arrays,$group,$heading)
                {
                global $report_details,$summary_details;
                if(count($arrays) && count($group))
                        {
                        $head=key($group);
                        $grouped=$this->sortNgroupArray($arrays,array(key($group)=>current($group)),"yes");
                        array_shift($group);
                        foreach($grouped as $key=>$value)
                                {
                                $heading[0][$head]=$key;
				$value = $this->sortData($value,$this->customization["sort_columns"]);
                                $this->groupNshowData($value,$group,$heading);
                                }
                        }
                else
                        {
			if($this->customization["summary_columns"])
				{
				$this->getSummary($arrays,$this->customization["summary_group_columns"]);
				$total_array = $this->summary;
				unset($this->summary);
				if($total_array && $this->summary_report==true)
					{
					foreach($total_array as $row=>$field)
						{
						$summary_details[] = array_merge($heading[0],$total_array[$row]);
						}
					}
				}

                        if($this->split_heading)
                                {
				if($this->customization)
					$customization = $this->customization;
                                //$this->customization["table_style"]="width:60%;border-style:solid; border-width:thin; border-collapse:collapse;";
                                $this->customization["tr_style"]="border-style:none; border-width:thin; border-collapse:collapse; height:20";

				if($this->print_vertical_heading)
					$this->printverticalTable($heading);
				else
                                	$this->printHorizontalTable($heading);

                                unset($this->customization["table_style"],$this->customization["tr_style"]);
				$this->customization = $customization;
                                }

                        foreach($arrays as $row=>$record)
                                {
                                if($heading)
                                        {
                                        foreach($heading[0] as $grp=>$val)
                                                {
                                                if($this->split_heading)
							{
                                                        unset($arrays[$row][$grp]);
							}
                                                else
							{
                                                        $arrays[$row][$grp]=($row==0)?$arrays[$row][$grp]:"";
							}
                                                }
                                        }
                                }
			if($this->split_heading)
				{
				$arrays=$this->addSummary($arrays);
				$arrays = $this->sortData($arrays,$this->customization["sort_columns"]);
                                $this->printHorizontalTable($arrays);
                                if($heading)
                                        echo "<br>";
				}
                        else
                                {
                                if(isset($report_details))
					{
					$report_details = array_merge($report_details,$this->addSummary($arrays));
					}
                                else
					{
					$report_details = $this->sortData($arrays,$this->customization["sort_columns"]);
					$report_details = $this->addSummary($arrays);
					}
                                }
                        }
                }

        function addSummary($arrays)
                {
                if($this->customization["summary_columns"])
                        {
                        $this->getSummary($arrays,$this->customization["summary_group_columns"]);
                        $temp[0][key($arrays[0])]="<b>Total</b>";
			foreach($this->summary as $key => $value)
				{
				foreach($value as $key1 => $value1)
					{
					$temp[0][$key1].=$value1;
					}
				}
                        $arrays=appendArrays($arrays,$temp,"APPEND");
                        //$arrays=appendArrays($arrays,$this->summary,"APPEND");
                        unset($this->summary);
                        }
                return $arrays;
                }

        function sortData($arrays,$sort)
                {
                if(count($arrays) && count($sort))
                        {
                        $grouped=$this->sortNgroupArray($arrays,array(key($sort)=>current($sort)),"yes");
                        array_shift($sort);
                        $sorted_array=array();
                        foreach($grouped as $key=>$value)
                                {
                                $sorted_array=array_merge($sorted_array,$this->sortData($value,$sort));
                                }
                        return $sorted_array;
                        }
                else
                        return $arrays;
                }

        function sortNgroupArray($arrays,$sort,$group="no")
                {
                $c=count($arrays);
                for($i=0;$i<$c;$i++)
                        $column_wise[$i]=$arrays[$i][key($sort)];
                $is_sorted=(current($sort) == "ascending")?natcasesort($column_wise):arsort($column_wise);
                foreach($column_wise as $index=>$value)
                        {
                        if ($group == "yes")
                                $grouped_arrays[$value][]=$arrays[$index];
                        else
                                $grouped_arrays[]=$arrays[$index];
                        }
                return $grouped_arrays;
                }

        // retrieves the data for the current page
        function getPageRows()
                {
                $this->getRowCount();
                $this->preferred_rows=($this->preferred_rows)?$this->preferred_rows:$this->no_of_rows;
                $this->no_of_pages=ceil($this->no_of_rows / $this->preferred_rows);

		$this->page_no = ($this->page_no > $this->no_of_pages)?$this->no_of_pages:(($this->page_no=="" || $this->page_no<1)?1:$this->page_no);
                $this->data=array_slice($this->data,($this->page_no-1)*$this->preferred_rows,$this->preferred_rows);
                }

        // displays link for navigating thru' the report pages
        function displayPageNavigation()
                {
                $this->query_string["rtype"]=$this->type;
//               	echo "<div align=\"center\">Page ".$this->page_no." of ".$this->no_of_pages."</div>";
                switch ($this->type)
                        {
                        case 'p':// printable report
                                echo "<div align=\"right\">";
                                if($this->no_of_pages > 1)
                                        {
					echo ", ";
                                        if($this->page_no > 1)
                                                {
                                                $this->query_string["page_no"]=$this->page_no - 1;
                                                echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()." \" accesskey=\"r\" \">Prev,</a>";
                                                }

                                        if($this->page_no < $this->no_of_pages)
                                                {
                                                $this->query_string["page_no"]=$this->page_no + 1;
                                                echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()." \" accesskey=\"n\">Next ,</a>";
                                                }

                                        echo "</div>";
                                        }
                                break;

                        case 's': //summary report
                                
                                break;

                        default: // normal report
                                echo "<div align=\"center\">";
                                $temp=1;
				$no_of_splits = ceil($this->no_of_pages/$temp);
				 $page_no = $this->page_no;

				for($j=1;$j<=$no_of_splits;$j++)
					{
					if($page_no <= $j*$temp)
						{
						$split = $j;
						break;
						}
					}
				if($split > 1)
					{
					$this->query_string["page_no"]=1;
                                        echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\" accesskey=\"f\"> << </a>";

					$this->query_string["page_no"]=($split*$temp)-$temp;
                                        echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\" accesskey=\"p\">&nbsp; < </a>";
					}

                                for($i=($split*$temp)-($temp-1);$i<=$split*$temp;$i++)
                                        {
					if($i>$this->no_of_pages)
						break;
                                        if($this->page_no==$i)

                                                        {
                                                        if ($this->query_string)
                                                                {
                                                                foreach ($this->query_string as $get_variable => $get_value)
                                                                        {
                                                                         if($get_variable!='page_no')
                                                                         $get_array[]=$get_variable."=".$get_value;
                                                                        
                                                                        }
                                                                     $get_url=implode('&',$get_array);
                                                                }
                                                        for($page_no=1;$page_no<=$this->no_of_pages;$page_no++)
                                                                {
                                                                $page_no_arrays[$page_no]=$page_no;
                                                                }
	formatConstraintArray($page_no_arrays);
//onchange=\"window.location='".$_SERVER["PHP_SELF"]."?$get_url&page_no='+this.value\"
$page_select_box=$this->form->generateSelectMenu("page_no",$i,$page_no_arrays,"P","","TRUE","onchange=\"window.location='".$_SERVER["PHP_SELF"]."?$get_url&page_no='+this.value\"","pagenoselect");

                                                        echo "<font size=\"1\">$page_select_box / ".$this->no_of_pages." </font> ";
                                                        }
                                        else
                                                {
                                                $this->query_string["page_no"]=$i;
                                                echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\">".$i."</a>";
                                                }
                                        }
				if($split < $no_of_splits)
					{
					$this->query_string["page_no"]=($split*$temp)+1;
                                        echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\" accesskey=\"n\" > > </a>";

					$this->query_string["page_no"]=$this->no_of_pages;
                                        echo "<a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\" accesskey=\"l\" >&nbsp; >> </a>";
					}
                                echo "&nbsp;</div>";
				$this->query_string["page_no"]=$this->page_no=$page_no;
                        }
                }

         function navigatePage()
                {
                $this->getPageRows();
                $this->displayPageNavigation();
                }

        function showPrintableReportLink()
                {
                //$this->query_string["page_no"]=($_GET["page_no"])?$_GET["page_no"]:1;
                $this->query_string["rtype"]="p";
                echo "<div align=\"right\"><a href=\"".$_SERVER["PHP_SELF"]."?".$this->buildQueryString()."\" target=_BLANK accesskey=\"p\" >Printable Report</a></div>";
                }

        function returnLink($link="",$name="", $target="",$js_event="",$class="")
                {
                $query_string="<a href=\"$link";
                $query_string.="?".$this->buildQueryString();
                $query_string.="\"";
                $query_string.=($target)?" target=$target" : "";
		if($js_event)
			{
			foreach($js_event as $key => $value)
				{
					$query_string.=$key."=".$value;
				}
			}
			$query_string.=" class=\"$class\">$name</a>";
                return $query_string;
                }

        function buildQueryString()
                {
                if ($this->query_string)
                        {
                        foreach ($this->query_string as $key => $value)
                                $temp[]=$key."=".$value;
				return implode('&',$temp);
                        }

                }

        function setNA($string='--')
                {
                $this->setValue($this->data,$string);
                }

        function setValue(&$array,$string="--")
                {
                if($array)
                        {
                        foreach($array as $key=>$value)
                                {
                                foreach($value as $column=>$data)
					$temp[$key][$column]=($data == NULL || strcmp($data,"")==0)?$string:$data;
                                }
                        $array=$temp;
                        unset($temp);
                        }
                }

        function showDate($given_date,$format="d-M-Y")
                {
                $date_array=explode('-', $given_date);
                $stamp=mktime(0,0,0,$date_array[1], $date_array[2], $date_array[0]);
                return (date ($format, $stamp));
                }
        function getReportDetails1()
                {
		if(!$this->customization["id"] && $this->code && $_SESSION["guser_id"])
                        {
                        $this->sql->column=array("gurc.report_customization_id");
                        $this->sql->table="gen_user_report_customization gurc";
                        $this->sql->join_condition[]="left join gen_master_report_customization using(report_customization_id)";
                        $this->sql->join_condition[]="join sys_master_report smr using(report_id)";
                        $this->sql->condition[]="smr.report_code='".$this->code."'";
                        $this->sql->condition[]="gurc.user_id='".$_SESSION["guser_id"]."'";
                        $this->sql->generateSelectQuery();
                        $this->db->query=$this->sql->query;
                        $this->db->runQuery();
                        $report_customization_array=$this->db->returnArrays();
                        $this->customization["id"]=$report_customization_array[0]["report_customization_id"];
                        }
                $this->sql->column=array("report_customization_id","report_customization_desc[1] as report_title","primary_table", "report_id","report_name[1]","privilege_id","permission","get_columns(group_order) as group_columns","get_columns(sort_order) as sort_columns","get_columns(summary_group_order) as summary_group_columns","get_columns(summary_column) as summary_columns");
                $this->sql->table="sys_master_report";
                $this->sql->join_condition[]="left join gen_master_report_customization using(report_id)";
                $this->sql->condition[]="report_code='".$this->code."'";
                $this->sql->condition[]=($this->customization["id"])?"report_customization_id=".$this->customization["id"]:"is_default='t'";
                $this->sql->generateSelectQuery();
                $this->db->query=$this->sql->query;
                $this->db->runQuery();
                $report_array=$this->db->returnArrays();
                if(strchr($_SESSION["guser_privilege"][$_SESSION["gcompany_id"]][$report_array[0]["privilege_id"]],$report_array[0]["permission"]))
                        {
                        $this->id=$report_array[0]["report_id"];
                        $this->customization["id"]=$report_array[0]["report_customization_id"];
                        $this->customization["report_title"] = $report_array[0]["report_title"];
                        $this->customization["primary_table"] = $report_array[0]["primary_table"];
                        $this->customization["group_columns"]=$this->setGroupNSortOrder(explode(',',$report_array[0]["group_columns"]));
                        $this->customization["sort_columns"]=$this->setGroupNSortOrder(explode(',',$report_array[0]["sort_columns"]));
                        $this->customization["summary_group_columns"]=$this->setGroupNSortOrder(explode(',',$report_array[0]["summary_group_columns"]));
                        $this->customization["summary_columns"]=($report_array[0]["summary_columns"]!="")?explode(',',$report_array[0]["summary_columns"]):"";
                        $this->getReportColumns();
                        }
                unset($report_customization_array,$report_array);
		}

        function getReportDetails()
                {
		if($this->xml_file)
			{
			$this->parseXmlFile();
			return;
			}
                }

        function getReportColumns()
                {
                $this->sql->table="sys_master_report_columns smrc";
                $this->sql->column[]="*";
                $this->sql->column[]="get_column_condition(condition_id) as condition";
                $this->sql->join_condition[]="left join gen_master_column_customization using(column_id)";
                $this->sql->condition[]="report_id='".$this->id."'";
                $this->sql->condition[]="report_customization_id='".$this->customization["id"]."'";
		$this->sql->condition[]="display_order is not null";
                $this->sql->generateSelectQuery();
                $this->db->query=$this->sql->query;
                $this->db->runQuery();
                $rep_col_array=$this->db->returnArrays();

                $c=count($rep_col_array);
                for($i=0;$i<$c;$i++)
                        {
                        if(strchr($_SESSION["guser_privilege"][$_SESSION["gcompany_id"]][$rep_col_array[$i]["privilege_id"]],$rep_col_array[$i]["permission"]))
                                {
                                $display_name=$rep_col_array[$i]["display_name"];
                                $script_variable_name=$rep_col_array[$i]["script_variable_name"];
				$this->customization["script_variable_name"][] =$script_variable_name;
                                if($rep_col_array[$i]["fetch_column"] == 't')
                                        {
					if($rep_col_array[$i]["display_order"] > 0)
						{
						$this->customization["fetch_column"][] =html_entity_decode(stripslashes($rep_col_array[$i]["db_column_name"]))." as \"".$script_variable_name."\"";
						}
					if(isset($rep_col_array[$i]["condition"]))
                                                {
                                                $rep_col_array[$i]["condition_id"] = ereg_replace("[{,}]","",$rep_col_array[$i]["condition_id"]);
                                                $condition_id_array=explode(',',$rep_col_array[$i]["condition_id"]);
                                                $condition_array=explode(',',$rep_col_array[$i]["condition"]);
                                                reset($condition_id_array);
                                                reset($condition_array);
                                                foreach($condition_id_array as $condition_id)
                                                        {
                                                        $condition["'".$condition_id."'"]=current($condition_array);
                                                        next($condition_array);
                                                        }
                                                }
                                        if($rep_col_array[$i]["filter"])
                                                $filter[]=$rep_col_array[$i]["db_column_name"]."='".$rep_col_array[$i]["filter"]."'";
                                        }

                                if($rep_col_array[$i]["display_order"] > 0)
                                        {
                                        $this->customization["display_order"][]=$script_variable_name;
                                        $this->customization["display_columns"][$script_variable_name]=$display_name;
                                        $this->customization["data_type"][$script_variable_name]=$rep_col_array[$i]["data_type"];
                                        if($rep_col_array[$i]["format_details"])
                                                $this->customization["format_details"][$script_variable_name]=$rep_col_array[$i]["format_details"];
                                        if($rep_col_array[$i]["style"])
                                                $this->customization["column_style"][$script_variable_name]=$rep_col_array[$i]["style"];
                                        if($rep_col_array[$i]["custom_change_details"])
                                                $this->customization["custom_change_details"][$script_variable_name]=$rep_col_array[$i]["custom_change_details"];
                                        }
/*				elseif($rep_col_array[$i]["display_order"] < 0)
					{
					unset($this->customization["fetch_column"]);
					}*/
                                }
                        }
		if(isset($condition))
                        {
                        //ksort($condition);
                        //reset($condition);
                        }

                $this->customization["condition"]=(is_array($condition))?array_values($condition):"";
                if(isset($filter))
                        $this->customization["filter"][]=implode(' and ',$filter);
                }

        function setGroupNSortOrder($array)
                {
                if(!$array[0]){return;}
                foreach($array as $value)
                        {
                        $farray[$value]='ascending';
                        }
                return $farray;
                }

        function sumColumnValues($arrays,$column_array)
                {
              $c=count($arrays);
	      $sum=array();
              foreach($column_array as $column)
                        {
                        for($i=0;$i<$c;$i++)
                                $sum[$column]+=$arrays[$i][$column];
                        }
                	return $sum;
                }

	function formatConstraintArray(&$constraint_array)
		{
		$i=0;
		foreach($constraint_array as $name => $value)
			{
			$new_constraint_array[$i]["value"]=$value;
			$new_constraint_array[$i]["name"]=$name;
			$i++;
			}
		$constraint_array=$new_constraint_array;
		}
		function createJSTable()
		{
			$this->customization["column_style"]["default"]='text-align:center';
			$this->setStyle();
			$this->html="<table style=\"".$this->customization["table_style"]."\" id=data_entry name=data_entry><tbody><tr style=\"".$this->customization["tr_style"]."\">";
			foreach($this->data as $key)
			{
				$this->html.="<th class=\"".$this->customization["th_class"]."\" style=\"".$this->customization["column_style"]["default"]."\" >$key</th>";
			}

			$this->html.="<th class=\"link_head\" style=\"".$this->customization["column_style"]["default"]."\">Action</th>
			</tr></tbody><tr><td><input type=button class=button size=10 title='Add An Item' name=insert value=Insert onClick=addRow();></td></tr></table>";
			$this->printData();
			unset($this->html);
		}

	function getReports()
		{

		global $master_report_table,$sys_user_report_customization_table,$sys_report_customization_table;
		unset($this->data);
		$this->sql->column=array("mr.report_id,mr.report_name");
		$this->sql->table="$master_report_table mr  ";
		$this->sql->condition[""]="report_id in (select report_id from $sys_report_customization_table src  join $sys_user_report_customization_table surc on surc.customization_id=src.customization_id where surc.user_id=".$this->user_id.")";
		$this->sql->order_by="mr.report_name";
		$this->sql->generateSelectQuery();
		$this->db->query=$this->sql->query;
		$this->db->runQuery();
		$this->data=$this->db->returnArrays();
		}
	function getTemplates()
		{
		unset($this->data);
		$this->sql->column=array("mr.report_name as \"Data Set\"","mr.report_id as \"Select\"");
		$this->sql->table=$this->template_schema.".master_report mr  ";
		$this->sql->condition[""]="report_id in (select report_id from ".$this->template_schema.".sys_report_customization src  join ".$this->template_schema.".sys_user_report_customization surc on surc.customization_id=src.customization_id )";
		$this->sql->order_by="mr.report_name";
		$this->sql->generateSelectQuery();
		$this->db->query=$this->sql->query;
		$this->db->runQuery();
		$this->data=$this->db->returnArrays();
		}
	function copyReport()
		{
		include("global_files/tables.inc");
		global $company_id,$user_name;
		$copy_report_details_array=array();

		$this->db->query="INSERT INTO $master_report_table (report_code,report_name,   table_view_name,is_master,last_updated) SELECT report_code,report_name,   table_view_name,is_master,last_updated from ".$this->template_schema.".master_report where report_id=".$this->report_id." returning *";
		$this->db->runQuery();
		$report_details_array=$this->db->returnArrays();
		$copy_report_details_array["report_id"]=$report_details_array[0]["report_id"];

		$copy_report_details_array["table_view_name"]=$report_details_array[0]["table_view_name"];

		$this->db->query="CREATE TABLE ".$company_id.".".$copy_report_details_array["table_view_name"]." AS SELECT * from ".$this->template_schema.".".$copy_report_details_array["table_view_name"];
		$this->db->runQuery();

		$this->db->query="DELETE FROM ".$company_id.".".$copy_report_details_array["table_view_name"];
		$this->db->runQuery();

		$this->db->query="SELECT column_id,script_variable_name,db_column_name,report_id,fetch_column,data_type from ".$this->template_schema.".master_column_mapping where report_id=".$this->report_id;
		$this->db->runQuery();
		$column_details_array=$this->db->returnArrays();

		foreach($column_details_array as $key=>$value)
			{
			$this->db->query="INSERT INTO $master_column_mapping_table (script_variable_name,db_column_name,report_id,fetch_column,data_type)  SELECT script_variable_name,db_column_name,".$copy_report_details_array["report_id"].",fetch_column,data_type from ".$this->template_schema.".master_column_mapping where report_id=".$this->report_id."and column_id=".$value["column_id"]." returning *";
			$this->db->runQuery();
			$master_column_details_array=$this->db->returnArrays();
			$current_column_id=$master_column_details_array[0]["column_id"];
			$copy_report_details_array["columns"][$value["column_id"]]=$current_column_id;

			$this->db->query="INSERT INTO $sys_report_master_filter_table (filter_name,filter_table_join,form_field_name,form_display,fetch_condition,order_by,set_default) SELECT filter_name,filter_table_join,form_field_name,form_display,fetch_condition,order_by,set_default from ".$this->template_schema.".sys_report_master_filter smf join ".$this->template_schema.".sys_report_filter srf on srf.filter_id=smf.filter_id where srf.filter_column=".$value["column_id"]." returning *";
			$this->db->runQuery();
			$master_filter_details_array=$this->db->returnArrays();
			$current_filter_id=$master_filter_details_array[0]["filter_id"];
			$copy_report_details_array["filter_column"][$value["column_id"]]=$current_filter_id;
			if($current_filter_id)
				{
				$this->db->query="INSERT INTO $sys_report_filter_table (report_id,filter_id,filter_column,group_column,is_active) SELECT ".$copy_report_details_array["report_id"].",$current_filter_id,".$current_column_id.",group_column,is_active from ".$this->template_schema.".sys_report_filter where report_id=".$this->report_id."and filter_column=".$value["column_id"]." returning *";
				$this->db->runQuery();
				}
			$this->db->query="INSERT INTO $master_report_customization_table (column_id,display_name,style,decimal_places,format_details,format_date,display_order,is_group,display_summary)  SELECT ".$copy_report_details_array["columns"][$value[column_id]].",display_name,style,decimal_places,format_details,format_date,display_order,is_group,display_summary from ".$this->template_schema.".master_report_customization where column_id=".$value[column_id];
			$this->db->runQuery();
			}
		$this->db->query="SELECT customization_id from ".$this->template_schema.".sys_report_customization where report_id=".$this->report_id;
		$this->db->runQuery();
		$customization_details_array=$this->db->returnArrays();

		foreach($customization_details_array as $row=>$customization_details)
			{
			$this->db->query="INSERT INTO $sys_report_customization_table (report_id,customization_name,user_id,is_active,date_condition,date_constraint,report_format_type) SELECT ".$copy_report_details_array["report_id"].",customization_name,".$this->user_id.",is_active,date_condition,date_constraint,report_format_type from ".$this->template_schema.".sys_report_customization where customization_id=".$customization_details[customization_id]." returning *";

			$this->db->runQuery();
			$customization_details_array=$this->db->returnArrays();
			$new_customization_id=$customization_details_array[0]["customization_id"];
			$copy_report_details_array["customizations"][$customization_details["customization_id"]]=$new_customization_id;

			$this->db->query="INSERT INTO $sys_user_report_customization_table (user_id,customization_id,permission_id,is_active) VALUES (".$this->user_id.",".$new_customization_id.","."7".","."'t'".")";
			$this->db->runQuery();
			foreach($column_details_array as $key=>$value)
				{
				$new_column_id=$copy_report_details_array["columns"][$value["column_id"]];


				$this->db->query="INSERT INTO $report_customization_table (column_id,display_name,style,decimal_places,format_details,format_date,display_order,customization_id,is_group,is_sort,display_summary) SELECT ".$new_column_id.",display_name,style,decimal_places,format_details,format_date,display_order,".$new_customization_id.",is_group,is_sort,display_summary from ".$this->template_schema.".report_customization where customization_id=".$customization_details["customization_id"]." and  column_id=".$value["column_id"]."returning *";
				$this->db->runQuery();

				$this->db->query="INSERT INTO $sys_filter_customization_table (customization_id,filter_id,filter_display_name,filter_order,default_value,set_default) SELECT ".$new_customization_id.",filter_id,filter_display_name,filter_order,default_value,set_default from ".$this->template_schema.".sys_filter_customization where  customization_id=".$customization_details["customization_id"]." and  column_id=".$value["column_id"];
				$this->db->runQuery();

				$this->db->query="INSERT INTO $sys_report_crosstab_customization_table (customization_id,crosstab_column_id,cross_tab_group_id) SELECT ".$new_customization_id.",".$new_column_id.",cross_tab_group_id from ".$this->template_schema.".sys_report_crosstab_customization where  customization_id=".$customization_details["customization_id"]." and crosstab_column_id=".$value["column_id"];
				$this->db->runQuery();

				$this->db->query="INSERT INTO $sys_report_crosstab_preferences_table (customization_id,total_percent_column_id,need_row_total,need_column_total) SELECT ".$new_customization_id.",".$new_column_id.",need_row_total,need_column_total from ".$this->template_schema.".sys_report_crosstab_preferences where  customization_id=".$customization_details["customization_id"]." and total_percent_column_id=".$value["column_id"];
				$this->db->runQuery();

				$this->db->query="INSERT INTO $sys_report_crosstab_value_columns_table (customization_id,cross_tab_group_id,value_column_id,need_percent) SELECT ".$new_customization_id.",cross_tab_group_id,$new_column_id,need_percent from ".$this->template_schema.".sys_report_crosstab_value_columns where  customization_id=".$customization_details["customization_id"]." and value_column_id=".$value["column_id"];
				$this->db->runQuery();

				$this->db->query="SELECT sort_column_id FROM ".$this->template_schema.".sys_report_customization_sorting_details where  customization_id=".$customization_details["customization_id"]." and column_id=".$value["column_id"];
				$this->db->runQuery();
				$sort_column_id_array=$this->db->returnArrays();
				$sort_column_id=$sort_column_id_array[0]["sort_column_id"];

				$this->db->query="INSERT INTO $sys_report_customization_sorting_details_table (customization_id,column_id,sort_column_id) SELECT ".$new_customization_id.",$new_column_id,".$copy_report_details_array['columns'][$sort_column_id]." from ".$this->template_schema.".sys_report_customization_sorting_details where  customization_id=".$customization_details["customization_id"]." and column_id=".$value["column_id"];
				$this->db->runQuery();
				}
			}
		$this->data=$copy_report_details_array;
		}
function getReportLastUpdatedTime()
        {
        global $master_report_table ;
	$this->db->query="select to_char(last_updated at time zone 'Asia/Calcutta','dd/mm/yyyy HH:MI:SS AM') as last_update
	FROM $master_report_table where report_id = ".$this->report_id;
        $this->db->runQuery();
        $db_report_array=$this->db->returnArrays();
        $this->data=$db_report_array[0]["last_update"];
        }

	}

?>
