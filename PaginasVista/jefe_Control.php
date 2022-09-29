<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JEFE ADMINISTRATIVO</title> 
    <link rel="stylesheet" href="../css/stile_jefe.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head> 
<body> 
    <div class="logo" style="float: left;">
        <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
    </div> 
    <div class="nombre" style="float: center;">
        <h1><b>TECNOLOGICO DE NOCHISTLAN</b></h1>
    </div> 
    <div class="conte">
        <div class="contenedor-secretarias">
            <div class="contenedor-imageS">
                <img src="/img/Secretarias.jpg" alt="" width="90%"> 
                <span class="titulo">SECRETARIAS</span>
            </div> 
            <div class="botonesS" >
                <button class="btn-registrar">
                    <div class="icono" style="margin-top: -5px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </div>
                    <span><b><a href="PaginasVista/secretarias.php">REGISTRAR</b></span></a>
                </button> 

            </div>
        </div> 

        <div class="contenedor-maestros">
            <div class="contenedor-imageM">
                <img src="/img/Maestros.png" alt="" width="100%">  
                <span class="titulo">MAESTROS</span>
            </div> 
            <div class="botonesS" >
                <button class="btn-registrar">
                    <div class="icono">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </div>
                    <span><b><a href="maestros_datos_per.php">   REGISTRAR</b></span></a>
                </button> 
            </div> 
        </div>
        
        <div class="contenedor-alumnos">
            <div class="contenedor-imageA" style="float: center;">
                <img src="/img/Alumnos.png" alt="" width="92%"> 
                <span class="titulo">ALUMNOS</span>
            </div> 
            <div class="botonesS" >
                <button class="btn-registrar">
                    <div class="icono">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 5">
                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                        </svg>
                    </div>
                    <span><b><a href="mostrar_datos_alumnos.php">CONSULTAR</b></span></a>
                </button> 
            </div>
        </div>
    </div>  
    <div class="contenedor">

    <button type="submit" class="boton_cambiar_contraseña"  onclick="openPopup()"> Cambiar contraseña </button>
        <div class="popup" id="popup">
                <input class="input" type="password" placeholder="Contraseña Nueva"><br>
                <input class="input" type="password" placeholder="Confirmacion">
                <button class="boton_guardar" type="button" onclick="closePopup()">Guardar</button>
        </div> 
    </div>  
    <div>
        <button class="boton_cerrar_sesion" type="button">Cerrar sesión</button>
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