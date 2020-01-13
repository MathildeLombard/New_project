<?php

session_start();
include 'View/View.php';
include 'Model/Model.php';
include 'Controller/Controller.php';

include 'Controller/CategoryController.php';
include 'Controller/NewController.php';
include 'Controller/UserController.php';
include 'Controller/SecurityController.php';

if (isset($_GET['controller'])) {
    $controllerStart = ucfirst($_GET['controller']) . "Controller";
} else{
    $controllerStart = 'NewController';
}

if (!isset($_SESSION['user']) && 
($controllerStart == 'CategoryController' || $controllerStart == 'UserController'|| $controllerStart == 'NewController')){
    $controllerStart = 'NewController';
    $_GET['action'] = "start";
}
if (!isset($_SESSION['user']) && 
($_GET['action'] != "start" && $_GET['action'] != "formLogin" && $_GET['action'] != 'login')){
    $controllerStart = 'NewController';
    $_GET['action'] = "start";
}
/**
 *Instanciation controller et appel de la methode start()
 */
$controller = new $controllerStart();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else{
    $action = 'start';
}
//var_dump($action);
$controller->$action();