<?php include_once('cController.php');
class cApach_orderController extends cController {
  public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "revisesd_order";
        $this->action="viewall";
    }
    //('<font color=red size=2><blink style=text-decoration:blink;>NA</blink></font>

 function curd() {
        if($this->action=="viewall"){
            $this->column=array("order_no,customer_name,po_date,po_number,po_line,part_name,rev,navision_material,
            part_description,po_qty,delivery_qty,balance_qty,project,status,dock_date,ge_dock_date, 1 as action"
			
			);
			
           /* $this->join_condition="INNER Join sales_header on sales_header.order_no =sales_line.document_no
			                      where sales_header.status=1 and sales_line.type not in(0) and sales_header.customer_name='VETCO GRAY PTE LTD' 
								  AND sales_header.status_description <> 'NULL'
								  group by id_sales_line";   */
		
        }elseif($this->action=="view"){
            $this->column=array("order_no,customer_name,po_date,po_number,po_line,part_name,rev,navision_material,
            part_description,po_qty,delivery_qty,balance_qty,project,status,dock_date,ge_dock_date");
                
        
        }elseif($this->action=="editview"){
            $this->column=array("order_no,customer_name,po_date,po_number,po_line,part_name,rev,navision_material,
            part_description,po_qty,delivery_qty,balance_qty,project,status,dock_date,ge_dock_date");
              
        
        }elseif($this->action=="add"){
            $this->column=array('order_no'=>$_POST['order_no'],'customer_name'=>$_POST['customer_name'],'po_date'=>$_POST['po_date'],
			'po_number'=>$_POST['po_number'],'po_line'=>$_POST['po_line'],'part_name'=>$_POST['part_name'],'rev'=>$_POST['rev'],
			'navision_material'=>$_POST['navision_material'],'navision_material'=>$_POST['navision_material'],
			'part_description'=>$_POST['part_description'],'po_qty'=>$_POST['po_qty'],'delivery_qty'=>$_POST['delivery_qty'],'balance_qty'=>$_POST['balance_qty'],
			'project'=>$_POST['project'],'status'=>$_POST['status'],'dock_date'=>$_POST['dock_date'],'ge_dock_date'=>$_POST['ge_dock_date']);
         
        }        
        else{
            $this->column=array('order_no'=>$_POST['order_no'],'customer_name'=>$_POST['customer_name'],'po_date'=>$_POST['po_date'],
			'po_number'=>$_POST['po_number'],'po_line'=>$_POST['po_line'],'part_name'=>$_POST['part_name'],'rev'=>$_POST['rev'],
			'navision_material'=>$_POST['navision_material'],'navision_material'=>$_POST['navision_material'],
			'part_description'=>$_POST['part_description'],'po_qty'=>$_POST['po_qty'],'delivery_qty'=>$_POST['delivery_qty'],'balance_qty'=>$_POST['balance_qty'],
			'project'=>$_POST['project'],'status'=>$_POST['status'],'dock_date'=>$_POST['dock_date'],'ge_dock_date'=>$_POST['ge_dock_date']);
        }
        
        
        $result=parent::curd($this->action,$this->id,'order_no');
        
        
        return $result; 
        }
        public function beforeWrite(){
        
        }
        public function afterWrite(){
       /* $this->table = 'payment_transaction_details ';
     		$this->column = array('transaction_table_id'=>$this->id,"transaction_no"=>$_POST['bill_no'],"transaction_amount"=>$_POST['amount_paid']);
     		$this->create()->executeWrite();*/
        }
    } 
 ?>