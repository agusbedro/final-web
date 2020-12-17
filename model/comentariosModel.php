<?php



class comentariosModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabla_tpe;charset=utf8', 'root', '');
    }

    function getComentarios(){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComentario($id){
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id=$id");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    
    function deleteComentario($id){
        $sentencia = $this->db->prepare("DELETE FROM comentarios WHERE id=$id");
        $sentencia->execute();
    }

    function postComentario($comentario, $puntuacion, $tendencia){
        $sentencia = $this->db->prepare("INSERT INTO comentarios(comentario, puntuacion, id_tendencia) VALUES(?,?,?)");
        $a = $sentencia->execute(array($comentario, $puntuacion, $tendencia));
        return $this->db->lastInsertId();
    }

}  