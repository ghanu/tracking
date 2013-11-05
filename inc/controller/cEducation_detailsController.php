<?php include_once('cController.php');
class cEducation_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "education_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("education_details.id","","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("education_details.certificate_name_or_degree","education_details.mark_or_grade","education_details.reference_id","education_details.remarks","education_details.photo_copy_image","education_details.last_updated","education_details.major","education_details.year_completed");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('certificate_name_or_degree'=>$_POST['certificate_name_or_degree'],'mark_or_grade'=>$_POST['mark_or_grade'],'reference_id'=>$_POST['reference_id'],'remarks'=>$_POST['remarks'],'photo_copy_image'=>$_POST['photo_copy_image'],'is_given'=>$_POST['is_given'],'last_updated'=>$_POST['last_updated'],'major'=>$_POST['major'],'year_completed'=>$_POST['year_completed']);
         
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