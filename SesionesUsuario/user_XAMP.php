<?php

//validar que existe el usuario
include_once '../CRUD/CRUD_bd_general.php';
class User extends CRUD_general {
    private $nombre;
    private $username;

    public function userExist($user, $pass){
        //$md5pass = md5($pass);
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $query = $this->conexionBD()->prepare("SELECT * FROM usuarios_pass WHERE USUARIOS=:user AND PASSWORD= :pass");
        $query->execute(['user'=>$user, "pass"=>$password]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    
    }

    public function setUser($user)
    {
        $query = $this->conexionBD()->prepare("SELECT * FROM usuarios_pass WHERE USUARIOS=:user");
        $query->execute(['user'=>$user]);
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['USUARIOS'];
            $this->username = $currentUser['Perfil'];
           
        }
    }
    public function getNombre(){
        return $this->nombre;
    }
    
}


?>