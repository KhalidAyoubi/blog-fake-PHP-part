<?php

namespace service;

use dao\UsuariDao;
require "dao/UsuariDao.php";
class UsuariService
{
    private $usuariDao;
    public function __construct()
    {
        $this->usuariDao = new UsuariDao();
    }

    public function register($username, $password, $email, $nom, $cognoms) {
        return $this->usuariDao->register($username, $password, $email, $nom, $cognoms);
    }

    public function login($username, $password) {
        return $this->usuariDao->login($username, $password);
    }

    public function findUsuariByUsername($username){
        return $this->usuariDao->findUsuariByUsername($username);
    }
}