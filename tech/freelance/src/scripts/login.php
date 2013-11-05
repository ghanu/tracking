<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if($_GET['action']=='validate'){

        
        include_once AppController.'cLoginController.php';
        $loginControllerObj=new cLoginController();
        $loginControllerObj->userName=$_POST['user'];
        $loginControllerObj->password = md5($_POST['access']);
        $loginControllerObj->validateLogin();
        print_r($_SESSION);
        
        
}

?>
