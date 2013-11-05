<?php include_once('cController.php');
class cTest_ui_childController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "test_ui_child";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("test_ui_child.id","test_ui_child.data","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("test_ui_child.data");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('data'=>$_POST['data']);
         
        }        
        else{
            $this->column=array('data'=>$_POST['data']);
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