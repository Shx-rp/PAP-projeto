<?php
	session_start();
	require_once 'conn.php';
 
	if (isset($_POST['register'])) {
		if ($_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['username'] != "" && $_POST['password'] != "") {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$username = $_POST['username'];
			$password = $_POST['password'];

			$sql = "INSERT INTO `clientes` VALUES ('', '$firstname', '$lastname', '$username', '$password', 'user', '0')";
			if (mysqli_query($conn, $sql)) {
				$_SESSION['message'] = array("text" => "Utilizador Criado.", "alert" => "success");
				mysqli_close($conn);
				header('location: login.php');
				exit();
			}
		} else {
			$_SESSION['message'] = array("text" => "Por favor preencha todos os campos.", "alert" => "warning");
			mysqli_close($conn);
			header('location: register.php');
			exit();
		}
	}
?>