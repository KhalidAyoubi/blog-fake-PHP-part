<?php

namespace controller;

use service\ComentariService;
use service\EntradaService;
require "service/EntradaService.php";
require "service/ComentariService.php";

class EntradaController
{
    private $entradaService;
    private $comentariService;
    public function __construct()
    {
        $this->entradaService = new EntradaService();
        $this->comentariService = new ComentariService();
    }

    public function getEntradaById($id){
        if(isset($_SESSION['usuari'])){
            $entrada = $this->entradaService->getEntradaById($id, false);
            $comentaris = $this->comentariService->comentarisByEntradaId($id);
        } else {
            $entrada = $this->entradaService->getEntradaById($id, true);
            $comentaris = $this->comentariService->comentarisByEntradaId($id);
        }

        include 'view/entrades/entrada.php';
    }

    public function borrarComentari(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idcomentari = (int) $_POST['idcomentari'];
            $entrada_id = (int) $_POST['entrada_id'];
            $usuari_username = $_SESSION['usuari'];

            $comentari = $this->comentariService->findComentariById($idcomentari, $entrada_id, $usuari_username);

            if ($comentari) {
                $this->comentariService->borrarComentari($idcomentari, $entrada_id, $usuari_username);
                header("Location: index.php?controller=entrada&action=getEntradaById&id=$entrada_id");
            } else {
                echo "No se puede borrar el comentario. Puede que no exista, o no es tuyo. <a href='index.php?controller=entrada&action=getEntradaById&id=$entrada_id'>Vuelve a la entrada</a>";
            }
        } else {
            header("Location: index.php");
        }
    }

    public function agregarComentari(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $descripcio = $_POST['descripcio'];
            $entrada_id = (int) $_POST['entrada_id'];
            $usuari_username = $_SESSION['usuari'];

            $this->comentariService->afegirComentari($entrada_id, $usuari_username, $descripcio);
            header("Location: index.php?controller=entrada&action=getEntradaById&id=$entrada_id");
        } else {
            header("Location: index.php");
        }
    }



}