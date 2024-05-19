<?php

namespace service;

use dao\ComentariDao;
require "dao/ComentariDao.php";
class ComentariService
{
    private $comentariDao;
    public function __construct()
    {
        $this->comentariDao = new ComentariDao();
    }

    public function comentarisByEntradaId($entradaId){
        return $this->comentariDao->comentarisByEntradaId($entradaId);
    }

    public function afegirComentari($entrada_id, $usuari, $descripcio){
        $this->comentariDao->afegirComentari($entrada_id, $usuari, $descripcio);
    }

    public function borrarComentari($idcomentari, $entrada_id, $usuari){
        $this->comentariDao->borrarComentari($idcomentari, $entrada_id, $usuari);
    }

    public function findComentariById($idcomentari, $entrada_id, $usuari_username){
        return $this->comentariDao->findComentariById($idcomentari, $entrada_id, $usuari_username);
    }

}