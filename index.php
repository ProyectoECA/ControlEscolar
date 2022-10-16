<?php

include_once "SesionesUsuario/user_SQLSERVER.php";
include_once "SesionesUsuario/user_session.php";


#$userSession = new UserSession();
$user = new User();
$sesion = new UserSession();

if (isset($_SESSION['user'])) {
    $user->setUser($sesion->getUser(), $sesion->getUserNivel());
    $user->setNombre($sesion->getNombre());
    $nombre_bienvenida = $user->getNombre();

    switch($user->getNivel()){

        case 1:
            include_once "PaginasVista/jefe_Control.php";
            break;
        case 2:
            include_once "PaginasVista/principal_secretarias.php";
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

            //busca el nombre de la persona que se esta logeando
            $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,1);

            //establece la session con los datos
            $sesion->setUser($usuario,1);
            $sesion->setNombre($nombre_bienvenida);

            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);

            

            

            $archivo = fopen("Archivo.txt", "w") or die("Problema al crear archivo");
            fwrite($archivo, $usuario);
            fclose($archivo);

            include_once "PaginasVista/jefe_Control.php";

        }else if($user->userComprobacionMaestro($usuario,$pass)){

            //busca el nombre de la persona que se esta logeando
            $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,3);

            //establece la session con los datos
            $sesion->setUser($usuario,3);
            $sesion->setNombre($nombre_bienvenida);
            
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);

            include_once "PaginasVista/maestros_datos_per.html";

        }else if($user->userComprobacionSecretaria($usuario,$pass)){

            //busca el nombre de la persona que se esta logeando
            $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,2);

            //establece la session con los datos
            $sesion->setUser($usuario,2);
            $sesion->setNombre($nombre_bienvenida);
            
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);

            include_once "PaginasVista/principal_secretarias.php";

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once "PaginasVista/login.php";
        }

    }else if(strpos($usuario,"TNM",0)=== 0){

        if($user->userComprobacionAlumno($usuario,$pass)){

           //busca el nombre de la persona que se esta logeando
           $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,4);

           //establece la session con los datos
           $sesion->setUser($usuario,4);
           $sesion->setNombre($nombre_bienvenida);
           
           $user->setUser($sesion->getUser(), $sesion->getUserNivel());
           $user->setNombre($nombre_bienvenida);

           
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





