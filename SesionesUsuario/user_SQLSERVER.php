<?php

//validar que existe el usuario
include_once '../CRUD/CRUD_bd_SQLServer.php';


class User extends CRUD_SQL_SERVER {
    private $nombre;
    private $username;

    public function InsertarUsuario($user, $pass, $correo){
        /** se hace uso de las transacciones para poder insertar en dos tablas a al vez */

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        
        /*Inicio de la transaccion */
        if ( sqlsrv_begin_transaction($this->conexion) === false ) {
            die( print_r( sqlsrv_errors(), true ));
        }

        /* colocamos y ejecutamos la primera insercion */
        $sql1 = "INSERT INTO [AdmCor] (UsuaAdm,Correo) VALUES(?,?)";
        $stmt1 = sqlsrv_query( $this->conexion, $sql1, array($user,$correo));

        /* colocamos y ejecutamos la segunda insercion */
        $sql2 = "INSERT INTO [LogAdmin] (UsuaAdm,PassAdm) VALUES(?,?)";
        $stmt2 = sqlsrv_query( $this->conexion, $sql2, array($user,$password_hash));

        /* si las dos ejecuciones funcionaron, hacemos la transaccion */
        /* si no jala  pondremos un rollback */
        if( $stmt1 && $stmt2 ) {
            sqlsrv_commit( $this->conexion );
            echo "Transaccion hecha<br />";
            return true;
        } else {
            sqlsrv_rollback( $this->conexion );
            echo "Transaccion rolled back.<br />";
            return false;
        }
    }
    public function userComprobacion($user, $pass){
        
        /**
         * este metodo sirve para saber si el usuario y la contraseña coinciden
         * con la que tenemos en la base de datos, y de ser asi, que se meta al sistema
         */
        $query = "SELECT * FROM [LogAdmin] WHERE UsuaAdm=?";
        $parametros = array($user);
        $datos = $this->Buscar($query, $parametros);
       

        if(password_verify($pass,trim($datos[0]["PassAdm"]))){
            echo "Entraste al sistema";

        }else{
            echo "Denegada";
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
    
}/*
$base = new User();
$base->conexionBD();
#$base->InsertarUsuario("HWR12",'12345',"maria@gmail.com");
$base->userComprobacion("HWR12",'12345');
#$base->InsertarUsuario("RH005",'12345',"mariana@gmail.com");
#$base->userComprobacion("RH005",'12345');

$base->CerrarConexion();

*/


?>