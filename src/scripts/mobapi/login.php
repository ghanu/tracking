<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once AppRoot . AppController . 'cUserController.php';
include_once AppRoot . '/inc/common/utils.php';

$post = cleanpost();
$get = cleanget();

$data = $post ? $post : $get ;


if (!empty($data)) {
    $UserController = new cUserController();
    $user_data = $UserController->validateCredencials($data['loginname'], $data['password']);

    if ($user_data != '') {
	$message ="{ 'result': 'true' }";
        print_r(json_encode($message));
    } else {
        $message ="{ 'result': 'false' }";
		print_r(json_encode($message));
    }
} else {
    $content_details_array["formelements"]['username'] = array("type" => "text", "name" => 'loginname', "id" => 'loginname', 'required' => 'required');
    $content_details_array["formelements"]['password'] = array("type" => "password", "name" => 'password', "id" => 'password', 'required' => 'required');
}
?>
