<?php include_once('cController.php');
class c__designationController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__designation";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__designation.id","__designation.designation_code","__designation.designation_name","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__designation.designation_code","__designation.designation_name");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('designation_code'=>$_POST['designation_code'],'designation_name'=>$_POST['designation_name']);
         
        }        
        else{
            $this->column=array('designation_code'=>$_POST['designation_code'],'designation_name'=>$_POST['designation_name']);
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