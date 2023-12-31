<?php
	/**
	 * creating database class
	 */
	class DbConnection{
		public $serverName;
		public $dbName;
		public $userName;
		public $password;

		function __construct($serverName, $dbName, $userName, $password){
			try {
				$con = new PDO("mysql:host = $serverName; dbName = $dbName", $userName, $password);
				$con ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				echo"done sucessfully";
			} catch (Exception $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}
	}

	$dbConnection = new DbConnection("localhost", "testroot", "root", "");

?>