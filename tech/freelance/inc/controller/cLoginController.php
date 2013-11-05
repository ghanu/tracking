<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cLoginController
 *
 * @author gt
 */
include_once AppModel . 'cLoginModel.php';

class cLoginController extends cLoginModel {

        function __construct() {

                parent::__construct();
        }

     
        function validateLogin() {

                $userDetails = $this->getUserLoginDetails();
                if ($userDetails[0]['iUserId']) {
                        include_once 'cSessionController.php';
                        $cSessionControllerObj=new cSessionController();
                        $cSessionControllerObj->createSession();
                        $cSessionControllerObj->sessionValue['iUserId']= $userDetails[0]['iUserId'];
                        $cSessionControllerObj->sessionValue['vDisplayName']= $userDetails[0]['vDisplayName'];
                        $cSessionControllerObj->sessionValue['vEmailId']= $userDetails[0]['vEmailId'];
                        $cSessionControllerObj->sessionValue['cUserType']= $userDetails[0]['cUserType'];
                        $cSessionControllerObj->setSessionValue();
                        header("Location:".AppURL.'index.php?file=home');
                }
        }

        function __destruct() {
                ;
        }

}

?>
