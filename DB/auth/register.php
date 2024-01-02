<?php
	/*
	 *conect to DB and Register User
	 *
	*/
	
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
   
    require '../con/connectDb.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    	$email = isset($_POST['email']) ? $_POST['email'] : "";
    	$password = isset($_POST['password']) ? $_POST['password'] : "";
    	$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";

    	echo "$email</br>";
    	echo "$password </br>";
    	echo "$confirmPassword </br>" ;


    	if (strlen($password) < 8 || $password !== $confirmPassword) {
    		echo "Invalid password !";
    		exit();
    	}

    	$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    	try {

    		$stmtPassword = $pdo->prepare("INSERT INTO PasswordTable(PASSWORD) VALUE(?)");
    		$stmtPassword->execute([$hashedPassword]);

    		$userId  = $pdo->lastInsertId();


    		$stmtUserDetails = $pdo->prepare("INSERT INTO UserDetails(email, userId) VALUE(?, ?)");
    		$stmtUserDetails->execute([$email, $userId]);

    	} catch (PDOException $e) {

    		echo "Error: ".$e->getMessage();
    		
    	}
    }else{
    	echo "No data Received !!!!!";
    }
 
    echo "Kenya is good";
?>