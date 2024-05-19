<?php

use controller\EntradaController;
use controller\EntradesController;
use controller\UsuariController;

//require "controller/EntradesController.php";

session_start();
//require 'config/MySQLConfigs.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'entrades';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : '';


switch ($controller) {
    case 'usuari':
        require 'controller/UsuariController.php';
        $controller = new UsuariController();
        break;
    case 'comment':
/*        require 'controllers/CommentController.php';
        $controller = new CommentController();*/
        break;
    case 'entrada':
        require 'controller/EntradaController.php';
        $controller = new EntradaController();
        break;
    case 'entrades':
    default:
        require 'controller/EntradesController.php';
        $controller = new EntradesController();
        break;
}

$controller->{$action}($id);


/*

$controller = 'post';
$action = 'index';

switch ($controller) {
    case 'post':
    default:
        $controller = new EntradesController();
        break;
}

$controller->$action();*/
?>
