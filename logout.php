<?php
	session_start();
    $_SESSION['message']=array("text"=>"Sessão Fechada. Obrigado por escolher a Bankzys","alert"=>"info");
	session_destroy();
	header('location: index.php');
?>