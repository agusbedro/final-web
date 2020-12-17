<?php

class trendsModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabla_tpe;charset=utf8', 'root', '');
    }

    function getTrends($pagina, $cant_trends){
        $sentencia = $this->db->prepare("SELECT * FROM tendencias, continente WHERE tendencias.id_continente = continente.id_continente LIMIT :pagina, :cant_trends");
        $sentencia->bindParam(':pagina', $pagina, PDO::PARAM_INT);
        $sentencia->bindParam(':cant_trends', $cant_trends, PDO::PARAM_INT);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function consultaIdNombreContinente($nombreContinente){
        $sentencia = $this->db->prepare("SELECT id_continente FROM continente WHERE nombre =" . "\"" . $nombreContinente . "\"");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function getTrendParticular($id){
        $sentencia = $this->db->prepare("SELECT id, zona, moda, makeup, pelo, nombre FROM tendencias, continente WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);    
    }

    function postTrend($id_continente, $zona, $moda, $makeup, $pelo, $imagen){
        $sentencia = $this->db->prepare("INSERT INTO tendencias(id_continente, zona, moda, makeup, pelo, imagen) VALUES(?,?,?,?,?,?)");
        $a = $sentencia->execute(array($id_continente, $zona, $moda, $makeup, $pelo, $imagen));
    }

    function getTrendsPorContinente($id){
        $sentencia = $this->db->prepare("SELECT * FROM tendencias, continente WHERE tendencias.id_continente = $id AND continente.id_continente= $id");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);  
    }

    function DeleteTrendPorID($id){
        $sentencia = $this->db->prepare("DELETE FROM tendencias WHERE id=?");
        $sentencia->execute(array($id));
    }

    function editTrendPorID($id,$id_continente,$zona,$moda,$makeup,$pelo, $imagen){
        $sentencia = $this->db->prepare("UPDATE tendencias SET id_continente=?, zona=?, moda=? ,makeup=?, pelo=?, imagen=? WHERE id=?");
        $sentencia->execute(array($id_continente,$zona,$moda,$makeup,$pelo,$imagen, $id));
    }

    function obtenerTrends(){
        $sentencia = $this->db->prepare("SELECT * FROM tendencias");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    


}

?>