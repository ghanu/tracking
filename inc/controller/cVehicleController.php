<?php include_once('cController.php');
class cVehicleController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "vehicle";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("vehicle.id","vehicle.registration_no","vehicle.owners_name","vehicle.makers_name","vehicle.makers_class","vehicle.finance_company","vehicle.fc_expires_on","vehicle.insurance_company","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("vehicle.registration_no","vehicle.owners_name","vehicle.s_w_d_o","vehicle.permanent_address","vehicle.dealer","vehicle.registered_date","vehicle.life_time_tax_paid","vehicle.challan_no","vehicle.valid_from","vehicle.valid_upto","vehicle.class_of_vehicle","vehicle.makers_name","vehicle.month_year","vehicle.chassis_no","vehicle.engine_number","vehicle.fuel_used","vehicle.makers_class","vehicle.seating_capacity","vehicle.colour","vehicle.hypothecation","vehicle.finance_company","vehicle.address","vehicle.contract_no","vehicle.customer_code","vehicle.original_loan_amount","vehicle.original_interest_amount","vehicle.original_amount_payable","vehicle.original_tenure","vehicle.monthly_instalment","vehicle.agreement_date","vehicle.first_instalment_due_on","vehicle.last_instalment_due_on","vehicle.fc_expires_on","vehicle.insurance_company","vehicle.iaddress","vehicle.policy_no","vehicle.date_of_issuance","vehicle.ivalid_from","vehicle.ivalid_upto","vehicle.permit_from","vehicle.permit_to");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('registration_no'=>$_POST['registration_no'],'owners_name'=>$_POST['owners_name'],'s_w_d_o'=>$_POST['s_w_d_o'],'permanent_address'=>$_POST['permanent_address'],'dealer'=>$_POST['dealer'],'registered_date'=>$_POST['registered_date'],'life_time_tax_paid'=>$_POST['life_time_tax_paid'],'challan_no'=>$_POST['challan_no'],'valid_from'=>$_POST['valid_from'],'valid_upto'=>$_POST['valid_upto'],'class_of_vehicle'=>$_POST['class_of_vehicle'],'makers_name'=>$_POST['makers_name'],'month_year'=>$_POST['month_year'],'chassis_no'=>$_POST['chassis_no'],'engine_number'=>$_POST['engine_number'],'fuel_used'=>$_POST['fuel_used'],'makers_class'=>$_POST['makers_class'],'seating_capacity'=>$_POST['seating_capacity'],'colour'=>$_POST['colour'],'hypothecation'=>$_POST['hypothecation'],'finance_company'=>$_POST['finance_company'],'address'=>$_POST['address'],'contract_no'=>$_POST['contract_no'],'customer_code'=>$_POST['customer_code'],'original_loan_amount'=>$_POST['original_loan_amount'],'original_interest_amount'=>$_POST['original_interest_amount'],'original_amount_payable'=>$_POST['original_amount_payable'],'original_tenure'=>$_POST['original_tenure'],'monthly_instalment'=>$_POST['monthly_instalment'],'agreement_date'=>$_POST['agreement_date'],'first_instalment_due_on'=>$_POST['first_instalment_due_on'],'last_instalment_due_on'=>$_POST['last_instalment_due_on'],'fc_expires_on'=>$_POST['fc_expires_on'],'insurance_company'=>$_POST['insurance_company'],'iaddress'=>$_POST['iaddress'],'policy_no'=>$_POST['policy_no'],'date_of_issuance'=>$_POST['date_of_issuance'],'ivalid_from'=>$_POST['ivalid_from'],'ivalid_upto'=>$_POST['ivalid_upto'],'permit_from'=>$_POST['permit_from'],'permit_to'=>$_POST['permit_to']);
         
        }
        else{
            
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
    }
    } 
 ?>