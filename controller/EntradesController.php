<?php

namespace controller;

use service\EntradaService;
require "service/EntradaService.php";

class EntradesController
{
    private $entradaService;
    public function __construct()
    {
        $this->entradaService = new EntradaService();
    }

    public function index(){
        if(isset($_SESSION['usuari'])){
            $entrades = $this->entradaService->getAllEntrades();
        } else {
            $entrades = $this->entradaService->getAllEntradesPubliques();
        }
        include 'view/entrades/index.php';
    }
}