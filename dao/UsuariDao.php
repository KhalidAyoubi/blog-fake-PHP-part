<?php

namespace dao;

use model\Usuari;
use MySQLConfig;

require "config/MySQLConfig.php";
require "model/Usuari.php";
class UsuariDao
{
    private $db;
    public function __construct()
    {
        $this->db = MySQLConfig::getDBConnection();
    }

    public function register($username, $password, $email, $nom, $cognoms) {
        $stmt = $this->db->prepare("INSERT INTO usuari (username, password, email, nom, cognoms) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $password, $email, $nom, $cognoms);
        return $stmt->execute();
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT * FROM usuari WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuariDAO = $result->fetch_assoc();
        $usuari = new Usuari();
        //if ($usuariDAO && password_verify($password, $usuariDAO['password'])) {
        if ($usuariDAO) {
            $usuari->setUsername($usuariDAO['username']);
            $usuari->setEmail($usuariDAO['email']);
            $usuari->setNom($usuariDAO['nom']);
            $usuari->setCognoms($usuariDAO['cognoms']);
            return $usuari;
        }
        return false;
    }

    public function findUsuariByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM usuari WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $usuariDAO = $result->fetch_assoc();
        $usuari = new Usuari();;

        $usuari->setUsername($usuariDAO['username']);
        $usuari->setEmail($usuariDAO['email']);
        $usuari->setNom($usuariDAO['nom']);
        $usuari->setCognoms($usuariDAO['cognoms']);

        return $usuari;
    }
}