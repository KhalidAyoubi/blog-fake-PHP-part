<?php

namespace model;

class Entrada
{
    private $id;
    private $data;
    private $publica;
    private $autor;
    private $ididoma;
    private $titol;
    private $descripcio;

    /*public function __construct($id, $data, $publica, $autor, $ididoma, $titulo, $contenido)
    {
        $this->id = $id;
        $this->data = $data;
        $this->publica = $publica;
        $this->autor = $autor;
        $this->ididoma = $ididoma;
        $this->titulo = $titulo;
        $this->contenido = $contenido;
    }*/

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getPublica()
    {
        return $this->publica;
    }

    public function setPublica($publica)
    {
        $this->publica = $publica;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    public function getIdidoma()
    {
        return $this->ididoma;
    }

    public function setIdidoma($ididoma)
    {
        $this->ididoma = $ididoma;
    }

    public function getTitol()
    {
        return $this->titol;
    }

    public function setTitol($titol)
    {
        $this->titol = $titol;
    }

    public function getDescripcio()
    {
        return $this->descripcio;
    }

    public function setDescripcio($descripcio)
    {
        $this->descripcio = $descripcio;
    }

}