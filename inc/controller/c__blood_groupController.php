<?php include_once('cController.php');
class c__blood_groupController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__blood_group";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__blood_group.id","__blood_group.blood_group","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__blood_group.blood_group");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('blood_group'=>$_POST['blood_group']);
         
        }        
        else{
            $this->column=array('blood_group'=>$_POST['blood_group']);
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