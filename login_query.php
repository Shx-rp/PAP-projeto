<?php
	session_start();
 
	require_once 'conn.php';
 
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			$sql = "SELECT * FROM `clientes` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['mem_id'];
				header("location: home.php");
				$_SESSION['message']=array("text"=>"Logged In.","alert"=>"success");
			} else{
				$_SESSION['message']=array("text"=>"Incorrect Password.","alert"=>"warning");
			echo "<script>window.location = 'login.php'</script>";
			}
		}else{
			$_SESSION['message']=array("text"=>"Insuficient Parameters.","alert"=>"warning");
			echo "<script>window.location = 'login.php'</script>";
		}
	}
?>