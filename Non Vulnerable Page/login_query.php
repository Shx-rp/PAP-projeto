<?php
session_start();

require_once 'conn.php';
require_once 'config.conf';


function get_pwd_from_db($username) {
    global $conn;
    $sql = "SELECT `password` FROM `clientes` WHERE `username` = ?";
    $query = $conn->prepare($sql);
    $query->execute([$username]);
    $row = $query->fetch();
    return $row['password'];
}

if (isset($_POST['login'])) {
    if (trim($_POST['username']) != "" && trim($_POST['password']) != "") {
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = get_pwd_from_db($username);
        if (password_verify($pwd_peppered, $pwd_hashed)) {
            $sql = "SELECT * FROM `clientes` WHERE `username` = :username AND `password` = :password ";
            $query = $conn->prepare($sql);
            $query->bindValue(':username',$username,PDO::PARAM_STR);
            $query->bindValue(':password',$pwd_hashed,PDO::PARAM_STR);
            $query->execute();
            $row = $query->rowCount();
            $fetch = $query->fetch();
            if ($row > 0) {
                $_SESSION['user'] = $fetch['mem_id'];
                header("location: home.php");
                $_SESSION['message'] = array("text" => "Bem Vindo.", "alert" => "success");
            }
        } else {
			$_SESSION['message'] = array("text" => "Senha Incorreta.", "alert" => "warning");
			echo "<script>window.location = 'login.php'</script>";
        }
    } else {
        $_SESSION['message'] = array("text" => "Por favor preencha todos os campos.", "alert" => "warning");
        echo "<script>window.location = 'login.php'</script>";
    }
}
?>