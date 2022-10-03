<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilo_muestra_datos_maestros.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
    <title>Datos Secretaria</title>
</head>
<body>
  <div class="Contenedor_titulo">
    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="17%" >
  </div>
  <div class="contenedor_titulo_2">
    <h1 class="titulo_de_tec">Tecnológico  Superior De Nochistlan</h1>
  </div>
  <form method="POST" action="/CambiarContraJC.php">
    <div class="datos" style="float: center;">
      <select name="tipo_consulta" id="tipo_consulta">
      <input class="input" type="text" placeholder="Contraseña Nueva" name="contra1">
      <input class="input" type="text" placeholder="Confirmación" name="contra2">
      <input class="btnBuscar" type="submit" value="GUARDAR" onclick="location.href='../ModificacionesBD/CambiaContrJC.php'">
    </div> 
    </form>


<?php

define("ServerName1", 'localhost');
define("Database1", "ConEscolarNoc");
define("UID1", "Admini");
define("PWD1", "control2022");
define("CharacterSet1", 'UTF-8');

class Cambio_Password  {

    function cambiaP_Jefe(){
            $pass = $_POST["contra1"];
            echo $pass;
            $pass1 = $_POST["contra2"];
            echo $pass1;

        $archivo= fopen("../ModificacionesBD/Archivo.txt","r") or die("Problema al abrir el archivo");
        while(!feof($archivo)){
            $user=fgets($archivo);
        }
        fclose($archivo);
        $user='RH000';
        if($pass==$pass1){
            echo "dentro de if";
            echo $pass;
            $password_hash = password_hash($pass, PASSWORD_DEFAULT);

            $connectionInfo = array("Database"=>Database1 , "UID"=>UID1, "PWD"=>PWD1, "CharacterSet"=>CharacterSet1);
            $conexion=sqlsrv_connect(ServerName1, $connectionInfo);
            
            $query="UPDATE LogAdmin SET PassAdm=? where UsuaAdm=?";
            $parametros=array($password_hash,$user);
            $stmt= sqlsrv_query($conexion,$query, $parametros);
    
            sqlsrv_close($conexion);
            echo "CONTRASEÑA CAMBIADA";

        }
        else{
            echo "LAS CONTRASEÑAS NO SON IGUALES";
        }
        
    }
}
$con=new Cambio_Password;
$con->cambiaP_Jefe();
?>