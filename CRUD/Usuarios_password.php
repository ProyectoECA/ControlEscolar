<?php
include_once '../CRUD/CRUD_bd_SQLServer.php';

class User_password extends CRUD_SQL_SERVER{

    public function InsertarUsuarioAdministrador($user, $pass, $correo){
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
    public function InsertarUsuarioSecretaria($user, $pass){
        /** se hace uso de las transacciones para poder insertar en dos tablas a al vez */

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $resultado = $this->Insertar_Eliminar_Actualizar("INSERT INTO LogSecretarias (IdSec,PassSec) VALUES(?,?)", array($user,$password_hash));
        
        return $resultado;
    }
    public function InsertarUsuarioMaestro($user, $pass){
        /** se hace uso de las transacciones para poder insertar en dos tablas a al vez */

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $resultado = $this->Insertar_Eliminar_Actualizar("INSERT INTO LogMaestros (ClaveMa,PassMa) VALUES(?,?)", array($user,$password_hash));
        
        return $resultado;
    }

    public function InsertarUsuarioAlumno($user, $pass){
        /** se hace uso de las transacciones para poder insertar en dos tablas a al vez */

        $password_hash = password_hash($pass, PASSWORD_DEFAULT);
        
        $resultado = $this->Insertar_Eliminar_Actualizar("INSERT INTO LogAlumnos (NoControl,PassAlu) VALUES(?,?)", array($user,$password_hash));
        
        return $resultado;
    }
}
/*
$user = new User_password();
$user->conexionBD();
$user->InsertarUsuarioAdministrador("RH000", "123","maria@gmail.com"); 
#$user->InsertarUsuarioAlumno("TNM1234567890", "0987");
#$user->InsertarUsuarioMaestro("RH012", "3456");
#$user->InsertarUsuarioSecretaria("RH002","RH002");
$user->CerrarConexion();

*/
?>