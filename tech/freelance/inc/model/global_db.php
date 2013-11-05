<?php

 /*
  * To change this template, choose Tools | Templates
  * and open the template in the editor.
  */

 /**
  * Description of global_db
  *
  * @author gt
  */
 Class cDatabase{

     public $dbType;
     public $dbPort;
     public $dbHost;
     public $dbUser;
     public $dbPass;
     public $dbName;
     public $dbSchema;
     //as of now this is used only in potgresql
     public $dbObj;
     public $connection;
     public $SQL;

     public function __construct($DataBaseType=""){
         $this->dbType=$DataBaseType?$DataBaseType:DataBaseType;
         $this->getConnection();
     }

     public function getConnection(){
         $databasetypename='c'.ucfirst($this->dbType);
         include(strtolower($this->dbType).'_connecter.php');
         $this->dbObj=new $databasetypename;
         $this->dbObj->getConnection();
     }

     public function read(){
         $this->dbObj->sql=$this->sql;
         return $this->dbObj->read();
     }

     public function write(){
         
     }

 }
?>
