<?php

include_once "SesionesUsuario/user_SQLSERVER.php";
include_once "SesionesUsuario/user_session.php";


#$userSession = new UserSession();
$user = new User();
$sesion = new UserSession();

if (isset($_SESSION['user'])) {
    $user->setUser($sesion->getUser(), $sesion->getUserNivel());

    switch($user->getNivel()){

        case 1:
            include_once "PaginasVista/jefe_Control.php";
            break;
        case 2:
            include_once "PaginasVista/secretarias.php";
            break;
        case 3:
            include_once "PaginasVista/maestros_datos_per.php";
            break;

        case 4:
            include_once "PaginasVista/mostrar_datos_alumnos.php";
            break;

    }
}else if(isset($_POST["usuario"]) && isset($_POST["password"])){
    /**
     * ver si la contraseña y el usuario estan bien 
     * y si es asi cargar la pagina que le corresponde
     */
    $usuario = $_POST["usuario"];
    $pass = $_POST["password"];
    
    if(strpos($usuario,"RH",0)=== 0){

        if($user->userComprobacionAdmin($usuario,$pass)){

            $sesion->setUser($usuario,1);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/jefe_Control.php";

        }else if($user->userComprobacionMaestro($usuario,$pass)){

            $sesion->setUser($usuario,3);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/maestros_datos_per.php";

        }else if($user->userComprobacionSecretaria($usuario,$pass)){

            $sesion->setUser($usuario,2);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/secretarias.php";

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once "PaginasVista/login.php";
        }

    }else if(strpos($usuario,"TNM",0)=== 0){

        if($user->userComprobacionAlumno($usuario,$pass)){

            $sesion->setUser($usuario,4);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/mostrar_datos_alumnos.php";

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once "PaginasVista/login.php";
        }

    }else{
        $errorLogin ="Nombre de usuario y/o password incorrecto";
        include_once "PaginasVista/login.php";
    }
    
}else{
    include_once "PaginasVista/login.php";
}





?>




