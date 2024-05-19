<?php

namespace dao;

use model\Comentari;
use MySQLConfig;

require "model/Comentari.php";
require "config/MySQLConfig.php";
class ComentariDao
{
    private $db;
    public function __construct()
    {
        $this->db = MySQLConfig::getDBConnection();
    }

    public function comentarisByEntradaId($entradaId){
        $stmt = $this->db->prepare("SELECT * FROM comentari WHERE entrada_id = ?");
        $stmt->bind_param("s", $entradaId);
        $stmt->execute();
        $dades = $stmt->get_result();

        if ($dades->num_rows > 0) {
            //TODO: Transformam les dades que hem rebut
            $comentarisDAO = $dades->fetch_all(MYSQLI_ASSOC);

            $comentaris = []; //Comentarios a devolver

            foreach ($comentarisDAO as $comentari) {
                $comentariObj = new Comentari();

                $comentariObj->setIdcomentari($comentari["idcomentari"]);
                $comentariObj->setDescripcio($comentari["descripcio"]);
                $comentariObj->setEntradaId($comentari["entrada_id"]);
                $comentariObj->setUsuari($comentari["usuari_username"]);

                array_push($comentaris, $comentariObj);
            }

            return $comentaris;
        } else {
            return null;
        }
    }

    public function afegirComentari($entrada_id, $usuari, $descripcio){
        $stmt = $this->db->prepare("INSERT INTO comentari (descripcio, entrada_id, usuari_username) VALUES (?, ?, ?)");
        $stmt->bind_param("sis", $descripcio, $entrada_id, $usuari);
        return $stmt->execute();
    }

    public function borrarComentari($idcomentari, $entrada_id, $usuari_username){
        $stmt = $this->db->prepare("DELETE FROM comentari WHERE idcomentari = ? AND entrada_id = ? AND usuari_username = ?");
        $stmt->bind_param("iis", $idcomentari, $entrada_id, $usuari_username);
        return $stmt->execute();
    }

    public function findComentariById($idcomentari, $entrada_id, $usuari_username){
        $stmt = $this->db->prepare("SELECT * FROM comentari WHERE idcomentari = ? AND entrada_id = ? AND usuari_username = ?");
        $stmt->bind_param("iis", $idcomentari, $entrada_id, $usuari_username);
        $stmt->execute();

        // Obtenemos el resultado de la consulta
        $comentariDB = $stmt->get_result()->fetch_assoc();

        // Creamos nuestro propio objeto Comentario y lo devolvemos
        $comentario = new Comentari();

        // Si se encontró uno, lo asignamos a nuestro objeto
        if ($comentariDB) {
            $comentario->setIdcomentari($comentariDB["idcomentari"]);
            $comentario->setDescripcio($comentariDB["descripcio"]);
            $comentario->setEntradaId($comentariDB["entrada_id"]);
            $comentario->setUsuari($comentariDB["usuari_username"]);
        }

        return $comentario;
    }


}