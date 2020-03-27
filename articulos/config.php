<?php

$databaseHost = 'localhost';
$databaseName = 'chepulsar';
$databaseUsername = 'root';
$databasePassword = '';

try{
	// http://php.net/manual/en/pdo.connection.php
	$dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}",$databaseUsername,$databasePassword);
	
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo $e->getMessage();
}
?>