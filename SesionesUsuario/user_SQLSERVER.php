<?php

//validar que existe el usuario
include_once 'CRUD/CRUD_bd_SQLServer.php';


class User extends CRUD_SQL_SERVER {

    private $username;
    private $nivel;
    private $nombre;
    
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

    public function BuscarNombreUsuario($clave,$nivel)
    {
        # busca el nombre de la persona que se esta logeando

        if($nivel == 1 ){
            return "Administrador";
        }else{

            $this->conexionBD();
            switch($nivel){
            case 2:
                $query = "SELECT Nombre FROM [Secretarias] WHERE IdSec=?";
                break;
            case 3:
                $query = "SELECT Nombre FROM [Maestros] WHERE ClaveMa=?";
                break;
            case 4:
                $query = "SELECT Nombre FROM [Alumnos] WHERE NoControl=?";
                break;
                
            }
            $parametros = array($clave);
            $datos = $this->Buscar($query, $parametros);
            $this->CerrarConexion();

            return $datos[0][0];
        

        

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
    public function setNombre($nombre)
    {
        # code...
        $this->nombre = $nombre;
    }
    public function getUsername(){
        return $this->username;
    }
    public function getNivel(){
        return $this->nivel;
    }
    public function getNombre(){
        return $this->nombre;
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