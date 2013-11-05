<?php include_once('cController.php');
class cTransportationController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "transportation";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("transportation.id","","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("transportation.application_no","transportation.registration_date","transportation.enrollment","transportation.user_id","transportation.start_date","transportation.landmark1","transportation.landmark2","transportation.pickup","transportation.drop_point","transportation.zone","transportation.total_km","transportation.pickup_km","transportation.drop_km","transportation.fees","transportation.last_updated","transportation.status","transportation.remarks","transportation.pickup_time","transportation.drop_time","transportation.application_date");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('application_no'=>$_POST['application_no'],'registration_date'=>$_POST['registration_date'],'enrollment'=>$_POST['enrollment'],'user_id'=>$_POST['user_id'],'start_date'=>$_POST['start_date'],'landmark1'=>$_POST['landmark1'],'landmark2'=>$_POST['landmark2'],'pickup'=>$_POST['pickup'],'drop_point'=>$_POST['drop_point'],'zone'=>$_POST['zone'],'total_km'=>$_POST['total_km'],'pickup_km'=>$_POST['pickup_km'],'drop_km'=>$_POST['drop_km'],'fees'=>$_POST['fees'],'last_updated'=>$_POST['last_updated'],'status'=>$_POST['status'],'remarks'=>$_POST['remarks'],'pickup_time'=>$_POST['pickup_time'],'drop_time'=>$_POST['drop_time'],'application_date'=>$_POST['application_date']);
         
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