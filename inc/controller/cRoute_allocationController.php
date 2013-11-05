<?php include_once('cController.php');
class cRoute_allocationController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "route_allocation";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("route_allocation.id","vehicle.registration_no as vehicle_no","__user_details.first_name as driver_name","route_details.route_name as route","route_allocation.branch_id","1 as action");
            $this->join_condition="Left Join vehicle on vehicle.id=route_allocation.vehicle_no Left Join __user_details on __user_details.id=route_allocation.driver_name Left Join route_details on route_details.id=route_allocation.route";    
        }elseif($this->action=="view"){
            $this->column=array("vehicle.registration_no as vehicle_no","__user_details.first_name as driver_name","route_details.route_name as route","route_allocation.branch_id");
            $this->join_condition="Left Join vehicle on vehicle.id=route_allocation.vehicle_no Left Join __user_details on __user_details.id=route_allocation.driver_name Left Join route_details on route_details.id=route_allocation.route";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("route_allocation.vehicle_no","route_allocation.driver_name","route_allocation.route","route_allocation.branch_id");
            $this->join_condition="Left Join vehicle on vehicle.id=route_allocation.vehicle_no Left Join __user_details on __user_details.id=route_allocation.driver_name Left Join route_details on route_details.id=route_allocation.route";    
        
        }elseif($this->action=="add"){
            $this->column=array('vehicle_no'=>$_POST['vehicle_no'],'driver_name'=>$_POST['driver_name'],'route'=>$_POST['route'],'branch_id'=>$_POST['branch_id']);
         
        }        
        else{
            $this->column=array('vehicle_no'=>$_POST['vehicle_no'],'driver_name'=>$_POST['driver_name'],'route'=>$_POST['route'],'branch_id'=>$_POST['branch_id']);
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