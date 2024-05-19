<?php

namespace model;

class Usuari
{
    private $username;
    private $email;
    private $nom;
    private $cognoms;

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getCognoms()
    {
        return $this->cognoms;
    }

    public function setCognoms($cognoms)
    {
        $this->cognoms = $cognoms;
    }



}