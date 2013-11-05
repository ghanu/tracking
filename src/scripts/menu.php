<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once AppRoot . AppController . 'cMenuController.php';
$menu=new cMenuController(1);
$content_details_array['menu']=$menu->user_menu;


?>
