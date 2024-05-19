<?php

namespace model;

class Comentari
{
    private $idcomentari;
    private $descripcio;
    private $entrada_id;
    private $usuari;

    public function getIdcomentari()
    {
        return $this->idcomentari;
    }

    public function setIdcomentari($idcomentari)
    {
        $this->idcomentari = $idcomentari;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;
    }

    public function getEntradaId()
    {
        return $this->entrada_id;
    }

    public function setEntradaId($entrada_id)
    {
        $this->entrada_id = $entrada_id;
    }

    public function getUsuari()
    {
        return $this->usuari;
    }

    public function setUsuari($usuari)
    {
        $this->usuari = $usuari;
    }


}