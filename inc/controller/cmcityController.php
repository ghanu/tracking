<?php include_once('cController.php');
class cMcityController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mcity";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mcity.id","mcity.city_name","mcity.city_code",".","1 as action");
            $this->join_condition="Left Join  on .id=mcity.state_id";    
        }elseif($this->action=="view"){
            $this->column=array("mcity.city_name","mcity.city_code","mcity.state_id");
            $this->join_condition="Left Join  on .id=mcity.state_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('city_name'=>$_POST['city_name'],'city_code'=>$_POST['city_code'],'state_id'=>$_POST['state_id']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>