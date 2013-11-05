<?php include_once('cController.php');
class cTime_table_settingsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "time_table_settings";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("time_table_settings.id","time_table_settings.no_of_periods","time_table_settings.no_of_days","time_table_settings.week_days as week_days","time_table_settings.last_updated","time_table_settings.user_id","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("time_table_settings.no_of_periods","time_table_settings.no_of_days","time_table_settings.week_days as week_days","time_table_settings.last_updated","time_table_settings.user_id");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('no_of_periods'=>$_POST['no_of_periods'],'no_of_days'=>count($_POST['no_of_days']),'week_days'=>  json_encode($_POST['week_days']),'last_updated'=>$_POST['last_updated'],'user_id'=>$_POST['user_id']);
         
        }        
        else{
            $this->column=array('no_of_periods'=>$_POST['no_of_periods'],'no_of_days'=>$_POST['no_of_days'],'week_days'=>$_POST['week_days'],'last_updated'=>$_POST['last_updated'],'user_id'=>$_POST['user_id']);
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