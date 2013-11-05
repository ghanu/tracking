<?php
include ("global_files/global_pgsql.inc");
include ("global_files/global_functions.inc");
include ("global_files/global_session.inc");
include ("global_files/tables.inc");
$sql= new pgSql();
$db= new cDatabase();
// $company_id="_100111";
function createNewReport($report_code, $report_name,$table_name='')
        {
        global $db,$sql, $sys_report_customization_table, $master_report_table, $sys_user_info_table, $sys_user_report_customization_table, $report,$user_id;
// 	$company_id="_100111";
        $db->query="insert into $master_report_table (report_code, report_name,table_view_name) values ('".trim($report_code)."','".trim($report_name)."','".trim($table_name)."');";
       $db->runQuery();
       //fetch the report id and insert a default customziation for this report
       $db->query="insert into $sys_report_customization_table (report_id, customization_name, is_active) select report_id, 'Default','t' from $master_report_table where report_code='".trim($report_code)."' returning customization_id;";
      $db->runQuery();
	$default_customization_id_array=$db->returnArrays();
	$customiztion_id=$default_customization_id_array[0]["customization_id"];

	$db->query = "select user_id from $sys_user_info_table where user_type_id = 'ceo';";
	$db->runQuery();
	$user_id_array=$db->returnArrays();
	if($_SESSION["guser_type_id"]!='ceo')
		{
		$array_count=count($user_id_array);
		$user_id_array=array_merge($user_id_array,array("$array_count"=>array("user_id"=>$_SESSION["guser_id"])));
		}
	foreach($user_id_array as $key=>$value)
		{
		$sys_user_report_array["user_id"]=$value["user_id"];
		$sys_user_report_array["customization_id"]=$customiztion_id;
		$sys_user_report_array["permission_id"]=8;
		$sql->table = $sys_user_report_customization_table;
		$sql->column = $sys_user_report_array;
		$sql->returning = '*';
		$sql->generateInsertQuery();
		$db->query = $sql->query;
		$db->runQuery();
		$default_customization_id_array=$db->returnArrays();
		}

       }

function insertNewColumns($report_code, $columns_array1, $columns_array2)
        {
        global $db,$sql,$master_report_table,$sys_report_customization_table,$master_column_mapping_table,$master_report_customization_table,$report_customization_table;
	$db->query = "select report_id from $master_report_table where report_code='$report_code'";
	$db->runQuery();
	$report_array = $db->returnArrays();
	$report_id=$report_array[0]["report_id"];

	$db->query = "select customization_id from $sys_report_customization_table where report_id='$report_id'";
	$db->runQuery();
	$custom_array = $db->returnArrays();
	$customization_id=$custom_array[0]["customization_id"];

// 	$company_id=$_SESSION["search_path"];
        $c=count($columns_array1);
        for($i=0; $i<$c; $i++)
                {
                foreach($columns_array1[$i] as $key=>$value)
                        {
                        $columns_array1[$i][$key]=trim($value);
                        }
		$columns_array1[$i]["report_id"]=$report_id;
		$sql->table = $master_column_mapping_table;
		$sql->column = $columns_array1[$i];
		$sql->generateInsertQuery();
		$db->query = $sql->query;
		$db->runQuery();
	$db->query = "select customization_id from $sys_report_customization_table where report_id='$report_id'";
	$db->runQuery();
	$custom_array = $db->returnArrays();
	$customization_id=$custom_array[0]["customization_id"];

	if ($columns_array2[$i]["set_default"]=="t")
		{
		$default_customization="t";
		}
	else
		$default_customization="f";

	unset($columns_array2[$i]["set_default"]);

		foreach($columns_array2[$i] as $key=>$value)
                        {
                        $columns_array2[$i][$key]=trim($value);
                        }
                $columns_array2[$i]["column_id"]=getNewId("$master_column_mapping_table", "column_id");
		$sql->table = $master_report_customization_table;
		$sql->column = $columns_array2[$i];
		$sql->generateInsertQuery();
		$db->query = $sql->query;
		$db->runQuery();
		if ($default_customization=="t")
			{
			$columns_array2[$i]["customization_id"]=$customization_id;
			$sql->table = $report_customization_table;
			$sql->column = $columns_array2[$i];
			$sql->generateInsertQuery();
			$db->query = $sql->query;
			$db->runQuery();
			}
		}
        }


