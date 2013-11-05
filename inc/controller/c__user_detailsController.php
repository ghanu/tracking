<?php include_once('cController.php');
class c__user_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array("photo"=>"image");
    function __construct() {
        parent::__construct();
        $this->table = "__user_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("__user_details.id","__user_details.first_name","__user_details.last_name","__user_details.middle_name","__user_details.date_of_birth","__user_details.email","__user_details.mobile","__user_details.work_phone","__designation.designation_name as deignation","__user_details.taddress_1","__user_details.taddress_2","__user_details.tcity_id","__user_details.tstate_id","__user_details.tcountry_id","__user_details.paddress_1","__user_details.paddress_2","__user_details.pcity_id","__user_details.pstate_id","__user_details.pcountry_id","__company.company_name as organization_id","__blood_group.blood_group as blood_group","__user_details.photo","__user_details.is_physically_challenged as is_physically_challenged","__user_details.physically_challanged_remarks","__user_details.sex as sex","__user_type.user_type_name as user_type","__branch_details.branch_name as branch_id","__user_details.status","__user_details.date_added","__user_details.date_last_updated","1 as action");
            $this->join_condition="Left Join __designation on __designation.id=__user_details.deignation Left Join __company on __company.id=__user_details.organization_id Left Join __blood_group on __blood_group.id=__user_details.blood_group Left Join __user_type on __user_type.id=__user_details.user_type Left Join __branch_details on __branch_details.id=__user_details.branch_id";    
        }elseif($this->action=="view"){
            $this->column=array("__user_details.first_name","__user_details.last_name","__user_details.middle_name","__user_details.date_of_birth","__user_details.email","__user_details.mobile","__user_details.work_phone","__designation.designation_name as deignation","__user_details.taddress_1","__user_details.taddress_2","__user_details.tcity_id","__user_details.tstate_id","__user_details.tcountry_id","__user_details.paddress_1","__user_details.paddress_2","__user_details.pcity_id","__user_details.pstate_id","__user_details.pcountry_id","__company.company_name as organization_id","__blood_group.blood_group as blood_group","__user_details.photo","__user_details.is_physically_challenged as is_physically_challenged","__user_details.physically_challanged_remarks","__user_details.sex as sex","__user_type.user_type_name as user_type","__branch_details.branch_name as branch_id","__user_details.status","__user_details.date_added","__user_details.date_last_updated");
            $this->join_condition="Left Join __designation on __designation.id=__user_details.deignation Left Join __company on __company.id=__user_details.organization_id Left Join __blood_group on __blood_group.id=__user_details.blood_group Left Join __user_type on __user_type.id=__user_details.user_type Left Join __branch_details on __branch_details.id=__user_details.branch_id";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("__user_details.first_name","__user_details.last_name","__user_details.middle_name","__user_details.date_of_birth","__user_details.email","__user_details.mobile","__user_details.work_phone","__user_details.deignation","__user_details.taddress_1","__user_details.taddress_2","__user_details.tcity_id","__user_details.tstate_id","__user_details.tcountry_id","__user_details.paddress_1","__user_details.paddress_2","__user_details.pcity_id","__user_details.pstate_id","__user_details.pcountry_id","__user_details.organization_id","__user_details.blood_group","__user_details.photo","__user_details.is_physically_challenged","__user_details.physically_challanged_remarks","__user_details.sex","__user_details.user_type","__user_details.branch_id","__user_details.status","__user_details.date_added","__user_details.date_last_updated");
            $this->join_condition="Left Join __designation on __designation.id=__user_details.deignation Left Join __company on __company.id=__user_details.organization_id Left Join __blood_group on __blood_group.id=__user_details.blood_group Left Join __user_type on __user_type.id=__user_details.user_type Left Join __branch_details on __branch_details.id=__user_details.branch_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'middle_name'=>$_POST['middle_name'],'date_of_birth'=>$_POST['date_of_birth'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'work_phone'=>$_POST['work_phone'],'deignation'=>$_POST['deignation'],'taddress_1'=>$_POST['taddress_1'],'taddress_2'=>$_POST['taddress_2'],'tcity_id'=>$_POST['tcity_id'],'tstate_id'=>$_POST['tstate_id'],'tcountry_id'=>$_POST['tcountry_id'],'paddress_1'=>$_POST['paddress_1'],'paddress_2'=>$_POST['paddress_2'],'pcity_id'=>$_POST['pcity_id'],'pstate_id'=>$_POST['pstate_id'],'pcountry_id'=>$_POST['pcountry_id'],'organization_id'=>$_POST['organization_id'],'blood_group'=>$_POST['blood_group'],'photo'=>$_POST['photo'],'is_physically_challenged'=>$_POST['is_physically_challenged'],'physically_challanged_remarks'=>$_POST['physically_challanged_remarks'],'sex'=>$_POST['sex'],'user_type'=>$_POST['user_type'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date_added'=>$_POST['date_added'],'date_last_updated'=>$_POST['date_last_updated']);
         
        }        
        else{
            $this->column=array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'middle_name'=>$_POST['middle_name'],'date_of_birth'=>$_POST['date_of_birth'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'work_phone'=>$_POST['work_phone'],'deignation'=>$_POST['deignation'],'taddress_1'=>$_POST['taddress_1'],'taddress_2'=>$_POST['taddress_2'],'tcity_id'=>$_POST['tcity_id'],'tstate_id'=>$_POST['tstate_id'],'tcountry_id'=>$_POST['tcountry_id'],'paddress_1'=>$_POST['paddress_1'],'paddress_2'=>$_POST['paddress_2'],'pcity_id'=>$_POST['pcity_id'],'pstate_id'=>$_POST['pstate_id'],'pcountry_id'=>$_POST['pcountry_id'],'organization_id'=>$_POST['organization_id'],'blood_group'=>$_POST['blood_group'],'photo'=>$_POST['photo'],'is_physically_challenged'=>$_POST['is_physically_challenged'],'physically_challanged_remarks'=>$_POST['physically_challanged_remarks'],'sex'=>$_POST['sex'],'user_type'=>$_POST['user_type'],'branch_id'=>$_POST['branch_id'],'status'=>$_POST['status'],'date_added'=>$_POST['date_added'],'date_last_updated'=>$_POST['date_last_updated']);
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