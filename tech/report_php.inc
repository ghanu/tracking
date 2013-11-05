<?php

// $report_locale=new cLocale("report_php.inc",$_SESSION["guser_preferences"]["language"]);
/*****************************************************************************************
Function Name                 :navigatePage
No. of Arguments        :4
Arguments                :$page_no - current page no (If page_no is null then it is set to 1)
                         $arrays - associative array of records
                         $row_count - no of records to be displayed set by the user in the
                                 preferences
                         $query_string_array - optional associative array of query strings to
                                 be passed at the time of page navigation.
Action                        :Splits the given array ($arrays) into pages having $row_count
                                records per page and returns it. Displays the links for page
                                navigation, location of the current records and the
                                total number of records.
Returns                        :returns splitted array
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :R.Lakshmi Narayanan
Modified On                :28 May 2003
*****************************************************************************************/
function navigatePage($page_no,$arrays,$row_count,$query_string_array="")
        {
        global $report_locale;
        if ($page_no=="" || $page_no<1)
                $page_no=1;

        // finding the last page
        $last_page=ceil(count($arrays) / $row_count);
    if($page_no>$last_page)
            $page_no=$last_page;
        // finding the row from which the records are displayed.
        $offset=($page_no-1)*$row_count;

        // fetching the records from the offset
        $arrays1=array_slice($arrays,$offset,$row_count);
        $from=$offset+1;
        $to=count($arrays1)+$offset;
        if($_GET["action"]=="print_report")
                {
                echo "<div align=\"center\">".$page_no."/".$last_page."</div>";
                if($last_page > 1 && $page_no != $last_page)
                        echo "<div align=\"right\">".returnLink($PHP_SELF,"Contd...",array_merge($query_string_array,array("page_no"=>$page_no+1,"action"=>$_GET["action"])))."</div>";
                }
        else
                {
                echo "<div align=\"left\" style=\"position:absolute;left:500px;font-size:10px;\">".sprintf("Showing (%1\$d - %2\$d) of %3\$d",$from,$to,count($arrays))."</div>";
		echo "<div align=\"right\" style=\"font-size:10px;left:80%px;position:relative;\">Page";
                for($i=1;$i<=$last_page;$i++)
                        {
                        if($page_no==$i)
                                echo "<font size=\"3\">$i </font>";
                        else
				{
				//$query_string_array=array();
                                echo returnLink($PHP_SELF,$i,array_merge($query_string_array,array("page_no"=>$i)))." ";
				}
                        }
                echo "</div>";
                }
        return $arrays1;
        }

/*****************************************************************************************
Function Name                 :showPrintableReportLink
No. of Arguments        :1
Arguments                :$query_string - Optional variable containing the query strings to be
                                passed to the report.
Action                        :Displays "Printable Report" link in the page.
Returns                        :Nil
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :R.Lakshmi Narayanan
Modified On                :29 May 2003
*****************************************************************************************/

function showPrintableReportLink($query_string="",$report_id="",$customization_id="")
        {
        global $report_locale,$header_path;
	if(!$header_path)
		$header_path="../";

        if($query_string)
                {
                 $print_string=array_merge(array("action"=>"print_report"),$query_string);

		 $excel_string=array_merge(array("action"=>"excel_report"),$query_string);

		 $pdf_string=array_merge(array("action"=>"pdf_report"),$query_string);
		}
        else
		 {
                  $print_string=array("action"=>"print_report");
		  $excel_string=array("action"=>"excel_report");
		  $pdf_string=array("action"=>"pdf_report");
	         }
	}

/*****************************************************************************************
Function Name                 :doHorizontalTable
No. of Arguments        :3
Arguments                :$table_details -  Associative array of records to be displayed in
                                table format.
                         $width - Optional variable to set the width for the table.
                         $title - Optional variable to set the title for the table.
Action                        :Displays the values of the $table_details array in table format.
                         This function is used to display more than one record.
Returns                        :Nil
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :R.Lakshmi Narayanan
Modified On                :28 May 2003
*****************************************************************************************/


function doHorizontalTable($table_details,$width="100%",$title="", $column_properties="",$set_column_heading=true,$highlight=true,$serial_no=false,$report_table="",$title_append_array=array(),$span_array=array(),$cross_tab=false)
        {
        if ($table_details)
                {
                $html_table_string = createHorizontalTable($table_details,$width,$title,$column_properties,
		$set_column_heading,$highlight,$serial_no,$report_table,$title_append_array,
		$span_array,$cross_tab);
                echo $html_table_string;
                }
        }


function createHorizontalTable($table_details,$width="100%",$title="", $column_properties="",$set_column_heading=true,$highlight=true,$serial_no=false,$report_table="",$title_append_array=array(),$span_array=array(),$cross_tab=false)
        {
	global $span_array;
        if ($table_details)
                {
                $column_properties=($column_properties)?$column_properties:array();
		$table_string=($report_table)?"<DIV class=\"$report_table\" id=\"data\">":"";

		$table_string.= "<TABLE align=\"center\" width=\"$width\"><CAPTION>$title</CAPTION>";
		if($set_column_heading)
                        {
			$table_string.="<THEAD class=\"link_head\">";
			if(is_array($span_array))
				{
				$table_string.="<TR>";
				foreach($span_array[1] as $key=>$value)
					{
					$table_string.="<TH $value >$key</TH>";
					}
				$table_string.="</TR>";
				}
			$table_string.="<TR>";

			if ($serial_no==true)
				$table_string.="<TH> No </TH>";
			if($cross_tab)
				{
				$table_string.=createCrossTabHeader($table_details[0],$title_append_array);
				}
			else
				{
			$colcount=0; //for setting the footer colspan
			foreach($table_details[0] as $key=>$value)
				{
				if($title_append_array[$colcount])
					$title_string=$title_append_array[$colcount];
				$table_string.="<TH>$key"."$title_string</TH>";
				$colcount++;
				}
				}
			$table_string.="</TR></THEAD> <TFOOT><TR><TD colspan=\"$colcount\"></TD></TR></TFOOT>";
			}
                $i=0;
                $cnt=count($table_details);
		$table_string.="<TBODY>";

                for($j=0;$j<$cnt; $j++)
                        {
                        if($highlight)
                                $class=($i=!$i)?"row1":"row2";
                        $table_string.="<TR class=\"$class\">";
			if ($serial_no==true)
				{
				$m=$j+1;
				if ($m < $cnt)
					$table_string.="<TD>".$m."</TD>";
				}
			foreach($table_details[$j] as $key=>$value)
                                {
				$table_string.= "<TD style=\"".$column_properties[$key]."\">".$value."</TD>";
                                }
                        $table_string.= "</tr>";
                        }
                $table_string.= "</tbody></table>";
		if ($report_table !="")
			 $table_string.= "</div>";
		return $table_string;
                }
        }
/*****************************************************************************************
Function Name                 :doVerticalTable
No. of Arguments        :3
Arguments                :$table_details -  Associative array of records to be displayed in
                                table format.
                         $width - Optional variable to set the width for the table.
                         $title - Optional variable to set the title for the table.
Action                        :Displays the values of the $table_details array in table format.
                         This function is used to display only one record.
Returns                        :Nil
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :R.Lakshmi Narayanan
Modified On                :28 May 2003
*****************************************************************************************/

function doVerticalTable($table_details,$width="100%",$title="",$set_column_heading=true,$highlight=true,$class="",$align="center")
        {
        if ($table_details)
                {
                $html_table_string = createVerticalTable($table_details,$width,$title,$set_column_heading,$highlight,$class,$align);
                echo $html_table_string;
                }
        }

function createVerticalTable($table_details,$width="100%",$title="",$set_column_heading=true,$highlight=true,$class="",$align="center")
        {
        if ($table_details)
                {
                $table_string= "<table class=\"$class\" align=\"$align\" width=\"$width\" cellpadding=\"0\">";
                if ($title!="")
			$table_string.= "<tr><td colspan=\"2\" ><caption>$title<caption></td></tr>";
                $i=0;
                foreach($table_details as $var)
                        {
                        foreach($var as $key=>$value)
                                {
                                if($highlight)
                                        $class=($i=!$i)?"row1":"row2";
                                $table_string.="<tr class=\"$class\">";
                                if($set_column_heading)
                                        {
                                        $table_string.="<td width=\"50%\" height=\"20px\" valign=\"middle\">$key</td>";
                                        }
                                $table_string.="<td width=\"50%\" valign=\"middle\">$value</td>";
                                $table_string.="</tr>";
                                }
                        }
                $table_string.="</table>";
                return $table_string;
                }
        }


/*****************************************************************************************
Function Name                 :sortArray
No. of Arguments        :3
Arguments                :$arrays - Associative array of records
                         $column_name - Name of the column against which the $arrays is
                         sorted or grouped.
                         $sort_by - Optional variable when set, sorts the $arrays in
                         ascending or descending order against $column_name.
                         $group - Optional variable when set, groups the $arrays against
                         $column_name.
Action                        :It sorts or groups the $arrays against the $column_name and returns it.
                                The $arrays can be sorted in ascending or descending order by
                                setting the variable $sort_by to "ascending" or "descending"
                                respectively. The $arrays are grouped when $group is set to "yes".
Returns                        :array of values.
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :S.Gnanavel
Modified On                :28 May 2003
*****************************************************************************************/

function sortArray($arrays,$column_name,$sort_by="",$group="")
        {
	if ($arrays)
	{
        for($i=0;$i<count($arrays);$i++)
                $column_wise[$i]=$arrays[$i][$column_name];
        if($sort_by == "ascending")
                {
                //asort($column_wise);
                natcasesort($column_wise);
                }
        elseif($sort_by == "descending")
                arsort($column_wise);
        foreach($column_wise as $index=>$value)
                {
                if ($group == "yes")
                        {
                        //unset($arrays[$index][$column_name]);
                        $grouped_arrays[$value][]=$arrays[$index];
                        }
                else
                        $grouped_arrays[]=$arrays[$index];
                }
        return $grouped_arrays;
	}
        }

/*****************************************************************************************
Function Name           :sumColumnValues
No. of Arguments        :2
Arguments               :$arrays - Associative array of records
                         $column_array - Array of columns for which sum of all values to be
                         calculated.
Action                  :Calculates the sum of all values for the columns in $column_array
                                and returns an array containing the sum of all the values.
Returns                 :array of sum of values of all the columns in $column_array.
Created By              :S.Gnanavel
Created On              :14 March 2003
Modified By             :S.Gnanavel
Modified On             :28 May 2003
*****************************************************************************************/

// function sumColumnValues($arrays,$column_array,$decimal="2",$total= "")
//         {
// 	if($arrays)
// 	foreach ($arrays as $column_value)
// 		{
// 		foreach($column_array as $column_name)
// 			{
// 			if ($column_value[$column_name] > 0)
// 				$sum[$column_name]+=$column_value[$column_name];
// 			}
// 		}
// 	if($total)
// 		{
// 		$sum[$total]="<font size=4 color=blue>Total</font>";
// 		}
//         return $sum;
//         }

