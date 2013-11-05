<?php include_once('cController.php');
class c__report_customizationsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__report_customizations";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__report_customizations.id","__report_customizations.report_id","__report_customizations.customization_name","__report_customizations.user_id","__report_customizations.created_on","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__report_customizations.report_id","__report_customizations.customization_name","__report_customizations.user_id","__report_customizations.created_on");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('report_id'=>$_POST['report_id'],'customization_name'=>$_POST['customization_name'],'user_id'=>$_POST['user_id'],'created_on'=>$_POST['created_on']);
         
        }        
        else{
            $this->column=array('report_id'=>$_POST['report_id'],'customization_name'=>$_POST['customization_name'],'user_id'=>$_POST['user_id'],'created_on'=>$_POST['created_on']);
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