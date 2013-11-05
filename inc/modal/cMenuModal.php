<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cMenuModal 
 * @author gt
 */
include_once('cModal.php');

class cMenuModal extends cModal {

    public function __constuct() {
        parent::__construct();
    }

    function getMenuDetails($menu_id) {

        $this->table = "__menu";
        return $this->addWhereCondition("id=" . $menu_id)->select()->executeRead();
    }

    function getUserMenuDetails($user_id, $parent_id = 0) {
        $this->table = "__menu m";
        $this->join_condition = "join __user_menu_details umd on m.id=umd.menu_id ";
        $this->column = 'm.id,menu_name,url,display_icon,status,parent';
        return $this->addWhereCondition("umd.user_id=" . $user_id . " AND parent=" . $parent_id)->select()->executeRead();
    }

}

?>
