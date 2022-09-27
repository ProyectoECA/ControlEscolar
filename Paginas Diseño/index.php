<?php

include_once "../SesionesUsuario/user_SQLSERVER.php";
include_once "../SesionesUsuario/user_session.php";


$userSession = new UserSession();
$user = new User();
//si existe la secion entonces ....
if (isset($_SESSION['user'])) {
    $user->setUser($userSession->getCurrentUser());
    include_once 'vistas/home.php';
}else if(isset($_POST['username']) && isset($_POST['password'])){

    //echo 'Validacion del login';
    $userForm =$_POST['username'];
    $passForm = $_POST['password'];

    if($user->userExist($userForm,$passForm)){
        //echo "usuario validado";
        $userSession->setCurrentUser($userForm);
        $user->setUser($userForm);
        include_once 'vistas/home.php';
    }else{
        //echo "nombre de usuario o password incorrecto";
        $errorLogin ="Nombre de usuario y/o password incorrecto";
        include_once 'vistas/login.php';
    }

}else{
    //echo "login";
    include_once 'vistas/login.php';
}







?>





