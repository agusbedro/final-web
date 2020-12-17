<?php

class contiModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabla_tpe;charset=utf8', 'root', '');
    }

    function getContinentes(){
        $sentencia = $this->db->prepare("SELECT * FROM continente");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function consultaIdNombreContinente($nombreContinente){
        $sentencia = $this->db->prepare("SELECT id_continente FROM continente WHERE nombre =" . "\"" . $nombreContinente . "\"");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function postContinente($continente){
        $sentencia = $this->db->prepare("INSERT INTO continente(nombre) VALUES(?)");
        $sentencia->execute(array($continente));
    }

    function DeleteContinentePorID($id){
        $sentencia = $this->db->prepare("DELETE FROM continente WHERE id_continente=?");
        $sentencia->execute(array($id));
    }

    function editContinente($id, $continente){
        $sentencia = $this->db->prepare("UPDATE continente SET nombre=" . "\"" . $continente . "\"" . "WHERE id_continente=$id");
        $sentencia->execute();
    }

}

?>