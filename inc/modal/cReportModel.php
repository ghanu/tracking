<?php

/**
 * Description of cReportModel
 *
 * @author mgovindan
 */
class cReportModel {

    private $db;
    protected $tableName;
    protected $columnName;
    protected $conditionString;
    public $cid;
    protected $rid;
    protected $colid;
    public $orderBy;
    public $offset;
    public $limit;
    public $groupBy;

    function __construct() {
        include_once('global_db.php');
        $this->db = new cDatabase();
    }

    function getReportDetails() {
        $this->db->sql = 'select * from g_master_report where iId=' . $this->rid;
        return $this->db->read();
    }

    function getReportCustomizationDetails() {
        $this->db->sql = 'select * from g_master_customization where iId=' . $this->cid;
        return $this->db->read();
    }

    function getColumnCustomizationDetails() {
       $this->db->sql = 'select
             cc.iId as iColumnCustomizationId,cc.iCustomizationId,vDisplayName,vDataFormat,vStyleDetails,
             vMathFunction,iColumnId,bIsVisible,bIsGroup,bIsSort,iDisplayOrder,
             vDbColumnName,vScriptVariableName,iReportId,vDataType,vAlign,iCrossTabColumn,iChartColumn
             from
             g_column_customization cc
             join g_master_columns mc on mc.iId=cc.iColumnId
             where cc.iCustomizationId=' . $this->cid . ' order by iDisplayOrder asc';
        return $this->db->read();
    }

    function getMasterColumnDetails() {
        $this->db->sql = 'select * from g_master_columns where iId=' . $this->colid;
        return $this->db->read();
    }

    function getColumnConditionDetails() {
        $this->db->sql = 'select * from g_customization_condition where iColumnCustomizationId=' . $this->colid;
        return $this->db->read();
    }

    function getReportData() {

        $this->db->sql = 'select ' . $this->columnName . ' from ' . $this->tableName . $this->conditionString . ' ' .$this->groupBy.' '. $this->orderBy . ' ' . $this->offset . ' ' . $this->limit ;
        return $this->db->read();
    }

//@todo Please add the wrapper function to set the properties of each column in run time 

    function setColumnAlignment($value) {
        $this->db->params = array($value);
        $this->db->paramTypes = array('s');
        $this->db->sql = 'update g_column_customization set vAlign=? Where ' . $this->conditionString;
        return $this->db->write();
    }

    function setDataFormat($value) {
        $this->db->params = array($value);
        $this->db->paramTypes = array('s');
        $this->db->sql = 'update g_column_customization set vDataFormat=? Where ' . $this->conditionString;
        return $this->db->write();
    }
  

}

?>
