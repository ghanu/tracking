<?php

include_once('cController.php');

class cTime_tableController extends cController {

    public $action = "viewall";
    public $id = "";
    public $view_controls = array();

    function __construct() {
        parent::__construct();
        $this->table = "time_table";
    }

    function curd() {
        if ($this->action == "viewall") {
            $this->column = array("time_table.id", "class_section_relation.(select classfrom mclass where id=class_id)||'-'||(select section from sections where id=section_id)  as class_section_id", "time_table.branch_id", "subjects.name as subject_id", "time_table.last_updated", "time_table.status", "1 as action");
            $this->join_condition = "Left Join class_section_relation on class_section_relation.id=time_table.class_section_id Left Join subjects on subjects.id=time_table.subject_id";
        } elseif ($this->action == "view") {
            $this->column = array("class_section_relation.(select classfrom mclass where id=class_id)||'-'||(select section from sections where id=section_id)  as class_section_id", "time_table.branch_id", "subjects.name as subject_id", "time_table.last_updated", "time_table.status");
            $this->join_condition = "Left Join class_section_relation on class_section_relation.id=time_table.class_section_id Left Join subjects on subjects.id=time_table.subject_id";
        } elseif ($this->action == "add") {
            $this->column = array('class_section_id' => $_POST['class_section_id'], 'branch_id' => $_POST['branch_id'], 'subject_id' => $_POST['subject_id'], 'last_updated' => $_POST['last_updated'], 'status' => $_POST['status']);
        } else {
            $this->column = array('class_section_id' => $_POST['class_section_id'], 'branch_id' => $_POST['branch_id'], 'subject_id' => $_POST['subject_id'], 'last_updated' => $_POST['last_updated'], 'status' => $_POST['status']);
        }


        //$result = parent::curd($this->action, $this->id);


        return $result;
    }

    public function beforeWrite() {
        
    }

    public function afterWrite() {
        
    }

}

?>