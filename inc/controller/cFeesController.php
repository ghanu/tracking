<?php

include_once('cController.php');

class cFeesController extends cController {

    public $action = "viewall";
    public $id = "";
    public $view_controls = array();

    function __construct() {
        parent::__construct();
        $this->table = "fees";
    }

    function curd() {
        if ($this->action == "viewall") {
            $this->column = array("fees.id", "fees.class_id", "fees.student_id", "LPAD(fees.bill_no,4,'0') as bill_no", "fees.payment_mode", "fees.cheque_no", "fees.bank_name", "fees.chellan_no", "fees.pay", "1 as action");
            $this->join_condition = "";
        } elseif ($this->action == "view") {
            $this->column = array("fees.class_id", "fees.student_id", "LPAD(fees.bill_no,4,'0') as bill_no", "fees.payment_mode", "fees.cheque_no", "fees.bank_name", "fees.chellan_no", "fees.pay");
            $this->join_condition = "";
        } elseif ($this->action == "add") {
            $this->column = array('class_id' => $_POST['class_id'], 'student_id' => $_POST['student_id'], 'bill_no' => $_POST['bill_no'], 'payment_mode' => $_POST['payment_mode'], 'cheque_no' => $_POST['cheque_no'], 'bank_name' => $_POST['bank_name'], 'chellan_no' => $_POST['chellan_no'], 'pay' => $_POST['pay'], 'branch_id' => $_POST['branch_id'], 'status' => $_POST['status']);
        } else {
            $this->column = array('class_id' => $_POST['class_id'], 'student_id' => $_POST['student_id'], 'bill_no' => $_POST['bill_no'], 'payment_mode' => $_POST['payment_mode'], 'cheque_no' => $_POST['cheque_no'], 'bank_name' => $_POST['bank_name'], 'chellan_no' => $_POST['chellan_no'], 'pay' => $_POST['pay'], 'branch_id' => $_POST['branch_id'], 'status' => $_POST['status']);
        }


        $result = parent::curd($this->action, $this->id);


        return $result;
    }

    public function beforeWrite() {
        if ($this->student_id) {
            $this->table = "fees_dues";
            $this->column = array("admission.first_name", "fees_type.fees_type", "fees_dues.fees_amount", "fees_dues.paid", "fees_dues.due_date");
            $this->join_condition = "Join fees_type on fees_dues.fees_type_id=fees_type.id Join mclass on mclass.id=fees_dues.class_id join admission on admission.id=fees_dues.student_id";
            $feesarray = $this->addOrderBy("fees_type.fees_priority asc")->addWhereCondition("fees_dues.student_id=" . $this->student_id)->select()->executeRead();
            ;
            $content_details_array["formelements"]["fees_table"] = '<div>' . $array[0]['first_name'] . '</div>';
            $content_details_array["formelements"]["fees_table"].= "<table class='fees_table'>";
            $content_details_array["formelements"]["fees_table"].='<thead><tr><td>Fees Type</td><td>Amount</td><td>Balance</td><td>Due on</td></tr><thead><tbody>';

            foreach ($feesarray as $key => $value) {

                $content_details_array["formelements"]["fees_table"].='<tr>';
                foreach ($value as $key1 => $value1) {
                    if ($key1 != "first_name") {
                        $content_details_array["formelements"]["fees_table"].='<td>';
                        $content_details_array["formelements"]["fees_table"].=$value1;
                        $content_details_array["formelements"]["fees_table"].='</td>';
                    }
                }
                $content_details_array["formelements"]["fees_table"].='</tr>';
            }
            $content_details_array["formelements"]["fees_table"].="</tbody></div></table>";
        }
    }

    public function afterWrite() {
        $this->column = array("fees_dues.id", "fees_dues.fees_type_id", "fees_dues.fees_amount", "fees_dues.paid", "fees_dues.status", "fees_type.fees_type", "fees_type.fees_priority", "fees_type.fees_period");
        $this->table = 'fees_dues';
        $this->join_condition = " left join fees_type on fees_type.id=fees_dues.fees_type_id";
        $fees_dues = $this->addOrderBy("fees_type.fees_priority asc")->addWhereCondition("student_id=" . $this->student_id)->select()->executeRead();


        $payments = array();
        $i = 0;
        foreach ($fees_dues as $key => $value) {
            $this->column = array('fees_payment_id' => $this->id, 'fees_type_id' => $value['fees_type_id']);
            $this->table = 'fees_transactions';
            if ($value['fees_amount'] > $value['paid']) {
                $yettobepaid = $value['fees_amount'] - $value['paid'];
                $balance_amount = $_POST['pay'] - $yettobepaid;
                if ($balance_amount >= 0) {
                    $payments[$i]['id'] = $value['id'];
                    $payments[$i]['fees_type_id'] = $value['fees_type_id'];
                    $payments[$i]['amount'] = $value['paid'] + $yettobepaid;
                    $_POST['pay'] = $_POST['pay'] - $yettobepaid;
                    $this->column['amount'] = $yettobepaid;
                    $this->create()->executeWrite();
                    $i++;
                } elseif ($balance_amount < 0) {
                    $payments[$i]['id'] = $value['id'];
                    $payments[$i]['fees_type_id'] = $value['fees_type_id'];
                    $payments[$i]['amount'] = $value['paid'] + $_POST['pay'];
                    $_POST['pay'] = 0;
                    $this->column['amount'] = $_POST['pay'];
                    $this->create()->executeWrite();
                    $i++;
                    break;
                }
            }
        }

        foreach ($payments as $key => $value) {

            $this->table = 'fees_dues';
            $this->column = array('paid' => $value['amount']);
            $fees_dues = $this->addWhereCondition('id=' . $value['id'])->update()->executeWrite();



            //updates transaction table for bill no generation
            $this->table = 'payment_transaction_details ';
            $this->column = array('transaction_table_id' =>$this->id, "transaction_no" => $_POST['bill_no'], "transaction_amount" => $_POST['pay']);
            $this->create()->executeWrite();
        }
    }

}

?>