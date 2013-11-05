<?php include_once('cController.php');
class cStudent_fees_detailsController extends cController {
 public $action="viewall";
    public $id="";
    public $view_controls=array();
    function __construct() {
        parent::__construct();
        $this->table = "student_fees_details";
        
    }
    
 function curd() {
        if($this->action=="viewall"){
            $this->column=array("student_fees_details.id","","1 as action");
            $this->join_condition="";    
        }elseif($this->action=="view"){
            $this->column=array("student_fees_details.student_id","student_fees_details.fees_id","student_fees_details.paid_date","student_fees_details.paid_amount","student_fees_details.balance_amount","student_fees_details.due_date","student_fees_details.receipt_no","student_fees_details.payment_mode_id","student_fees_details.cheque_no","student_fees_details.received_user_id","student_fees_details.status");
            $this->join_condition="";    
        
        }elseif($this->action=="add"){
            $this->column=array('student_id'=>$_POST['student_id'],'fees_id'=>$_POST['fees_id'],'paid_date'=>$_POST['paid_date'],'paid_amount'=>$_POST['paid_amount'],'balance_amount'=>$_POST['balance_amount'],'due_date'=>$_POST['due_date'],'receipt_no'=>$_POST['receipt_no'],'payment_mode_id'=>$_POST['payment_mode_id'],'cheque_no'=>$_POST['cheque_no'],'received_user_id'=>$_POST['received_user_id'],'status'=>$_POST['status']);
         
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