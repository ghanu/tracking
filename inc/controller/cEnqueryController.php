<?php include_once('cController.php');
class cEnqueryController extends cController {
  public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "sales_line";
        $this->action="viewall";
    }
    //('<font color=red size=2><blink style=text-decoration:blink;>NA</blink></font>

 function curd() {
        if($this->action=="viewall"){
            $this->column=array("sales_line.document_no","sales_header.customer_name","sales_header.external_doc","sales_header.product_item",
			"sales_header.order_date","sales_header.due_date","sales_line.no","sales_line.description",
			"sales_line.order_qty","sales_line.delivery_qty","sales_line.balance_qty","sales_line.qty_shipped",
			"sales_line.shipment_date","sales_line.planned_shipment_date",
			"CASE status_description
				WHEN 'Closed'
					THEN '<font color=green size=3>Closed</font>'
				WHEN 'on schedule'
					THEN '<font color=blue size=3>On Schedule</font>'
				WHEN 'In Process'
					THEN '<font color=orange size=3>In progress</font>'
			 ELSE
			   status_description
			END"
			
			);
			
            $this->join_condition="INNER Join sales_header on sales_header.order_no =sales_line.document_no
			                      where sales_header.status=1 and sales_line.type not in(0) and sales_header.customer_name='VETCO GRAY PTE LTD' 
								  AND sales_header.status_description <> 'NULL'
								  group by id_sales_line";   
		
        }elseif($this->action=="view"){
            $this->column=array("pre_admission.application_no","pre_admission.how_did_you_heard_about_us","pre_admission.child_name","DATE_FORMAT(pre_admission.child_date_of_birth,'".AppDateFormatDb."') as child_date_of_birth","mclass.class as class_to_be_admitted","pre_admission.parent_name","pre_admission.email","pre_admission.mobile","DATE_FORMAT(pre_admission.date_of_issue,'".AppDateFormatDb."') as date_of_issue","DATE_FORMAT(pre_admission.date_of_returning,'".AppDateFormatDb."') as date_of_returning","pre_admission.amount_paid","pre_admission.payment_mode as payment_mode","pre_admission.cheque_no","pre_admission.bank_name","LPAD(pre_admission.bill_no,4,'0') as bill_no","DATE_FORMAT(pre_admission.date_of_pre_screening,'".AppDateFormatDb."') as date_of_pre_screening","pre_admission.time_of_pre_screening","pre_admission.screening_id","pre_admission.branch_id","pre_admission.date_timestamp","pre_admission.status");
            $this->join_condition="Left Join mclass on mclass.id=pre_admission.class_to_be_admitted";    
        
        
        }elseif($this->action=="editview"){
            $this->column=array("pre_admission.application_no","pre_admission.how_did_you_heard_about_us","pre_admission.child_name","pre_admission.child_date_of_birth","pre_admission.class_to_be_admitted","pre_admission.parent_name","pre_admission.email","pre_admission.mobile","pre_admission.date_of_issue","pre_admission.date_of_returning","pre_admission.amount_paid","pre_admission.payment_mode","pre_admission.cheque_no","pre_admission.bank_name","pre_admission.bill_no","pre_admission.date_of_pre_screening","pre_admission.time_of_pre_screening","pre_admission.screening_id","pre_admission.branch_id","pre_admission.date_timestamp","pre_admission.status");
            $this->join_condition="Left Join mclass on mclass.id=pre_admission.class_to_be_admitted";    
        
        }elseif($this->action=="add"){
            $this->column=array('application_no'=>$_POST['application_no'],'how_did_you_heard_about_us'=>$_POST['how_did_you_heard_about_us'],'child_name'=>$_POST['child_name'],'child_date_of_birth'=>$_POST['child_date_of_birth'],'class_to_be_admitted'=>$_POST['class_to_be_admitted'],'parent_name'=>$_POST['parent_name'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'date_of_issue'=>$_POST['date_of_issue'],'date_of_returning'=>$_POST['date_of_returning'],'amount_paid'=>$_POST['amount_paid'],'payment_mode'=>$_POST['payment_mode'],'cheque_no'=>$_POST['cheque_no'],'bank_name'=>$_POST['bank_name'],'bill_no'=>$_POST['bill_no'],'date_of_pre_screening'=>$_POST['date_of_pre_screening'],'time_of_pre_screening'=>$_POST['time_of_pre_screening'],'screening_id'=>$_POST['screening_id'],'branch_id'=>$_POST['branch_id'],'date_timestamp'=>$_POST['date_timestamp'],'status'=>$_POST['status']);
         
        }        
        else{
            $this->column=array('application_no'=>$_POST['application_no'],'how_did_you_heard_about_us'=>$_POST['how_did_you_heard_about_us'],'child_name'=>$_POST['child_name'],'child_date_of_birth'=>$_POST['child_date_of_birth'],'class_to_be_admitted'=>$_POST['class_to_be_admitted'],'parent_name'=>$_POST['parent_name'],'email'=>$_POST['email'],'mobile'=>$_POST['mobile'],'date_of_issue'=>$_POST['date_of_issue'],'date_of_returning'=>$_POST['date_of_returning'],'amount_paid'=>$_POST['amount_paid'],'payment_mode'=>$_POST['payment_mode'],'cheque_no'=>$_POST['cheque_no'],'bank_name'=>$_POST['bank_name'],'bill_no'=>$_POST['bill_no'],'date_of_pre_screening'=>$_POST['date_of_pre_screening'],'time_of_pre_screening'=>$_POST['time_of_pre_screening'],'screening_id'=>$_POST['screening_id'],'branch_id'=>$_POST['branch_id'],'date_timestamp'=>$_POST['date_timestamp'],'status'=>$_POST['status']);
        }
        
        
        $result=parent::curd($this->action,$this->id);
        
        
        return $result; 
        }
        public function beforeWrite(){
        
        }
        public function afterWrite(){
        $this->table = 'payment_transaction_details ';
     		$this->column = array('transaction_table_id'=>$this->id,"transaction_no"=>$_POST['bill_no'],"transaction_amount"=>$_POST['amount_paid']);
     		$this->create()->executeWrite();
        }
    } 
 ?>