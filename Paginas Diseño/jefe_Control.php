<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEFE ADMINISTRATIVO</title> 
    <link rel="stylesheet" href="/css/stile_jefe.css">
</head>
<body> 
    <div class="logo">
        <img src="/logo_pagina/Logo-TecNM.ico" alt="" width="20%">
    </div>
    <nav>
        <ul class="menu-horizontal">
            <li>
                <a href="">SECRETARIAS</a> 
                <ul class="menu-vertical">
                    <li><a href="secretarias.html">REGISTRAR</a></li>
                    <li><a href="mostrar_datos_secretarias.html">CONSULTAR</a></li> 
                    <li><a href="">MODIFICAR</a></li>
                </ul>
            </li>
            <li>
                <a href="">MAESTROS</a>
                <ul class="menu-vertical">
                    <li><a href="">REGISTRAR</a></li>
                    <li><a href="mostrar_datos_maestros.html">CONSULTAR</a></li> 
                    <li><a href="">MODIFICAR</a></li>
                </ul>
            </li>
            <li>
                <a href="">ALUMNOS</a>
                <ul class="menu-vertical">  
                    <li><a href="mostrar_datos_alumnos.html">CONSULTAR</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div class="contenedor">

        <button type="submit" class="boton_cambiar_contraseña"  onclick="openPopup()"> Cambiar contraseña </button>
        <div class="popup" id="popup">
            <immg src="/logo_pagina/Logo-TecNM.ico" width="50%">
                <input class="input" type="password" placeholder="Contraseña Nueva"><br>
                <input class="input" type="password" placeholder="Confirmacion">
                <button class="boton_guardar" type="button" onclick="closePopup()">Guardar</button>
        </div>

    </div>
    <script>
        let popup=document.getElementById("popup");

        function openPopup(){
           popup.classList.add("open-popup"); 
        }
        function closePopup(){
           popup.classList.remove("open-popup"); 
        }
    </script>
</body>
</html>