function sumColumnValues($arrays,$column_array,$decimal="2",$total= "")
        {
	$array_count = count($arrays);
	$check = 1;
	$avg_array=array();
	$mod_array=array();
	if($arrays)
		{
		foreach ($arrays as $column_value)
			{
			if($column_array)
			foreach($column_array as $column_name=>$total_type)
				{
					switch($total_type)
					{
						case "sum":
							$sum[$column_name]+=$column_value[$column_name];
						break;
						case "t":
							$sum[$column_name]+=$column_value[$column_name];
						break;
						case "max":
							if($column_value[$column_name]>$sum[$column_name])
								$sum[$column_name]=$column_value[$column_name];
						break;
						case "min":
							if($column_value[$column_name]<$sum[$column_name]||$sum[$column_name]=='')
								$sum[$column_name]=$column_value[$column_name];
						break;
						case "avg":
							$sum[$column_name]+=$column_value[$column_name];
							if(!in_array($column_name,$avg_array))
								$avg_array[]=$column_name;
						break;
						case "mod":
							$sum[$column_name]+=$column_value[$column_name];
							if(!in_array($column_name,$mod_array))
								$mod_array[]=$column_name;
						break;
						case "count":
							$sum[$column_name]=$array_count;
						break;
					}
				//add excess saving here
				}


			$check = $check+1;
			}
		if($avg_array)
		foreach($avg_array as $avg_columns)
			$sum[$avg_columns]=$sum[$avg_columns]/$array_count;
	   	//ceil ,floor,round,absolute,sqaure root,base,percentage
// if($mod_array)
// 		foreach($mod_array as $mod_columns)
// 			$sum[$mod_columns]=$sum[$mod_columns]%$array_count;

		}
	if($total)
		{
		$sum[$total]="<font size=4 color=blue>Total</font>";
		}
		return $sum;
        }

/*****************************************************************************************
Function Name                 :numberFormatColumn
No. of Arguments        :2
Arguments                :$arrays - Associative array of records
                         $column_array - Array of columns for which all values are to be
                                 formatted to two decimal places.
Action                        :Formats all values for the columns in $column_array to two decimal places
                                and returns the formatted array.
Returns                        :returns an number formatted array with two decimal places.
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :S.Gnanavel
Modified On                :28 May 2003
*****************************************************************************************/
function numberFormatColumn($arrays,$column_array)
        {
        foreach($column_array as $column)
                {
                for($i=0;$i<count($arrays);$i++)
                        $arrays[$i][$column]=number_format($arrays[$i][$column],2);
                }
        return $arrays;
        }

/*****************************************************************************************
Function Name                 :dateFormatColumn
No. of Arguments        :2
Arguments                :$arrays - Associative array of records
                         $column_array - Array of columns whose date values are to be formatted.
Action                        :Formats the date values for the columns in $column_array to user
                                readable format dd-mon-yyyy and returns the format array.
Returns                        :returns the date formatted array.
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :S.Gnanavel
Modified On                :28 May 2003
*****************************************************************************************/

function dateFormatColumn($arrays,$column_array)
        {
        foreach($column_array as $column)
                {
                for($i=0;$i<count($arrays);$i++)
                        $arrays[$i][$column]=showDate($arrays[$i][$column]);
                }
        return $arrays;
        }

/*****************************************************************************************
Function Name                 :showDate
No. of Arguments        :1
Arguments                :$given_date - Date to be formatted
Action                        :Formats the date in database format to user readable form dd-mon-yyyy and
                                returns it.
Returns                        :Formatted date.
Created By                :S.Gnanavel
Created On                :14 March 2003
Modified By                :S.Gnanavel
Modified On                :28 May 2003
*****************************************************************************************/

function showDate($given_date,$format="d-M-Y")
        {
        // convert the date string  to array.
        $date_array=explode('-', $given_date);
        //  Calculate time stamp.
        $stamp=mktime(0,0,0,$date_array[1], $date_array[2], $date_array[0]);
        //  retrieves the date from the timestamp.
        return (date ($format, $stamp));
        }

function fillNA(&$menu_item, $key, $string)
        {
        if ($menu_item == NULL || strcmp($menu_item,"")==0)
                $menu_item = "$string";
        else
                $menu_item = "$menu_item";
        }

function setNA(&$menu,$string="--")
        {
	if(is_array($menu))
	{
	for ($i=0;$i<count($menu);$i++)
		{
		if(is_array($menu[$i]))
			array_walk ($menu[$i],'fillNA', $string);
		}
        }
	}
/*
Function        : getReportDetails

Arguments        : $member_id, $report_id

Action                : Fetches the column_names and display names for the given $report_id preferred by the member

Author                : S.Gnanavel

Created on        : 11/11/2003
*/

function getReportDetails($member_id,$customization_id,$report_format_type='')
        {
        include("global_files/tables.inc");
	require_once("global_files/global_pgsql.inc");

	global $db,$sql, $report_id, $formatted_from_date, $formatted_to_date;
	$db= new cDatabase();
        // get the columns for the report from member's table
	$db->query="SELECT mcm.fetch_column, mcm.db_column_name, mcm.script_variable_name, rc.display_name, rc.display_order, rc.style, rc.display_summary, rc.decimal_places, rc.format_details, rc.format_date,mcm.data_type FROM $master_column_mapping_table mcm, $report_customization_table rc, $master_report_table mr
     	WHERE rc.customization_id='$customization_id' and mcm.column_id=rc.column_id and rc.display_order IS NOT NULL AND mr.report_id=mcm.report_id ORDER BY rc.display_order;";
	$db->runQuery();
        $report_details=$db->returnArrays();

	if($report_details)
                {
		$summary_columns=array();
		$report_details_count=count($report_details);
                for($i=0;$i<$report_details_count;$i++)
                        {
			$db_column_name=$report_details[$i]["db_column_name"];

			 $db_column_name=$report_details[$i]["display_summary"]=='custom'?$report_details[$i]["formula_column"]:$report_details[$i]["db_column_name"];

			$script_variable_name=$report_details[$i]["script_variable_name"];
/*				if($report_details[$i]["fetch_column"]=='t')
                                        {
					$column_mapping[$db_column_name]=$script_variable_name;
                                        }*/
			if($report_details[$i]["display_summary"]!="")
				{
				$summary_columns[$script_variable_name]=$report_details[$i]["display_summary"];
				}

			$data_type[$script_variable_name]=$report_details[$i]["data_type"];
			// get the preferred name against script variable name only when display_order is specified
			if($report_details[$i]["display_order"] > 0)
				{
				$display_name=$report_details[$i]["display_name"];
				$display_columns[$script_variable_name]=$display_name;
				if($report_details[$i]["style"])
					$column_style[$display_name]=$report_details[$i]["style"];
				if($report_details[$i]["display_summary"])
					$display_summary_columns[$script_variable_name]=$report_details[$i]["display_summary"];
				if($report_details[$i]["decimal_places"] != "")
					$decimal_places[$script_variable_name]=$report_details[$i]["decimal_places"];
				if($report_details[$i]["format_details"])
					$format_details[$script_variable_name]=$report_details[$i]["format_details"];
				if($report_details[$i]["format_date"])
					$format_date[$script_variable_name]=$report_details[$i]["format_date"];
				}
                        }

		$db->query="SELECT mcm.script_variable_name, mcm.db_column_name,mrc.display_order,mrc.display_summary,mrc.formula_column
				FROM $master_column_mapping_table mcm
				JOIN $report_customization_table mrc ON mrc.column_id=mcm.column_id AND mrc.customization_id=$customization_id AND mcm.fetch_column='t'
				UNION SELECT mcm.script_variable_name, mcm.db_column_name,mrc.display_order,rc.display_summary,rc.formula_column
				FROM $master_column_mapping_table mcm
				JOIN $master_report_customization_table mrc ON mrc.column_id=mcm.column_id
				JOIN $sys_report_customization_table src ON src.report_id=mcm.report_id
                                LEFT JOIN $report_customization_table rc on rc.customization_id=src.customization_id and mcm.column_id=rc.column_id
				WHERE src.customization_id=$customization_id AND mcm.fetch_column='t' AND
				mrc.display_order < 0 ORDER BY 3;";
		$db->runQuery();
		$fetch_column_array=$db->returnArrays();

		if($fetch_column_array)
			{
			for($i=0,$cnt=count($fetch_column_array);$i<$cnt;$i++)
				{
				$script_variable_name=$fetch_column_array[$i]["script_variable_name"];
			if($fetch_column_array[$i]["display_summary"]=='custom')
			{
			 $fetch_column_array[$i]["db_column_name"]="0+".$fetch_column_array[$i]["formula_column"]."+0";
			}

				if($report_format_type=='summary_report'&&$summary_columns)
					{

					if(in_array($script_variable_name,array_keys($summary_columns)))
						{

						$db_column_string=str_replace(array("0+","+0"),array("sum(",")+0"),$fetch_column_array[$i]["db_column_name"]);
						$component_columns=explode("/",$db_column_string);
						$column_mapping[$db_column_string]=$fetch_column_array[$i]["script_variable_name"];

						if (count($component_columns >1))
						{
							foreach($component_columns as $component_column)
								{
								$component_script_name=str_replace(array("(sum(",")+0)"),"",$component_column);
								if (!in_array($component_script_name,$summary_columns))
									$summary_columns[]=$component_script_name;
								$column_mapping[$component_column]=$component_script_name;
								unset($summary_columns["script_variable_name"]);
								}
							}
						}


					else
						{
                                               $column_mapping[strip_tags($fetch_column_array[$i]["db_column_name"])]=$fetch_column_array[$i]["script_variable_name"];

						$db_grouping_array[]=$fetch_column_array[$i]["script_variable_name"];
						}
					}

				elseif($report_format_type=='transaction_report')
					{
					$formatted_db_column=str_replace('$from_date',"$formatted_from_date",$fetch_column_array[$i]["db_column_name"]);
					$formatted_db_column=str_replace('$to_date',"$formatted_to_date",$formatted_db_column);

					if(in_array($script_variable_name,$summary_columns))
						{
						$column_mapping["sum(".strip_tags($formatted_db_column).")"]=$fetch_column_array[$i]["script_variable_name"];
						}
					else
						{
						$column_mapping[strip_tags($formatted_db_column)]=$fetch_column_array[$i]["script_variable_name"];
						$db_grouping_array[]=$fetch_column_array[$i]["script_variable_name"];
						}
					}

				else
					{
					$column_mapping[$fetch_column_array[$i]["db_column_name"]]=$fetch_column_array[$i]["script_variable_name"];
					}
				}
			}

		if($report_format_type=='transaction_report')
			{
			$transaction_condition=getTransactionCondition($report_id);
			}

               	// return the details of the columns to be fetched from database and display names for the report
                $report_customization_details["column_mapping"]=$column_mapping;
                $report_customization_details["display_columns"]=$display_columns;
                $report_customization_details["column_style"]=$column_style;
                $report_customization_details["summary_columns"]=$summary_columns;
                $report_customization_details["display_summary_columns"]=$display_summary_columns;
                $report_customization_details["decimal_places"]=$decimal_places;
                $report_customization_details["format_details"]=$format_details;
                $report_customization_details["format_date"]=$format_date;
		$report_customization_details["grouping_array"]=$db_grouping_array;
		$report_customization_details["transaction_condition"]=$transaction_condition;
		$report_customization_details["data_type"]=$data_type;
                return $report_customization_details;

                }
        }

