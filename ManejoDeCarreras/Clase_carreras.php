<?php
include_once("../CRUD/CRUD_bd_SQLServer.php");

class Carreras extends CRUD_SQL_SERVER{

    public function insertar_carrera($clave, $nombre, $numero_semestres)
    {
        $parametros=array($clave);
        $query="SELECT * FROM [Carreras]";
        $exite = $this->Buscar($query,$parametros);

        if(count($exite) > 0 ){
            
            return "La carrera que usted intenta insertar ya existe";
        }else{
            $query = "INSERT INTO [Carreras] (ClaveCa,Nombre,Semestre) VALUES(?,?,?)";
            $parametros = array($clave,$nombre,$numero_semestres);
            $seInserto = $this->Insertar_Eliminar_Actualizar($query,$parametros);

            if($seInserto){

                return "La carrera se inserto exitosamente";

            }else{
                return "La carrera no pudo ser registrada";
            }
        }
    }

}





?>
