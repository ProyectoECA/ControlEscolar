<?php
class ConsultaMat{
    function consultando(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT Materias.ClaveMat,Nombre,Creditos,Unidades,Objetivos,Materias.semestre,NombreCarre
        FROM Materias,Carreras,CarreMaterias where CarreMaterias.ClaveCa=Carreras.ClaveCa and
		CarreMaterias.ClaveMat=Materias.ClaveMat";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT Materias.ClaveMat,Nombre,Creditos,Unidades,Objetivos,Materias.semestre,NombreCarre
            FROM Materias,Carreras,CarreMaterias where CarreMaterias.ClaveCa=Carreras.ClaveCa and
		    CarreMaterias.ClaveMat=Materias.ClaveMat and
            (Materias.ClaveMat like '%".$q."%' OR Nombre like '%".$q."%' OR NombreCarre like '%".$q."%' 
            OR Unidades like '%".$q."%' OR Materias.semestre like '%".$q."%') ORDER BY Materias.ClaveMat";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
                   <th>Clave</th>
                   <th>Nombre</th>
                   <th>Créditos</th>
                   <th>Carrera</th>
                   <th>Semestre</th>
                   <th>No. Unidades</th>
                   <th>Objetivos</th>
               </tr>
            </thead>
            <tbody>";
            while($row = sqlsrv_fetch_array($res)){
                $clave=$row['ClaveMat'];
                $nom=$row['Nombre'];
                $cred=$row['Creditos'];
                $carre=$row['NombreCarre'];
                $sem=$row['semestre'];
                $uni=$row['Unidades'];
                $obj=$row['Objetivos'];

                $salida.=
                "<tr>
                    <th>$clave</th> 
                    <th>$nom</th> 
                    <th>$cred</th> 
                    <th>$carre</th>
                    <th>$sem</th>
                    <th>$uni</th>
                    <th>$obj</th>
                </tr>";
            }
            $salida.="
            </tbody>
            </table>";
        }
        else{
            $salida="Sin coincidencias";
        }
        echo $salida;
    }
}

$con=new ConsultaMat;
$con->consultando();
?>