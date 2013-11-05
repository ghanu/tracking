<?php include_once('cController.php');
class cTeacherController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "teacher";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("teacher.id","__user_details.first_name as user_id","teacher.school_name","teacher.subject_major","teacher.year_completed","teacher.percentage","teacher.school_name1","teacher.subject_major1","teacher.year_completed1","teacher.percentage1","teacher.college_name","teacher.subject_major2","teacher.year_completed2","teacher.percentage2","teacher.college_name2","teacher.subject_major3","teacher.year_completed3","teacher.percentage3","teacher.name_of_employer","teacher.daddress","teacher.dcity","teacher.dstate","teacher.dpincode","teacher.employment_dates_from","teacher.employment_dates_to","teacher.pay_rs","teacher.name_of_immediate_superviser","teacher.job_title_description_of_work","teacher.reason_for_leaving","teacher.rname","teacher.rrelationship","teacher.raddress","teacher.rwork_number","teacher.rhome_number","teacher.rname1","teacher.rrelationship1","teacher.raddress1","teacher.rwork_number1","teacher.rhome_number1","1 as action");
            $this->join_condition="Left Join __user_details on __user_details.id=teacher.user_id";    
        }elseif($this->action=="view"){
            $this->column=array("__user_details.first_name as user_id","teacher.school_name","teacher.subject_major","teacher.year_completed","teacher.percentage","teacher.school_name1","teacher.subject_major1","teacher.year_completed1","teacher.percentage1","teacher.college_name","teacher.subject_major2","teacher.year_completed2","teacher.percentage2","teacher.college_name2","teacher.subject_major3","teacher.year_completed3","teacher.percentage3","teacher.name_of_employer","teacher.daddress","teacher.dcity","teacher.dstate","teacher.dpincode","teacher.employment_dates_from","teacher.employment_dates_to","teacher.pay_rs","teacher.name_of_immediate_superviser","teacher.job_title_description_of_work","teacher.reason_for_leaving","teacher.rname","teacher.rrelationship","teacher.raddress","teacher.rwork_number","teacher.rhome_number","teacher.rname1","teacher.rrelationship1","teacher.raddress1","teacher.rwork_number1","teacher.rhome_number1");
            $this->join_condition="Left Join __user_details on __user_details.id=teacher.user_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('user_id'=>$_POST['user_id'],'school_name'=>$_POST['school_name'],'subject_major'=>$_POST['subject_major'],'year_completed'=>$_POST['year_completed'],'percentage'=>$_POST['percentage'],'school_name1'=>$_POST['school_name1'],'subject_major1'=>$_POST['subject_major1'],'year_completed1'=>$_POST['year_completed1'],'percentage1'=>$_POST['percentage1'],'college_name'=>$_POST['college_name'],'subject_major2'=>$_POST['subject_major2'],'year_completed2'=>$_POST['year_completed2'],'percentage2'=>$_POST['percentage2'],'college_name2'=>$_POST['college_name2'],'subject_major3'=>$_POST['subject_major3'],'year_completed3'=>$_POST['year_completed3'],'percentage3'=>$_POST['percentage3'],'name_of_employer'=>$_POST['name_of_employer'],'daddress'=>$_POST['daddress'],'dcity'=>$_POST['dcity'],'dstate'=>$_POST['dstate'],'dpincode'=>$_POST['dpincode'],'employment_dates_from'=>$_POST['employment_dates_from'],'employment_dates_to'=>$_POST['employment_dates_to'],'pay_rs'=>$_POST['pay_rs'],'name_of_immediate_superviser'=>$_POST['name_of_immediate_superviser'],'job_title_description_of_work'=>$_POST['job_title_description_of_work'],'reason_for_leaving'=>$_POST['reason_for_leaving'],'rname'=>$_POST['rname'],'rrelationship'=>$_POST['rrelationship'],'raddress'=>$_POST['raddress'],'rwork_number'=>$_POST['rwork_number'],'rhome_number'=>$_POST['rhome_number'],'rname1'=>$_POST['rname1'],'rrelationship1'=>$_POST['rrelationship1'],'raddress1'=>$_POST['raddress1'],'rwork_number1'=>$_POST['rwork_number1'],'rhome_number1'=>$_POST['rhome_number1']);
         
        }        
        else{
            $this->column=array('user_id'=>$_POST['user_id'],'school_name'=>$_POST['school_name'],'subject_major'=>$_POST['subject_major'],'year_completed'=>$_POST['year_completed'],'percentage'=>$_POST['percentage'],'school_name1'=>$_POST['school_name1'],'subject_major1'=>$_POST['subject_major1'],'year_completed1'=>$_POST['year_completed1'],'percentage1'=>$_POST['percentage1'],'college_name'=>$_POST['college_name'],'subject_major2'=>$_POST['subject_major2'],'year_completed2'=>$_POST['year_completed2'],'percentage2'=>$_POST['percentage2'],'college_name2'=>$_POST['college_name2'],'subject_major3'=>$_POST['subject_major3'],'year_completed3'=>$_POST['year_completed3'],'percentage3'=>$_POST['percentage3'],'name_of_employer'=>$_POST['name_of_employer'],'daddress'=>$_POST['daddress'],'dcity'=>$_POST['dcity'],'dstate'=>$_POST['dstate'],'dpincode'=>$_POST['dpincode'],'employment_dates_from'=>$_POST['employment_dates_from'],'employment_dates_to'=>$_POST['employment_dates_to'],'pay_rs'=>$_POST['pay_rs'],'name_of_immediate_superviser'=>$_POST['name_of_immediate_superviser'],'job_title_description_of_work'=>$_POST['job_title_description_of_work'],'reason_for_leaving'=>$_POST['reason_for_leaving'],'rname'=>$_POST['rname'],'rrelationship'=>$_POST['rrelationship'],'raddress'=>$_POST['raddress'],'rwork_number'=>$_POST['rwork_number'],'rhome_number'=>$_POST['rhome_number'],'rname1'=>$_POST['rname1'],'rrelationship1'=>$_POST['rrelationship1'],'raddress1'=>$_POST['raddress1'],'rwork_number1'=>$_POST['rwork_number1'],'rhome_number1'=>$_POST['rhome_number1']);
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