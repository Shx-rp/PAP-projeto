<?php
	$db_server = 'localhost';
	$db_username = 'root';
	$db_password = '123';
	$db_name = 'pagina_login';

	$conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>