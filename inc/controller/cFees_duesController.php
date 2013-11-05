<?php include_once('cController.php');
class cFees_duesController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "fees_dues";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("fees_dues.id","admission.first_name","fees_type.fees_type","fees_dues.fees_amount","fees_dues.paid","fees_dues.due_date","fees_dues.status","1 as action");
            $this->join_condition="Left Join admission on admission.id=fees_dues.student_id Left Join fees_type on fees_type.id=fees_dues.fees_type_id";    
        }elseif($this->action=="view"){
            $this->column=array("fees_dues.student_id","fees_dues.fees_type_id","fees_dues.fees_amount","fees_dues.paid","fees_dues.due_date","fees_dues.status");
            $this->join_condition="Left Join admission on admission.id=fees_dues.student_id Left Join fees_type on fees_type.id=fees_dues.fees_type_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('student_id'=>$_POST['student_id'],'fees_type_id'=>$_POST['fees_type_id'],'fees_amount'=>$_POST['fees_amount'],'paid'=>$_POST['paid'],'due_date'=>$_POST['due_date'],'status'=>$_POST['status']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>