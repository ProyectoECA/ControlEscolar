<?php

class UserSession{

    public function __construct()
    {
        session_start();

    }
    public function setUser($user,$nivel,$estadoPassword){
        $_SESSION['user'][0] = $user;
        $_SESSION['user'][1] = $nivel;
        $_SESSION['LAST_ACTIVITY'] = time();
        $_SESSION['user'][3] = $estadoPassword;


    }
    public function setNombre($nombre){
        $_SESSION['user'][2] = $nombre;
    }
    
    public function getNombre()
    {
        # obtiene el nombre
        return $_SESSION['user'][2];
    }
    public function getPasswordigual()
    {
        // obtenemos si la passwor es igual
        return $_SESSION['user'][3];
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