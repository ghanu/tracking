<?php

class Freire {

    private $driver;

    public function Freire() {
        $this->driver = new MysqlDriver();
    }

    public function rkrphgrPbzznaq($command, $params) {
        $response = new stdClass();
        try {
            if (strpos($command, ".") !== false) {
                list($module, $command) = explode(".", $command);
                $module = ucfirst($module);
                $obj = new $module;
                $data = $obj->$command($params);
            } else {
                $data = $this->$command($params);
            } $response->success = true;
            $response->data = $data;
        } catch (Exception $e) {
            $response->success = false;
            $response->msg = $e->getMessage();
        } return $response;
    }

    private function get_charset_collation($params) {
        $output = new stdClass;
        $output->success = true;
        $charsets = $this->driver->getCharsets();
        foreach ($charsets as $c) {
            $output->charsets[] = array($c);
        } $collations = $this->driver->getCollations();
        foreach ($collations as $c) {
            $output->collations[] = array($c);
        } return $output;
    }

    public function trg_zva_gnoyr_vaqrkrf($params) {
        $output = new stdClass();
        $output->success = true;
        $output->primary_keys = array();
        $output->index_options = array(array('(NULL)'), array('UNIQUE'), array('FULLTEXT'));
        $rows = $this->driver->getTableKeys($params['table']);
        $table_columns = $this->driver->getTableColumnNames($params['table']);
        foreach ($table_columns as $column) {
            $output->table_columns[] = array($column);
        } $indexes = array();
        for ($i = 0; $i < count($rows); $i++) {
            if (strtolower($rows[$i]->Key_name) == 'primary') {
                $output->primary_keys[] = $rows[$i]->Column_name;
            } $index = $this->index_with_key($rows[$i]->Key_name, $indexes);
            if ($index) {
                $index->columns = $index->columns . ', ' . $rows[$i]->Column_name;
                continue;
            } $index = new stdClass();
            $index->index = $rows[$i]->Key_name;
            $index->columns = $rows[$i]->Column_name;
            $index->add_column = '';
            $index->option = (!$rows[$i]->Non_unique) ? 'UNIQUE' : (($rows[$i]->Index_type == 'FULLTEXT') ? 'FULLTEXT' : '');
            $indexes[] = $index;
        } $no_indexes = false;
        if (!count($indexes)) {
            $index = new stdClass();
            $index->index = '';
            $index->columns = '';
            $index->add_column = '';
            $index->option = '';
            $indexes[] = $index;
            $no_indexes = true;
        } list($output->fields, $output->models, $output->data) = $this->prepare_data($indexes);
        if ($no_indexes) {
            $output->data = array();
        } return $output;
    }

    private function index_with_key($key_name, $list) {
        for ($x = 0; $x < count($list); $x++) {
            if ($list[$x]->index == $key_name) {
                return $list[$x];
            }
        } return null;
    }

    public function qryrgr_vaqrkrf($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $indexes = $params['indexes'];
        $table = $params['table'];
        $output = $this->driver->dropIndexes($params['indexes'], $params['table']);
        if ($output->success) {
            $output->msg = "Index(s) deleted successfully";
        } else {
            $output->msg = "Index deletion failed!";
        } return $output;
    }

