<?php

use controller\EntradesController;

require "controller/EntradesController.php";

session_start();
/*require 'config/MySQLConfigs.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'post';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$db = getDBConnection();

switch ($controller) {
    case 'user':
        require 'controllers/UserController.php';
        $controller = new UserController($db);
        break;
    case 'comment':
        require 'controllers/CommentController.php';
        $controller = new CommentController($db);
        break;
    case 'post':
    default:
        require 'controllers/PostController.php';
        $controller = new PostController($db);
        break;
}

$controller->$action();*/



$controller = 'post';
$action = 'index';

switch ($controller) {
    case 'post':
    default:
        $controller = new EntradesController();
        break;
}

$controller->$action();
?>
