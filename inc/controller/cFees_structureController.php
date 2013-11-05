<?php include_once('cController.php');
class cFees_structureController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "fees_structure";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("fees_structure.id","mclass.class as class","fees_type.fees_type as fees_types","fees_structure.amount","fees_structure.effect_from","fees_structure.fees_status as fees_status","__branch_details.branch_name as branch_id","fees_structure.date_timestamp","fees_structure.status","1 as action");
            $this->join_condition="Left Join mclass on mclass.id=fees_structure.class Left Join fees_type on fees_type.id=fees_structure.fees_types Left Join __branch_details on __branch_details.id=fees_structure.branch_id";    
        }elseif($this->action=="view"){
            $this->column=array("mclass.class as class","fees_type.fees_type as fees_types","fees_structure.amount","fees_structure.effect_from","fees_structure.fees_status as fees_status","__branch_details.branch_name as branch_id","fees_structure.date_timestamp","fees_structure.status");
            $this->join_condition="Left Join mclass on mclass.id=fees_structure.class Left Join fees_type on fees_type.id=fees_structure.fees_types Left Join __branch_details on __branch_details.id=fees_structure.branch_id";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("fees_structure.class","fees_structure.fees_types","fees_structure.amount","fees_structure.effect_from","fees_structure.fees_status","fees_structure.branch_id","fees_structure.date_timestamp","fees_structure.status");
            $this->join_condition="Left Join mclass on mclass.id=fees_structure.class Left Join fees_type on fees_type.id=fees_structure.fees_types Left Join __branch_details on __branch_details.id=fees_structure.branch_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('class'=>$_POST['class'],'fees_types'=>$_POST['fees_types'],'amount'=>$_POST['amount'],'effect_from'=>$_POST['effect_from'],'fees_status'=>$_POST['fees_status'],'branch_id'=>$_POST['branch_id'],'date_timestamp'=>$_POST['date_timestamp'],'status'=>$_POST['status']);
         
        }        
        else{
            $this->column=array('class'=>$_POST['class'],'fees_types'=>$_POST['fees_types'],'amount'=>$_POST['amount'],'effect_from'=>$_POST['effect_from'],'fees_status'=>$_POST['fees_status'],'branch_id'=>$_POST['branch_id'],'date_timestamp'=>$_POST['date_timestamp'],'status'=>$_POST['status']);
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