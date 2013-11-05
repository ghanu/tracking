<?php include_once('cController.php');
class cMcountryController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mcountry";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mcountry.id","mcountry.country_name","mcountry.country_code","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("mcountry.country_name","mcountry.country_code");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('country_name'=>$_POST['country_name'],'country_code'=>$_POST['country_code']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        if(is_array($this->view_controls)&&($this->action=="view"||$this->action=="viewall")){
            foreach($this->view_controls as $key=>$value){
                foreach($result as $recordnum=>$record){
                    if($record[$key]==""){
                       $record[$key]= AppImgURL."noimage.jpg";
                    }else{
                        $record[$key]=AppViewUploadsURL.$record[$key];
                    }
                    $result[$recordnum][$key]='<img width="150px" height="150px" src="'.$record[$key].'" >';
                }
                    
            }
        }
        return $result; 
    }
    } 
 ?>