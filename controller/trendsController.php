<?php

require_once './model/trendsModel.php';
require_once './model/contiModel.php';
require_once './view/trendsView.php';
require_once './model/userModel.php';

class trendsController{

    private $view;
    private $model;
    private $continenteModel;
    private $userModel;

    function __construct(){
        $this->view = new trendsView();
        $this->model = new trendsModel();
        $this->continenteModel = new contiModel();
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

    
    function Home(){
        $this->checkLogginIn();
        $this->view->showHome();
    }

    function Trends(){
        $this->checkLogginIn();

        $cant_trends=5;
        $pagina=0;  
        if(isset($_GET['page']) && is_numeric($_GET['page'])){
            $pagina = $_GET['page'];
        }
        $trends = $this->model->getTrends($pagina*$cant_trends, $cant_trends);
        $usuario = $this->userModel->getUser($_SESSION["user"]);
        $trends_totales = count($this->model->obtenerTrends());
        $iterador=0;
        for($i=0; $i<=$trends_totales;$i++){
            $i = $i + 5;
            $iterador++;  
        }
        $this->view->showTrends($trends, $usuario, $iterador);
    }

    function obtenerID(){
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $paramsUrl =parse_url($actual_link, PHP_URL_PATH);
        $idUrl = explode('/',$paramsUrl,4);
        return $idUrl[3];
    }

    function TrendParticular($params = null){
        $this->checkLogginIn();
        $usuario = $this->userModel->getUser($_SESSION["user"]);
        $id = $params[":ID"];
        
        if(isset($id) && $id!=NULL){
            $trend = $this->model->getTrendParticular($id);
            $this->view->showTrendParticular($trend, $usuario);
        }
    }

    function TrendsPorContinente($params = null){
        $this->checkLogginIn();
        $id = $params[":ID"];
        
        $trends = $this->model->getTrendsPorContinente($id);
        $this->view->showTrendsPorContinente($trends);
    }

    function InsertTrend(){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
            
            $destino = null;
            if(isset($_FILES["imagen"])){
                $uploads = getcwd() . "/uploads/";
                $destino = tempnam($uploads, $_FILES["imagen"]["name"]);    
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
                
                $destino = basename($destino);
            }
        }
        $zona = $_POST['zona'];
        $moda = $_POST['moda'];
        $makeup = $_POST['makeup'];
        $pelo = $_POST['pelo'];

        $id = $this->continenteModel->consultaIdNombreContinente($_POST['id_continente']); // 1
        if (count($id) == 0) {
            $this->continenteModel->postContinente($_POST['id_continente']);
            $id = $this->continenteModel->consultaIdNombreContinente($_POST['id_continente']);  
        }
        $this->model->postTrend($id[0]->id_continente, $zona,$moda,$makeup,$pelo, $destino);
        header("Location: ". TRENDS);
        }
    

    function DeleteTrend($params = null){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
            $id = $params[':ID'];
            $this->model->DeleteTrendPorID($id);
            header("Location: ". TRENDS);
        }
        else{
            $this->view->ShowError('Solo los administradores tienen permiso para borrar');
        }
    }

    function EditTrend($params = null){
        $this->checkLogginIn();
        $administrador = $this->verificarAdministrador();
        if($administrador->administrador == "1"){
            $continente =  $_POST['id_continente'];
            $zona = $_POST['zona'];
            $moda = $_POST['moda'];
            $makeup = $_POST['makeup'];
            $pelo = $_POST['pelo'];
            $id = $params[':ID'];   

            $destino = null;
            if(isset($_FILES["imagen"])){
                $uploads = getcwd() . "/uploads/";
                $destino = tempnam($uploads, $_FILES["imagen"]["name"]);    
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $destino);
                
                $destino = basename($destino);
            }

            $continente = $this->continenteModel->consultaIdNombreContinente($_POST['id_continente']); // 1
            
            if (count($continente) == 0){
                $this->continenteModel->postContinente($_POST['id_continente']);
                $continente = $this->continenteModel->consultaIdNombreContinente($_POST['id_continente']);  
            }

            $this->model->editTrendPorID($id,$continente[0]->id_continente,$zona,$moda,$makeup,$pelo, $destino);
            $this->view->ShowHomeLocation();
        }
        else{
            $this->view->ShowError('Solo los administradores tienen permiso para editar');
        }

    }

}
