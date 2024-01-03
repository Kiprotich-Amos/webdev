<?php
	/*
	 * Connect to DB and Register User
	 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require '../con/connectDb.php';

	$response = []; // Initialize response array`

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = isset($_POST['email']) ? $_POST['email'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
		$confirmPassword = isset($_POST['confirmPassword']) ? $_POST['confirmPassword'] : "";

		if (strlen($password) < 8 || $password !== $confirmPassword) {
			$response['status'] = 'error';
			$response['message'] = 'Invalid password!';
		} else {
			$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

			try {
				$stmtPassword = $pdo->prepare("INSERT INTO PasswordTable(PASSWORD) VALUE(?)");
				$stmtPassword->execute([$hashedPassword]);

				$userId  = $pdo->lastInsertId();

				$stmtUserDetails = $pdo->prepare("INSERT INTO UserDetails(email, userId) VALUE(?, ?)");
				$stmtUserDetails->execute([$email, $userId]);

				$response['status'] = 'success';
				$response['message'] = 'Registration successful. You can now log in.';
			} catch (PDOException $e) {
				$response['status'] = 'error';
				$response['message'] = 'Error: ' . $e->getMessage();
			}
		}
	} else {
		$response['status'] = 'error';
		$response['message'] = 'No data received!';
	}

	echo json_encode($response);
?>
