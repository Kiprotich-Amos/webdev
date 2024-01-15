<?php
	/*
		*
		*
		* Login php file...
		*
		*
	*/
	ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

	require '../con/connectDb.php';

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";

		try {
			
			if (empty($email) || empty($password)) {
				throw new Exception("Email and password are required.");
			}else{
				$stmtUserDetails = $pdo->prepare("SELECT UserDetails.*, PasswordTable.password  FROM UserDetails JOIN PasswordTable ON UserDetails.userId = PasswordTable.userId  WHERE UserDetails.email = ?");
				$stmtUserDetails->execute([$email]);

				$userDetails = $stmtUserDetails->fetch(PDO::FETCH_ASSOC);
				// echo {$userDetails};
				if ($userDetails) {
					$storedHashPassword = $userDetails['password'];

					if (password_verify($password, $storedHashPassword)) {
						echo "Login successful!";
					} else {
						echo "Incorrect password!";
					}
				}else {
				    echo "No user details found for the specified email.";
				}

			}
		} catch (Exception $e) {
			echo "Disaster happened: " . $e->getMessage();
		}
	} else {
		echo "Form not submitted!";
	}
?>
