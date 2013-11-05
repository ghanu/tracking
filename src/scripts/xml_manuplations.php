<?php 

include_once AppRoot . AppController. "cXMLController.php";

//$ccobj = new cXMLManupluationController();

include_once AppRoot . AppController. "cController.php";

$cobj=new cController();

$xmlmanObj = new cXMLController();

$xmlmanObj->file= 'ghanutest.xml';

$content_details_array["page"]["request_type"]=$get["dataType"];

$content_details_array["page"]["action"]=$get["action"];

$content_details_array["page"]["heading"]=ucwords("XML Operations");

$content_details_array["page"]["title"]=ucwords("XML Operations");


$arrays=$cobj->getData('mclass','id,class','','id');



$xmlmanObj->data = $arrays;
$xmlmanObj->writeArrayToXML();

$output=$xmlmanObj->xmlstrToArray();
//print_r($output["class"]);

//print_r($xmlmanObj->readXmlFile());

		for($i=0;$i<count($output);$i++)
		{
		$cobj->table = "xml_test";
			
			$cobj->column=array("id"=>$output["id"][$i],"class"=>$output["class"][$i]);
			//$result=$cobj->curd("add",$cobj->id);
		}
		
//$cobj->table = "xml_test";
//$cobj->column=array("id"=>"1","class"=>"First");
//$result=$cobj->curd("add",$cobj->id);

$content_details_array["page"]["data"]="Sucess fully created";
 ?>
 <script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"