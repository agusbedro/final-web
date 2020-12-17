<?php
    require_once 'RouterClass.php';
    require_once 'controller/apiComentController.php';

    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'api/');

    $r = new Router();

    //RUTAS DE LA TABLA TRENDS
    $r->addRoute("comentarios", "GET", "apiComentController", "Comentarios");

    $r->addRoute("tendencia/:ID/comentarios", "GET", "apiComentController", "Comentario");

    $r->addRoute("comentario/:ID", "DELETE", "apiComentController", "DeleteComentario");

    $r->addRoute("tendencia/:ID/comentarios", "POST", "apiComentController", "InsertComentario");
    
    //RUTA POR DEFECTO

    $r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 



