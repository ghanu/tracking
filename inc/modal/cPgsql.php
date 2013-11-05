<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mysql_connecter
 *
 * @author gt
 */
include_once AppRoot . AppCommon . '/utils.php';

class cMysql {

    private $connection;
    public $sql;
    public $error;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        if (!$this->connection) {
            try {
                $this->connection = pg_pconnect("host=" . DataBaseHost . " user=" . DataBaseUser . " user=" . DataBasePass . " dbname=" . DataBaseName . " port=" . DataBasePort);
                if ($this->connection) {
                    throw new Exception("Could not connect to PostgreSQL server.");

                    exit();
                }
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        return $this->connection;
    }

    public function read() {
        log_message("debug", "SQL : $this->sql");
        if ($this->sql && $this->connection) {
            $result = pg_query($this->connection, $this->sql);
            return pg_fetch_assoc($result);
        } else {
            log_message("error", "SQL Preparation Error : $this->sql");
            $this->error = "Please try again later : " . pg_last_error($this->connection);
            $this->error .="<br/>" . $this->sql;
            return false;
        }
    }

    public function write() {

        log_message("debug", "SQL : $this->sql");



        if ($this->connection && $this->sql) {

            if (preg_match('/^\s*(insert|replace)/i', $this->sql)) {

                $result = pg_($this->connection);

                return $result;
            } elseif (preg_match('/^\s*(delete|update)/i', $this->sql)) {
                $result = pg_query($this->connection, $this->sql);
                $result = pg_affected_rows($result);

                return $result;
            } else {
                log_message("debug", "SQL Preparation Error : $this->sql");
                $this->error = "Please try again later !!!";
                return false;
            }
        } else {
            log_message("error", "SQL Preparation Error : $this->sql");
            $this->error = "Please try again later : " . pg_last_error($this->connection);
            $this->error .="<br/>" . $this->sql;
            return false;
        }
    }

    function getNextVal($seq_name) {
        $seqdata = $this->getCurrVal($seq_name);
        log_message("info", "getCurrVal(" . $seq_name . ") : $seqdata");
        $returnvalue = $seqdata[0]['seq_value'] + $seqdata[0]['increment_factor'];
        if ($seqdata[0]['table_name'] && $seqdata[0]['column_name']) {
            $this->sql = "select max(" . $seqdata[0]['column_name'] . ") as \"maxvalue\" from " . $seqdata[0]['table_name'];
            $current_data = $this->read();
            if (($current_data[0]['maxvalue'] + $seqdata[0]['increment_factor']) != $returnvalue) {
                $returnvalue = $current_data[0]['maxvalue'] + $seqdata[0]['increment_factor'];
            }
        }

        if ($seqdata[0]['pad_count'] > 0) {
            $returnseq = str_pad($returnvalue, $seqdata[0]['pad_count'], $seqdata[0]['pad_char'], $seqdata[0]['pad_type']);
        }

        $this->sql = "Update __sequence set seq_value=" . $returnvalue . " where seq_name='" . $seq_name . "'";
        $this->write();
        log_message("info", "getNextVal -- returns: $returnseq");
        return $returnseq;
    }

    function getCurrVal($seq_name) {
        $this->sql = "Select seq_value,increment_factor,pad_count,pad_char,pad_type,table_name,column_name from __sequence where seq_name='" . $seq_name . "'";
        return $this->read();
    }

    function getColumnDetails($table) {

        $this->sql = "select c.TABLE_SCHEMA,c.TABLE_NAME,c.COLUMN_NAME,IS_NULLABLE,c.ORDINAL_POSITION,COLUMN_DEFAULT,DATA_TYPE, CHARACTER_MAXIMUM_LENGTH,CHARACTER_OCTET_LENGTH,COLUMN_TYPE from information_schema.COLUMNS c  where c.TABLE_NAME='" . $table . "' and c.TABLE_SCHEMA='" . DataBaseName . "' order by c.ORDINAL_POSITION;";
        $columnDetailsArray = $this->read();
        if (is_array($columnDetailsArray)) {
            foreach ($columnDetailsArray as $key => $value) {
                $this->sql = "SELECT CONSTRAINT_NAME,REFERENCED_TABLE_NAME,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where TABLE_NAME='" . $table . "' and TABLE_SCHEMA='" . DataBaseName . "' and COLUMN_NAME='" . $value['COLUMN_NAME'] . "'";
                $columnForeignDetailsArray = $this->read();
                $columnDetails[$value['COLUMN_NAME']] = $value;
                if ($columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME']) {
                    $referenceColumnDetails = $this->getColumnDetails($columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME']);
                    $columnDetails[$value['COLUMN_NAME']]['REFERENCED_TABLE_NAME'] = $columnForeignDetailsArray[0]['REFERENCED_TABLE_NAME'];
                    $columnDetails[$value['COLUMN_NAME']]['REFERENCED_COLUMN_NAME'] = $columnForeignDetailsArray[0]['REFERENCED_COLUMN_NAME'];
                    $columnDetails[$value['COLUMN_NAME']]['CONSTRAINT_NAME'] = $columnForeignDetailsArray[0]['CONSTRAINT_NAME'];
                    $columnDetails[$value['COLUMN_NAME']]['referencetabledetails'] = $referenceColumnDetails;
                }
            }

            log_message("info", "getColumnDetails -- " . $table . ": " . json_encode($columnDetails));
            return $columnDetails;
        }
    }

    function getChildTables($table) {
        $this->sql = "select table_name,column_name,REFERENCED_COLUMN_NAME from information_schema.KEY_COLUMN_USAGE where REFERENCED_TABLE_NAME='" . $table . "' and `TABLE_SCHEMA`='" . DataBaseName . "'";
        $ChildTableDetailsArray = $this->read();

        if (is_array($ChildTableDetailsArray)) {
            foreach ($ChildTableDetailsArray as $key => $value) {
                $childTableDetails[$value['table_name']] = $value['column_name'];
            }
        }

        return $childTableDetails;
    }

    function getTableDetails() {
        $this->sql = "SELECT * from information_schema.TABLES where  TABLE_SCHEMA='" . DataBaseName . "' order by TABLE_NAME;";
        return $this->read();
    }

    function getForeignKeyDetails($table) {
        $this->sql = "select column_name,REFERENCED_COLUMN_NAME,REFERENCED_TABLE_NAME from information_schema.KEY_COLUMN_USAGE where table_name='" . $table . "' and `TABLE_SCHEMA`='" . DataBaseName . "'";
        $ForeignKeyDetailsArray = $this->read();
        if (is_array($ForeignKeyDetailsArray)) {
            foreach ($ForeignKeyDetailsArray as $key => $value) {
                $ForeignKeyDetailsArray['columns'][] = $value['column_name'];
            }
        }

        return $ForeignKeyDetailsArray;
    }

    function pg_last_id(){
        
    }
    
}

?>
