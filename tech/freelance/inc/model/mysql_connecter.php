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
 class cMysql{

     private $connection;
     public $sql;

     public function __construct(){
         $this->getConnection();
     }

     public function getConnection(){
         if(!$this->connection){
             $this->connection=new mysqli(DataBaseHost,DataBaseUser,DataBasePass,DataBaseName,DataBasePort);
             if(mysqli_connect_errno()){
                 printf("Connect failed: %s\n",mysqli_connect_error());
                 exit();
             }
         }
         return $this->connection;
     }

     public function read(){
         
         if($stmt=$this->connection->prepare($this->sql)){
             $stmt->execute();
             $stmt->store_result();
             $meta=$stmt->result_metadata();
             while($currentColumn=$meta->fetch_field()){
                 $columnName=&$currentColumn->name;
                 $columnNames[$currentColumn->name]=&$$columnName;
             }
             call_user_func_array(array($stmt,'bind_result'),$columnNames);
             $copy=create_function('$a','return $a;');
             while($stmt->fetch()){
                 $results[]=array_map($copy,$columnNames);
             }
         }
         return $results;
     }

     public function write(){
         
     }

 }
?>
