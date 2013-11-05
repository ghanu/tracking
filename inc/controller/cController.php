<?php

include_once AppRoot . AppModel . "cModal.php";

class cController extends cModal {

    public $apply_user_restrictions = false;

    function __construct() {
        parent::__construct();
    }

    public $id = NULL;

    public function getSelectData($table, $columns = NULL, $condition = NULL, $orderby = NULL) {


        $this->table = $table;
        $this->column = $columns;
        
        
        $data = $this->addWhereCondition($condition)->addOrderBy($orderby)->select()->executeRead();
//print_r($data);
        if (is_array($data)) {
            $dataarraykeys = array_keys($data[0]);
            foreach ($data as $key => $value) {

                $dataArray[$value[$dataarraykeys[0]]] = $value[$dataarraykeys[1]] ? $value[$dataarraykeys[1]] : $value[$dataarraykeys[0]];
            }
        }
        return $dataArray;
    }
	   
	public function getJsonData($data, $columns = NULL, $condition = NULL, $orderby = NULL) {

        if (is_array($data)) {
            $dataarraykeys = array_keys($data[0]);
            foreach ($data as $key => $value) {

                $dataArray[$value[$dataarraykeys[0]]] = $value[$dataarraykeys[1]] ? $value[$dataarraykeys[1]] : $value[$dataarraykeys[0]];
            }
        }
        return $dataArray;
    }
	public function getData($table, $columns = NULL, $condition = NULL, $orderby = NULL) {


        $this->table = $table;
        $this->column = $columns;
        
        
        $data = $this->addWhereCondition($condition)->addOrderBy($orderby)->select()->executeRead();

        return $data;
    }
    public function curd($action = '', $id = "", $condition_column="id=") {


        if ($action == 'view'||$action == 'editview') {
            return $this->addWhereCondition($this->table . '.'. $condition_column . '=' . $id)->select()->executeRead();
        }elseif ($action == 'edit') {
            $this->setSessionValues();
            $this->addWhereCondition($condition_column.'=' . $id)->update()->executeWrite();
            $this->id =$id;
            $_SESSION['lastaction'] = array('info' => array('url' => "index.php?file=" . $_GET['file'] . "&action=view&id=" . $this->id, 'text' => "Record Updated Successfully[ $this->id ]"));
            return $this->id;
        } elseif ($action == 'delete') {
            
            $this->addWhereCondition('id=' . $id)->delete()->executeWrite();
            $this->id =$id;
            $_SESSION['lastaction'] = array('info' => array('url' => "index.php?file=" . $_GET['file'] . "&id=" . $this->id, 'text' => "Record Deleted Successfully[ $this->id ]"));
            return $this->id;
        } elseif ($action == 'add') {
            $this->setSessionValues();
            $this->id = $this->create()->executeWrite();
            $_SESSION['lastaction'] = array('info' => array('url' => "index.php?file=" . $_GET['file'] . "&action=view&id=" . $this->id, 'text' => "Record Inserted Successfully[ $this->id ]"));

            return $this->id;
        } else {
            $condition = ($this->apply_user_restrictions === true && $_SESSION['user_restrictions'] != "") ? $this->table . "." . $_SESSION['user_restrictions'] : "";
			
            return $this->addWhereCondition($condition)->select()->executeRead();
        }
    }

    public function setDefaultValue($key, $default = array(), $systemdefault = "") {


        return $default[$key] ? $default[$key] : ($systemdefault ? $systemdefault : ($_POST[$key] ? $_POST[$key] : $_GET[$key]));
    }

    private function setSessionValues() {
        foreach ($this->column as $key => $value) {
            if (in_array($key, array_keys($_SESSION)) && $this->column[$key] == "") {
                $this->column[$key] = $_SESSION[$key];
            }
        }
    }

    private function setDefaultFilterCondition($report, $user_id) {
        $this->column = array("default_filter");
        $this->table = "__report_filters";
        $this->condition = "";
        $report_filters = $this->addWhereCondition()->select()->executeRead();
    }

}

?>
