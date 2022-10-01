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
            include_once "PaginasVista/jefe_Control.html";
            break;
        case 2:
            include_once "PaginasVista/secretarias.html";
            break;
        case 3:
            include_once "PaginasVista/maestros_datos_per.html";
            break;

        case 4:
            include_once "PaginasVista/mostrar_datos_alumnos.php";
            break;

    }
}else if(isset($_POST["username"]) && isset($_POST["password"])){
    /**
     * ver si la contraseña y el usuario estan bien 
     * y si es asi cargar la pagina que le corresponde
     */
    $usuario = $_POST["username"];
    $pass = $_POST["password"];
    
    if(strpos($usuario,"RH",0)=== 0){

        if($user->userComprobacionAdmin($usuario,$pass)){

            $sesion->setUser($usuario,1);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            $archivo = fopen("Archivo.txt", "w") or die("Problema al crear archivo");
            fwrite($archivo, $usuario);
            fclose($archivo);
            
            include_once "PaginasVista/jefe_Control.html";

        }else if($user->userComprobacionMaestro($usuario,$pass)){

            $sesion->setUser($usuario,3);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/maestros_datos_per.html";

        }else if($user->userComprobacionSecretaria($usuario,$pass)){

            $sesion->setUser($usuario,2);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/secretarias.html";

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once "PaginasVista/login.php";
        }

    }else if(strpos($usuario,"TNM",0)=== 0){

        if($user->userComprobacionAlumno($usuario,$pass)){

            $sesion->setUser($usuario,4);
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());

            include_once "PaginasVista/mostrar_datos_alumnos.html";

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
