<?php

class contiView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showContinentes($continentes){  
        $this->smarty->assign('continentes', $continentes);
        $this->smarty->display('templates/continentes.tpl'); // muestro los trends y el formulario para agregar 
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function ShowError($mensaje){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/error.tpl'); 
    }
}
