<?php include_once('cController.php');
class cMfeesController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "mfees";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("mfees.id","","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("mfees.admission_fees","mfees.material_fees","mfees.refundable_fees","mfees.extra_curricular","mfees.term_1","mfees.term_2","mfees.term_3","mfees.branch_id","mfees.date_timestamp","mfees.status");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('admission_fees'=>$_POST['admission_fees'],'material_fees'=>$_POST['material_fees'],'refundable_fees'=>$_POST['refundable_fees'],'extra_curricular'=>$_POST['extra_curricular'],'term_1'=>$_POST['term_1'],'term_2'=>$_POST['term_2'],'term_3'=>$_POST['term_3'],'branch_id'=>$_POST['branch_id'],'date_timestamp'=>$_POST['date_timestamp'],'status'=>$_POST['status']);
         
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