/*
Function        : assignPreferredColumns

Arguments        : &$arrays (reference),$preferred_columns

Action                : assigns the display names for column_names as preferred by the member

Author                : S.Gnanavel

Created on        : 11/11/2003
*/
function assignPreferredColumns(&$arrays,$preferred_columns,$decimal_places="",$format_details="",$default_order="",$format_date="")
        {
        if(!$arrays)
                return;
        foreach($arrays as $index=>$value_array)
                {
                if($preferred_columns)
                        {
                        foreach($preferred_columns as $variable_name=>$preferred_name)
                                {
                                if(!is_null($arrays[$index][$variable_name]))
                                        {
                                        $new_arrays[$index][$preferred_name]=trim($arrays[$index][$variable_name]);
                                        if($format_date[$variable_name] && (trim($new_arrays[$index][$preferred_name])!='') && (trim($new_arrays[$index][$preferred_name])!='--'))
                                                {
						$new_arrays[$index][$preferred_name]=showDate($new_arrays[$index][$preferred_name],$format_date[$variable_name]);
                                                }
                                        if(isset($decimal_places[$variable_name]) && $new_arrays[$index][$preferred_name]!="")
                                                {
                                                $temp=0;
						if(!(float)$new_arrays[$index][$preferred_name] && !(int)$new_arrays[$index][$preferred_name])
							{
							$temp=1;
							}
						$new_arrays[$index][$preferred_name]= strip_tags(html_entity_decode($new_arrays[$index][$preferred_name]));
						if ($new_arrays[$index][$preferred_name]=="0")
							$new_arrays[$index][$preferred_name]="0";
						else
	                                                $new_arrays[$index][$preferred_name]=number_format($new_arrays[$index][$preferred_name],$decimal_places[$variable_name]);
						if($temp==1)
							{
							//$new_arrays[$index][$preferred_name]="".$new_arrays[$index][$preferred_name]."";
							}
                                                }
                                        if($format_details[$variable_name])
                                                {
                                                $eq_value_array=explode(",",$format_details[$variable_name]);
                                                foreach($eq_value_array as $equivalent_value)
                                                        {
                                                        list($display_value, $replace_value)=explode("=",$equivalent_value);
                                                        $new_arrays[$index][$preferred_name]=(trim($display_value)==trim($new_arrays[$index][$preferred_name]))?$replace_value:$new_arrays[$index][$preferred_name];
                                                        }
                                                }
                                        }
                                }
                        }
                }
        if($default_order=="DEFAULT_ORDER" && $new_arrays)
                {
                $key_order=array_keys($arrays[0]);
                foreach($new_arrays as $index=>$value_array)
                        {
                        foreach($key_order as $value)
                                {
                                $final_array[$index][$preferred_columns[$value]]=$new_arrays[$index][$preferred_columns[$value]];
                                }
                        }
                $new_arrays=$final_array;
                }


        $arrays=$new_arrays;
        }


function assignPreferredSummary(&$total_arrays,$preferred_columns)
        {
        $c=count($total_arrays);
        if($preferred_columns)
                {
                for($i=0;$i<$c;$i++)
                        {
                        foreach($preferred_columns as $key=>$column)
                                {
                                $final_total[$i][$key]=$total_arrays[$i][$key];
                                }
                        }
                }
($final_total);
        $total_arrays=$final_total;
        }

function generateGroupQueryString($group,$sort)
        {
        $query_string=array("sort_name[0]"=>key($sort),"sort_order[0]"=>current($sort));
        if($group)
                {
                $i=0;
                foreach($group as $group_name_key=>$group_order_value)
                        {
                        $query_string=array_merge($query_string,array("group_name[$i]"=>$group_name_key,"group_order[$i]"=>$group_order_value));
                        $i++;
                        }
                }
        return $query_string;
        }

