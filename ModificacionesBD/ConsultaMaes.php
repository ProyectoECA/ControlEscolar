<?php

class Consultas_Maestros{
    function consultando(){
        $serverName='localhost';
        $connectionInfo=array("Database"=>"ConEscolarNoc", "UID"=>"Admini", "PWD"=>"control2022", "CharacterSet"=>"UTF-8");
        $con = sqlsrv_connect($serverName, $connectionInfo); 


        #CONSULTA GENERAL
        $salida="";
        $query="SELECT Maestros.ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
                FROM [Maestros],[LugMaestros],[Lugar] where Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP";

        #CONSULTA INTELIGENTE
        if(isset($_POST['consulta'])){
            $q=($_POST['consulta']);
            $query="SELECT Maestros.ClaveMa,Nombre,ApePaterno,ApeMaterno,RFC,Titulo,Telefono,Correo,Calle,Colonia,Municipio,Estado,Lugar.CP
                FROM [Maestros],[LugMaestros],[Lugar] where (Maestros.ClaveMa=LugMaestros.ClaveMa and LugMaestros.CP=Lugar.CP) AND
                (Maestros.ClaveMa like '%".$q."%' OR RFC like '%".$q."%' OR Nombre like '%".$q."%' OR ApePaterno like '%".$q."%' OR ApeMaterno like '%".$q."%'  
                OR Municipio like '%".$q."%' OR Estado like '%".$q."%' OR Lugar.CP like '%".$q."%' OR Correo like '%".$q."%')
                ORDER BY Maestros.ClaveMa";
        }

        $res=sqlsrv_query($con, $query);
        //$cone->CerrarConexion();
        if($res==true){
            $salida.=
            "<table>
            <thead>
               <tr>
                  <th>Clave </th>
                  <th>Nombre </th>
                  <th>Apellido Paterno </th>
                  <th>Apellido Materno </th>
                  <th>Calle y Número </th>
                  <th>Colonia</th>
                  <th>Municipio</th>
                  <th>Estado</th>
                  <th>Código Postal</th>
                  <th>Teléfono </th>
                  <th>RFC</th>
                  <th>Titulo</th>
                  <th>Correo</th>
               </tr>
            </thead>
            <tbody>";
            while( $row = sqlsrv_fetch_array($res)){
                $clav=$row['ClaveMa'];
                $nom=$row['Nombre'];
                $ap=$row['ApePaterno'];
                $am=$row['ApeMaterno'];
                $calle=$row['Calle'];
                $colonia=$row['Colonia'];
                $muni=$row['Municipio'];
                $est=$row['Estado'];
                $cp=$row['CP'];
                $tel=$row['Telefono'];
                $rfc=$row['RFC'];
                $tit=$row['Titulo'];
                $email=$row['Correo'];

                $salida.=
                "<tr>
                    <th>$clav</th> 
                    <th>$nom</th> 
                    <th>$ap</th> 
                    <th>$am</th> 
                    <th>$calle</th> 
                    <th>$colonia</th> 
                    <th>$muni</th> 
                    <th>$est</th> 
                    <th>$cp</th> 
                    <th>$tel</th> 
                    <th>$rfc</th> 
                    <th>$tit</th> 
                    <th>$email</th>
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

$con=new Consultas_Maestros;
$con->consultando();
?>
