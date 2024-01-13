<?php
	/*
		*
		*
		*Login php file...
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

		// echo "your email is '{$email}' and your password is '{$password}'";
		try {

			$stmtUserDetails = $pdo->prepare("SELECT * FROM UserDetails WHERE email = ?");
			$stmtUserDetails->execute([$email]);

			$userDetails = $stmtUserDetails->fetch(PDO::FETCH_ASSOC);

			if ($userDetails) {
				$userId = $userDetails['userId'];

				// Verify password
				$stmtPassword = $pdo->prepare("SELECT * FROM PasswordTable WHERE userId = ?");
				$stmtPassword->execute([$userId]);

				$passwordDetails = $stmtPassword->fetch(PDO::FETCH_ASSOC);

				if ($passwordDetails && isset($passwordDetails['password'])) {
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

					if (password_verify($password, $passwordDetails['password'])) {
						echo "Login successful!";
					} else {
						echo "Incorrect password! (Hashed: $hashedPassword, Stored: {$passwordDetails['password']})";
					}
				} else {
					echo "Password not found!";
				}
			} else {
				echo "User not found!";
			}

		} catch (Exception $e) {
			echo "Disaster happened: " . $e->getMessage();
		}
	} else {
		echo "Login Process failed!!!!";
	}
?>
