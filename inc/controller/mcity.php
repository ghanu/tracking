<?php include_once AppRoot . AppController . cmcityController.php;

$mcity=new cmcityController();

$content_details_array["pageTitle"]="City";

$content_details_array["formelements"]["city_name"]=array("displayName"=>"City Name","type"=>"text","name"=>"city_name","id"=>"city_name","class","style","error","mandatory"=>true);
$content_details_array["formelements"]["city_code"]=array("displayName"=>"City Code","type"=>"text","name"=>"city_code","id"=>"city_code","class","style","error","mandatory"=>true);
$selectboxdata=$this->getSelectData('mstate','id,state_name','','');$content_details_array["formelements"]["state_id"]=array("displayName"=>"State Id","type"=>"text","name"=>"state_id","id"=>"state_id","class","style","error","mandatory"=>true,data=>$selectboxdata);
 ?>