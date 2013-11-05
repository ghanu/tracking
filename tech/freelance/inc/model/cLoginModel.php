<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cLoginModel
 *
 * @author gt
 */
class cLoginModel {

        public $userName;
        public $password;

        function __construct() {
                include_once('global_db.php');
                $this->db = new cDatabase();
        }

        function getUserLoginDetails() {
                $this->db->sql = "SELECT * from guser_login where vUserName='".$this->userName."' And vPassword='".$this->password."';";
                return $this->db->read();
        }

}

?>
