<?php

require_once './libs/Smarty.class.php';

class userView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($mensaje = ""){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/login.tpl'); // muestro el template 
    }

    function showRegistrarse(){
        $this->smarty->display('templates/registrarse.tpl');
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function showUsuarios($usuarios){
        $this->smarty->assign('usuarios', $usuarios);
        $this->smarty->display('templates/mostrarUsuarios.tpl');
    }

    function showUsuario($usuario){
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->display('templates/usuario.tpl');
    }

    function ShowError($mensaje){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/error.tpl'); 
    }

}
?>