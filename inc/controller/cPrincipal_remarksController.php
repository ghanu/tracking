<?php include_once('cController.php');
class cPrincipal_remarksController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "principal_remarks";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("principal_remarks.id","principal_remarks.application_no","principal_remarks.student_name","principal_remarks.class","principal_remarks.principal_remarks","principal_remarks.admission_confirmed","principal_remarks.admission_id","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("principal_remarks.application_no","principal_remarks.student_name","principal_remarks.class","principal_remarks.principal_remarks","principal_remarks.admission_confirmed","principal_remarks.admission_id");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('application_no'=>$_POST['application_no'],'student_name'=>$_POST['student_name'],'class'=>$_POST['class'],'principal_remarks'=>$_POST['principal_remarks'],'admission_confirmed'=>$_POST['admission_confirmed'],'admission_id'=>$_POST['admission_id']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function afterWrite(){
        $this->column = array('principal_remarks_id' => $this->id);
        $this->table = 'principal_remarks';
        return $this->addWhereCondition('id=' . $_POST['application_id'])->update()->executeWrite();
        }
    } 
 ?>