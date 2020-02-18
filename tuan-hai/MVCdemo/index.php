<?php 
	ini_set('display_errors',1);

	$controllerName = $_GET['controllerName'] ?? 'home';
	$action         = $_GET['action'] ?? 'index';
	$param          = $_GET['param'] ?? '';
	
	require_once 'config/app.php';
 ?>
