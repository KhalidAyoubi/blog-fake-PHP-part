<?php

namespace controller;

use service\UsuariService;
require "service/UsuariService.php";

class UsuariController
{
    private $usuariService;
    public function __construct()
    {
        $this->usuariService = new UsuariService();
    }

    public function login(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->usuariService->login($username, $password);
            if ($user) {
                $_SESSION['usuari'] = $username;
                header("Location: index.php");
            } else {
                echo "Credenciales incorrectas";
            }
        } else {
            include 'view/usuari/login.php';
        }
    }

    public function register(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $nom = $_POST['nom'];
            $cognoms = $_POST['cognoms'];
            if ($this->usuariService->register($username, $password, $email, $nom, $cognoms)) {
                header("Location: index.php?controller=usuari&action=login");
            } else {
                echo "No se ha podido proceder con el registro. Verifique todos los datos antes de intentralo otra vez.";
            }
        } else {
            include 'view/usuari/register.php';
        }
    }

    public function logout(){
        //session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
}