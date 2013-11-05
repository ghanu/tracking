<?php include_once('cController.php');
class cSubjectsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "subjects";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("subjects.id","subjects.code","subjects.name","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("subjects.code","subjects.name");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('code'=>$_POST['code'],'name'=>$_POST['name']);
         
        }        
        else{
            $this->column=array('code'=>$_POST['code'],'name'=>$_POST['name']);
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function beforeWrite(){
        
        }
        public function afterWrite(){
        
        }
    } 
 ?>