<?php
include 'Credentials.php';
class db {
	private $host = "192.168.1.21";
	private $user;
	private $password;
	private $conn;
	function __construct() {
		$this->user = Credentials::user;
		$this->password = Credentials::password;
	}
	function setHost($host) {
		$this->host = $host;
	}
	function getHost() {
		return $this->host;
	}
	function setUser($user) {
		$this->user = $user;
	}
	function getUser() {
		return $this->user;
	}
	function setPassword($password) {
		$this->password = $password;
	}
	function getPassword() {
		return $this->password;
	}
	function setConn($conn) {
		$this->conn = $conn;
	}
	function getConn() {
		return $this->conn;
	}
	function open() {
		$conn = mysql_connect($this->getHost(), $this->getUser(), $this->getPassword());
		if(! $conn) die('connection failed' . mysql.error());
		$this->setConn($conn);
		echo "connection success \n";
	}
	function close() {
		mysql_close($this->getConn());
	}
	function select_db($dbname) {
		mysql_select_db($dbname);
	}
	function runStatement($statement) {
		$this->open();
		$this->select_db("survey");
		$runquery = mysql_query($statement, $this->getConn());
		if(! $runquery) die('something blew up while running statement: ' . mysql_error());
		echo "statement runned successfully \n";
		$this->close();
	}

	function insertSurvey($fields) {
		if(!count($fields)) die("0 fields were sent by client");
		$query = "INSERT into info (";
		$keys = array_keys($fields);
		$values = array_values($fields);
		$keyString = implode($keys, ",");
		$keyString.= ")";
		$query.=$keyString;
		$valueString = "VALUES (\"";
		$valueString.= implode($values, "\",\"");
		$valueString.= "\");";
		$query.=$valueString;
		echo $query;
		$this->runStatement($query);
	}
}

?>
