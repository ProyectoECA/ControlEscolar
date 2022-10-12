<?php
include_once "../CRUD/CRUD_bd_SQLServer.php";

class Consultas_Alumnos{
    function consultando(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();

        $salida="";
        $query="SELECT Alumnos.NoControl,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo
        FROM [Alumnos],[LugAlumnos],[Lugar]";
        $res=$cone->Buscar($query,$parametros);
            $cone->CerrarConexion();
        while($row=$res->fetch_assoc()){
            include_once("../PaginasVista/mostrar_datos_alumnos.php");
        }

        if(isset($_POST['consulta'])){
            $query="SELECT Alumnos.NoControl,Nombre,ApePaterno,ApeMaterno,Calle,Colonia,Municipio,Estado,Lugar.CP,Telefono,NomTutor,TelTutor,Correo
                FROM [Alumnos],[LugAlumnos],[Lugar] where 
                (Nombre like ? or Alumnos.NoControl like ? or ApePaterno like ? or ApeMaterno like ? or Municipio like ? or Estado like ? or Lugar.CP like ? or Correo like ?)
                and Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP";
            $parametros=array('%'.$dato.'%');
            $res=$cone->Buscar($query,$parametros);
            $cone->CerrarConexion();
        }

        if($res->num_rows>0){
            while($row=$res->fetch_assoc()){
                include_once("../PaginasVista/mostrar_datos_alumnos.php");
            }
        }

    }
}
?>