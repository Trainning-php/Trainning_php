<?php 
require_once './controller/PDOhomeController.php';
require_once './controller/IndexController.php';
require_once('./controller/home.php');

    $controller 	  = isset($_GET['Controller']) ? $_GET['Controller'].'Controller' : 'homeController';
    $action     	  = isset($_GET['action'])     ? $_GET['action'] : 'index' ;
    $usercontroller = new $controller();
    $usercontroller->$action();
    
?>