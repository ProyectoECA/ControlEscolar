<?php

include_once "SesionesUsuario/user_SQLSERVER.php";
include_once "SesionesUsuario/user_session.php";


#$userSession = new UserSession();
$user = new User();
$sesion = new UserSession();
$passwordigual = false;

if (isset($_SESSION['user'])) {
    $user->setUser($sesion->getUser(), $sesion->getUserNivel());
    $user->setNombre($sesion->getNombre());
    $user->setPasswordigual($sesion->getPasswordigual());
    $nombre_bienvenida = $user->getNombre();
    $passwordigual = $user->getPasswordigual();

    if($passwordigual){
        include_once "PaginasVista/cambio_contrasena.html";
    }else{
        switch($user->getNivel()){

            case 1:
                include_once "PaginasVista/jefe_Control.php";
                break;
            case 2:
                include_once "PaginasVista/principal_secretarias.php";
                break;
            case 3:
                include_once "PaginasVista/principal_maestros.html";
                break;
    
            case 4:
                include_once "PaginasVista/principal_alumnos.html";
                break;
    
        }
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
            if($usuario == $pass){
                $passwordigual = true;
            }
            $sesion->setUser($usuario,1,$passwordigual);
            $sesion->setNombre($nombre_bienvenida);

            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);
            $user->setPasswordigual($passwordigual);

            if($usuario == $pass){

                include_once "PaginasVista/cambio_contrasena.html";
                
            }else{
                include_once "PaginasVista/jefe_Control.php";
            }


        }else if($user->userComprobacionMaestro($usuario,$pass)){

            //busca el nombre de la persona que se esta logeando
            $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,3);

            if($usuario == $pass){
                $passwordigual = true;
            }
            //establece la session con los datos
            $sesion->setUser($usuario,3, $passwordigual);
            $sesion->setNombre($nombre_bienvenida);
            
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);
            $user->setPasswordigual($passwordigual);

            if($usuario == $pass){

                include_once "PaginasVista/cambio_contrasena.html";
                
            }else{
                include_once "PaginasVista/principal_maestros.html";
            }

            

        }else if($user->userComprobacionSecretaria($usuario,$pass)){

            //busca el nombre de la persona que se esta logeando
            $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,2);

            if($usuario == $pass){
                $passwordigual = true;
            }
            //establece la session con los datos
            $sesion->setUser($usuario,2,$passwordigual);
            $sesion->setNombre($nombre_bienvenida);
            
            $user->setUser($sesion->getUser(), $sesion->getUserNivel());
            $user->setNombre($nombre_bienvenida);
            $user->setPasswordigual($passwordigual);

            if($usuario == $pass){

                include_once "PaginasVista/cambio_contrasena.html";
                
            }else{

            

                include_once "PaginasVista/principal_secretarias.php";

            }

            

        }else{
            $errorLogin ="Nombre de usuario y/o password incorrecto";
            include_once "PaginasVista/login.php";
        }

    }else if(strpos($usuario,"TNM",0)=== 0){

        if($user->userComprobacionAlumno($usuario,$pass)){

           //busca el nombre de la persona que se esta logeando
           $nombre_bienvenida = $user->BuscarNombreUsuario($usuario,4);

           //establece la session con los datos
           $sesion->setUser($usuario,4,$passwordigual);
           $sesion->setNombre($nombre_bienvenida);
           
           $user->setUser($sesion->getUser(), $sesion->getUserNivel());
           $user->setNombre($nombre_bienvenida);
           $user->setPasswordigual($passwordigual);
            
           if($usuario == $pass){
                include_once "PaginasVista/cambio_contrasena.html";
           }else{

                include_once "PaginasVista/principal_alumnos.html";
           }
           
           

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





