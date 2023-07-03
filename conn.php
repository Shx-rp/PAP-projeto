<?php
	$db_username = 'root';
	$db_password = '';
	$options = [
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$conn = new PDO( 'mysql:host=localhost;dbname=pagina_login', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>