<?php

namespace controller;

use service\EntradaService;
require "service/EntradaService.php";

class EntradaController
{
    private $entradaService;
    public function __construct()
    {
        $this->entradaService = new EntradaService();
    }

    public function getEntradaById($id){
        if(isset($_SESSION['usuari'])){
            $entrada = $this->entradaService->getEntradaById($id, false);
        } else {
            $entrada = $this->entradaService->getEntradaById($id, true);
        }

        include 'view/entrades/entrada.php';
    }
}