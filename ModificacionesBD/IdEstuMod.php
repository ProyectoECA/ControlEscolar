<?php

include_once "../CRUD/CRUD_bd_SQLServer.php";

class saca_IDEstu{
    function agrega_idEstu(){
        $cone=new CRUD_SQL_SERVER();
        $cone->conexionBD();


        $clave = $_POST["clave1"];
        $query="SELECT Alumnos.NoControl
        FROM [Alumnos],[LugAlumnos],[Lugar],[Carreras],[CarreAlumnos] where (Alumnos.NoControl=? and Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP and Alumnos.NoControl=CarreAlumnos.NoControl and Carreras.ClaveCa=CarreAlumnos.ClaveCa )";
        #FROM [Alumnos],[LugAlumnos],[Lugar] where (Alumnos.NoControl=? and Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP and Alumnos.NoControl=CarreAlumnos.NoControl)";
        $parametros=array($clave);
        $datos=$cone->Buscar($query,$parametros);

        if(empty($datos)){?>
                <script>
                    Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Datos inexistentes',
                    confirmButtonText: 'Aceptar',
                    timer:5000,
                    timerProgressBar:true,
                    }).then((result) => {
                    if (result.isConfirmed) {
                        location.href='../ModificacionesBD/IdEstuMod.php';
                    }
                    else{
                        location.href='../PaginasVista/modificar_alumnos.html';
                    }
                    window.history.back('../PaginasVista/principal_secretaria.php');})
                </script>
        <?php
        include_once("../PaginasVista/modificar_alumnos.html");
        }
        else{
                echo "FUE ENCONTRADO";
                $query="SELECT Alumnos.NoControl,Alumnos.Nombre,ApePaterno,ApeMaterno,Carreras.Nombre,CarreAlumnos.Semestre,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP,NomTutor,TelTutor
                FROM [Alumnos],[LugAlumnos],[Lugar],[Carreras],[CarreAlumnos] where (Alumnos.NoControl=? and Alumnos.NoControl=LugAlumnos.NoControl and LugAlumnos.CP=Lugar.CP and Alumnos.NoControl=CarreAlumnos.NoControl and Carreras.ClaveCa=CarreAlumnos.ClaveCa )";
                $parametros=array($clave);
                $stmt2 = sqlsrv_query($conexion, $query,$parametros);
                $row=sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC);
                include_once("ConsultaModiEstu.php");
            }
    }


}

$id=new saca_IDEstu;
$id->agrega_idEstu();
?>

