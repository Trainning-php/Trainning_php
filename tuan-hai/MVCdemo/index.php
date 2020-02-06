<?php 
	ini_set('display_errors',1);

	$controllerName = $_GET['controllerName'] ?? 'home';
	$action = $_GET['action'] ?? 'index';

	require_once 'config/app.php';
 ?>
