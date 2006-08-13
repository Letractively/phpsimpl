<?php  function fnc_db_connect($server = DB_HOST, $username = DB_USER, $password = DB_PASS, $database = DB_DEFAULT, $link = 'db_link') {    global $$link;    $$link = @mysql_connect($server, $username, $password);    if ($$link) 		mysql_select_db($database);	else		return false;    return $$link;  }  function fnc_db_close($link = 'db_link') {    global $$link;     return @mysql_close($$link);  }    function fnc_db_change($database, $link = 'db_link') {    global $$link;      if ($$link) 		@mysql_select_db($database);	else		return false;			return true;  }  function fnc_db_error($query, $errno, $error) {   	die('<div class="db-error"><h1>' . $errno . ' - ' . $error . '</h1><p>' . $query . '</p></div>');  }  function fnc_db_query($query, $db = '', $link = 'db_link') {    global $$link;	if ($db != '') { fnc_db_change($db); }    $result = mysql_query($query, $$link) or fnc_db_error($query, mysql_errno(), mysql_error());	if ($db != '') { fnc_db_change(DB_DEFAULT); }    return $result;  }  function fnc_db_perform($table, $data, $action = 'insert', $parameters = '', $db = '', $link = 'db_link') {    reset($data);    if ($action == 'insert') {      $query = 'insert into `' . $table . '` (';      while (list($columns, ) = each($data)) {        $query .= '`' . $columns . '`, ';      }      $query = substr($query, 0, -2) . ') values (';      reset($data);      while (list(, $value) = each($data)) {        switch ((string)$value) {          case 'now()':            $query .= 'now(), ';            break;          case 'null':            $query .= 'null, ';            break;          default:            $query .= '\'' . fnc_db_input($value) . '\', ';            break;        }      }      $query = substr($query, 0, -2) . ')';    } elseif ($action == 'update') {      $query = 'update `' . $table . '` set ';      while (list($columns, $value) = each($data)) {        switch ((string)$value) {          case 'now()':            $query .= '`' . $columns . '` = now(), ';            break;          case 'null':            $query .= '`' . $columns .= '` = null, ';            break;          default:            $query .= '`' . $columns . '` = \'' . fnc_db_input($value) . '\', ';            break;        }      }      $query = substr($query, 0, -2) . ' where ' . $parameters;    }    return fnc_db_query($query, $db, $link);  }  function fnc_db_fetch_array($db_query) {    return mysql_fetch_array($db_query, MYSQL_ASSOC);  }  function fnc_db_result($result, $row, $field = '') {    return mysql_result($result, $row, $field);  }  function fnc_db_num_rows($db_query) {    return mysql_num_rows($db_query);  }  function fnc_db_data_seek($db_query, $row_number) {    return mysql_data_seek($db_query, $row_number);  }  function fnc_db_insert_id() {    return mysql_insert_id();  }  function fnc_db_free_result($db_query) {    return mysql_free_result($db_query);  }  function fnc_db_fetch_fields($db_query) {    return mysql_fetch_field($db_query);  }  function fnc_db_output($string) {    return htmlspecialchars($string);  }  function fnc_db_input($string) {	if (!is_numeric($string))		return mysql_real_escape_string($string);	else		return addslashes($string);  }  function fnc_db_prepare_input($string) {    if (is_string($string)) {      return trim(stripslashes($string));    } elseif (is_array($string)) {      reset($string);      while (list($key, $value) = each($string)) {        $string[$key] = fnc_db_prepare_input($value);      }      return $string;    } else {      return $string;    }  }?>