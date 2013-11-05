<?php include_once('cController.php');
class cExperience_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "experience_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("experience_details.id","","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("experience_details.organization_name","experience_details.address_id","experience_details.from_date","experience_details.to_date","experience_details.salary","experience_details.supervisor_name","experience_details.reason_for_leaving","experience_details.reference_id");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('organization_name'=>$_POST['organization_name'],'address_id'=>$_POST['address_id'],'from_date'=>$_POST['from_date'],'to_date'=>$_POST['to_date'],'salary'=>$_POST['salary'],'supervisor_name'=>$_POST['supervisor_name'],'reason_for_leaving'=>$_POST['reason_for_leaving'],'reference_id'=>$_POST['reference_id']);
         
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