<?php
	session_start();
	require_once 'conn.php';
	require_once 'config.conf';
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['username'] != "" && $_POST['password'] != ""){
			try{
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];

				$password = $_POST['password'];
				$pwd_peppered = hash_hmac("sha256", $password, $pepper);
				$pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `clientes` VALUES ('', '$firstname', '$lastname', '$username', '$pwd_hashed', 'user', '0')";
				$conn->exec($sql);
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			$_SESSION['message']=array("text"=>"User successfully created.","alert"=>"info");
			$conn = null;
			header('location:login.php');
		}
		if($_POST['firstname'] == "" || $_POST['lastname'] == "" || $_POST['username'] == "" && $_POST['password'] == ""){
			$_SESSION['message']=array("text"=>"Por favor preencha todos os campos.","alert"=>"info");
			$conn = null;
			header('location:register.php');
		}
	}
?>