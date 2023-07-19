<?php
	$db_username = 'webadmin';
	$db_password = 'K,96yZn33!"d.S';
	$options = [
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$conn = new PDO( 'mysql:host=localhost;dbname=pagina_login', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>