<?php include_once('cController.php');
class cTestController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "test";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("test.id","test.date","test.status","test.name","test.no","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("test.date","test.status","test.name","test.no");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('date'=>$_POST['date'],'status'=>$_POST['status'],'name'=>$_POST['name'],'no'=>$_POST['no']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>