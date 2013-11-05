<?php include_once('cController.php');
class cMstudentsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mstudents";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mstudents.id","","1 as action");
            $this->join_condition="Join __user_details on user_details.id=mstudents.user_id";    
        }elseif($this->action=="view"){
            $this->column=array("mstudents.student_name","mstudents.class_id","mstudents.parent_id","mstudents.date_of_joining","mstudents.user_id");
            $this->join_condition="Join __user_details on user_details.id=mstudents.user_id";    
        
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