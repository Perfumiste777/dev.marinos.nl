<?php

define('HOST', 'localhost');
define('USER', 'pluser');
define('PASS', 'Plus3r');
define('DBNAME', 'PLDB');

class ConnectDB {

// declare two private variables
private static $_instace;
private $conn;

// declare private constructor class
private function __construct() {
	$this->conn = mysql_connect(HOST, USER, PASS);
	mysql_select_db(DBNAME);
}

// create a singleton method
public static function getconnect() {
	if (!self::$_instace) {
		self::$_instace = new ConnectDB();
	}
	return self::$_instace;
}

// this method is used for update, delete, replace, select, and insert statement

public function mysql_execute($sql) {
	$sql = ltrim($sql);
	$return_arr = array();

	if (!empty($sql) && isset($sql)) {
                // Get the SQL first 6 characters of the SQL statement
		// UPDATE, DELETE, REPLACE, SELECT, and INSERT
		$string_sql = strtoupper(substr($sql, 0, 6));
		// for create table
		if ($string_sql == 'CREATE') {
				if (mysql_query($sql, $this->conn)) {
					return true;
				} else {
					return false;
				}
		}
		// SELECT STATEMENT 
		elseif ($string_sql == 'SELECT') {
			$statement = mysql_query($sql, $this->conn);
			while ($row = mysql_fetch_assoc($statement)) {
				$return_arr[] = $row;
			}
			if (count($return_arr) > 0) {
				return $return_arr;
			} else {
				return false;
			}

		// UPDATE, DELETE, and REPLACE STATMENT
		} elseif ($string_sql == 'UPDATE' || $string_sql == 'DELETE' || $string_sql == 'REPLACE') {
			if (mysql_query($sql, $this->conn)) {
				return mysql_affected_rows();
			} else {
				return false;
			}
 		// Expect INSERT statement
		} else {
			if (mysql_query($sql, $this->conn)) {
				return mysql_insert_id();
			} else {
				return false;
			}
		}
	} else {
		return false;
	}
}
// stop or prevent clonse this class object
private function __clonse() {

}

}

?>
