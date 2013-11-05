<?php

/**
 * Description of cLayoutModel
 *
 * @author mgovindan
 */
class cLayoutModel {

    //put your code here

    function __construct() {
        include_once('global_db.php');
        $this->db = new cDatabase();
    }

    function getParentMenuDetails() {
        $this->db->sql = "select iId,vName,tDescription,'closed' as status,'report' as type from g_master_report";
        return $this->db->read();
    }

    function getChildMenuDetails($iParentId) {
        $this->db->sql = "select iId,vName,tDescription,iReportId,vReportFormat,iMemberId, '' as status,'customization' as type from g_master_customization Where iReportId=" . $iParentId;
        return $this->db->read();
    }

    function getSystemMenuDetails() {
        $this->db->sql = "select iId,vName,tDescription ,'system' as type from g_master_report where iId=10000";
        return $this->db->read();
    }

}

?>
