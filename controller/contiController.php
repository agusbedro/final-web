<?php

require_once './model/contiModel.php';
require_once './view/contiView.php';

class contiController{

    private $view;
    private $model;
    private $userModel;

    function __construct(){
        $this->view = new contiView();
        $this->model = new contiModel();
        $this->userModel = new userModel();
    }

    function verificarAdministrador(){
        return $this->userModel->getAdministrador($_SESSION["user"]);
    }

    private function checkLogginIn(){
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: ". LOGIN);
            die();
        }
    }

    function Continentes (){
        $this->checkLogginIn();
        $continentes = $this->model->getContinentes();
        $this->view->showContinentes($continentes);
    }
    
    function InsertContinente(){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
        $this->model->postContinente($_POST['continente']);
        $this->view->ShowHomeLocation();
        }
        else{
            $this->view->ShowError('Solo los administradores pueden insertar un continente');
        }
    }

    function DeleteContinente($params = null){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
        $id = $params[':ID'];
        $this->model->DeleteContinentePorID($id);
        $this->view->ShowHomeLocation();
        }
        else{
            $this->view->ShowError('Solo los administradores pueden borrar un continente');
        }
    }

    function EditCont($params = null){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
        $continente =  $_POST['id_continente'];
        $id = $params[':ID'];  
 
        $existeCont = $this->model->consultaIdNombreContinente($_POST['id_continente']); // si existe retorna 1 y sino 0
        
        if (count($existeCont) == 0){
            $this->model->editContinente($id, $continente);
        }
        $this->view->ShowHomeLocation();  
        }
        else{
            $this->view->ShowError('Solo los administradores pueden editar un continente');
        }
    }


}
