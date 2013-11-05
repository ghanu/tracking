<?php include_once('cController.php');
class c__menuController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "fb_users";
        
    }

 function curd() {
        if($this->action=="viewall"){
            $this->column=array("facebook","username","username","password","email","location","gender","ip","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("facebook","username","username","password","email","location","gender","ip");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('facebook_id'=>$_POST['facebook'],'username'=>$_POST['username'],'password'=>$_POST['password'],'email'=>$_POST['email'],'location'=>$_POST['location'],'gender'=>$_POST['gender'],'ip'=>$_POST['ip']);
         
        }        
        else{
            $this->column=array('facebook_id'=>$_POST['facebook'],'username'=>$_POST['username'],'password'=>$_POST['password'],'email'=>$_POST['email'],'location'=>$_POST['location'],'gender'=>$_POST['gender'],'ip'=>$_POST['ip']);
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