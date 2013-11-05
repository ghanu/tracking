<?php include_once('cController.php');
class cClass_subject_relationController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "class_subject_relation";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("class_subject_relation.id","class_section_relation.class_id","subjects.name","__user_details.first_name","class_subject_relation.last_updated","1 as action");
            $this->join_condition="Left Join class_section_relation on class_section_relation.id=class_subject_relation.class_id Left Join subjects on subjects.id=class_subject_relation.subject_id Left Join __user_details on __user_details.id=class_subject_relation.teacher_id";    
        }elseif($this->action=="view"){
            $this->column=array("class_subject_relation.class_id","class_subject_relation.subject_id","class_subject_relation.teacher_id","class_subject_relation.last_updated");
            $this->join_condition="Left Join class_section_relation on class_section_relation.id=class_subject_relation.class_id Left Join subjects on subjects.id=class_subject_relation.subject_id Left Join __user_details on __user_details.id=class_subject_relation.teacher_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('class_id'=>$_POST['class_id'],'subject_id'=>$_POST['subject_id'],'teacher_id'=>$_POST['teacher_id'],'last_updated'=>$_POST['last_updated']);
         
        }        
        else{
            $this->column=array('class_id'=>$_POST['class_id'],'subject_id'=>$_POST['subject_id'],'teacher_id'=>$_POST['teacher_id'],'last_updated'=>$_POST['last_updated']);
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