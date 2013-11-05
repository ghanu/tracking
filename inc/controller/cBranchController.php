<?php include_once('cController.php');
class cBranchController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "branch";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("branch.id","branch.code","branch.location","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("branch.code","branch.location");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('code'=>$_POST['code'],'location'=>$_POST['location'],'address'=>$_POST['address']);
         
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