/*
Function        : getColumnNames

Arguments        : $column_array
                                Format:
                                        array("odi.order_id||'-'||odi.item_id"        =>        "order_no", "odi.internal_order_no" =>        "internal_order_no")

Action                : returns a string suitable for fetching columns from database.
                                Format:
                                        order_id|'-'|item_id as \"order_no\", odi.internal_order_no as \"internal_order_no\"

Author                : S.Gnanavel

Created on        : 11/11/2003
*/
function getColumnNames($column_array)
        {
        foreach($column_array as $column_name=>$alias_name)
                $fetch_column.="$column_name as \"$alias_name\" , ";

        // removes trailing comma from $fetch_column
        $comma_index=strrpos($fetch_column,",");
        $fetch_column=substr($fetch_column,0,$comma_index-1);

        return $fetch_column;
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

function getUomConversions($from_uom,$to_uom="")
        {
        switch($from_uom)
                {
                case "sqft":
                 $conversion_value["sqft"]=1;
                 $conversion_value["sqmt"]=1/10.7639104;
                 $conversion_value["sqdm"]=9.290304;
                 break;
                case "sqmt":
                 $conversion_value["sqft"]=10.7639104;
                 $conversion_value["sqmt"]=1;
                 $conversion_value["sqdm"]=100;
                 break;
                case "sqdm":
                 $conversion_value["sqft"]=1/9.290304;
                 $conversion_value["sqmt"]=1/100;
                 $conversion_value["sqdm"]=1;
                 break;
		case "kigm":
                 $conversion_value["tone"]=1/1000;
                 $conversion_value["gram"]=1000;
                 $conversion_value["kigm"]=1;
                 break;
		 case "gram":
                 $conversion_value["tone"]=1/1000000;
                 $conversion_value["gram"]=1;
                 $conversion_value["kigm"]=1/1000;
                 break;
		 case "tone":
                 $conversion_value["tone"]=1;
                 $conversion_value["gram"]=1000000;
                 $conversion_value["kigm"]=1000;
                 break;
		 default:
		 $conversion_value[$to_uom]=1;
		 $conversion_value[$from_uom]=1;
		 break;
                }
        if($to_uom)
                return $conversion_value[$to_uom];
        else
                return $conversion_value;
        }

function convertAmount($rupees,$currency_id="INR")
        {
        $number=number_format($rupees,2,'.','');
        $rupees=floor($number);
        $paise=number_format($number-$rupees,2,'.','')*100;
        $array[4]="Thousand";
        $array[5]="Thousand";
        $array[6]="Lakh";
        $array[7]="Lakhs";
        $array[8]="Crore";
        $array[9]="Crores";
        if($paise)
                {
                if($currency_id == "INR")
                        $paise_name="Paise";
                if($currency_id == "USD")
                        $paise_name="Cents";
                if(!$currency_id)
                        $paise_name="Units";
                $ps=" $paise_name ".amt($paise);
                }
        while($rupees>999)
                {
                $size=strlen($rupees);
                $tdigit=floor($rupees/pow(10,strlen($rupees)-(($size%2)+1)));
                $amount.=amt($tdigit)." ".$array[$size]." ";
                $rupees=ceil(substr($rupees,($size%2)+1));
                }
        $amount.=" ".amt($rupees);
        //$amount=(trim($amount))?"$currency_id $amount":"";
        $amount=(trim($amount))?"$amount":"";
	unset($ps);
        $and=($amount&&$ps)?"and":"";
        $amount="$amount $and $ps Only";
        return $amount;
        }

function amt($rupees)
        {
        $num=array("","One","Two","Three","Four","Five","Six","Seven","Eight","Nine","Ten","Eleven","Twelve","Thirteen","Fourteen","Fifteen","Sixteen","Seventeen","Eighteen","Nineteen");
        $tnum=array("","","Twenty","Thirty","Forty","Fifty","Sixty","Seventy","Eighty","Ninety");
        while($rupees)
                {
                $rupees=ceil($rupees);
                $size=strlen($rupees);
                switch($size)
                        {
                        case 1:
                                $amount.=" ".$num[$rupees];
                                $rupees=0;
                                break;
                        case 2:
                                if($rupees<20)
                                        {
                                        $amount.=$num[$rupees];
                                        $rupees=0;
                                        }
                                else
                                        {
                                        $tens=floor($rupees/10);
                                        $amount.=$tnum[$tens];
                                        $rupees=substr($rupees,1);
                                        }
                                break;
                        case 3:
                                $hunds=floor($rupees/100);
                                $amount=$num[$hunds]." Hundred ";
                                $rupees=substr($rupees,1);
                                if($rupees!="00")
                                        $amount.=" and ";
                                break;
                        }
                }
        return $amount;
        }

/******************************************************************************
        Function Name    : convertDbArray2String
        No. of Arguments : 4 (2 optional)
                         : &$array - array of values passed by reference
                           $fields - array of fields to apply the conversion
                           $search_string  - string to be searched
                           $replace_string - string to be replaced
        Action                 : For each field in the given array searches for the
                           given string and replaces with the another string.
                           By default it replaces { } [ ]  with spaces.
        Returns                 : nothing
        Created on          : 21.04.2004
        Created by         : R.Lakshmi Narayanan
******************************************************************************/
function convertDbArray2String(&$array,$fields,$search_string="",$replace_string="")
        {
        foreach($fields as $field_name)
                {
                for($i=0;$i<count($array);$i++)
                        {
                        $array[$i][$field_name]=ereg_replace("[{|}]","",$array[$i][$field_name]);
                        }
                }
        }

function generateGroupArray($group_name, $group_order)
        {
        $group_array=array();
        if($group_name)
                {
                foreach($group_name as $index=>$group_value)
                        {
                        if($group_value)
                                {
                                $group_array[$group_value]=$group_order[$index];
                                }
                        }
                }
        return $group_array;
        }

/*
PARAMETERS
$arrays is a 2 dimensional array with structure array[][name]=value
$group is an associative array with structure array[column to be grouped]=ascending or descending
$sort is an associative array with structure array[column to be sorted]=ascending or descending
WORKING
$array is usually the array returned by database query, $group is formed by conditions selected by the user for
grouping the db query results. It can have any number of values, but usually will have 3 grouping for most reports.
$sort by is also selected by the user and is used for sorting the records in the innermost grouped records
RETURNS
The grouped sorted array is returned. The array will have as many additional dimensions as the count of $group that
levels of grouping

USAGE
In reports after getting the query results - sort the array with the first selected group and the
sort order of that group. Then, split the results into pages if needed and pass to the function.

If not grouping is selected then sort by the final sorting selected before paginating.

/*
PARAMETERS
$grouped_array - grouped arrays obtained from the groupArrays function
$group is an associative array with structure array[column to be grouped]=ascending or descending
$summary - is either blank of "summary_report"
declare $report_customization as global
$summary_details is declared global and gets values from each call of this function and accessible outside after
the function exits.
$heading is used only internally
WORKING

*/


function showGroupedReport($array,$group=array(),$sort,$summary="",$heading=array(), $serial_no=false)
        {
        global $report_customization,$summary_details,$report_details,$show_column;
                $sorted_final_grouped_arrays=array();
		$first_sorted_group_arrays=array();
        //the last level grouping
        if(count($group)<= 1)
                {
                //group the array with the grouping selected with records sorted by the sorting chosen for that group

                $final_array=sortArray($array,key($group),current($group),"yes");

                //$final_array is in the form array[group_name]=grouped_arrays, now we take each of these grouped and sort them by the sorting selected.
                foreach($final_array as $final_array_key=>$final_array_value)
                        {
                        //sorting is done based on sort column - key($sort) and sort order - current($sort)
                        if(count($sort)==1)
                                {
                                $grouped_array=$final_array1[$final_array_key]=sortArray($final_array_value,key($sort),current($sort));
                                }
                        else
                                {
                                $first_sort_grouped_arrays=sortArray($final_array_value,key($sort),current($sort),"yes");
                                next($sort);
                                /*sort each grouped list by the order no in descending order*/

				$sorted_final_grouped_arrays=array();
foreach($first_sort_grouped_arrays as $first_sort_group_array)
                                        {
                                        $first_sorted_group_array=sortArray($first_sort_group_array,key($sort),current($sort));
                                        $sorted_final_grouped_arrays=array_merge($sorted_final_grouped_arrays,$first_sorted_group_array);
                                        }
                                $grouped_array=$final_array1[$final_array_key]=$sorted_final_grouped_arrays;
                                unset($sorted_final_grouped_arrays);
                                reset($sort);
                                }

                        $heading[0][key($group)]=$final_array_key;

                        //getTotal is written for each script and returns totals of required columns set in the function
                        $total_array=getTotal($grouped_array);

                        assignPreferredSummary($total_array,$report_customization["display_summary_columns"]);
                        //$heading is generated with the name of each group, only if any grouping is there we need to generate summary report and group heading
                        if(count($heading)!=0)
                                {
                                //for generating summary report
                                if($summary=="summary_report")
                                        {
                                        //total array may have more than one row depending on the uom or currency etc sorting applied in getTotal function
                                        if($total_array)
                                                {
                                                foreach($total_array as $row=>$field)
                                                        {
                                                        //generate summary details as an array with the headings and row(s) summary details values are added to the already existing values when this function is called recursively
                                                        $summary_details[]=array_merge($heading[0],$total_array[$row]);
                                                        }
                                                }
                                        //return $final_array1;
                                        }
                                else
                                        {
                                        if($_SESSION["guser_preferences"]["split_group"]=="yes" && $heading[0])
                                                {
                                                foreach($grouped_array as $row=>$record)
                                                        {
                                                        foreach($heading[0] as $grp=>$val)
                                                                {
                                                                if(isset($show_column[$grp]))
                                                                        {
                                                                        $heading[0][$grp]=$grouped_array[$row][$show_column[$grp]];
                                                                        }
                                                                unset($grouped_array[$row][$grp]);
                                                                }
                                                        }
                                                echo "<br>";
                                                //show the columns chosen by the user with the name entered by them. Also set the decimal places or change the values as defined by the user using values in report customization print the heading for each group with required cell formatting using values in report customization
                                                $temp_heading=$heading;
                                                assignPreferredColumns($temp_heading,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"DEFAULT_ORDER",$report_customization["format_date"]);
                                                doHorizontalTable($temp_heading,"60%","",$report_customization["column_style"]);
                                                }
                                        else
                                                {
                                                foreach($grouped_array as $row=>$record)
                                                        {
                                                        if($row > 0 && $group)
                                                                {

                                                                foreach($heading[0] as $grp=>$val)
                                                                        {
                                                                        $grouped_array[$row][$grp]=" ";
                                                                        }
                                                                }
                                                        else
                                                                {
                                                                foreach($heading[0] as $grp=>$val)
                                                                        {
                                                                        if(isset($show_column[$grp]))
                                                                                {
                                                                                $grouped_array[$row][$grp]=$grouped_array[$row][$show_column[$grp]];
                                                                                }
                                                                        }
                                                                }
                                                        }

                                                foreach($heading[0] as $gname=>$gorder)
                                                        $display_order[$gname]=$report_customization["display_columns"][$gname];
                                                $old_order=$report_customization["display_columns"];
                                                $new_order=array_merge($display_order,$old_order);
                                                $report_customization["display_columns"]=$new_order;
                                                }
                                        //unset($heading);
                                        }
                                }
                        if ($summary!="summary_report")
                                {
                                //totals are to be shown as part of the report table after an empty line in the table
                                $original_count=count($grouped_array);
                                //here the array gets an empty row at the end
                                foreach($grouped_array[0] as $key=>$value)
                                        {
                                        //$grouped_array[$original_count][$key]=" ";
                                        }
                                //create a row with totals in the corresponding columns -
                                if($total_array)
                                        {
                                        foreach($total_array as $key=>$value)
                                                {
                                                //the row count will increase based on the number of rows in total array
                                                $nor=count($grouped_array);

                                                //for each column in the report check whether total is available
                                                foreach($grouped_array[0] as $key1=>$value1)
                                                        {
                                                        if(isset($total_array[$key][$key1]))
                                                                {
                                                                $grouped_array[$nor][$key1]=$total_array[$key][$key1];
                                                                $summary_total_cols[0][$key1]=$total_array[$key][$key1];
                                                                }
                                                        else
                                                                {
                                                                $grouped_array[$nor][$key1]=" ";
                                                                }
                                                        }
                                                }
                                        }
                                        setNA($grouped_array);
                                        assignPreferredColumns($grouped_array,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);
                                        assignPreferredColumns($summary_total_cols,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);
                                       $col_head = array_keys($grouped_array[0]);
                                        if ($summary_total_cols)
					{
					if(key($summary_total_cols[0]) == $col_head[0])
                                                {
                                                $grouped_array[$original_count][$col_head[0]] = "<b>Total:</b> ".$grouped_array[$original_count][$col_head[0]];
                                                }
                                                else
                                                {
                                                $grouped_array[$original_count][$col_head[0]] = "<b>Total:</b> ";
                                                }
					}
                                if($_SESSION["guser_preferences"]["split_group"]!="yes")
                                        {
                                        if(isset($report_details))
                                                $report_details=appendArrays($report_details,$grouped_array);
                                        else
                                                $report_details=$grouped_array;
					$cnt9=count($report_details);
// 					foreach($report_details[0] as $key2=>$value2)
// 	                                        $report_details[$cnt9][$key2]="<div class=\"border_bottom\"> <br /> </div>";
                                        }
                                else
					doHorizontalTable($grouped_array,"100%","",$report_customization["column_style"],true,true,$serial_no);
                                }
                        }
                return $final_array1;
                }
        else
                {
                $group_name=key($group);
                //if there are more than one level of grouping, group the array with the first grouping in the group array
                $f_array=sortArray($array,key($group),current($group),"yes");
                //remove the above group condition from the group array
                array_shift($group);
                //get the grouped arrays for each group obtained above and pass to the same function. For each level of grouping an array with additional dimension is created
                foreach($f_array as $key=>$value)
                        {
                        $heading[0][$group_name]=$key;
                        $f_array[$key]=showGroupedReport($value,$group,$sort,$summary,$heading,$serial_no);
                        }
                return $f_array;
                }
        }
/*
Function        : getCustomizedReportDetails

Arguments        : $member_id, $report_id, $report_format_type

Action                : Fetches the column_names and display names for the given $report_id preferred by the member

Author                : S.Gnanavel

Created on        : 11/11/2003
*/

function getCustomizedReportDetails($member_id,$customization_id,$report_format_type="")
        {
        include("global_files/tables.inc");
	global $db, $formatted_from_date, $formatted_to_date,$report_id;

       // get the columns for the report from member's table
	$db->query="SELECT mcm.fetch_column, mp.privilege_desc, mcm.permission, mcm.db_column_name, mcm.script_variable_name, rc.display_name, rc.display_order, rc.style, rc.display_summary, rc.decimal_places, rc.format_details, rc.format_date
	FROM $master_column_mapping_table mcm
	JOIN $report_customization_table rc ON mcm.column_id=rc.column_id
	JOIN $master_privilege_table mp ON mcm.privilege_id=mp.privilege_id
	WHERE rc.customization_id='$customization_id' and rc.display_order is not NULL ORDER BY rc.display_order;";
        $db->runQuery();
        $report_details=$db->returnArrays();
	if($report_details)
                {
		$summary_columns=array();
                for($i=0;$i<count($report_details);$i++)
                        {
                        $script_variable_name=$report_details[$i]["script_variable_name"];
                        $db_column_name=$report_details[$i]["db_column_name"];

                        if($report_details[$i]["display_order"] >= 0 && isset($report_details[$i]["display_order"]) && $report_details[$i]["display_order"]!="")
				{
                                if(($report_details[$i]["display_summary"])=="t")
                                        {
                                        $summary_columns[]=$script_variable_name;
                                        }
                                $display_name=$report_details[$i]["display_name"];
				$display_columns[$script_variable_name]=$display_name;
				if($report_details[$i]["style"])
					{
					$column_style[$display_name]=$report_details[$i]["style"];
					}
				if($report_details[$i]["display_summary"] == 't')
					{
					$display_summary_columns[]=$script_variable_name;
					}
				if($report_details[$i]["decimal_places"] != "")
					{
					$decimal_places[$script_variable_name]=$report_details[$i]["decimal_places"];
					}
				if($report_details[$i]["format_details"])
					{
					$format_details[$script_variable_name]=$report_details[$i]["format_details"];
					}
				if($report_details[$i]["format_date"])
					{
					$format_date[$script_variable_name]=$report_details[$i]["format_date"];
					}
				}
                        }
		$db->query="SELECT mcm.script_variable_name, mcm.db_column_name, mrc.display_order
		FROM $master_column_mapping_table mcm
		JOIN $report_customization_table mrc ON mrc.column_id=mcm.column_id AND mrc.customization_id=$customization_id AND mcm.fetch_column='t'
		UNION
		SELECT mcm.script_variable_name, mcm.db_column_name, mrc.display_order
		FROM $master_column_mapping_table mcm
		JOIN $master_report_customization_table mrc ON mrc.column_id=mcm.column_id
		JOIN $sys_report_customization_table src ON src.report_id=mcm.report_id
		WHERE src.customization_id=$customization_id AND mcm.fetch_column='t' AND mrc.display_order < 0;";
		$db->runQuery();
		$fetch_column_array=$db->returnArrays();
		if($fetch_column_array)
			{
			for($i=0,$cnt=count($fetch_column_array);$i<$cnt;$i++)
				{
				$script_variable_name=$fetch_column_array[$i]["script_variable_name"];
				if($report_format_type=='summary_report')
					{
					if(in_array($script_variable_name,$summary_columns))
						{
						$db_column_string=str_replace(array("0+","+0"),array("sum(",")+0"),$fetch_column_array[$i]["db_column_name"]);
						$component_columns=explode("/",$db_column_string);
						$column_mapping[$db_column_string]=$fetch_column_array[$i]["script_variable_name"];
						if (count($component_columns >1))
							{
							foreach($component_columns as $component_column)
								{
								$component_script_name=str_replace(array("(sum(",")+0)"),"",$component_column);
								if (!in_array($component_script_name,$summary_columns))
									$summary_columns[]=$component_script_name;
								$column_mapping[$component_column]=$component_script_name;
								unset($summary_columns["script_variable_name"]);
								}
							}
						}
					elseif($fetch_column_array[$i]["display_order"]>0)
						{
						$column_mapping[strip_tags($fetch_column_array[$i]["db_column_name"])]=$fetch_column_array[$i]["script_variable_name"];
						$db_grouping_array[]=$fetch_column_array[$i]["script_variable_name"];
						}
					}
				elseif($report_format_type=='transaction_report')
					{
					$formatted_db_column=str_replace('$from_date',"$formatted_from_date",$fetch_column_array[$i]["db_column_name"]);
					$formatted_db_column=str_replace('$to_date',"$formatted_to_date",$formatted_db_column);

					if(in_array($script_variable_name,$summary_columns))
						{
						$column_mapping["sum(".strip_tags($formatted_db_column).")"]=$fetch_column_array[$i]["script_variable_name"];
						}
					else
						{
						$column_mapping[strip_tags($formatted_db_column)]=$fetch_column_array[$i]["script_variable_name"];
						$db_grouping_array[]=$fetch_column_array[$i]["script_variable_name"];
						}
					}
				else
					{
					$column_mapping[$fetch_column_array[$i]["db_column_name"]]=$fetch_column_array[$i]["script_variable_name"];
					}
				}
			}
		if($report_format_type=='transaction_report')
			{
			$transaction_condition=getTransactionCondition($report_id);
			}
		$db->query="SELECT conditional_column, distinct_column, exclude_column FROM $sys_report_conditional_fields_table WHERE report_id=$report_id;";
		$db->runQuery();
		$conditional_columns_array=$db->returnArrays();
		if($conditional_columns_array)
			foreach($conditional_columns_array as $column_array)
				{
				$conditional_columns[]=$column_array["conditional_column"].",".$column_array["distinct_column"].",".$column_array["exclude_column"];
				}
               	// return the details of the columns to be fetched from database and display names for the report
                $report_customization_details["column_mapping"]=$column_mapping;
                $report_customization_details["display_columns"]=$display_columns;
                $report_customization_details["column_style"]=$column_style;
                $report_customization_details["summary_columns"]=$summary_columns;
                $report_customization_details["display_summary_columns"]=$display_summary_columns;
                $report_customization_details["decimal_places"]=$decimal_places;
                $report_customization_details["format_details"]=$format_details;
                $report_customization_details["format_date"]=$format_date;
                $report_customization_details["db_grouping_array"]=$db_grouping_array;
                $report_customization_details["transaction_condition"]=$transaction_condition;
                $report_customization_details["conditional_columns"]=$conditional_columns;

           	return $report_customization_details;
                }
        }

function getOrderByCondition($sort,$group,$data_type_array="",$customization_id="")
	{
	if(!$sort)
		{
		$sort=array();
		}
	if(!$group)
		{
		$group=array();
		}
	$sort_array=array_merge($sort,$group);
	$from = array("ascending", "descending");
	$to = array("ASC", "DESC");
	$sort_array = str_replace($from, $to, $sort_array);

	if($customization_id)
		{
		$sort_array=getSortColumn($sort_array,$customization_id);
		}
	if($sort_array)
		{
		foreach($sort_array as $key => $value)
			{
			$data_type_string=$data_type_array[$key]?"::".$data_type_array[$key]:"";
			$order_by_condition.=$key."$data_type_string ".$value.",";
			}
		$order_by_condition="ORDER BY ".rtrim($order_by_condition,",");
		}
	return $order_by_condition;
	}

function importexportapi_csv_put_formatted($records, $field_delimiter = ',', $record_delimiter = "\n", $enclosure = "\"")
	{
 	// Build the string
  	$csv_doc = '';
	// for each array element, which represents a line in the CSV string...
  	$i=0;
  	foreach ($records as $line)
  		{
    		// No leading delimiter
    		$use_delimiter = FALSE;
		foreach ($line as $key=>$element)
			{
			if($i==0)
				$element=$key;
      			// Replaces a double quote with two double quotes
      			$element = str_replace("\"", "\"\"", $element);
			// Adds a delimiter before each field (except the first)
      			if ($use_delimiter)
      				{
        			$csv_doc .= $field_delimiter;
      				}
		      	// Encloses each field with $enclosure and adds it to the string
      			$csv_doc .= $enclosure . $element . $enclosure;
      			// Delimiters are used every time except the first.
      			$use_delimiter = TRUE;
    			}
    		$i++;
    		break;
		// Append new line
    		$csv_doc .= $record_delimiter;
  		}
  	foreach ($records as $line)
  		{
    		// No leading delimiter
    		$use_delimiter = FALSE;
		foreach ($line as $key=>$element)
			{
			$element=strip_tags(html_entity_decode($element));
      			// Replaces a double quote with two double quotes
      			$element = str_replace("\"", "\"\"", $element);
			// Adds a delimiter before each field (except the first)
      			if ($use_delimiter)
      				{
        			$csv_doc .= $field_delimiter;
      				}
		      	// Encloses each field with $enclosure and adds it to the string
      			$csv_doc .= $enclosure . $element . $enclosure;
      			// Delimiters are used every time except the first.
      			$use_delimiter = TRUE;
    			}
		// Append new line
    		$csv_doc .= $record_delimiter;
  		}
	return $csv_doc;
	}





//append array2(target) to array1(source) filling blank fields with empty cells
function appendArrays($array1,$array2,$append_type="APPEND")
        {
        $source=($append_type=="APPEND")?$array1:$array2;
        $target=($append_type=="APPEND")?$array2:$array1;
        //for each row in the target array append one row to the end of the source array
        $target_count=count($target);
        if($target_count > 0)
                {
                for($i=0; $i<$target_count; $i++)
                        {
                        $index=count($source)-1;
                        if($source[$index])
                                {
                                foreach($source[$index] as $src_key=>$src_value)
                                        {
                                        $source[$index+1][$src_key]=(isset($target[$i][$src_key]))?$target[$i][$src_key]:" ";
                                        }
                                }
                        }
                }
        elseif($target_count == 0)
                {
                $index=count($source)-1;
                if($source[$index])
                        {
                        foreach($source[$index] as $src_key=>$src_value)
                                {
                                $source[$index+1][$src_key]="&nbsp;";
                                }
                        }
                }
        return $source;
        }

function validateArrayValues($arrays)
        {
        global $form;
        foreach($arrays as $key=>$value)
                {
                $form->validate($value);
                if($form->errors)
                        {
                        $errors[$key] = $form->errors;
                        }
                }
        return flipArrayKeys($errors);
        }
function validateArrayValuesNew($arrays)
        {
        global $dv;
        foreach($arrays as $key=>$value)
                {
                $dv->validate($value);
                if($dv->errors)
                        {
                        $errors[$key] = $dv->errors;
                        unset($dv->errors);
                        }
                }
        return $errors;
        }
function checkArrayNotEmpty($arrays)
        {
        foreach($arrays as $key=>$value)
                {
                if(is_array($value))
                        {
                        checkArrayNotEmpty($value);
                        }
                else
                        {
                        if(trim($value)!="")
                                return true;
                        }
                }
        return false;
        }

function getFilledRows($array,$columns="")
        {
        $columns=($columns)?$columns:array_keys($array);
        $array=flipArrayKeys($array,$columns);
        foreach($array as $key=>$value)
                {
                if(checkArrayNotEmpty($value))
                        {
                        $new_array[$key]=$value;
                        }
                }
        return $new_array;
        }

function flipArrayKeys($array,$columns="")
        {
        if($array)
                {
                foreach($array as $key=>$value)
                        {
                        if(is_array($value))
                                {
                                foreach($value as $key1=>$value1)
                                        {
                                        if($columns)
                                                {
                                                foreach($columns as $column_name)
                                                        {
                                                        if($column_name==$key)
                                                                $new_array[$key1][$key]=$value1;
                                                        }
                                                }
                                        else
                                                {
                                                $new_array[$key1][$key]=$value1;
                                                }
                                        }
                                }
                        }
                }
        return $new_array;
        }
/*****************************************************************************************
Function Name                 :mergeTableArrays
No. of Arguments        :3
Arguments                :$table_details1 -  Associative array of records to be displayed in
                                table format.
                         $table_details2 -  Associative array of records to be displayed in
                                table format.
			$merge_key - array of columns which are present in both the arrays and are to be merged into a single column
Action                    : merges $table_details1 and $table_details2 to have all the values present in $merge_key in both the arrays
Returns                        : merged Array ready to be used in table forming functions
Created By                : Ma Sivakumar
Created On                :14 March 2005
Modified By                :Ma Sivakumar
Modified On                :14 March 2005
*****************************************************************************************/

function mergeTableArrays($table_details1,$table_details2,$merge_key)
        {
        //for each row in $table_details1 merge the row in second table where the $merge_key is identical, if the key is not present in the second table, leave it blank, do the same for the values in second table which are not present in first table
        $count1=count($table_details1);
        for ($i=0; $i<$count1; $i++)
		{
		$size_value=$table_details1[$i][$merge_key];
		$merged_array[$i][$merge_key]=$table_details1[$i][$merge_key];
		$array1_keys=array_keys($table_details1[$i]);
		$array1_unique_key=$array1_keys[1];
		$array2_keys=array_keys($table_details2[$i]);
		$array2_unique_key=$array2_keys[1];
		$merged_array[$i][$array1_unique_key]=$table_details1[$i][$array1_unique_key];
		$merged_array[$i][$array2_unique_key]=$table_details2[$i][$array2_unique_key];
		}
	return $merged_array;
	}

function getDateCondition($customization_id,$report_format_type="")
	{
	include("global_files/tables.inc");
	global $db,$range_condition;
	//query to fetch date constraint and date condition columns to set default date condition
	$db->query="SELECT date_constraint[1] AS date_column, date_constraint[2] AS date_type,(date_condition).script_variable_name as date_column1,to_char((date_condition).from_date,'dd/mm/yyyy') as from_date, to_char((date_condition).to_date,'dd/mm/yyyy') as to_date FROM $sys_report_customization_table WHERE customization_id=$customization_id";
	$db->runQuery();
	$cus_name_array=$db->returnArrays();
//to select script variable name for column id stored in date condition or date constraint column based on value stored in sys_report_customization table - by karthi  on 04/10/07
	if ($cus_name_array[0]["date_column"])
		{
		$db->query="SELECT script_variable_name FROM $master_column_mapping_table WHERE column_id={$cus_name_array[0][date_column]};";
		$db->runQuery();
		$script_variable_name_array=$db->returnArrays();
		$date_type=$script_variable_name_array[0]["script_variable_name"];
		}
	else if ($cus_name_array[0]["date_column1"])
		{
		$db->query="SELECT script_variable_name FROM $master_column_mapping_table WHERE column_id={$cus_name_array[0][date_column1]};";
		$db->runQuery();
		$script_variable_name_array=$db->returnArrays();
		$date_type=$script_variable_name_array[0]["script_variable_name"];
		}

	//this loop will be executed only when there is no range condition set by clicking change conditions link and when date condition or date constraint is set. - by karthi on 06/10/07
	if($report_format_type=='transaction_report')
		{
		$formatted_from_date=$formatted_from_date?$formatted_from_date:date('Y-m-01');
		$formatted_to_date=$formatted_to_date?$formatted_to_date:date('Y-m-d');
		if($cus_name_array[0]["from_date"])
			{
			$formatted_from_date=getFormattedDate($cus_name_array[0]["from_date"]);
			$formatted_to_date=getFormattedDate($cus_name_array[0]["to_date"]);
			}
		elseif($cus_name_array[0]["date_type"])
			{
			switch($cus_name_array[0]["date_type"])
				{
				case 'day':
					$db->query="SELECT current_date AS day;";
					$db->runQuery();
					$date_array=$db->returnArrays();

					$formatted_to_date=$formatted_from_date=$date_array[0]["day"];
				break;
				case 'yday':
					$db->query="SELECT current_date-1 AS yday;";
					$db->runQuery();
					$date_array=$db->returnArrays();

					$formatted_to_date=$formatted_from_date=$date_array[0]["yday"];
				break;
				case 'week':
					$db->query="SELECT date_trunc('week',current_date)::date AS week_start, date_trunc('week',current_date)::date+6 AS week_end;";
					$db->runQuery();
					$date_array=$db->returnArrays();

					$formatted_from_date=$date_array[0]["week_start"];
					$formatted_to_date=$date_array[0]["week_end"];
				break;
				case 'month':
					$db->query="SELECT date_trunc('month',current_date)::date AS month_start, (date_trunc('month',current_date)::date + '1 month'::interval - '1 day'::interval)::date AS month_end;";
					$db->runQuery();
					$date_array=$db->returnArrays();

					$formatted_from_date=$date_array[0]["month_start"];
					$formatted_to_date=$date_array[0]["month_end"];
				break;
				}
			}
		return $formatted_from_date."~".$formatted_to_date."~".$date_type;
		}
	else
		{
		if(!$range_condition && (($cus_name_array[0]["date_column"] && $cus_name_array[0]["date_type"]) || ($cus_name_array[0]["date_column1"] && ($cus_name_array[0]["from_date"] || $cus_name_array[0]["to_date"]))))
			{

			if ($cus_name_array[0]["date_column1"])
				{
				$from_date=$cus_name_array[0]["from_date"];
				$to_date=$cus_name_array[0]["to_date"];
				if($from_date && $to_date)
					{
					$date_condition="  $date_type between '".getFormattedDate($from_date)."' and '".getFormattedDate($to_date)."'";

					$date_title=" from $from_date to $to_date";
					}
				elseif($from_date && !$to_date)
					{
					$date_condition=" $date_type >= '".getFormattedDate($from_date)."'";

					$date_title=" $date_type >= $from_date";
					}
				elseif($to_date && !$from_date)
					{
					$date_condition=" $date_type <= '".getFormattedDate($to_date)."'";

					$date_title=" $date_type <= $to_date";
					}
				}

			if ($cus_name_array[0]["date_column"])
				{
				switch($cus_name_array[0]["date_type"])
					{
					case 'day':
						$date_condition="$date_type=current_date";
						$db->query="SELECT to_char(current_date,'dd/mm/yyyy') AS day;";
						$db->runQuery();
						$tday_array=$db->returnArrays();
						$date_title=" on ".$tday_array[0]["day"];
						break;
					case 'yday':
						$date_condition="$date_type=current_date - 1";
						$db->query="SELECT to_char(current_date - 1,'dd/mm/yyyy') AS yday;";
						$db->runQuery();
						$yday_array=$db->returnArrays();
						$date_title=" on ".$yday_array[0]["yday"];
						break;
					case 'nday':
						$date_condition="$date_type=current_date + 1";
						$db->query="SELECT to_char(current_date + 1,'dd/mm/yyyy') AS nday;";
						$db->runQuery();
						$yday_array=$db->returnArrays();
						$date_title=" on ".$yday_array[0]["nday"];
						break;
					case 'week':
						$db->query="SELECT date_trunc('week',current_date)::date AS from_date,
						(date_trunc('week',current_date)::date + '6 day'::interval)::date AS to_date,
						to_char(date_trunc('week',current_date)::date,'dd/mm/yyyy') AS from_date1,
						to_char((date_trunc('week',current_date)::date + '6 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$week_array=$db->returnArrays();

						$from_date=$week_array[0]["from_date"];
						$to_date=$week_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$week_array[0]["from_date1"]." and ".$week_array[0]["to_date1"];
						break;
					case 'lweek':
						$db->query="SELECT (date_trunc('week',current_date)::date - '7 day'::interval)::date AS from_date,
						(date_trunc('week',current_date)::date - '1 day'::interval)::date AS to_date,
						to_char((date_trunc('week',current_date)::date - '7 day'::interval)::date,'dd/mm/yyyy') AS from_date1,
						to_char((date_trunc('week',current_date)::date - '1 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$week_array=$db->returnArrays();

						$from_date=$week_array[0]["from_date"];
						$to_date=$week_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$week_array[0]["from_date1"]." and ".$week_array[0]["to_date1"];
						break;
					case 'nweek':
						$db->query="SELECT (date_trunc('week',current_date)::date + '7 day'::interval)::date AS from_date, (date_trunc('week',current_date)::date + '13 day'::interval)::date AS to_date, to_char((date_trunc('week',current_date)::date + '7 day'::interval)::date,'dd/mm/yyyy') AS from_date1, to_char((date_trunc('week',current_date)::date + '13 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$week_array=$db->returnArrays();

						$from_date=$week_array[0]["from_date"];
						$to_date=$week_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$week_array[0]["from_date1"]." and ".$week_array[0]["to_date1"];
						break;
					case 'month':
						$db->query="SELECT date_trunc('month',current_date)::date AS from_date,
						(date_trunc('month',current_date)::date + '1 month'::interval - '1 day'::interval)::date AS to_date,
						to_char(date_trunc('month',current_date)::date,'dd/mm/yyyy') AS from_date1,
						to_char((date_trunc('month',current_date)::date + '1 month'::interval - '1 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$month_array=$db->returnArrays();

						$from_date=$month_array[0]["from_date"];
						$to_date=$month_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$month_array[0]["from_date1"]." and ".$month_array[0]["to_date1"];
						break;
					case 'lmonth':
						$db->query="SELECT (date_trunc('month',current_date)::date - '1 month'::interval)::date AS from_date,
						(date_trunc('month',current_date)::date - '1 day'::interval)::date AS to_date,
						to_char((date_trunc('month',current_date)::date - '1 month'::interval)::date,'dd/mm/yyyy') AS from_date1,
						to_char((date_trunc('month',current_date)::date - '1 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$month_array=$db->returnArrays();

						$from_date=$month_array[0]["from_date"];
						$to_date=$month_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$month_array[0]["from_date1"]." and ".$month_array[0]["to_date1"];
						break;
					case 'nmonth':
						$db->query="SELECT (date_trunc('month',current_date)::date + '1 month'::interval)::date AS from_date, (date_trunc('month',current_date)::date + '2 month'::interval - '1 day'::interval)::date AS to_date, to_char((date_trunc('month',current_date)::date + '1 month'::interval)::date,'dd/mm/yyyy') AS from_date1, to_char((date_trunc('month',current_date)::date + '2 month'::interval - '1 day'::interval)::date,'dd/mm/yyyy') AS to_date1;";
						$db->runQuery();
						$month_array=$db->returnArrays();

						$from_date=$month_array[0]["from_date"];
						$to_date=$month_array[0]["to_date"];

						$date_condition="$date_type BETWEEN '$from_date' AND '$to_date'";

						$date_title=" from ".$month_array[0]["from_date1"]." and ".$month_array[0]["to_date1"];
						break;
					default:
						$date_condition="";
					}
				}
			}
		return $date_condition."~".$date_title;
		}
	}
function getTransactionCondition($report_id)
	{
	include("global_files/tables.inc");
	global $db, $constraint_condition,$default_condition,$date_condition,$formatted_from_date,$formatted_to_date;
	switch($report_id)
		{
		case 18:
			$db->query="SELECT selectColumnValues('chemical_id','$formatted_from_date','$formatted_to_date') AS chemical_ids, selectColumnValues('location_id','$formatted_from_date','$formatted_to_date') AS location_ids, selectColumnValues('account_id','$formatted_from_date','$formatted_to_date') AS account_ids, selectColumnValues('zone_id','$formatted_from_date','$formatted_to_date') AS zone_ids;";
			$db->runQuery();
			$chemical_id_array=$db->returnArrays();
			$chemical_id_string=$chemical_id_array[0]["chemical_ids"];
			$location_id_string=$chemical_id_array[0]["location_ids"];
			$account_id_string=$chemical_id_array[0]["account_ids"];
			$zone_id_string=$chemical_id_array[0]["zone_ids"];

			if($chemical_id_string)
				{
				if($constraint_condition=="" && $default_condition=="" && $buyer_restriction_condition=="" && $date_condition=="")
					{
					$transaction_condition="WHERE chemical_id IN ($chemical_id_string) AND location_id IN ($location_id_string) AND account_id IN ($account_id_string) AND zone_id IN ($zone_id_string)";
					}
				else
					{
					$transaction_condition="AND chemical_id IN ($chemical_id_string) AND location_id IN ($location_id_string) AND account_id IN ($account_id_string) AND zone_id IN ($zone_id_string)";
					}
				}
			else
				{
				if($constraint_condition=="" && $default_condition=="" && $buyer_restriction_condition=="" && $date_condition=="")
					{
					$transaction_condition="WHERE chemical_id IS NULL";
					}
				else
					{
					$transaction_condition="AND chemical_id IS NULL";
					}
				}
		break;
		case 43:
			$db->query="SELECT selectColumnValues_106('animal_id','$formatted_from_date','$formatted_to_date') AS animal_ids, selectColumnValues_106('location_id','$formatted_from_date','$formatted_to_date') AS location_ids, selectColumnValues_106('stock_store_id','$formatted_from_date','$formatted_to_date') AS stock_store_ids;";
			$db->runQuery();
			$leather_id_array=$db->returnArrays();
			$leather_id_string=$leather_id_array[0]["animal_ids"];
			$location_id_string=$leather_id_array[0]["location_ids"];
			$stock_store_id_string=$leather_id_array[0]["stock_store_ids"];

			if($leather_id_string)
				{
				if($constraint_condition=="" && $default_condition=="" && $buyer_restriction_condition=="" && $date_condition=="")
					{
					$transaction_condition="WHERE animal_id IN ($leather_id_string) AND location_id IN ($location_id_string) AND stock_store_id IN ($stock_store_id_string)";
					}
				else
					{
					$transaction_condition="AND animal_id IN ($leather_id_string) AND location_id IN ($location_id_string) AND stock_store_id IN ($stock_store_id_string)";
					}
				}
			else
				{
				if($constraint_condition=="" && $default_condition=="" && $buyer_restriction_condition=="" && $date_condition=="")
					{
					$transaction_condition="WHERE animal_id IS NULL";
					}
				else
					{
					$transaction_condition="AND animal_id IS NULL";
					}
				}
		break;
		}
	}
function getSortColumn($array,$customization_id)
	{
	global $db,$sys_report_customization_sorting_details_table,$sys_report_customization_table,$master_column_mapping_table, $report_customization;
	$db->query="SELECT mcm.script_variable_name as original_column ,mcm1.script_variable_name as replace_column,mcm1.data_type from $sys_report_customization_sorting_details_table srcsd join $sys_report_customization_table src on src.customization_id=srcsd.customization_id join $master_column_mapping_table mcm on mcm.report_id=src.report_id and mcm.column_id=srcsd.column_id join $master_column_mapping_table mcm1 on mcm1.report_id=mcm.report_id and mcm1.column_id=srcsd.sort_column_id where srcsd.customization_id=$customization_id;";
	$db->runQuery();
	$sort_details_array=$db->returnArrays();
	$result_array=array();
	if(is_array($sort_details_array))
	foreach($sort_details_array as $key=>$value)
		{
		foreach($array as $key1=>$value1)
			{
			if($value["original_column"]==$key1)
				{
				$result_array[$value["replace_column"].",".$value["original_column"]]=$value1;
				$report_customization["db_grouping_array"][]=$value["replace_column"];
				}
			else
				{
				$result_array[$key1]=$value1;
				}
			}
		}
	return $result_array;
	}


function setCurrencyFormat($value,$decimal=0,$currency='en_IN')
	{
	/* Set locale to India */
	setlocale(LC_MONETARY, $currency);

	// %i or %n => print format (i for international format & n for national format),
	// ! => Suppress the currency symbol from the output string. (optional flag)
	// .p => A period followed by the number of digits (p) after the decimal character (optional flag)

	return money_format('%!.'.$decimal.'i', $value);
	}



/*function array_duplicate($main_array,$fields)
        {
        $bool=true;
        $count=count($main_array);
        for($i=0;$i<$count;$i++)
                {
                for($j=$i+1;$j<$count;$j++)
                        {
                        foreach($fields as $key=>$value)
                                {
                                $bool=($bool && $main_array[$i][$value]==$main_array[$j][$value]);
                                }
                        if($bool)
                                return $bool;
                        else
                                $bool=true;
                        }
                }
        return false;
        }*/

/*
Function        : unsetPreferredColumns

Arguments       : &$arrays (reference),$unset_columns

Action          : unsets the display names for column_names as preferred by the member
		  Eg. mainly used in report framwork for percentage , average where total
		  is required in report details whereas it should be hiden in grand total

Author          : Sathish Kumar D

Created on      : 04/06/2008
*/
function unsetPreferredSummary(&$total_arrays,$unset_columns)
        {
        $c=count($total_arrays);
        if($unset_columns)
                {
                for($i=0;$i<$c;$i++)
                        {
                        foreach($unset_columns as $column)
                                {
				unset($total_arrays[$i][$column]);
                                }
                        }
                }
        }
// function getGroupArray($array,$group=array(),$summary="",$heading=array(),$serial_no=false,$total_string="Total:")
//         {
//         global $report_customization,$summary_details,$report_details,$show_column, $query_string;
//                 $sorted_final_grouped_arrays=array();
// 		$first_sorted_group_arrays=array();
//
// 	//the last level grouping
//         if(count($group)<= 1)
//                 {
//                 //group the array with the grouping selected with records sorted by the sorting chosen for that group
//                 $final_array=sortArray($array,key($group),"","yes");
//
//                 //$final_array is in the form array[group_name]=grouped_arrays, now we take each of these grouped and sort them by the sorting selected.
//                 foreach($final_array as $final_array_key=>$final_array_value)
//                         {
// 			$grouped_array=$final_array1[$final_array_key]=$final_array_value;
//                         $heading[0][key($group)]=$final_array_key;
//                         //getTotal is written for each script and returns totals of required columns set in the function
//                         $total_array=getTotal($grouped_array);
//                         assignPreferredSummary($total_array,$report_customization["display_summary_columns"]);
//                         //$heading is generated with the name of each group, only if any grouping is there we need to generate summary report and group heading
//                         if(count($heading)!=0)
//                                 {
//                                 //for generating summary report
//                                 if($summary=="summary_report")
//                                         {
//                                         //total array may have more than one row depending on the uom or currency etc sorting applied in getTotal function
//                                         if($total_array)
//                                                 {
//                                                 foreach($total_array as $row=>$field)
//                                                         {
//                                                         //generate summary details as an array with the headings and row(s) summary details values are added to the already existing values when this function is called recursively
//                                                         $summary_details[]=array_merge($heading[0],$total_array[$row]);
//                                                         }
//                                                 }
//                                         }
//                                 else
//                                         {
//                                         if($_SESSION["guser_preferences"]["split_group"]=="yes" && $heading[0])
//                                                 {
//                                                 foreach($grouped_array as $row=>$record)
//                                                         {
//                                                         foreach($heading[0] as $grp=>$val)
//                                                                 {
//                                                                 if(isset($show_column[$grp]))
//                                                                         {
//                                                                         $heading[0][$grp]=$grouped_array[$row][$show_column[$grp]];
//                                                                         }
//                                                                 unset($grouped_array[$row][$grp]);
//                                                                 }
//                                                         }
//                                                 echo "<br>";
//                                                 //show the columns chosen by the user with the name entered by them. Also set the decimal places or change the values as defined by the user using values in report customization print the heading for each group with required cell formatting using values in report customization
//                                                 $temp_heading=$heading;
//                                                 assignPreferredColumns($temp_heading,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"DEFAULT_ORDER",$report_customization["format_date"]);
//                                                 doHorizontalTable($temp_heading,"60%","",$report_customization["column_style"]);
//                                                 }
//                                         else
//                                                 {
//                                                 foreach($grouped_array as $row=>$record)
//                                                         {
//                                                         if($row > 0 && $group)
//                                                                 {
//
//                                                                 foreach($heading[0] as $grp=>$val)
//                                                                         {
//                                                                         $grouped_array[$row][$grp]=" ";
//                                                                         }
//                                                                 }
//                                                         else
//                                                                 {
//                                                                 foreach($heading[0] as $grp=>$val)
//                                                                         {
//                                                                         if(isset($show_column[$grp]))
//                                                                                 {
//                                                                                 $grouped_array[$row][$grp]=$grouped_array[$row][$show_column[$grp]];
//                                                                                 }
//                                                                         }
//                                                                 }
//                                                         }
//
//                                                 foreach($heading[0] as $gname=>$gorder)
// 							{
//                                                         $display_order[$gname]=$report_customization["display_columns"][$gname];
// 							}
//                                                 $old_order=$report_customization["display_columns"];
//                                                 $new_order=array_merge($display_order,$old_order);
//                                                 $report_customization["display_columns"]=$new_order;
//                                                 }
//                                         }
//                                 }
//                         if ($summary!="summary_report")
//                                 {
//                                 //totals are to be shown as part of the report table after an empty line in the table
//                                 $original_count=count($grouped_array);
//
//                                 //create a row with totals in the corresponding columns -
//                                 if($total_array)
//                                         {
//                                         foreach($total_array as $key=>$value)
//                                                 {
// 						//the row count will increase based on the number of rows in total array
// 						$nor=count($grouped_array);
//
// 						//for each column in the report check whether total is available
// 						foreach($grouped_array[0] as $key1=>$value1)
// 							{
// 							if(is_array($value1))
// 								{
// 								foreach($value1 as $x => $y)
// 									{
// 									if(isset($total_array[$key][$key1][$x]))
// 										{
// 										$grouped_array[$nor][$key1][$x]="<b>".$total_array[$key][$key1][$x]."</b>";
// 										$summary_total_cols[0][$key1][$x]=$total_array[$key][$key1][$x];
// 										}
// 									else
// 										{
// 										$grouped_array[$nor][$key1][$x]=" ";
// 										}
// 									}
// 								}
// 							else
// 								{
// 								if(isset($total_array[$key][$key1]))
// 									{
// $group_count=count($grouped_array)-1;
// $total_string=($group_count>1)?$total_array[$key][$key1]:"&nbsp;";
// $grouped_array[$nor][$key1]="<b>".$total_string."</b>";
// 									$summary_total_cols[0][$key1]=$total_array[$key][$key1];
// 									}
// 								else
// 									{
// 									$grouped_array[$nor][$key1]=" ";
// 									}
// 								}
// 							}
//                                                 }
//                                         }
//
//                                         setNA($grouped_array);
//                                         assignPreferredColumns($grouped_array,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);
//                                         assignPreferredColumns($summary_total_cols,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);
//
// 					$col_head = array_keys($grouped_array[0]);
//                                         if ($summary_total_cols)
// 					{
// 					if(key($summary_total_cols[0]) == $col_head[0])
//                                                 {
// 							$grouped_array[$original_count][$col_head[0]] = "<b>$total_string</b><br /> <br /> ".$grouped_array[$original_count][$col_head[0]];
//                                                 }
//                                                 else
//                                                 {
// 							$grouped_array[$original_count][$col_head[0]] = "<b>$total_string <br /> <br /></b> ";
//                                                 }
// 					}
//                                 if($_SESSION["guser_preferences"]["split_group"]!="yes")
//                                         {
//                                         if(isset($report_details))
//                                                 $report_details=appendArrays($report_details,$grouped_array);
//                                         else
//                                                 $report_details=$grouped_array;
//                                         }
//                                 else
// 					doHorizontalTable($grouped_array,"100%","",$report_customization["column_style"],true,true,$serial_no,"reporttable");
//                                 }
//                         }
//                 return $final_array1;
//                 }
//         else
//                 {
//                 $group_name=key($group);
//                 //if there are more than one level of grouping, group the array with the first grouping in the group array
//                 $f_array=sortArray($array,key($group),"","yes");
//                 //remove the above group condition from the group array
//                 array_shift($group);
//                 //get the grouped arrays for each group obtained above and pass to the same function. For each level of grouping an array with additional dimension is created
//                 foreach($f_array as $key=>$value)
//                         {
//                         $heading[0][$group_name]=$key;
//                         $f_array[$key]=getGroupArray($value,$group,$summary,$heading,$serial_no,$blank_row);
//                         }
//                 return $f_array;
//                 }
//         }

function getGroupArray($array,$group=array(),$summary="",$heading=array(),$serial_no=false)
        {
		global $report_customization,$summary_details,$report_details,$show_column, $query_string,$report_id;
                $sorted_final_grouped_arrays=array();
		$first_sorted_group_arrays=array();

		//the last level grouping
        if(count($group)<= 1)
                {
                //group the array with the grouping selected with records sorted by the sorting chosen for that group
                $final_array=sortArray($array,key($group),"","yes");

                //$final_array is in the form array[group_name]=grouped_arrays, now we take each of these grouped and sort them by the sorting selected.
                foreach($final_array as $final_array_key=>$final_array_value)
                        {
			$grouped_array=$final_array1[$final_array_key]=$final_array_value;
                        $heading[0][key($group)]=$final_array_key;

                        //getTotal is written for each script and returns totals of required columns set in the function
                        $total_array=getTotal($grouped_array);

                        assignPreferredSummary($total_array,$report_customization["display_summary_columns"]);

                        //$heading is generated with the name of each group, only if any grouping is there we need to generate summary report and group heading
                        if(count($heading)!=0)
                                {
                                //for generating summary report
                                if($summary=="summary_report")
                                        {
                                        //total array may have more than one row depending on the uom or currency etc sorting applied in getTotal function
                                        if($total_array)
                                                {
                                                foreach($total_array as $row=>$field)
                                                        {
                                                        //generate summary details as an array with the headings and row(s) summary details values are added to the already existing values when this function is called recursively
                                                        $summary_details[]=array_merge($heading[0],$total_array[$row]);
                                                        }
                                                }
                                        }
                                else
                                        {
                                        if($_SESSION["guser_preferences"]["split_group"]=="yes" && $heading[0])
                                                {
                                                foreach($grouped_array as $row=>$record)
                                                        {
                                                        foreach($heading[0] as $grp=>$val)
                                                                {
                                                                if(isset($show_column[$grp]))
                                                                        {
                                                                        $heading[0][$grp]=$grouped_array[$row][$show_column[$grp]];
                                                                        }
                                                                unset($grouped_array[$row][$grp]);
                                                                }
                                                        }
                                                echo "<br>";
                                                //show the columns chosen by the user with the name entered by them. Also set the decimal places or change the values as defined by the user using values in report customization print the heading for each group with required cell formatting using values in report customization
                                                $temp_heading=$heading;
                                                assignPreferredColumns($temp_heading,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"DEFAULT_ORDER",$report_customization["format_date"]);
                                                doHorizontalTable($temp_heading,"60%","",$report_customization["column_style"]);
                                                }
                                        else
                                                {
                                                foreach($grouped_array as $row=>$record)
                                                        {
                                                        if($row > 0 && $group)
                                                                {

                                                                foreach($heading[0] as $grp=>$val)
                                                                        {
                                                                        $grouped_array[$row][$grp]=" ";
                                                                        }
                                                                }
                                                        else
                                                                {
                                                                foreach($heading[0] as $grp=>$val)
                                                                        {
                                                                        if(isset($show_column[$grp]))
                                                                                {
                                                                                $grouped_array[$row][$grp]=$grouped_array[$row][$show_column[$grp]];
                                                                                }
                                                                        }
                                                                }
                                                        }

                                                foreach($heading[0] as $gname=>$gorder)
                                                        $display_order[$gname]=$report_customization["display_columns"][$gname];
                                                $old_order=$report_customization["display_columns"];
                                                $new_order=array_merge($display_order,$old_order);
                                                $report_customization["display_columns"]=$new_order;
                                                }
                                        }
                                }

                        if ($summary!="summary_report")
                                {
                                //totals are to be shown as part of the report table after an empty line in the table
                                $original_count=count($grouped_array);

                                //create a row with totals in the corresponding columns -
                                if($total_array)
                                        {
                                        foreach($total_array as $key=>$value)
                                                {
                                                //the row count will increase based on the number of rows in total array
                                                $nor=count($grouped_array);

                                                //for each column in the report check whether total is available
                                                foreach($grouped_array[0] as $key1=>$value1)
                                                        {

							if(isset($total_array[$key][$key1]))
                                                                {

        							$grouped_array[$nor][$key1]="<b>".$total_array[$key][$key1]."</b>";
                                                                $summary_total_cols[0][$key1]=$total_array[$key][$key1];
                                                                }
                                                        else
                                                                {
                                                                $grouped_array[$nor][$key1]=" ";
                                                                }
                                                        }
                                                }

                                        }
                                        setNA($grouped_array);

                                        assignPreferredColumns($grouped_array,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);

                                        assignPreferredColumns($summary_total_cols,$report_customization["display_columns"],$report_customization["decimal_places"],$report_customization["format_details"],"",$report_customization["format_date"]);
					if(is_array($grouped_array[0]))
					$col_head = array_keys($grouped_array[0]);

                                        if ($summary_total_cols)
					{
					if(key($summary_total_cols[0]) == $col_head[0])
                                                {
						 $grouped_array[$original_count][$col_head[0]] = "<b>Total:</b><br /> <br /> ".$grouped_array[$original_count][$col_head[0]];
                                                }
                                                else
                                                {
						$grouped_array[$original_count][$col_head[0]] = "<b>Total: <br /> <br /></b> ";
                                                }
					}

                                if($_SESSION["guser_preferences"]["split_group"]!="yes")
                                        {

                                        if(isset($report_details))
					        $report_details=appendArrays($report_details,$grouped_array);
					else
                                                $report_details=$grouped_array;
                                        }
                                else
				doHorizontalTable($grouped_array,"100%","",$report_customization["column_style"],true,true,$serial_no,"reporttable");

                                }
                        }
                return $final_array1;
                }
        else
                {
                $group_name=key($group);
                //if there are more than one level of grouping, group the array with the first grouping in the group array
                $f_array=sortArray($array,key($group),"","yes");
                //remove the above group condition from the group array
                array_shift($group);
                //get the grouped arrays for each group obtained above and pass to the same function. For each level of grouping an array with additional dimension is created
                foreach($f_array as $key=>$value)
                        {
                        $heading[0][$group_name]=$key;
                        $f_array[$key]=getGroupArray($value,$group,$summary,$heading,$serial_no,$blank_row);
                        }
                return $f_array;
                }
        }

//function to format and return conditional columns for summary reports
function getConditionalColumns($report_customization,$report_view,$report_conditions_string)
	{
	$db_columns_array=array_values($report_customization["summary_columns"]);
	$conditional_columns_array=$report_customization["conditional_columns"];
	if($conditional_columns_array)
		{
		foreach($conditional_columns_array as $column_array)
			{
			list($conditional_column,$distinct_column,$exclude_column)=explode(",",$column_array);
			if(in_array($conditional_column,$db_columns_array))
				{
				$group_columns_condition_array=$report_customization["db_grouping_array"];
				$exclude_column_key=array_keys($group_columns_condition_array,$exclude_column);
				unset($group_columns_condition_array[$exclude_column_key[0]]);
				if ($report_conditions_string!="")
					$group_columns_condition_string=$report_conditions_string." AND ";
				else
					$group_columns_condition_string=" WHERE ";

				foreach ($group_columns_condition_array as $group_condition_column)
					{
					$group_columns_condition_string.=$group_condition_column."=report_view.".$group_condition_column." AND ";
					}
				//put a 1 for the last and
				$group_columns_condition_string=rtrim($group_columns_condition_string," AND");
				//we need to generate a subquery from which the sum will be generated
				$conditional_column_names_array[]="(SELECT SUM(".$conditional_column.") FROM  (SELECT DISTINCT ON (".$distinct_column.") ".$conditional_column." FROM ".$report_view." ".$group_columns_condition_string.") t)   AS ".$conditional_column;
				}
			}
		if($conditional_column_names_array)
			{
			$conditional_column_names_string=implode(",",$conditional_column_names_array);
			return ",".$conditional_column_names_string;
			}
		}
	}

//function to format and return conditional columns for summary reports
function getConditionalTotal($arrays,$sum_column,$exclude_column,$column_array)
	{
	if($arrays)
		{
		$distinct_rows=array();
		foreach($arrays as $key=>$value)
			{
			$sum_column_value=$value[$sum_column];

			unset($value[$exclude_column]);
			foreach($column_array as $other_sum_column)
				unset($value[$other_sum_column]);
			if (!in_array($value,$distinct_rows))
				{
				$sum+=$sum_column_value;
				$distinct_rows[]=$value;
				}
			}
		}
	return $sum;
	}
function getColumnTotal($arrays,$sum_column)
	{
	if($arrays)
		{
		foreach($arrays as $key=>$value)
			{
			$sum+=$value[$sum_column];
			}
		}
	return $sum;
	}

function AssociativeArrayToArray($array,$column_name="")
        {
        if($array)
                {
                foreach($array as $key=>$value)
                        {
                        $result_array[]=$value[$column_name];
                        }
                }
        return $result_array;
        }

// create cross tab header for the cross tab report
function createCrossTabHeader($header_array,$title_append_array=array())
{
$value_column_separator="::";
$group_value_separator="~~";
$cross_tab_column=1;
$cross_tab_row=1;
$span_array=array();
$group_columns_count=1;
// Getting the header array data_array[0]
foreach($header_array as $key=>$value)
	{
	$current_row=0;
	// checking for the value column if it not there span the column to max row(header)
	if(!strstr($key,$value_column_separator))
		{
		$span_array[$current_row][$key]="rowspan";
		}
	else
		{
		//checking for the value column or group column if group column group column name with the previous group column and add the value column at the end of the each row
		list($prefix,$value_column)=explode($value_column_separator,$key);
		$group_columns=explode($group_value_separator,$prefix);
		$group_columns_count=count($group_columns)>$group_columns_count?count($group_columns):$group_columns_count;
		foreach($group_columns as $no_of_group=>$group_column_name)
			{
			$span_array[$current_row][$group_columns[$no_of_group-1].$group_value_separator.$group_column_name]++;
			$current_row++;
			}
			$span_array[$current_row][$prefix."::".$value_column]=1;
		}
	}

$count=count($span_array);
foreach($span_array as $row=>$value)
	{
	foreach($value as $key1=>$value1)
		{
		// if the data is of rowspan then it is considered as the keep column and it is spanned for rows for the count of the row header
		if($value1=="rowspan")
			{
			$table_string.="<TH rowspan=\"$count\">"."$key1</TH>";
			}
		else
			{
			//check for the value column if it is true the print the value column with colspan as spann array value [1]
			list($prefix,$value_column)=explode($value_column_separator,$key1);
			if(!$value_column)
				{
				//if it is not a value column then it should be a group column separate the pre group and print the group
				list($previous_group_column,$group_column_name)=explode($group_value_separator,$prefix);
				}
			$column_name=$value_column?$value_column:$group_column_name;
			$table_string.="<TH colspan=\"$value1\">"."$column_name</TH>";
			}
		}

	$table_string.="</TR>";
	}
return $table_string;
}

function showExcelReport($report_id,$customization_id,$title,$data_type_array=array())
	{
		global $_SESSION,$db,$master_report_table;
		include_once("spread_sheet/global_spreadsheet.inc");
		$spsheet= new cSpreadsheet();
		$date=date("ymd");
		$report_array=$_SESSION["reporttable"][$customization_id];
		$db->query="SELECT report_name from $master_report_table where report_id=$report_id";
		$db->runQuery();
		$report_name_array=$db->returnArrays();
		$spreadsheet_name=str_replace(" ","_",$report_name_array[0]['report_name']);
		$worksheet_name="Sheet1";
		$spsheet->createSpreadsheet($report_array,$date."_".$spreadsheet_name,$worksheet_name,$title,$data_type_array);

		exit();
	}
function formStringFromArray($array,$column_name="")
{

	if(is_array($array))
	{
		foreach($array as $key=>$value)
		{
			if($value&&$column_name=="")
				 $condition.="'".$value."',";
			elseif($value)
				$condition.="'".$value[$column_name]."',";
		}

	}
$condition=rtrim($condition,',');
return $condition;
}

function delete_report($report_id)
	{
	global $db,$sys_user_report_customization_table,$sys_report_customization_table,$master_report_customization_table,$master_column_mapping_table,$report_customization_table,$sys_filter_customization_table,$sys_report_crosstab_preferences_table,$sys_report_crosstab_value_columns_table,$sys_report_customization_sorting_details_table,$sys_report_crosstab_customization_table,$sys_report_conditional_fields_table,$sys_report_filter_table,$sys_report_master_filter_table,$master_report_table;

	$db->query="DELETE FROM $sys_user_report_customization_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

       	$db->query="DELETE from $master_report_customization_table where column_id in (select column_id from $master_column_mapping_table where report_id in ($report_id))";
	$db->runQuery();

        $db->query="DELETE from $report_customization_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

        $db->query="DELETE from $sys_filter_customization_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

	$db->query="delete from $sys_report_crosstab_preferences_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

	$db->query="delete from $sys_report_crosstab_value_columns_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

	$db->query="delete from $sys_report_customization_sorting_details_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

	$db->query="delete from $sys_report_crosstab_customization_table where customization_id in (select customization_id from $sys_report_customization_table where report_id in ($report_id))";
	$db->runQuery();

	$db->query="delete from $sys_report_conditional_fields_table where report_id in ($report_id)";
	$db->runQuery();

	$db->query="DELETE from $sys_report_customization_table where report_id in ($report_id)";
	$db->runQuery();

// 	$db->query="DELETE from $sys_report_master_filter_table where filter_id in (select filter_id from $sys_report_filter_table where report_id in ($report_id))";
// 	$db->runQuery();
	$db->query="select filter_id from $sys_report_filter_table where report_id in ($report_id)";
	$db->runQuery();
	$filter_details_array=$db->returnArrays();
	$filter_details_array=AssociativeArrayToArray($filter_details_array,"filter_id");
	$filters_list=implode(",",$filter_details_array);
	$db->query="DELETE from $sys_report_filter_table where report_id in ($report_id) ";
	$db->runQuery();


	$db->query="DELETE from $sys_report_master_filter_table where filter_id in ($filters_list)";
	$db->runQuery();


        $db->query="DELETE from $master_column_mapping_table where report_id in ($report_id)";
	$db->runQuery();

	$db->query="select table_view_name from $master_report_table where report_id in ($report_id);";
	$db->runQuery();
	$table_view_array=$db->returnArrays();
	$table_view=$table_view_array[0]["table_view_name"];

        $db->query="DELETE from $master_report_table where report_id in ($report_id)";
	$db->runQuery();

	$db->query="DROP TABLE if EXISTS $table_view CASCADE;";
	$db->runQuery();

	$db->query="DROP VIEW if EXISTS $table_view;";
	$db->runQuery();
	}
	/////////////////////////////////////////////////////////////////////////////////////////////////
	// Created by G.M.Sundar
	// on 26/04/2009
	//Purpose : Used to Validate Page
	/////////////////////////////////////////////////////////////////////////////////////////////////

function validateSession($type=1,$access="e")
	{
	global $page;
	if(!$_SESSION)
		{
		header("Location:".$page->header_path."infoarea/gloview-introduction.php");
		exit;
		}

	}
function sendMail($from_address,$to_address,$subject,$html_text,$background_image="",$attachment=array())
	{
	require_once('mail/htmlMimeMail.php');
	$mail = new htmlMimeMail();
	//$value[0] will be the file name i.e example.zip
	//$value[1] will be the type of the attachment i.e application/zip
	//$value[2] will be the display string i.e po.zip
	if(is_array($attachment))
	foreach($attachment as $key=>$value)
		{
		$attachment = $mail->getFile($value[0]);
		$mail->addAttachment($attachment,$value[2],$value[1]);
		}
	$mail->setReturnPath($from_address);
	$html_text=eregi_replace("[\]",'',$html_text);
	$mail->setHtml($html_text);
	$to_address_string=is_array($to_address)?implode($to_address):$to_address;
	$mail->setFrom($from_address);
	$mail->setSubject($subject);
	$mail->setHeader('X-Mailer', 'Designed and maintained by BSG Leatherlink');
	$result = $mail->send(array($to_address_string), 'smtp');
	if($result)
		return "Mail Sucessfully sent to $to_address";
	else
		return "Sending mail failed";
	}


?>