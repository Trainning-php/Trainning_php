<?php 
require_once './controller/PDOhomeController.php';
require_once('./controller/home.php');
		$controller 	= isset($_GET['controller']) ? $_GET['controller'].'controller' : 'home' ;
		$action     	= isset($_GET['action'])     ? $_GET['action'] : 'index' ;
		$usercontroller = new $controller();
		$usercontroller->$action();
	 ?>