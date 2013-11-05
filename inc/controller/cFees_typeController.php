<?php include_once('cController.php');
class cFees_typeController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "fees_type";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("fees_type.id","fees_type.fees_type","fees_type.fees_priority","fees_type.fees_period","fees_type.add_date","fees_type.status","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("fees_type.fees_type","fees_type.fees_priority","fees_type.fees_period","fees_type.add_date","fees_type.status");
            $this->join_condition="";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("fees_type.fees_type","fees_type.fees_priority","fees_type.fees_period","fees_type.add_date","fees_type.status");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('fees_type'=>$_POST['fees_type'],'fees_priority'=>$_POST['fees_priority'],'fees_period'=>$_POST['fees_period'],'add_date'=>$_POST['add_date'],'status'=>$_POST['status']);
         
        }        
        else{
            $this->column=array('fees_type'=>$_POST['fees_type'],'fees_priority'=>$_POST['fees_priority'],'fees_period'=>$_POST['fees_period'],'add_date'=>$_POST['add_date'],'status'=>$_POST['status']);
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