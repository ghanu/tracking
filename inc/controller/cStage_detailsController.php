<?php include_once('cController.php');
class cStage_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "stage_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("stage_details.id","route_details.route_name as route_name","stage_details.stages","stage_details.cost","stage_details.km","stage_details.branch_id","stage_details.status","stage_details.date","1 as action");
            $this->join_condition="Left Join route_details on route_details.id=stage_details.route_name";    
        }elseif($this->action=="view"){
            $this->column=array("route_details.route_name as route_name","stage_details.stages","stage_details.cost","stage_details.km","stage_details.branch_id","stage_details.status","stage_details.date");
            $this->join_condition="Left Join route_details on route_details.id=stage_details.route_name";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("stage_details.route_name","stage_details.stages","stage_details.cost","stage_details.km","stage_details.branch_id","stage_details.status","stage_details.date");
            $this->join_condition="Left Join route_details on route_details.id=stage_details.route_name";    
        
        }elseif($this->action=="add"){
            $this->column=array('route_name'=>$_POST['route_name'],'stages'=>$_POST['stages'],'cost'=>$_POST['cost'],'km'=>$_POST['km'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date'=>$_POST['date']);
         
        }        
        else{
            $this->column=array('route_name'=>$_POST['route_name'],'stages'=>$_POST['stages'],'cost'=>$_POST['cost'],'km'=>$_POST['km'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date'=>$_POST['date']);
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