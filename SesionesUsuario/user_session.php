<?php

class UserSession{

    public function __construct()
    {
        session_start();

    }
    public function setUser($user,$nivel){
        $_SESSION['user'][0] = $user;
        $_SESSION['user'][1] = $nivel;

    }
    public function getUser(){
        return $_SESSION["user"][0];
    }
    public function getUserNivel()
    {
        return $_SESSION["user"][1];
    }
    public function closeSession(){
        session_unset();//borra lo que hay dentro de la sesion
        session_destroy();//destruye la secion
    }
}


?>