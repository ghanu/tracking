<?php include_once('cController.php');
class cPayment_transaction_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "payment_transaction_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("payment_transaction_details.id","payment_transaction_details.transaction_no","payment_transaction_details.transaction_amount","payment_transaction_details.transaction_date","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("payment_transaction_details.transaction_no","payment_transaction_details.transaction_amount","payment_transaction_details.transaction_date");
            $this->join_condition="";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("payment_transaction_details.transaction_table_id","payment_transaction_details.transaction_no","payment_transaction_details.transaction_amount","payment_transaction_details.transaction_date");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('transaction_table_id'=>$_POST['transaction_table_id'],'transaction_no'=>$_POST['transaction_no'],'transaction_amount'=>$_POST['transaction_amount'],'transaction_date'=>$_POST['transaction_date']);
         
        }        
        else{
            $this->column=array('transaction_table_id'=>$_POST['transaction_table_id'],'transaction_no'=>$_POST['transaction_no'],'transaction_amount'=>$_POST['transaction_amount'],'transaction_date'=>$_POST['transaction_date']);
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