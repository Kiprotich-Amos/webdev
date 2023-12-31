<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require 'con/connectDb.php';
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $fname = isset($_POST['fname']) ? $_POST['fname'] : "";
        $sname = isset($_POST['sname']) ? $_POST['sname'] : "";
        $lname = isset($_POST['lname']) ? $_POST['lname'] : "";
        $idNumber = isset($_POST['idNumber']) ? $_POST['idNumber'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $phoneNumber = isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : "";
        $county = isset($_POST['county']) ? $_POST['county'] : "";
        $consituency = isset($_POST['consituency']) ? $_POST['consituency'] : "";
        $countyWard = isset($_POST['countyWard']) ? $_POST['countyWard'] : "";
        $addressNumber = isset($_POST['addressNumber']) ? $_POST['addressNumber'] : "";
        try {
        	$dbConnection = new DbConnection("localhost", "testroot", "root", "");
        		if($dbConnection->getConnection() !=  null){
		        	if($dbConnection -> isConnected()){
		        		$stmt = $dbConnection->con->prepare("INSERT INTO `UserDetails`(`firstName`, `secondName`, `lastname`, `idNumber`, `email`, `phoneNumber`, `county`, `consituency`, `countyWard`, `addressNumber`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		        		$stmt->execute([$fname, $sname, $lname, $idNumber, $email, $phoneNumber, $county, $consituency, $countyWard, $addressNumber]);

		        		$sql = "INSERT INTO `UserDetails`(`firstName`, `secondName`, `lastname`, `idNumber`, `email`, `phoneNumber`, `county`, `consituency`, `countyWard`, `addressNumber`) VALUES ('$fname', '$sname', '$lname', '$idNumber', '$email', '$phoneNumber', '$county', '$consituency', '$countyWard', '$addressNumber')";

		        		if($dbConnection-> getConnection()->exec($sql) === TRUE){
		        			echo" Record inserted successfully ";
		        		}else{
		        			echo "Erro inserting Record: ".$dbConnection->getConnection->error;
		        		}
		        	}
		        }else{
        			echo "Connection failed!!";
        		}
        	
        } catch (Exception $e) {

        	echo $e;        	
        }       

    } else {
    	
        echo "No data received";
    }
?>