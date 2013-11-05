<?php include_once('cController.php');
class cRoute_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "route_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("route_details.id","route_details.route_no","route_details.route_name","route_details.branch_id","route_details.status","route_details.date","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("route_details.route_no","route_details.route_name","route_details.branch_id","route_details.status","route_details.date");
            $this->join_condition="";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("route_details.route_no","route_details.route_name","route_details.branch_id","route_details.status","route_details.date");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('route_no'=>$_POST['route_no'],'route_name'=>$_POST['route_name'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date'=>$_POST['date']);
         
        }        
        else{
            $this->column=array('route_no'=>$_POST['route_no'],'route_name'=>$_POST['route_name'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date'=>$_POST['date']);
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