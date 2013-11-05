<?php include_once('cController.php');
class c__report_filtersController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__report_filters";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__report_filters.id","__report_filters.customization_id","__report_filters.user_id","__report_filters.default_filter","__report_filters.user_filter","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__report_filters.customization_id","__report_filters.user_id","__report_filters.default_filter","__report_filters.user_filter");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('customization_id'=>$_POST['customization_id'],'user_id'=>$_POST['user_id'],'default_filter'=>$_POST['default_filter'],'user_filter'=>$_POST['user_filter']);
         
        }        
        else{
            $this->column=array('customization_id'=>$_POST['customization_id'],'user_id'=>$_POST['user_id'],'default_filter'=>$_POST['default_filter'],'user_filter'=>$_POST['user_filter']);
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