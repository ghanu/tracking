<?php include_once('cController.php');
class cUser_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "__user_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("user_details.id","","1 as action");
            $this->join_condition="Join maddress on maddress.id=user_details.address_id Join __company on __company.id=user_details.organization_id";    
        }elseif($this->action=="view"){
            $this->column=array("user_details.first_name","user_details.last_name","user_details.middle_name","user_details.email","user_details.mobile","user_details.work_phone","user_details.address_id","user_details.organization_id","user_details.blood_group","user_details.is_physically_challenged","user_details.physically_challanged_remarks","user_details.sex","user_details.user_type","user_details.father_spouse_name");
            $this->join_condition="Join maddress on maddress.id=user_details.address_idJoin __company on __company.id=user_details.organization_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'middle_name'=>$_POST['middle_name'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'work_phone'=>$_POST['work_phone'],'address_id'=>$_POST['address_id'],'organization_id'=>$_POST['organization_id'],'blood_group'=>$_POST['blood_group'],'photo'=>$_POST['photo'],'is_physically_challenged'=>$_POST['is_physically_challenged'],'physically_challanged_remarks'=>$_POST['physically_challanged_remarks'],'sex'=>$_POST['sex'],'user_type'=>$_POST['user_type'],'father_spouse_name'=>$_POST['father_spouse_name']);
         
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