<?php

include_once("Clase_carreras.php");
$conexion_carreras = new Carreras();
$conexion_carreras->conexionBD();


if (isset($_POST['boton'])) {

    $identificador_boton = $_POST['boton'];

    if(isset($_POST['clave_buscar'])  && $identificador_boton == 1){
        //cuando va a buscar un dato
        
        $clave = $_POST['clave_buscar'];
     
        $data = ["clave"=> null,"nombre"=>null, "numero_semestres"=>null, "mensaje"=>"Carrera no encontrada"];
     
             
        $resultado = $conexion_carreras->BuscarCarrera($clave);
     
        if(count($resultado) > 0){
            $data = ["clave"=> $resultado[0]['ClaveCa'],"nombre"=>$resultado[0]['Nombre'],  "numero_semestres"=>$resultado[0]['Semestre'], "mensaje"=>"Se han encontrado los datos"];
    
        }
         
     
         header("Content-Type: application/json");
         echo json_encode($data);
     
     }else if(isset($_POST['clave']) && isset($_POST['nombre']) && isset($_POST['semestres'])&& $identificador_boton == 2 ){
        //cuando va actualizar un registro
        $clave = $_POST['clave'];
        $nombre = $_POST['nombre'];
        $semestre = $_POST['semestres'];
    
        $mensaje = $conexion_carreras->ActualizarCarreras($clave,$nombre,$semestre);
        $data = ["mensaje"=>$mensaje];
        header("Content-Type: application/json");
        echo json_encode($data);
    
    }else if(isset($_POST['clave']) && $identificador_boton == 3){
        //cuando va actualizar un registro
        $clave = $_POST['clave'];
    
        $mensaje = $conexion_carreras->EliminarCarreras($clave);
        $data = ["mensaje"=>$mensaje];
        header("Content-Type: application/json");
        echo json_encode($data);
    
    }
   
    
    
}

$conexion_carreras->CerrarConexion();




?>