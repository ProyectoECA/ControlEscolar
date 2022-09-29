<?php

//validar que existe el usuario
include_once 'CRUD/CRUD_bd_SQLServer.php';


class User extends CRUD_SQL_SERVER {

    private $username;
    private $nivel;
    
    public function userComprobacionSecretaria($user, $pass)
    {
        $this->conexionBD();
        $query = "SELECT * FROM [LogSecretarias] WHERE IdSec=?";
        $parametros = array($user);
        $datos = $this->Buscar($query, $parametros);
        $this->CerrarConexion();

        if(count($datos) > 0){
            if(password_verify($pass,trim($datos[0]["PassSec"]))){

                $this->setUser($user,2);
                return true;
            }else{
                return false;
            }

        }else{
            return false;
        }
    }

    public function userComprobacionMaestro($user, $pass)
    {
        $this->conexionBD();
        $query = "SELECT * FROM [LogMaestros] WHERE ClaveMa=?";
        $parametros = array($user);
        $datos = $this->Buscar($query, $parametros);
        $this->CerrarConexion();
        
        if(count($datos) > 0){
            if(password_verify($pass,trim($datos[0]["PassMa"]))){
                $this->setUser($user,3);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    

    public function userComprobacionAlumno($user, $pass)
    {
        $this->conexionBD();
        $query = "SELECT * FROM [LogAlumnos] WHERE NoControl=?";
        $parametros = array($user);
        $datos = $this->Buscar($query, $parametros);
        
        $this->CerrarConexion();

        if(count($datos) > 0){
            if(password_verify($pass,trim($datos[0]["PassAlu"]))){
                
                $this->setUser($user,4);

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

    }
    
    public function userComprobacionAdmin($user, $pass){
        
        /**
         * este metodo sirve para saber si el usuario y la contraseña coinciden
         * con la que tenemos en la base de datos, y de ser asi, que se meta al sistema
         */
        $this->conexionBD();
        $query = "SELECT * FROM [LogAdmin] WHERE UsuaAdm=?";
        $parametros = array($user);
        $datos = $this->Buscar($query, $parametros);
        $this->CerrarConexion();
        //var_dump($datos[0]["PassAdm"]);

        if(count($datos) > 0){
            if(password_verify($pass,trim($datos[0]["PassAdm"]))){
                $this->setUser($user,1);
 
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }

        
        
    
    }

    public function setUser($user,$nivel)
    {
        /**
         * coloca en las variables de sesion el nombre del usuario y su usuario
         */
        $this->username = $user;
        $this->nivel = $nivel;
        
    }
    public function getUsername(){
        return $this->username;
    }
    public function getNivel(){
        return $this->nivel;
    }
 
    
}
/*$base = new User();
$base->conexionBD();
$base->userComprobacionAdmin("RH000","123");
#$base->userComprobacion("H2345","8900");
#$base->InsertarUsuario("HWR12",'12345',"maria@gmail.com");
#$base->Insertar_Eliminar_Actualizar("INSERT INTO [AdmCor] (UsuaAdm,Correo) VALUES(?,?)", array("H2345","soloun@gmail.com"));
#$base->Insertar_Eliminar_Actualizar("INSERT INTO [LogAdmin] (UsuaAdm,PassAdm) VALUES(?,?)",array("H2345","8900"));
#$base->userComprobacion("HWR12",'12345');
#$base->InsertarUsuario("RH005",'12345',"mariana@gmail.com");
#$base->userComprobacion("RH005",'12345');

$base->CerrarConexion();*/




?>