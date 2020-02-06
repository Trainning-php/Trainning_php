<?php 
	
		if (file_exists('controller/' . $controllerName . '.php')) {
		    include 'controller/' . $controllerName . '.php';
		} else {
		   include 'controller/home.php';
		}
		$controller = new $controllerName();
		if (method_exists($controller, $action)) {
		    $controller->$action();
		} else {
			
		}
	 ?>