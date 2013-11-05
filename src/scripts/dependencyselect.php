<?php

//$sql=  openssl_encrypt($_GET["q"],EncryptMethod,EncryptSalt,false,EncryptIV);
include_once AppRoot . AppModel.'cModal.php';

$db=new cModal();
if($_GET["q"]){
    $db->query=  str_replace('{$id}',$_GET['id'],base64_decode($_GET["q"]));
}elseif($_GET["unique"]){
    $db->query='Select '.$_GET["unique"].' from '.$_GET["table"].' where '.$_GET["unique"]."='".$_GET["current_value"]."'";
}

echo json_encode($db->executeRead());

?>
