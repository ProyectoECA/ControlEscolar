<?php

include_once("Clase_carreras.php");

if(isset($_POST["clave_carrera"]) && isset($_POST["nombre_carrera"]) && isset($_POST["cantidad_semestres_carrera"])){
    echo "a";
    $clave = $_POST["clave_carrera"];
    $nombre = $_POST["nombre_carrera"];
    $cantidad_semestres = $_POST["cantidad_semestres_carrera"];

    $conexion = new Carreras();
    $conexion->conexionBD();
    $mensaje = $conexion->insertar_carrera($clave,$nombre,$cantidad_semestres);
    $conexion->CerrarConexion();

    //header("Location: http://localhost/PaginasVista/registrar_carreras.php/mensaje='as'");
    echo "<script language='javascript'>alert('$mensaje');window.location.href='http://localhost/PaginasVista/registrar_carreras.html'</script>";
}


?>