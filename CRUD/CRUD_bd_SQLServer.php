<?php

define("ServerName", 'localhost');
define("Database", "ConEscolarNoc");
define("UID", "Admini");
define("PWD", "control2022");
define("CharacterSet", 'UTF-8');


class CRUD_SQL_SERVER{

    protected $conexion;

    public function conexionBD(): void{
        //crea la conexion con la base de datos que esta en el sql server
        try {
            
            $connectionInfo = array("Database"=>Database , "UID"=>UID, "PWD"=>PWD, "CharacterSet"=>CharacterSet);
            $this->conexion=sqlsrv_connect(ServerName, $connectionInfo);

        } catch (Exception $e) {

            die(print_r(sqlsrv_errors(), true));
            echo "Linea del error " . $e->getLine();
        }
    }

    public function Buscar($query, ?array $parametros = null){
        /**
         * Busca en la base de datos, con una queri y los parametros que son opcionales
         */
        try {

            $stmt = sqlsrv_query($this->conexion, $query, $parametros);

            if ($stmt === false) {
                if (($errors = sqlsrv_errors()) != null) {
                    foreach ($errors as $error) {
                        echo "SQLSTATE: ".$error['SQLSTATE']."<br />";
                        echo "code: ".$error['code']."<br />";
                        echo "message: ".$error['message']."<br /> mmm";
                    }
                }
            }else{
                $datos= array();
                while($row = sqlsrv_fetch_array($stmt)) {
                    
                    
                    $datos[] = $row; 
                   
                }

                /*for ($i=0; $i < count($datos) ; $i++) { 
                    echo $datos[$i]["CP"];
                    echo $datos[$i]["Municipio"];
                    echo $datos[$i]["Estado"];

                }*/
                return $datos;

            }
            
        } catch (Exception $e) {
            die(print_r(sqlsrv_errors(), true));
            echo "Linea del error " . $e->getLine();
        }
        
       
    }

    public function Insertar_Eliminar_Actualizar($query, $parametros){
        try {

            $stmt = sqlsrv_query($this->conexion, $query, $parametros);

            if ($stmt === false) {
                if (($errors = sqlsrv_errors()) != null) {
                    foreach ($errors as $error) {
                        echo "SQLSTATE: ".$error['SQLSTATE']."<br />";
                        echo "code: ".$error['code']."<br />";
                        echo "message: ".$error['message']."<br /> mmm";
                    }
                }
                return false;
            }else{
                return true;
            }
            
        } catch (Exception $e) {
            die(print_r(sqlsrv_errors(), true));
            echo "Linea del error " . $e->getLine();
        }
    }

    public function CerrarConexion(){
        sqlsrv_close($this->conexion);
    }

}
/*$objeto = new CRUD_SQL_SERVER();
$objeto->conexionBD();
#$objeto->Buscar("SELECT * FROM [Lugar]  WHERE CP=?", array("99300"));
#var_dump($objeto->Buscar("SELECT * FROM [Lugar]"));
#$objeto->Insertar_Eliminar_Actualizar("INSERT INTO [Lugar] (CP,Municipio,Estado) VALUES(?,?,?)", array("99700","Tlaltenango", "Estado"));
#$objeto->Insertar_Eliminar_Actualizar("UPDATE [Lugar] SET Estado=? WHERE CP=?", array("Nata", "99700"));
#echo $objeto->Insertar_Eliminar_Actualizar("DELETE [Lugar] WHERE CP=?", array("99700"));

$objeto->conexion = null;
*/
    






?>