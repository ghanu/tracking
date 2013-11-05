<?php include_once('cController.php');
class cDriverController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "driver";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("driver.id","__user_details.first_name","driver.school_name","driver.standard","driver.year","driver.city2","driver.vehicle_name","driver.period_start","driver.period_end","driver.accident","driver.vehicle_name1","driver.period_start1","driver.period_end1","driver.accident1","driver.license_no","driver.license_address","driver.period_start2","driver.expiry_on","driver.rto","driver.name_of_employer","driver.daddress","driver.dcity","driver.dstate","driver.dpincode","driver.employment_dates_from","driver.employment_dates_to","driver.pay_rs","driver.name_of_immediate_superviser","driver.reason_for_leaving","driver.rname","driver.rrelationship","driver.raddress","driver.rwork_number","driver.rhome_number","driver.rname1","driver.rrelationship1","driver.raddress1","driver.rwork_number1","driver.rhome_number1","1 as action");
            $this->join_condition="Left Join __user_details on __user_details.id=driver.user_id";    
        }elseif($this->action=="view"){
            $this->column=array("driver.user_id","driver.school_name","driver.standard","driver.year","driver.city2","driver.vehicle_name","driver.period_start","driver.period_end","driver.accident","driver.vehicle_name1","driver.period_start1","driver.period_end1","driver.accident1","driver.license_no","driver.license_address","driver.period_start2","driver.expiry_on","driver.rto","driver.name_of_employer","driver.daddress","driver.dcity","driver.dstate","driver.dpincode","driver.employment_dates_from","driver.employment_dates_to","driver.pay_rs","driver.name_of_immediate_superviser","driver.reason_for_leaving","driver.rname","driver.rrelationship","driver.raddress","driver.rwork_number","driver.rhome_number","driver.rname1","driver.rrelationship1","driver.raddress1","driver.rwork_number1","driver.rhome_number1");
            $this->join_condition="Left Join __user_details on __user_details.id=driver.user_id";    
        
        }elseif($this->action=="add"){
            $this->column=array('user_id'=>$_POST['user_id'],'school_name'=>$_POST['school_name'],'standard'=>$_POST['standard'],'year'=>$_POST['year'],'city2'=>$_POST['city2'],'vehicle_name'=>$_POST['vehicle_name'],'period_start'=>$_POST['period_start'],'period_end'=>$_POST['period_end'],'accident'=>$_POST['accident'],'vehicle_name1'=>$_POST['vehicle_name1'],'period_start1'=>$_POST['period_start1'],'period_end1'=>$_POST['period_end1'],'accident1'=>$_POST['accident1'],'license_no'=>$_POST['license_no'],'license_address'=>$_POST['license_address'],'period_start2'=>$_POST['period_start2'],'expiry_on'=>$_POST['expiry_on'],'rto'=>$_POST['rto'],'name_of_employer'=>$_POST['name_of_employer'],'daddress'=>$_POST['daddress'],'dcity'=>$_POST['dcity'],'dstate'=>$_POST['dstate'],'dpincode'=>$_POST['dpincode'],'employment_dates_from'=>$_POST['employment_dates_from'],'employment_dates_to'=>$_POST['employment_dates_to'],'pay_rs'=>$_POST['pay_rs'],'name_of_immediate_superviser'=>$_POST['name_of_immediate_superviser'],'reason_for_leaving'=>$_POST['reason_for_leaving'],'rname'=>$_POST['rname'],'rrelationship'=>$_POST['rrelationship'],'raddress'=>$_POST['raddress'],'rwork_number'=>$_POST['rwork_number'],'rhome_number'=>$_POST['rhome_number'],'rname1'=>$_POST['rname1'],'rrelationship1'=>$_POST['rrelationship1'],'raddress1'=>$_POST['raddress1'],'rwork_number1'=>$_POST['rwork_number1'],'rhome_number1'=>$_POST['rhome_number1']);
         
        }        
        else{
            $this->column=array('user_id'=>$_POST['user_id'],'school_name'=>$_POST['school_name'],'standard'=>$_POST['standard'],'year'=>$_POST['year'],'city2'=>$_POST['city2'],'vehicle_name'=>$_POST['vehicle_name'],'period_start'=>$_POST['period_start'],'period_end'=>$_POST['period_end'],'accident'=>$_POST['accident'],'vehicle_name1'=>$_POST['vehicle_name1'],'period_start1'=>$_POST['period_start1'],'period_end1'=>$_POST['period_end1'],'accident1'=>$_POST['accident1'],'license_no'=>$_POST['license_no'],'license_address'=>$_POST['license_address'],'period_start2'=>$_POST['period_start2'],'expiry_on'=>$_POST['expiry_on'],'rto'=>$_POST['rto'],'name_of_employer'=>$_POST['name_of_employer'],'daddress'=>$_POST['daddress'],'dcity'=>$_POST['dcity'],'dstate'=>$_POST['dstate'],'dpincode'=>$_POST['dpincode'],'employment_dates_from'=>$_POST['employment_dates_from'],'employment_dates_to'=>$_POST['employment_dates_to'],'pay_rs'=>$_POST['pay_rs'],'name_of_immediate_superviser'=>$_POST['name_of_immediate_superviser'],'reason_for_leaving'=>$_POST['reason_for_leaving'],'rname'=>$_POST['rname'],'rrelationship'=>$_POST['rrelationship'],'raddress'=>$_POST['raddress'],'rwork_number'=>$_POST['rwork_number'],'rhome_number'=>$_POST['rhome_number'],'rname1'=>$_POST['rname1'],'rrelationship1'=>$_POST['rrelationship1'],'raddress1'=>$_POST['raddress1'],'rwork_number1'=>$_POST['rwork_number1'],'rhome_number1'=>$_POST['rhome_number1']);
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