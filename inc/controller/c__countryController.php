<?php include_once('cController.php');
class c__countryController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__country";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__country.id","__country.country_name","__country.nationality","__country.languages","__country.branch_id","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("__country.country_name","__country.nationality","__country.languages","__country.branch_id");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('country_name'=>$_POST['country_name'],'nationality'=>$_POST['nationality'],'languages'=>$_POST['languages'],'branch_id'=>$_POST['branch_id']);
         
        }        
        else{
            $this->column=array('country_name'=>$_POST['country_name'],'nationality'=>$_POST['nationality'],'languages'=>$_POST['languages'],'branch_id'=>$_POST['branch_id']);
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