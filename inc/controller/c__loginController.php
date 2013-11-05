<?php include_once('cController.php');
class c__loginController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__login";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__login.id","__user_details.first_name as user_id","__login.login_name","__login.password","__login.last_updated","__login.is_active","1 as action");
            $this->join_condition="Left Join __user_details on __user_details.id=__login.user_id";    
        }elseif($this->action=="view"){
            $this->column=array("__user_details.first_name as user_id","__login.login_name","__login.password","__login.last_updated","__login.is_active");
            $this->join_condition="Left Join __user_details on __user_details.id=__login.user_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('user_id'=>$_POST['user_id'],'login_name'=>$_POST['login_name'],'password'=>$_POST['password'],'last_updated'=>$_POST['last_updated'],'is_active'=>$_POST['is_active']);
         
        }        
        else{
            $this->column=array('user_id'=>$_POST['user_id'],'login_name'=>$_POST['login_name'],'password'=>$_POST['password'],'last_updated'=>$_POST['last_updated'],'is_active'=>$_POST['is_active']);
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