<?php include_once('cController.php');
class c__menuController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__menu";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__menu.id","__menu.menu_name","__menu.url","__menu.display_icon","__menu.access_key","__menu.parent","__menu.status","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__menu.menu_name","__menu.url","__menu.display_icon","__menu.access_key","__menu.parent","__menu.status");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('menu_name'=>$_POST['menu_name'],'url'=>$_POST['url'],'display_icon'=>$_POST['display_icon'],'access_key'=>$_POST['access_key'],'parent'=>$_POST['parent'],'status'=>$_POST['status']);
         
        }        
        else{
            $this->column=array('menu_name'=>$_POST['menu_name'],'url'=>$_POST['url'],'display_icon'=>$_POST['display_icon'],'access_key'=>$_POST['access_key'],'parent'=>$_POST['parent'],'status'=>$_POST['status']);
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