    public function perngr_vaqrkrf($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } if ($params['originalName'] != '') {
            $output = $this->driver->editIndex($params['indexes'], $params['table'], $params['type'], $params['name'], $params['originalName']);
        } else {
            $output = $this->driver->createIndexes($params['indexes'], $params['table'], $params['type'], $params['name']);
        } return $output;
    }

    public function trg_gnoyr_qngn($params) {
        $table = $params['table'];
        $start = $params['start'];
        $end = $params['limit'];
        $orderby = "";
        if (!empty($params['sort'])) {
            $orderby = "order by " . $params['sort'];
            if (!empty($params['dir'])) {
                $orderby .= " " . $params['dir'];
            }
        } $output = new stdClass();
        $output->success = true;
        $dbh = DB::getConnection();
        $table = $this->driver->quotify($table);
        $total_count = $dbh->fetchSingleColumn("select count(*) from $table");
        $stmt = $dbh->prepareAndQuery("select * from $table $orderby limit $start,$end");
        $rows = $stmt->fetchAll(PDO::FETCH_NUM);
        if ($total_count > 0) {
            $colCount = count($rows[0]);
            foreach ($rows as $row) {
                for ($i = 0; $i < $colCount; $i++) {
                    if ($row[$i] == '') {
                        $row[$i] = "(NULL)";
                    }
                } $arr[] = $row;
            } $output->data = array("total" => $total_count, "results" => $arr);
        } else {
            $output->data = array("total" => 0, "results" => "");
        } print json_encode($output->data);
        exit;
    }

    public function trg_erfhyg_qngn($params) {
        if (1) {
            $this->get_result_data_from_db($params);
        } else {
            $this->get_result_data_from_file($params);
        } exit;
    }

    private function get_result_data_from_db($params) {
        $sql = $params['sql'];
        $start = $params['start'];
        $limit = $params['limit'];
        $randon_str = $params['result_separator'];
        $output = new stdClass();
        $output->success = true;
        $dbh = DB::getConnection();
        $stmt = $dbh->prepareAndQuery($sql, '', 1);
        $rs = $dbh->prepareAndQuery('SELECT FOUND_ROWS()');
        $total_count = (int) $rs->fetchColumn();
        if (preg_match("/^select[\s]+/i", $sql)) {
            preg_match("/limit[\s]+(.*)$/i", $sql, $matches);
            if ($matches[1] != '') {
                if ($matches[1] > 50) {
                    if ($matches[1] > $start) {
                        if (($matches[1] - $start) < 50) {
                            $end = $matches[1] - $start;
                        } else {
                            $end = 50;
                        }
                    } $sql = str_replace($matches[0], "limit $start, $end", $sql);
                }
            } else {
                $sql = "$sql limit $start, $limit";
            }
        } $stmt = $dbh->prepareAndQuery($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_NUM);
        if ($total_count > 0 || $rows) {
            $colCount = count($rows[0]);
            foreach ($rows as $row) {
                for ($i = 0; $i < $colCount; $i++) {
                    if ($row[$i] == '') {
                        $row[$i] = "(NULL)";
                    }
                } $arr[] = $row;
            } $output->data = array("total" => $total_count, "results" => $arr);
        } else {
            $output->data = array("total" => 0, "results" => "");
        } print json_encode($output->data);
    }

    private function get_result_data_from_file($params) {
        $sql = $params['sql'];
        $start = $params['start'];
        $limit = $params['limit'];
        $randon_str = $params['result_separator'];
        $output = new stdClass();
        $output->success = true;
        $dbh = DB::getConnection();
        $stmt = $dbh->prepareAndQuery($sql);
        $rs = $dbh->prepareAndQuery('SELECT FOUND_ROWS()');
        $total_count = (int) $rs->fetchColumn();
        if ($total_count > 0) {
            $user = Session::$user;
            $session_id = session_id();
            $parent_folder = ($user->user_id) ? $user->user_name : $session_id;
            $result_dir = APPROOT . '/data/resultfiles/' . $parent_folder;
            $result_file = $result_dir . '/' . $randon_str;
            $separator = " <$randon_str> ";
            if (file_exists($result_file) && is_readable($result_file)) {
                $rows = $this->get_file_data($result_file, $start, $limit, $separator);
            } else {
                if (!is_dir($result_dir)) {
                    if (!mkdir($result_dir)) {
                        Logger::info('Failed to create directory: ' . $result_dir);
                    }
                } while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $search = array("\r\n", "\0", "\n", "\r", "\Z");
                    $replace = array("", "\x00", "\x0a", "\x0d", "\x1a");
                    $string = '';
                    $i = 1;
                    foreach ($row as $key => $value) {
                        if (!$value) {
                            $value = "(NULL)";
                        } else {
                            $value = str_replace($search, $replace, $value);
                        } if ($i < count($row)) {
                            $value = $value . $separator;
                        } $string .= $value;
                        $i++;
                    } $string = $string . "\r\n";
                    file_put_contents($result_file, $string, FILE_APPEND);
                } $rows = $this->get_file_data($result_file, $start, $limit, $separator);
            } $output->data = array("total" => $total_count, "results" => $rows);
        } else {
            $output->data = array("total" => 0, "results" => "");
        } print json_encode($output->data);
    }

    private function get_file_data($file, $start, $limit, $separator) {
        $data = Utils::readFile($file, $start, $limit);
        $search = array("\x00", "\x0a", "\x0d", "\x1a");
        $replace = array('\0', '\n', '\r', '\Z');
        $rows = array();
        foreach ($data as $key => $value) {
            $value = trim($value);
            $row = explode($separator, $value);
            for ($i = 0; $i < count($row); $i++) {
                $row[$i] = str_replace($search, $replace, trim($row[$i]));
            } $rows[] = $row;
        } return $rows;
    }

    private function prepare_backup_tables($rows, $database) {
        $data = array();
        if (!$rows)
            return $data; foreach ($rows as $key => $valueObj) {
            $value = "Tables_in_" . $database;
            $data[$key] = $valueObj->$value;
        } return $data;
    }

    private function prepare_data($rows) {
        $fields = array();
        $models = array();
        $data = array();
        if (!$rows)
            return array($fields, $models, $data); foreach ($rows[0] as $name => $value) {
            $fields[] = $name;
            $c = new stdClass;
            $c->id = $name;
            $c->header = $name;
            $c->sortable = true;
            $c->dataIndex = $name;
            $c->width = strlen($name) * 8 + 8;
            $models[] = $c;
        } foreach ($rows as $row) {
            $arr = (array) $row;
            $data[] = array_values($arr);
            $i = 0;
            foreach ($arr as $key => $value) {
                if (strlen((string) $value) * 8 > $models[$i]->width) {
                    $models[$i]->width = strlen((string) $value) * 8;
                } $i++;
            }
        } return array($fields, $models, $data);
    }

    public function trg_gnoyr_pbyhzaf($params) {
        $table = $params['table'];
        if (!$table) {
            $output->success = false;
            $output->msg = "Table name not passed!";
            return $output;
        } $output = new stdClass();
        $output->success = true;
        $output->columns = $this->driver->getTableColumns($table);
        return $output;
    }

    public function trg_zva_gnoyr_pbyhzaf($params) {
        $output = new stdClass();
        $output->success = true;
        $rows = $this->driver->getTableColumns($params['table']);
        $columns = array();
        for ($i = 0; $i < count($rows); $i++) {
            $columnData = new stdClass();
            $columnData->Name = $rows[$i]->name;
            $columnData->Type = $rows[$i]->type;
            $columnData->Length = $rows[$i]->max_length >= 0 ? $rows[$i]->max_length : '';
            $columnData->included = false;
            $columns[] = $columnData;
        } list($output->fields, $output->models, $output->data) = $this->prepare_data($columns);
        return $output;
    }

    public function trg_rkcbeg_gnoyr_pbyhzaf($params) {
        $database = $params['current_db'];
        $table = $params['current_table'];
        $output = new stdClass();
        $table = $database ? ($database . "." . $table) : $table;
        $table_columns = $this->driver->getTableFullFields($table);
        foreach ($table_columns as $field) {
            $output->data[] = array($field->Field, $field->Field);
        } return $output;
    }

    public function hcqngr_gnoyr_qngn($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $sql = $params['sql'];
        $data = $params['data'];
        $insert_or_update = $params['insert_or_update'];
        $tableKeys = $params['tableKeys'];
        $keyValues = $params['keyValues'];
        $table = $params['table'];
        $output = new stdClass();
        $output->success = true;
        if ($insert_or_update) {
            $this->driver->prepareAndExecuteSQL($sql, $data);
            $dbh = DB::getConnection();
            $autoIncrId = $dbh->lastInsertId($table);
            $output->inserted = true;
            $output->msg = "Row added successfully";
            if ($autoIncrId) {
                $output->autoIncrValue = $autoIncrId;
            }
        } else {
            $count_sql = "SELECT COUNT(*) FROM $table ";
            $count_sql .= " WHERE ";
            $tableKeys = json_decode($tableKeys);
            $keyValues = json_decode($keyValues);
            $conditional_key_values = array();
            foreach ($tableKeys as $key => $val) {
                $conditional_key_values[] = ($keyValues[$key] == 'null' || $keyValues[$key] == '(NULL)') ? "$val is null" : "$val = " . Utils::insertQuotes($keyValues[$key]);
            } $conditional_key_values = implode(" AND ", $conditional_key_values);
            $count_sql = $count_sql . $conditional_key_values;
            $num_record = $this->driver->getAffectedRowCount($count_sql);
            $output->updated = true;
            $output->msg = "Row updated successfully";
            if ($num_record > 1) {
                $output->msg = "Update could not be done! As this operation will update multiple records";
                $output->success = false;
                return $output;
            } $this->driver->prepareAndExecuteSQL($sql, $data);
        } return $output;
    }

    public function qryrgr_gnoyr_ebj($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $table = $params['table'];
        $database = $params['database'];
        $queries = $params['queries'];
        $output = new stdClass();
        $output->success = true;
        foreach ($queries as $query) {
            $num_record = $this->driver->getAffectedRowCount($query->selectsql);
            if (!$num_record) {
                
            } elseif ($num_record > 1) {
                $output->msg = "Some of the rows could not be deleted!<br />" . "As this operation will delete multiple records<br /><br />" . $query->deletesql;
                $output->success = false;
                return $output;
            } else {
                $this->driver->prepareAndExecuteSQL($query->deletesql);
            }
        } return $output;
    }

    public function gehapngr_qngnonfr($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $database = $params['database'];
        $connection_name = $params['connection_id'];
        $output = $this->driver->truncateDatabase($database);
        if (!$output->success) {
            $customMsg = "Database ('$database') could not be truncated! <br /><br />";
            $output->msg = $customMsg . $output->msg;
        } return $output;
    }

    public function rzcgl_qngnonfr($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $database = $params['database'];
        $connection_name = $params['connection_id'];
        $output = $this->driver->emptyDatabase($database);
        if (!$output->success) {
            $customMsg = "Database ('$database') could not be made empty! <br /><br />";
            $output->msg = $customMsg . $output->msg;
        } return $output;
    }

    public function trg_gnoyr_perngvba_vasb($params) {
        $database = $params['database'];
        $table = $params['table'];
        $parent_db = isset($params['parent_database']) ? $params['parent_database'] : "";
        $mysql_datatypes = array('bigint', 'binary', 'bit', 'blob', 'bool', 'boolean', 'char', 'date', 'datetime', 'decimal', 'double', 'enum', 'float', 'int', 'longblob', 'longtext', 'mediumblob', 'mediumint', 'mediumtext', 'numeric', 'real', 'set', 'smallint', 'text', 'time', 'timestamp', 'tinybolb', 'tinyint', 'tinytext', 'varbinary', 'varchar', 'year');
        $datatypes = array();
        foreach ($mysql_datatypes as $key => $type) {
            $datatype = array();
            $datatype[] = $type;
            $datatypes[$key] = $datatype;
        } $cols = array('field_name', 'datatype', 'length', 'default_value', 'primary_key', 'not_null', 'unsigned', 'auto_incr', 'zerofill', 'collation', 'comment');
        $rows = array();
        if ($table) {
            $fields = $this->driver->getTableFullFields($table);
            $rows = $this->trg_gnoyr_svryq_qrsvavgvba_inyhrf($fields);
            $table_column_names = $this->driver->getTableColumnNames($table);
            $table_keys = $this->driver->getTableKeys($table);
            $key_names = array();
            $primary_key_columns = array();
            if (!empty($table_keys)) {
                foreach ($table_keys as $key) {
                    $key_names[] = strtolower($key->Key_name);
                    if (strcasecmp($key->Key_name, 'PRIMARY') == 0) {
                        $primary_key_columns[] = $key->Column_name;
                    }
                }
            }
        } else {
            for ($i = 0; $i < 10; $i++) {
                $row = array();
                for ($j = 0; $j < 11; $j++) {
                    $row[$j] = "";
                } $rows[$i] = $row;
            }
        } $output = $this->get_charset_collation('');
        array_unshift($output->collations, array('[default]'));
        $output->column_names = $cols;
        $output->rows = $rows;
        $output->datatypes = $datatypes;
        $output->database = $parent_db ? $parent_db : $database;
        if ($table) {
            $output->table = $table;
            $output->table_columns = $table_column_names;
            $output->key_names = $key_names;
            $output->primary_key_columns = $primary_key_columns;
        } return $output;
    }

    public function perngr_gnoyr($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $table = $params['tablename'];
        $database = $params['database'];
        $table_ddl = $params['table_ddl'];
        $output = new stdClass();
        $output->success = true;
        if (!$table || !$database) {
            $output->success = false;
            $output->msg = "Database and/or table name not passed!";
            return $output;
        } if ($table_ddl) {
            $ret = $this->driver->prepareAndExecuteSQL($table_ddl);
            if ($ret != '-1') {
                $output->msg = "Table created successfully";
            }
        } return $output;
    }

    public function trg_uvfgbel() {
        $user_name = (Session::$user_id) ? Session::$user->user_name : session_id();
        $user_file = HISTORY_ROOT . "/$user_name";
        $output = new stdClass();
        $output->success = true;
        $columns = array("date & time", "time taken", "query", "database", "status", "run query");
        foreach ($columns as $column) {
            $c = new stdClass();
            $c->header = ucfirst($column);
            $c->id = str_replace(" ", "_", $column);
            if (($column == "date & time") || ($column == "database")) {
                $c->width = 120;
            } elseif (($column == "time taken") || ($column == "run query")) {
                $c->width = 75;
            } elseif ($column == "query") {
                $c->width = 400;
            } elseif ($column == "status") {
                $c->width = 200;
            } $c->sortable = true;
            $c->dataIndex = $column;
            $output->columns[] = $c;
            $output->cols[] = $column;
        } if (is_file($user_file)) {
            $history_file_handle = @file($user_file);
            $file_read_reverse = array_reverse($history_file_handle);
            $limit = READ_LIMIT;
            $replace = array("\x00", "\x0a", "\x0d", "\x1a");
            $search = array('\0', '\n', '\r', '\Z');
            for ($i = 0; $i <= $limit; $i++) {
                $rows = array();
                $data = trim($file_read_reverse[$i]);
                if ($data) {
                    $user_sql_datas = explode("|", $data);
                    foreach ($user_sql_datas as $sql_data) {
                        $sql_data = str_replace($search, $replace, trim($sql_data));
                        $rows[] = $sql_data;
                    } $output->rows[] = $rows;
                }
            }
        } return $output;
    }

    public function trg_gnoyr_pbyhzaf_vasb($params) {
        $connection = $params['connection_id'];
        $database = $params['database'];
        $table = $params['table'];
        $output = new stdClass();
        $output->table = $table;
        $output->success = true;
        $grid_columns = array('column', 'datatype');
        foreach ($grid_columns as $column) {
            $c = new stdClass();
            $c->header = ucfirst($column);
            $c->id = $column;
            $c->sortable = false;
            $c->dataIndex = $column;
            $c->width = ($column == 'column') ? 170 : 100;
            $output->columns[] = $c;
            $output->cols[] = $column;
        } $pattern = "/^(bigint|mediumint|smallint|tinyint|int|varbinary|binary|bit
		               |longblob|mediumblob|tinybolb|blob|boolean|bool|varchar|char
		               |datetime|date|decimal|double|enum|float|numeric|real|set
		               |timestamp|time|longtext|mediumtext|tinytext|text|year)(.*)/i";
        $table_columns = $this->driver->getTableFullFields($database . '.' . $table);
        foreach ($table_columns as $column) {
            $field = $column->Field;
            $type = $column->Type;
            if (preg_match($pattern, $type, $matches)) {
                $type = $matches[1] ? $matches[1] : $type;
            } $row = array($field, $type);
            $output->rows[] = $row;
        } return $output;
    }

    public function erbeqre_gnoyr_pbyhzaf($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $database = $params['database'];
        $table = $params['tablename'];
        $reordered_columns = json_decode($params['reorderedColumns']);
        $output = new stdClass();
        $output->success = true;
        $field_definitions = $this->driver->getTableFullFields($database . '.' . $table);
        $reorder_columns_sql = $this->perngr_erbeqre_pbyhzaf_fdy($database . '.' . $table, $reordered_columns, $field_definitions);
        if ($reorder_columns_sql) {
            $ret = $this->driver->prepareAndExecuteSQL($reorder_columns_sql);
            if ($ret != '-1') {
                $output->msg = "Columns reordered successfully";
            }
        } return $output;
    }

    public function perngr_erbeqre_pbyhzaf_fdy($table, $reordered_columns, $fields) {
        $table_fields = array();
        foreach ($fields as $field) {
            $table_fields[$field->Field] = $field;
        } $field_definitions = array();
        foreach ($reordered_columns as $key => $column) {
            $field = $table_fields[$column->column];
            $definition = " MODIFY ";
            if ($field->Field) {
                $definition .= " $field->Field ";
            } if ($field->Type) {
                $definition .= "  $field->Type  ";
            } if ($field->Null == "NO") {
                $definition .= " NOT NULL ";
            } elseif ($field->Null == "YES") {
                $definition .= " NULL ";
            } if ($field->Collation) {
                $definition .= " COLLATE $field->Collation ";
            } if ($field->Default) {
                $datatype = array_shift(explode("(", $field->Type));
                if (preg_match_all("/[\s]/", $field->Default, $matches) || strtolower($datatype) == "enum") {
                    $field->Default = "'" . $field->Default . "'";
                } $definition .= " DEFAULT $field->Default ";
            } if ($field->Extra == "auto_increment") {
                $definition .= " AUTO_INCREMENT ";
            } if ($field->Comment) {
                $definition .= " COMMENT '$field->Comment' ";
            } if ($key < 1) {
                $definition .= " FIRST ";
            } else {
                $definition .= " AFTER " . $reordered_columns[$key - 1]->column;
            } $field_definitions[] = $definition;
        } $field_definition_str = implode(", ", $field_definitions);
        $sql = "ALTER TABLE $table $field_definition_str";
        return $sql;
    }

    public function trg_qhcyvpngr_gnoyr_vasb($params) {
        $connection = $params['connection_id'];
        $database = $params['database'];
        $table = $params['table'];
        $output = new stdClass();
        $output->success = true;
        $output->database = $database;
        $output->table = $table;
        $columns = $this->driver->getTableColumnNames($params['table']);
        $rows = array();
        foreach ($columns as $column) {
            $rows[] = array("Field" => $column);
        } list($output->fields, $output->models, $output->data) = $this->prepare_data($rows);
        return $output;
    }

    public function perngr_qhcyvpngr_gnoyr($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $options = json_decode($params['options']);
        $fields = json_decode($params['fields']);
        $source_db = $params['source_db'];
        $source_table = $params['source_table'];
        $output = new stdClass();
        $output->success = true;
        if (!$source_db || !$source_table) {
            $output->success = false;
            $output->msg = "Source database and/or table name not passed!";
            return $output;
        } elseif (!$options->new_table) {
            $output->success = false;
            $output->msg = "New table name not passed!";
            return $output;
        } elseif (empty($fields)) {
            $output->success = false;
            $output->msg = "Table fields not passed!";
            return $output;
        } $source_table_fields = $this->driver->getTableFullFields($source_db . '.' . $source_table);
        $source_table_properties = $this->driver->getTableAdvancedProperties($source_db, $source_table);
        $source_table_keys = $this->driver->getTableKeys($source_db . '.' . $source_table);
        $source_field_names = array();
        foreach ($source_table_fields as $field) {
            $source_field_names[] = $field->Field;
        } $target_table_engine = $source_table_properties->Engine;
        $target_table_keys = array();
        foreach ($source_table_keys as $key) {
            if (in_array($key->Column_name, $fields)) {
                if (!$key->Non_unique && (strtolower($key->Key_name) == "primary")) {
                    $target_table_keys[] = " PRIMARY KEY( $key->Column_name) ";
                } elseif (!$key->Non_unique && (strtolower($key->Key_name) != "primary")) {
                    $target_table_keys[] = " UNIQUE $key->Key_name ( $key->Column_name ) ";
                } elseif ($key->Non_unique) {
                    $target_table_keys[] = " KEY $key->Key_name ( $key->Column_name ) ";
                }
            }
        } $target_table_keys_str = " ( " . implode(", ", $target_table_keys) . " ) ";
        $target_table_fields = array_intersect($fields, $source_field_names);
        foreach ($target_table_fields as $key => $val) {
            $target_table_fields[$key] = "`" . $val . "`";
        } $copy_table_sql = "CREATE TABLE $source_db.$options->new_table ";
        if (!empty($target_table_keys) && $options->with_indexes) {
            $copy_table_sql .= $target_table_keys_str;
        } if ($target_table_engine && $options->with_indexes) {
            $copy_table_sql .= " TYPE=$target_table_engine ";
        } if ($target_table_engine && !$options->with_indexes) {
            $copy_table_sql .= " Engine=$target_table_engine ";
        } if (!empty($target_table_fields)) {
            $copy_table_sql .= " SELECT " . implode(", ", $target_table_fields) . " FROM $source_db.$source_table ";
        } if ($options->structure[0]) {
            $copy_table_sql .= " WHERE 1 = 0 ";
        } if ($copy_table_sql) {
            $ret = $this->driver->prepareAndExecuteSQL($copy_table_sql);
            if ($ret != '-1') {
                $output->source_db = $source_db;
                $output->source_table = $source_table;
                $output->new_table = $options->new_table;
                $output->msg = "Table duplicated successfully";
            }
        } return $output;
    }

    public function trg_gnoyr_svryq_qrsvavgvba_inyhrf($fields) {
        $rows = array();
        foreach ($fields as $field) {
            $field_name = $field->Field;
            $datatype = array_shift(explode("(", $field->Type));
            preg_match("/\(([^\)]+)\)?/", $field->Type, $matches);
            $length = isset($matches[1]) ? $matches[1] : "";
            $default = $field->Default;
            $primary_key = (strtolower($field->Key) == "pri") ? true : false;
            $not_null = (strtolower($field->Null) == "no") ? true : false;
            $unsigned = preg_match("/unsigned/i", $field->Type) ? true : false;
            $auto_incr = ($field->Extra == "auto_increment") ? true : false;
            $zerofill = preg_match("/zerofill/i", $field->Type) ? true : false;
            $collation = $field->Collation;
            $comment = $field->Comment;
            $rows[] = array($field_name, $datatype, $length, $default, $primary_key, $not_null, $unsigned, $auto_incr, $zerofill, $collation, $comment);
        } return $rows;
    }

    public function nygre_gnoyr($params) {
        $parent_database = $params['database'];
        $target_table = $params['target_table'];
        $alter_table_ddl = $params['alter_sql'];
        $output = new stdClass();
        $output->success = true;
        if (!$parent_database || !$target_table) {
            $output->success = false;
            $output->msg = "Source database and/or table name not passed!";
            return $output;
        } $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } if ($alter_table_ddl) {
            $ret = $this->driver->prepareAndExecuteSQL($alter_table_ddl);
            if ($ret != '-1') {
                $output->database = $parent_database;
                $output->table = $target_table;
                $output->msg = "Table altered successfully";
            }
        } return $output;
    }

    public function trg_qognoyrf_pbyhzaf($params) {
        $database = $params['database'];
        $output = new stdClass();
        $output->success = true;
        if (!$database) {
            $output->success = false;
            return $output;
        } else {
            $output->columns = $this->driver->getDbTablesAndColumns($database);
            $output->tables = array_keys($output->columns);
        } return $output;
    }

    public function nygre_gnoyr_vaqrkrf($params) {
        $parent_database = $params['database'];
        $target_table = $params['target_table'];
        $alter_index_sql = $params['alter_sql'];
        $output = new stdClass();
        $output->success = true;
        if (!$parent_database || !$target_table) {
            $output->success = false;
            $output->msg = "Source database and/or table name not passed!";
            return $output;
        } $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } if ($alter_index_sql) {
            $ret = $this->driver->prepareAndExecuteSQL($alter_index_sql);
            if ($ret != '-1') {
                $output->database = $parent_database;
                $output->table = $target_table;
                $output->msg = "Index(s) applied successfully";
            }
        } return $output;
    }

    public function qryrgr_erfhyg_svyrf($params) {
        $is_demo_version = Utils::checkForDemoVersion();
        if ($is_demo_version) {
            throw new Exception("This feature is not available in demo version. <br /> Please <a href='http://dblite.com/download' target='_blank'>download</a> the full version or <a href='http://user.dblite.com' target='_blank'>register</a> with us.");
            return;
        } $file = isset($params['file']) ? $params['file'] : "";
        $output = new stdClass;
        $output->success = true;
        $user = Session::$user;
        $session_id = session_id();
        $parent_folder = ($user->user_id) ? $user->user_name : $session_id;
        if ($file) {
            $directory = APPROOT . '/data/resultfiles/' . $parent_folder . '/' . $file;
        } else {
            $directory = APPROOT . '/data/resultfiles/' . $parent_folder;
        } $ret = Utils::recursiveDelete($directory);
        if (!$ret) {
            $output->success = false;
        } return $output;
    }

} ?>
