<?php include_once('cController.php');
class cSectionsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "sections";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("sections.id","sections.section","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("sections.section");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('section'=>$_POST['section']);
         
        }        
        else{
            $this->column=array('section'=>$_POST['section']);
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