<?php

namespace service;
use dao\EntradaDao;
require "dao/EntradaDao.php";
class EntradaService
{
    private $entradaDao;
    public function __construct()
    {
        $this->entradaDao = new EntradaDao();
    }

    public function getAllEntrades(){
        return $this->entradaDao->getAllEntrades();
    }

    public function getAllEntradesPubliques(){
        return $this->entradaDao->getAllEntradesPubliques();
    }

    public function getPostById($id){
        return $this->entradaDao->getEntradaById($id);
    }

}