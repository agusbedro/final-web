<?php
    require_once 'controller/contiController.php';
    require_once 'controller/trendsController.php';
    require_once 'controller/userController.php';
    require_once 'RouterClass.php';

    
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');
    define("LOGOUT", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/logout');
    define("TRENDS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/trends');
    define("USUARIOS", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/users');

    $r = new Router();

    //RUTAS DE LA TABLA TRENDS
    $r->addRoute("home", "GET", "trendsController", "Home");
    
    $r->addRoute("trends", "GET", "trendsController", "Trends");

    $r->addRoute("trends/:ID", "GET", "trendsController", "TrendParticular");

    $r->addRoute("continente/:ID", "GET", "trendsController", "TrendsPorContinente");

    $r->addRoute("insert", "POST", "trendsController", "InsertTrend");

    $r->addRoute("delete/:ID", "GET", "trendsController", "DeleteTrend");

    $r->addRoute("edit/:ID", "POST", "trendsController", "EditTrend");


    //RUTAS DE LA TABLA CONTINENTE
    $r->addRoute("continentes", "GET", "contiController", "Continentes");

    $r->addRoute("insert", "POST", "contiController", "InsertContinente");

    $r->addRoute("deleteCont/:ID", "GET", "contiController", "DeleteContinente");
    
    $r->addRoute("editCont/:ID", "POST", "contiController", "EditCont");

    //RUTAS DE LA TABLA USUARIO
    $r->addRoute("login", "GET", "userController", "Login");

    $r->addRoute("verificar", "POST", "userController", "Verificar");

    $r->addRoute("registrarse", "GET", "userController", "Registrarse");

    $r->addRoute("registrarse", "POST", "userController", "IniciarSesion");

    $r->addRoute("logout", "GET", "userController", "CerrarSesion");

    $r->addRoute("verify", "POST", "userController", "VerifyUser");

    $r->addRoute("users", "GET", "userController", "Usuarios");

    $r->addRoute("user/:ID", "GET", "userController", "Usuario");

    $r->addRoute("userEdit/:ID", "POST", "userController", "EditAdministrador");

    $r->addRoute("userDelete/:ID", "GET", "userController", "DeleteUsuario");

    $r->addRoute("cambiarPermiso/:ID", "POST", "userController", "CambiarPermisos");

    //RUTA POR DEFECTO
    $r->setDefaultRoute("trendsController", "Home");

    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>