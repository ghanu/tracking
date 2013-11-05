<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once AppRoot . AppController . 'cUserController.php';


if (!empty($post)) {
    $UserController = new cUserController();
    $user_data = $UserController->validateCredencials($post['loginname'], $post['password']);

    if ($user_data != '') {
        redirect('home');
    } else {
        redirect('login');
    }
} else {
    $content_details_array["formelements"]['username'] = array("type" => "text", "name" => 'loginname', "id" => 'loginname', 'required' => 'required');
    $content_details_array["formelements"]['password'] = array("type" => "password", "name" => 'password', "id" => 'password', 'required' => 'required');
}
?>
