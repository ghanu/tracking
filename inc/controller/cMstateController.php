<?php include_once('cController.php');
class cMstateController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mstate";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mstate.id","mstate.state_code","mstate.state_name","mcountry.country_name","1 as action");
            $this->join_condition="Join mcountry on mcountry.id=mstate.country_id";    
        }elseif($this->action=="view"){
            $this->column=array("mstate.state_code","mstate.state_name","mstate.country_id");
            $this->join_condition="Join mcountry on mcountry.id=mstate.country_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('state_code'=>$_POST['state_code'],'state_name'=>$_POST['state_name'],'country_id'=>$_POST['country_id']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>