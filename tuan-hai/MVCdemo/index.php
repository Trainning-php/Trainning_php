<?php 
   	session_start();
	ini_set('display_errors',1);
	ini_set('log_erorrs',1);
	ini_set('error_log',dirname(__FILE__) . '/error.log');
	ini_set('error_log',dirname(__FILE__) . '/log/' . date('Y-m-d') . '-debug.log' );
	$controllerName = $_GET['ControllerName'] ?? 'home';
	$action         = $_GET['action'] ?? 'index';
	$param          = $_GET['param'] ?? '';
    require_once 'config/app.php';

 ?>
