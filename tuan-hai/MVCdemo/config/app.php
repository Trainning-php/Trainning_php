<?php 
	
		
		$controller = isset($_GET['controller'])? $_GET['controller'].'controller' : 'home' ;
		$action = isset($_GET['action'])?$_GET['action']: 'index' ;

		require_once('./controller/home.php');
		$usercontroller = new $controller();
		$usercontroller-> $action();
	 ?>