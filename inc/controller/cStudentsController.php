<?php include_once('cController.php');
class cStudentsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array("photo"=>"image");
    function __construct() {
        parent::__construct();
        $this->table = "students";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("students.id","","1 as action");
            $this->join_condition="Join user_details on user_details.id=students.user_id";    
        }elseif($this->action=="view"){
            $this->column=array("students.class_id","students.parent_id","students.date_of_joining","students.user_id");
            $this->join_condition="Join user_details on user_details.id=students.user_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('student_name'=>$_POST['student_name'],'class_id'=>$_POST['class_id'],'parent_id'=>$_POST['parent_id'],'date_of_joining'=>$_POST['date_of_joining'],'user_id'=>$_POST['user_id']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        if(is_array($this->view_controls)&&($this->action=="view"||$this->action=="viewall")){
            foreach($this->view_controls as $key=>$value){
                foreach($result as $recordnum=>$record){
                    if($record[$key]==""){
                       $record[$key]= AppImgURL."noimage.jpg";
                    }else{
                        $record[$key]=AppViewUploadsURL.$record[$key];
                    }
                    $result[$recordnum][$key]='<img width="150px" height="150px" src="'.$record[$key].'" >';
                }
                    
            }
        }
        return $result; 
    }
    } 
 ?>