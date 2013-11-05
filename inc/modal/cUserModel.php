<?php

/**
 * Description of cLayoutModel
 *
 * @author mgovindan
 */
include_once('cModal.php');

class cUserModel extends cModal {

    //put your code here


    function __construct() {

        parent::__construct();
    }

    function validateLogin($username, $password) {
        $this->table = '__login';
        return $this->addWhereCondition("login_name='" . $username . "' And password='" . md5($password) . "'")->select()->executeRead();
    }

    function getUserDetails($user_id) {
        $this->table = '__user_details';
        $this->join_condition="join __user_type on __user_details.user_type=__user_type.id";
        $this->column=array('__user_details.id', 'first_name', 'last_name', 'middle_name', 'date_of_birth', 'email', 'mobile', 'work_phone', 'deignation', 'taddress_1', 'taddress_2', 'tcity_id', 'tstate_id', 'tcountry_id', 'paddress_1', 'paddress_2', 'pcity_id', 'pstate_id', 'pcountry_id', 'organization_id', 'blood_group', 'photo', 'is_physically_challenged', 'physically_challanged_remarks', 'sex', 'user_type', 'branch_id', 'status', 'date_added', 'date_last_updated' ,'__user_type.user_type_name','user_restrictions');
        return $this->addWhereCondition("__user_details.id=" . $user_id)->select()->executeRead();
    }

}

?>
