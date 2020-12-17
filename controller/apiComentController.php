<?php

require_once 'model/comentariosModel.php';
require_once 'model/userModel.php';
require_once 'view/APIView.php';
require_once 'view/userView.php';
require_once 'controller/trendsController.php';
require_once 'controller/apiController.php';

class apiComentController extends apiController{
    
    private $userModel;
    private $userView;
    private $trendCont;

    public function __construct() {
        parent::__construct();
        $this->model = new comentariosModel();
        $this->userModel = new userModel();
        $this->userView = new userView();
        $this->trendCont = new trendsController();
    }

    private function checkLogginIn(){
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: ". LOGIN);
            die();
        }
    }

    function verificarAdministrador(){
        return $this->userModel->getAdministrador($_SESSION["user"]);
    }

    function Comentarios(){
        $comentarios = $this->model->getComentarios();
        if(!empty($comentarios)){
            $this->view->response($comentarios, 200);
        }
        else    
            $this->view->response("La tarea con id=$id no existe porfavor ingrese otro valor existente", 404);
    }

    function Comentario($params = NULL){
        $id = $params[':ID'];
        $comentario = $this->model->getComentario($id);
       
        if(!empty($comentario)){
            $this->view->response($comentario, 200);
        }
        else    
            $this->view->response("La tarea con id=$id no existe porfavor ingrese otro valor existente", 404);

    }

    function DeleteComentario($params = null) {
        $idComentario = $params[':ID'];

        $comentario = $this->model->getComentario($idComentario);

        if (!empty($comentario)) {
            $this->model->deleteComentario($idComentario);
            $this->view->response("Tarea id=$idComentario fue eliminada con éxito", 200);
        }
        else 
            $this->view->response("Task id=$idComentario not found", 404);
    }


    function InsertComentario($params = null){
        //$this->checkLogginIn();
        $body = $this->getData();

        $id_tendencia = $params[":ID"];

        $idComentario = $this->model->postComentario($body->comentario, $body->puntuacion, $id_tendencia);

        $this->view->response($idComentario, 200);

        if(!empty($idComentario)){
            $this->view->response("Nueva comentario ha sido insertado", 200);
        }
        else{
            $this->view->response("No se ha insertado la tarea", 404);
        }
       
        
    }
}