function updateColumns($report_code, $columns_array1, $columns_array2)
        {
        global $db,$sql,$report_customization_table,$master_column_mapping_table,$master_report_customization_table;
        $c=count($columns_array1);
        for($i=0; $i<$c; $i++)
                {
                $condition_array=array ("report_code"=>$report_code, "script_variable_name"=>$columns_array1[$i]["script_variable_name"]);
		$sql->table= $master_column_mapping_table;
        	$sql->column[]="column_id";
		$sql->condition[]="report_code='$report_code'";
		$sql->generateSelectQuery();
		$db->runQuery();
                $column_id_array=$db->returnArrays();
                $condition_array1["column_id"]=$column_id_array[0]["column_id"];

                foreach($columns_array1[$i] as $key=>$value)
                        {
                        $columns_array1[$i][$key]=trim($value);
                        }
		$sql->column = $columns_array1[$i];
		$sql->table = $master_column_mapping_table;
		$sql->condition = $condition_array1;
		$sql->generateUpdateQuery();
		$db->query = $sql->query;
		$db->runQuery();

                foreach($columns_array2[$i] as $key=>$value)
                        {
                        $columns_array2[$i][$key]=trim($value);
                        }
		$sql->column = $columns_array2[$i];
		$sql->table = $master_report_customization_table;
		$sql->condition = $condition_array1;
		$sql->generateUpdateQuery();
		$db->query = $sql->query;
		$db->runQuery();if ($columns_array2[$i]["set_default"]=="y")
			{
			unset($columns_array2[$i]["set_default"]);
			$columns_array2[$i]["customization_id"]=$customization_id;
			$sql->table = $report_customization_table;
			$sql->column = $columns_array2[$i];
			$sql->generateInsertQuery();
			$db->query = $sql->query;
			$db->runQuery();
			}
		}
	}

	function createNewFilters($columns_array1)
        {
        global $db,$sql,$sys_report_master_filter_table;
	$company_id = _100111;
         $c=count($columns_array1);
        for($i=0; $i<$c; $i++)
                {
//                 foreach($columns_array1[$i] as $key=>$value)
//                         {
//                         $columns_array1[$i][$key]=trim($value);
//
//                         }
		$sql->column=$columns_array1[$i];
		$sql->exclude_columns=array();
		$sql->table=$sys_report_master_filter_table;
                //$columns_array1[$i]["report_id"]=trim($report_id);
                $sql->generateInsertQuery();
		$db->query=$sql->query;
                echo $db->runQuery();

       		 }
        }


/*	function createNewFilters($columns_array1)
        {
        global $db;
         $c=count($columns_array1);
        for($i=0; $i<$c; $i++)
                {
                foreach($columns_array1[$i] as $key=>$value)
                        {
                        $columns_array1[$i][$key]=trim($value);
                        }
                //$columns_array1[$i]["report_id"]=trim($report_id);
                $db->query=generateInsertQuery("_100282".".sys_master_filter",$columns_array1[$i]);
                $db->runQuery();

       		 }
        }*/

function insertNewReportFilters($columns_array1)
        {
        global $db, $sys_report_master_filter_table,$master_report_table,$master_column_mapping_table,$sys_report_filter_table, $sys_filter_customization_table;
         $c=count($columns_array1);

       for($i=0; $i<$c; $i++)
                {
                foreach($columns_array1[$i] as $key=>$value)
                        {
                        $columns_array1[$i][$key]=trim($value);
                        }
		}
	for($i=0; $i<$c; $i++)
                {
			echo $db->query="select report_id,table_view_name from ".$master_report_table." where report_code='".$columns_array1[$i][report_code]."';";
			$db->runQuery();
			$sys_report_filters=$db->returnArrays();
			$report_id=$sys_report_filters_values["report_id"]=$sys_report_filters[0]["report_id"];
			$table_view_name=$sys_report_filters_values["table_view_name"]=$sys_report_filters[0]["table_view_name"];
			
			echo $db->query="select filter_id from ".$sys_report_master_filter_table." where filter_name='".$columns_array1[$i][filter_name]."' and filter_table_join='".$table_view_name."';";
			$db->runQuery();
			$sys_report_filters=$db->returnArrays();
			$filter_id=$sys_report_filters_values["filter_id"]=$sys_report_filters[0]["filter_id"];

			
			$db->query = "select customization_id from $sys_report_customization_table where report_id='$report_id'";
			$db->runQuery();
			$custom_array = $db->returnArrays();
			$customization_id=$custom_array[0]["customization_id"];


			$db->query="select column_id from ".$master_column_mapping_table." where script_variable_name='".$columns_array1[$i][script_variable_name]."' and report_id=".$sys_report_filters_values[report_id].";";
			$db->runQuery();
			$master_column_id=$db->returnArrays();
			//$group_column=$columns_array1[$i]["group_column"];
			$column_id=$group_column=$sys_report_filters_values["filter_column"]=$master_column_id[0]["column_id"];
			 $db->query="insert into $sys_report_filter_table(report_id,filter_id,filter_column, group_column) values($report_id,$filter_id,$column_id, $group_column);";
			$db->runQuery();

		if ($columns_array1[$i]["set_default"]=="t")
			{
			 $db->query="insert into $sys_filter_customization_table(customization_id,filter_id,filter_display_name, filter_order) select $customization_id, $filter_id, form_display, $i from $sys_master_filter_table where filter_id=$filter_id;";
			$db->runQuery();
			}
		}
	}
?>
