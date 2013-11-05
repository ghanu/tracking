<?php include_once('cController.php');
class c__user_menu_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__user_menu_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__user_menu_details.id","__user_menu_details.user_id","__user_menu_details.menu_id","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__user_menu_details.user_id","__user_menu_details.menu_id");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('user_id'=>$_POST['user_id'],'menu_id'=>$_POST['menu_id']);
         
        }        
        else{
            $this->column=array('user_id'=>$_POST['user_id'],'menu_id'=>$_POST['menu_id']);
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