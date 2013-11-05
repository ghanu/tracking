<?php include_once('cController.php');
class cClass_section_relationController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "class_section_relation";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("class_section_relation.id","mclass.class","sections.section","__user_details.first_name","class_section_relation.status","1 as action");
            $this->join_condition="Left Join mclass on mclass.id=class_section_relation.class_id Left Join sections on sections.id=class_section_relation.section_id Left Join __user_details on __user_details.id=class_section_relation.teacher_id";    
        }elseif($this->action=="view"){
            $this->column=array("class_section_relation.class_id","class_section_relation.section_id","class_section_relation.teacher_id","class_section_relation.status");
            $this->join_condition="Left Join mclass on mclass.id=class_section_relation.class_id Left Join sections on sections.id=class_section_relation.section_id Left Join __user_details on __user_details.id=class_section_relation.teacher_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('class_id'=>$_POST['class_id'],'section_id'=>$_POST['section_id'],'teacher_id'=>$_POST['teacher_id'],'status'=>$_POST['status']);
         
        }        
        else{
            $this->column=array('class_id'=>$_POST['class_id'],'section_id'=>$_POST['section_id'],'teacher_id'=>$_POST['teacher_id'],'status'=>$_POST['status']);
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