<?php
///////////////////////////////////////////////////////
// Created by G.M.Sundar
// on 06/10/24
//Description : Used to create Spread Sheet from an Array passed
////////////////////////////////////////////////////////

require_once 'spread_sheet/Writer.php';

class cSpreadsheet
	{
		function createSpreadsheet($arrays,$filename,$worksheet="",$title="",$data_type_array=array())
		{

		// Creating a workbook
		$workbook = new Spreadsheet_Excel_Writer();
		// sending HTTP headers
		if ($filename)
			$workbook->send($filename.'.xls');
		else
			$workbook->send('report.xls');

		// Creating a worksheet
		if ($worksheet)
			$worksheet =& $workbook->addWorksheet($worksheet);
		else
			$worksheet =& $workbook->addWorksheet('Report Sheet 1');
		// The actual data
		$format_bold =& $workbook->addFormat();
		$format_bold->setBold();
		// $workbook->setFooter()

        	if ($arrays)
            		{
                	$colcount=0; //for setting the footer colspan
			foreach($arrays[0] as $key=>$value)
                                {
				$worksheet->write(0,$colcount ,strip_tags($key),$format_bold );
				$colcount++;
				}
			}
                $i=0;
                $cnt=count($arrays);

                for($j=0; $j<$cnt; $j++)
                        {
			$cell=0;
			foreach($arrays[$j] as $key=>$value)
                                {
				switch($data_type_array[$key])
					{
					case "integer":
					case "numeric":
					$worksheet->writeNumber($j+1,$cell ,strip_tags($value));
					default:
					$worksheet->write($j+1,$cell ,strip_tags($value));
					}
				$cell++;
                                }
			}
		$workbook->close();
		}
	}
?>