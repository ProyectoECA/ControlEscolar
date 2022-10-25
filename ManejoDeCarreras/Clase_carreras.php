<?php
include_once("../CRUD/CRUD_bd_SQLServer.php");

class Carreras extends CRUD_SQL_SERVER{

    public function insertar_carrera($clave, $nombre, $numero_semestres)
    {
        $parametros=array($clave);
        $query="SELECT Nombre FROM [Carreras] WHERE ClaveCa=?";
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

    public function BuscarCarrera($clave)
    {
        #muestro los datos de la carrera
        $parametros=array($clave);
        $query="SELECT * FROM [Carreras] WHERE ClaveCa=?";
        $datos = $this->Buscar($query,$parametros);

        return $datos;

    }

    public function ActualizarCarreras($clave,$nombre,$numero_semestres)
    {
        #actualiza la carrera
        $resultado = $this->BuscarCarrera($clave);
        if(count($resultado) > 0){
            $parametros=array($nombre,$numero_semestres,$clave);
            $query="UPDATE [Carreras] SET Nombre=?, Semestre=? WHERE ClaveCa=?";
            $seCambio = $this->Insertar_Eliminar_Actualizar($query,$parametros);

            if($seCambio){
                return "La carrera se actualizo con exito";
            }else{
                return "La carrera no se pudo actualizar";
            }
        }else{
            return "La carrera que intenta actualizar no existe";
        }
        
    }

    public function EliminarCarreras($clave)
    {
        #elimina la carrera
        $resultado = $this->BuscarCarrera($clave);
        if(count($resultado) > 0){
            $parametros=array($clave);
            $query="DELETE [Carreras] WHERE ClaveCa=?";
            $seCambio = $this->Insertar_Eliminar_Actualizar($query,$parametros);

            if($seCambio){
                return "La carrera se elimino con exito";
            }else{
                return "La carrera no se pudo eliminar";
            }
        }else{
            return "La carrera que intenta eliminar no existe";
        }
    }

}





?>
