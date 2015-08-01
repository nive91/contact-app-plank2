<?php

session_start();

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);


class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "contacts";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysql_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysql_select_db($this->database,$conn);
	}
	
	function runQuery($query) {
		$result = mysql_query($query);
		while($row=mysql_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;	
	}
}
?>





<html>
	<head>
	<title>Online Contacts App</title>
	<link href="style.css" type="text/css" rel="stylesheet" />

	<script src="jquery-1.11.1.min.js" type="text/javascript"></script>
	</head>
	<body>
		<center>
		<a href="index.php"><h1>Online Contacts App</h1></a>

		</center>
	</body>
	
</html>	
