<?php
	require 'config.php';
	session_destroy();
	
	header('Location: /chepulsar/index.php');
?>