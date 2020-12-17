<?php

include_once './model/userModel.php';
include_once './view/userView.php';

class userController{
    
    private $model;
    private $view;

    function __construct(){
        $this->view = new userView();
        $this->model = new userModel();
    }
    
    function Login(){
        $this->view->showLogin();
    }

    function Registrarse(){
        $this->view->showRegistrarse();   
    }

    function IniciarSesion(){
        $user = $_POST['user'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $administrador = 0;
        if(isset($_POST['administrador'])){
            $administrador = 1;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->model->agregarUsuario($user, $hash, $email, $administrador);
        $this->Verificar();
        $this->view->showHomeLocation();
    }

    function CerrarSesion(){
        session_start();
        session_destroy();
        header("Location: ". LOGIN);
    }

    function Verificar(){
        $user = $_POST['user'];
        $pass = $_POST['password'];

        if(isset($user)){
            $usuarioDB = $this->model->GetUser($user);

            if(isset($usuarioDB) && $usuarioDB){
                // Existe el usuario
                if (password_verify($pass, $usuarioDB->password)){
                    session_start();
                        $_SESSION["user"] = $usuarioDB->user;
                        $_SESSION['LAST_ACTIVITY'] = time();

                    header("Location: ".BASE_URL."home");
                }else{
                    $this->view->showLogin("Contraseña incorrecta");
                }

            }else{
                // No existe el user en la DB
                $this->view->ShowLogin("El usuario no existe");
            }
        }
    }

    private function checkLogginIn(){
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: ". LOGIN);
            die();
        }
        return $this->model->getAdministrador($_SESSION["user"]);
    }

    function Usuarios(){
        $administrador = $this->checkLogginIn();
        if($administrador->administrador == "1"){
        $usuarios = $this->model->getUsuarios();
        $this->view->showUsuarios($usuarios);
        }
        else{
            $this->view->ShowError("Solo los administradores pueden ingresar a esta sección");
        }
    }

    function Usuario($params = null){
        $administrador = $this->checkLogginIn();
        if($administrador->administrador == "1"){
        
        $id = $params[':ID'];

        if(isset($id) && $id!=NULL){
            $usuario = $this->model->getUsuarioPorID($id);
            $this->view->showUsuario($usuario);
           }
        }
    }

    function DeleteUsuario($params = null){
        $administrador = $this->checkLogginIn();
        if($administrador->administrador == "1"){
            $id = $params[':ID'];
            $this->model->eliminarUsuario($id);
            header("Location: ". USUARIOS);
        }
    }

    function CambiarPermisos($params = null){
        $administrador =  $this->checkLogginIn();
        if($administrador->administrador == "1"){
        
        $id = $params[":ID"];
        $usuario=0;
        if(isset($_POST['administrador'])){
            $usuario = 1;
        }
       
        $this->model->EditPermisoUsuario($id, $usuario);
        header("Location: ". USUARIOS);
        }
    }
}

