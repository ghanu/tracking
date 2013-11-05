<?php include_once('cController.php');
class c__report_columnsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__report_columns";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__report_columns.id","__report_columns.customization_id","__report_columns.column_name","__report_columns.display_name","__report_columns.alignment","__report_columns.format_as","__report_columns.is_visible","__report_columns.display_order","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__report_columns.customization_id","__report_columns.column_name","__report_columns.display_name","__report_columns.alignment","__report_columns.format_as","__report_columns.is_visible","__report_columns.display_order");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('customization_id'=>$_POST['customization_id'],'column_name'=>$_POST['column_name'],'display_name'=>$_POST['display_name'],'alignment'=>$_POST['alignment'],'format_as'=>$_POST['format_as'],'is_visible'=>$_POST['is_visible'],'display_order'=>$_POST['display_order']);
         
        }        
        else{
            $this->column=array('customization_id'=>$_POST['customization_id'],'column_name'=>$_POST['column_name'],'display_name'=>$_POST['display_name'],'alignment'=>$_POST['alignment'],'format_as'=>$_POST['format_as'],'is_visible'=>$_POST['is_visible'],'display_order'=>$_POST['display_order']);
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