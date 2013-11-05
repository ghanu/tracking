<?php include_once AppRoot . AppController . "cSales_ordersController.php";

$pre_admissionObj = new cSales_ordersController();
include_once AppRoot . '/inc/common/utils.php';

$post = cleanpost();
$get = cleanget();

$value = $post ? $post : $get ;
$action = $value["action"]?$value["action"]:"viewall";
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




if($action =="viewall"){
  
    $content_details_array["viewall"]["data"]=$pre_admissionObj->curd();//print_r($content_details_array["viewall"]["data1"]);


echo json_encode($content_details_array["viewall"]["data"]);

}
 ?><script>
var pagetitle="<?php echo $content_details_array["page"][title]; ?>"
</script>
