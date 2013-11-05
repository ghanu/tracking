<?php include_once('cController.php');
class cMclassController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mclass";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mclass.id","mclass.class","mclass.group","mclass.status","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("mclass.class","mclass.group","mclass.status");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('class'=>$_POST['class'],'group'=>$_POST['group'],'status'=>$_POST['status']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>