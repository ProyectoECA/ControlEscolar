<?php

class UserSession{

    public function __construct()
    {
        session_start();

    }
    public function setUser($user,$nivel){
        $_SESSION['user'][0] = $user;
        $_SESSION['user'][1] = $nivel;
        $_SESSION['LAST_ACTIVITY'] = time();

    }
    public function getUser(){
        return $_SESSION["user"][0];
    }
    public function getUserNivel()
    {
        return $_SESSION["user"][1];
    }
    public function setNombre($nombre){
        $_SESSION['user'][2] = $nombre;
    }

    public function getNombre()
    {
        # code...
        return $_SESSION['user'][2];
    }
    public function closeSession(){
        session_unset();//borra lo que hay dentro de la sesion
        session_destroy();//destruye la secion
    }
}


?>