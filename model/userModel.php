<?php


class userModel{

    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tabla_tpe;charset=utf8', 'root', '');
    }
    
    function agregarUsuario($user, $password, $email, $administrador){
        $sentencia = $this->db->prepare("INSERT INTO usuarios( user, password, email, administrador) VALUES (?, ?, ?, ?)");
        $sentencia->execute(array($user, $password, $email, $administrador));
    }

    function GetUser($usuario){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE user=?");
        $sentencia->execute(array($usuario));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function getUsuarios(){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getUsuarioPorID($id){
        $sentencia = $this->db->prepare("SELECT * FROM usuarios WHERE id=?");
        $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }


    function getAdministrador($user){
        $sentencia = $this->db->prepare("SELECT administrador FROM usuarios WHERE user=?");
        $sentencia->execute(array($user));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function eliminarUsuario($id){
        $sentencia = $this->db->prepare("DELETE FROM usuarios WHERE id=$id");
        $sentencia->execute();
    }

    function editarPermisos($id, $usuario, $email, $administrador){
        $sentencia = $this->db->prepare("UPDATE usuarios SET usuario=?, email=?, administrador=? WHERE id=$id");
        $sentencia->execute($usuario, $email, $administrador);
    }

    function EditPermisoUsuario($id, $usuario){
        $sentencia = $this->db->prepare("UPDATE usuarios SET administrador=$usuario WHERE id=$id");
        $sentencia->execute();
    }
}

?>