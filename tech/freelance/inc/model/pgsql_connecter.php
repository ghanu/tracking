<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mysql_connecter
 *
 * @author gt
 */
class cMysql {

        public  static function getConnection(){
                $this->connection=mysql_connect($server, $username,$password);

        }

        public function read(){

        }
        
        public function write(){

        }
        
        
}
?>
