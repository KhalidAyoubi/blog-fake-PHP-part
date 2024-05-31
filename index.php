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
?>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 30px 10px 0;
        background-color: #f4f4f4;

        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>