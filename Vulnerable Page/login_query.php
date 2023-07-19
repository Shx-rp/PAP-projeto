<?php
	session_start();

	require_once 'conn.php';

	
	if (isset($_POST['login'])) {
		if ($_POST['username'] != "" && $_POST['password'] != "") {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `clientes` WHERE `username`= '$username' AND `password`= '$password ";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$fetch = mysqli_fetch_assoc($result);
				$_SESSION['user'] = $fetch['mem_id'];
				header("location: home.php");
				$_SESSION['message'] = array("text" => "Bem-Vindo.", "alert" => "success");
			} else {
				$_SESSION['message'] = array("text" => "Palavra-Passe Incorreta.", "alert" => "warning");
				echo ($username);
				echo '<meta http-equiv="refresh" content="0;URL=\'http://localhost/login.php\'">';
			}
		} else {
			$_SESSION['message'] = array("text" => "Por favor preencha todos os campos.", "alert" => "warning");
			header("location: login.php");
		}
	}
?>