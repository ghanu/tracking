<?php include_once('cController.php');
class cScreeningController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "screening";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("screening.id","screening.application_no","screening.student_name","screening.class","__user_details.first_name as screening_teacher","screening.teacher_remarks","screening.selected as selected","screening.principal_remarks","screening.admission_confirmed as admission_confirmed","screening.application_id","screening.admission_id","screening.branch_id","1 as action");
            $this->join_condition="Left Join __user_details on __user_details.id=screening.screening_teacher";    
        }elseif($this->action=="view"){
            $this->column=array("screening.application_no","screening.student_name","screening.class","__user_details.first_name as screening_teacher","screening.teacher_remarks","screening.selected as selected","screening.principal_remarks","screening.admission_confirmed as admission_confirmed","screening.application_id","screening.admission_id","screening.branch_id");
            $this->join_condition="Left Join __user_details on __user_details.id=screening.screening_teacher";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("screening.application_no","screening.student_name","screening.class","screening.screening_teacher","screening.teacher_remarks","screening.selected","screening.principal_remarks","screening.admission_confirmed","screening.application_id","screening.admission_id","screening.branch_id");
            $this->join_condition="Left Join __user_details on __user_details.id=screening.screening_teacher";    
        
        }elseif($this->action=="add"){
            $this->column=array('application_no'=>$_POST['application_no'],'student_name'=>$_POST['student_name'],'class'=>$_POST['class'],'screening_teacher'=>$_POST['screening_teacher'],'teacher_remarks'=>$_POST['teacher_remarks'],'selected'=>$_POST['selected'],'principal_remarks'=>$_POST['principal_remarks'],'admission_confirmed'=>$_POST['admission_confirmed'],'application_id'=>$_POST['application_id'],'admission_id'=>$_POST['admission_id'],'branch_id'=>$_POST['branch_id']);
         
        }        
        else{
            $this->column=array('application_no'=>$_POST['application_no'],'student_name'=>$_POST['student_name'],'class'=>$_POST['class'],'screening_teacher'=>$_POST['screening_teacher'],'teacher_remarks'=>$_POST['teacher_remarks'],'selected'=>$_POST['selected'],'principal_remarks'=>$_POST['principal_remarks'],'admission_confirmed'=>$_POST['admission_confirmed'],'application_id'=>$_POST['application_id'],'admission_id'=>$_POST['admission_id'],'branch_id'=>$_POST['branch_id']);
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function beforeWrite(){
        
        }
        public function afterWrite(){
        $this->column = array('screening_id' => $this->id);
        $this->table = 'pre_admission';
        return $this->addWhereCondition('id=' . $_POST['application_id'])->update()->executeWrite();
        }
    } 
 ?>