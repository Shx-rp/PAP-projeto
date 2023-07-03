<?php
	session_start();
	require_once 'conn.php';
 
	if(ISSET($_POST['register'])){
		if($_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['username'] != "" && $_POST['password'] != ""){
			try{
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$username = $_POST['username'];

				$password = $_POST['password'];
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO `clientes` VALUES ('', '$firstname', '$lastname', '$username', MD5('$password'), 'user', '0')";
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