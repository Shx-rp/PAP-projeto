<?php
	$db_username = 'webadmin';
	$db_password = '1234';
	$options = [
		PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$conn = new PDO( 'mysql:host=localhost;dbname=pagina_login', $db_username, $db_password );
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>