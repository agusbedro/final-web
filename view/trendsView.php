<?php

require_once './libs/Smarty.class.php';

class trendsView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function showHome(){
        $this->smarty->display('templates/home.tpl');
    }

    function showTrends($trends, $usuario,$cantidadIteraciones){   
        $this->smarty->assign('trends', $trends);
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->assign('cantidadIteraciones', $cantidadIteraciones);
        $this->smarty->display('templates/trends.tpl'); // muestro los trends y el formulario para agregar 
    }

    function showTrendParticular($trend, $usuario){ 
        $this->smarty->assign('usuario', $usuario);
        $this->smarty->assign('trend', $trend);
        $this->smarty->display('templates/trendParticular.tpl');
    }

    function showTrendsPorContinente($trends){
        $this->smarty->assign('trends', $trends);
        $this->smarty->display('templates/trendsPorConti.tpl'); 
    }

    function ShowHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function ShowError($mensaje){
        $this->smarty->assign('mensaje', $mensaje);
        $this->smarty->display('templates/error.tpl');
    }
}



?>