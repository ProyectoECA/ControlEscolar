<?php

include_once '../CRUD/CRUD_bd_SQLServer.php';

class Inserta_Maestros  extends CRUD_SQL_SERVER{

    function Insertando(){
        $this->conexionBD();

        $clave = $_POST["clave"]; 
        $nombre = $_POST["nombre"]; 
        $apePaterno = $_POST["apePat"]; 
        $apeMaterno = $_POST["apeMat"]; 
        $calle = $_POST["calle"]; 
        $colonia = $_POST["colonia"]; 
        $municipio = $_POST["municipio"]; 
        $estado = $_POST["estado"]; 
        $cp = $_POST["cp"]; 
        $telefono = $_POST["telefono"]; 
        $rfc = $_POST["rfc"]; 
        $titulo = $_POST["titulo"]; 
        $correo = $_POST["correo"]; 
        
        $query= "INSERT INTO [Maestros], (ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC, Titulo,Telefono,Correo,Calle,Colonia) VALUES (?,?,?,?,?,?,?,?,?,?)";
        $parametros=array($clave,$nombre,$apePaterno,$apeMaterno,$rfc,$titulo,$telefono,$correo,$calle,$colonia);

        #INSERTA EN LA TABLA SECRETARIAS
        $this->Insertar_Eliminar_Actualizar($query,$parametros);

        #VERIFICA SI YA ESTA REGISTRADO EL MUNICIPIO EN LA BD
        $query="SELECT * FROM [Lugar] where cp=?";
        $cp='99720';
        echo $cp;
        $parametros=array($cp);
        $datos = $this->Buscar($query,$parametros);
        echo "BUSCANDO CODIGO";
        if(count($datos) > 0){
             #HACE LA RELACION DEL MAESTRO CON LUGAR   TABLA LUGMAESTROS
            $query="INSERT INTO [LugMaestros], (ClaveMa, CP)";
            $parametros=array($clave,$cp);
            $this->Insertar_Eliminar_Actualizar($query,$parametros);
            echo "SI EXISTE EL CODIGO POSTAL";

        }
        else{
            #INSERTA EL CP, MUNICIPIO Y ESTADO EN LUGAR
            $query="INSERT INTO [Lugar], (CP, Municipio, Estado)";
            $parametros=array($cp, $municipio, $estado);
            $this->Insertar_Eliminar_Actualizar($query,$parametros);
            
            #HACE LA RELACION DEL MAESTRO CON LUGAR   TABLA LUGMAESTROS
            $query="INSERT INTO [LugMaestros], (ClaveMa, CP)";
            $parametros=array($clave,$cp);
            $this->Insertar_Eliminar_Actualizar($query,$parametros);
            echo "NO EXISTE EL CODIGO POSTAL";

            #INSERTA EL USUARIO Y CONTRASEÑA
            $query="INSERT INTO [Lugar], (CP, Municipio, Estado)";
            $parametros=array($cp, $municipio, $estado);
            $this->Insertar_Eliminar_Actualizar($query,$parametros);

            
        }
        $this->CerrarConexion();
    }

        



        

    } 

    


?>