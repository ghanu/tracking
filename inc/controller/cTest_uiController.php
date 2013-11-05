<?php include_once('cController.php');
class cTest_uiController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array("photo"=>"image");
    function __construct() {
        parent::__construct();
        $this->table = "test_ui";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("test_ui.id","test_ui.text","test_ui_child.data as select_foregin","test_ui.number","DATE_FORMAT(test_ui.date,'".AppDateFormatDb."') as date","test_ui.check_box","test_ui.radio","test_ui.photo","test_ui.read_only","test_ui.select_array as select_array","1 as action");
            $this->join_condition="Left Join test_ui_child on test_ui_child.id=test_ui.select_foregin";    
        }elseif($this->action=="view"){
            $this->column=array("test_ui.text","test_ui_child.data as select_foregin","test_ui.number","DATE_FORMAT(test_ui.date,'".AppDateFormatDb."') as date","test_ui.check_box","test_ui.radio","test_ui.photo","test_ui.read_only","test_ui.select_array as select_array");
            $this->join_condition="Left Join test_ui_child on test_ui_child.id=test_ui.select_foregin";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("test_ui.select_foregin","test_ui.number","test_ui.date","test_ui.check_box","test_ui.radio","test_ui.photo","test_ui.read_only","test_ui.select_array");
            $this->join_condition="Left Join test_ui_child on test_ui_child.id=test_ui.select_foregin";    
        
        }elseif($this->action=="add"){
            $this->column=array('text'=>$_POST['text'],'select_foregin'=>$_POST['select_foregin'],'number'=>$_POST['number'],'date'=>$_POST['date'],'check_box'=>$_POST['check_box'],'radio'=>$_POST['radio'],'photo'=>$_POST['photo'],'read_only'=>$_POST['read_only'],'select_array'=>$_POST['select_array']);
         
        }        
        else{
            $this->column=array('text'=>$_POST['text'],'select_foregin'=>$_POST['select_foregin'],'number'=>$_POST['number'],'date'=>$_POST['date'],'check_box'=>$_POST['check_box'],'radio'=>$_POST['radio'],'photo'=>$_POST['photo'],'read_only'=>$_POST['read_only'],'select_array'=>$_POST['select_array']);
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