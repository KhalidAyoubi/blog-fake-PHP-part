<?php

namespace dao;

use model\Entrada;
use MySQLConfig;

require "model/Entrada.php";
require "config/MySQLConfig.php";
class EntradaDao
{
    private $db;
    public function __construct()
    {
        $this->db = MySQLConfig::getDBConnection();
    }

    public function getAllEntrades() {
        $stmt = $this->db->prepare("SELECT * FROM entrada");

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un array
        $dades = $stmt->get_result();

        // Verificar si hay dadesados
        if ($dades->num_rows > 0) {
            //TODO: Transformam les dades que hem rebut
            $entradesDB = $dades->fetch_all(MYSQLI_ASSOC);

            $entrades = []; //Entradas a devolver

            foreach ($entradesDB as $entrada) {
                $entradaObj = new Entrada();

                $entrada_has_idioma = $this->getEntradaHasIdioma($entrada['id']);

                $entradaObj->setId($entrada['id']);
                $entradaObj->setData($entrada['data']);
                $entradaObj->setPublica($entrada['publica']);

                $entradaObj->setAutor($entrada['autor']); //en el controlador hay que sustituirlo por el objeto

                $entradaObj->setTitol($entrada_has_idioma['titol']);
                $entradaObj->setDescripcio($entrada_has_idioma['descripcio']);

                $entradaObj->setIdidoma($entrada_has_idioma['idioma_ididioma']);

                //Agregar entrada al conjunto de entradas a devolver
                array_push($entrades, $entradaObj);
            }

            return $entrades;
        } else {
            return "No hi ha entrades.";
        }
    }

    public function getAllEntradesPubliques() {
        $stmt = $this->db->prepare("SELECT * FROM entrada where publica = 1");

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener el resultado como un array
        $dades = $stmt->get_result();

        // Verificar si hay dadesados
        if ($dades->num_rows > 0) {
            //TODO: Transformam les dades que hem rebut
            $entradesDB = $dades->fetch_all(MYSQLI_ASSOC);

            $entrades = []; //Entradas a devolver

            foreach ($entradesDB as $entrada) {
                $entradaObj = new Entrada();

                $entrada_has_idioma = $this->getEntradaHasIdioma($entrada['id']);

                $entradaObj->setId($entrada['id']);
                $entradaObj->setData($entrada['data']);
                $entradaObj->setPublica($entrada['publica']);

                $entradaObj->setAutor($entrada['autor']); //en el controlador hay que sustituirlo por el objeto

                $entradaObj->setTitol($entrada_has_idioma['titol']);
                $entradaObj->setDescripcio($entrada_has_idioma['descripcio']);

                $entradaObj->setIdidoma($entrada_has_idioma['idioma_ididioma']);

                //Agregar entrada al conjunto de entradas a devolver
                array_push($entrades, $entradaObj);
            }

            return $entrades;
        } else {
            return "No hi ha entrades.";
        }
    }

    public function getEntradaById($id, $solopublicas) {
        // Preparamos la consulta SQL según la visibilidad de las entradas
        $sql = "SELECT * FROM entrada WHERE id = ?";
        if ($solopublicas) {
            $sql .= " AND publica = 1";
        }

        // Preparamos la consulta
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        // Obtenemos el resultado de la consulta
        $entradaDB = $stmt->get_result()->fetch_assoc();

        // Creamos nuestro propio objeto Entrada y lo devolvemos
        $entrada = new Entrada();

        // Si se encontró una entrada, asignamos sus valores
        if ($entradaDB) {
            // Obtenemos los detalles específicos de la entrada
            $entrada_has_idioma = $this->getEntradaHasIdioma($entradaDB['id']);

            $entrada->setId($entradaDB['id']);
            $entrada->setData($entradaDB['data']);
            $entrada->setPublica($entradaDB['publica']);
            $entrada->setAutor($entradaDB['autor']);
            $entrada->setTitol($entrada_has_idioma['titol']);
            $entrada->setDescripcio($entrada_has_idioma['descripcio']);
            $entrada->setIdidoma($entrada_has_idioma['idioma_ididioma']);
        }

        return $entrada;
    }

    private function getEntradaHasIdioma($entrada_id) {
        $stmt = $this->db->prepare("SELECT * FROM entrada_has_idioma WHERE entrada_id = ? ");
        $stmt->bind_param("i", $entrada_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}