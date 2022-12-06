<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SECRETARIAS(OS)</title> 
    <link rel="stylesheet" href="/css/estilos_principal_secretarias.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body> 
    <form action="">
    <div class="nombre" style="float: center;"> 
            <div class="logo" style="float: left;">
            <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="100%">   
        </div>  
            <div class="tituloP" style="float: left;">
                <br><h1><b style="float: center;">TECNOLÓGICO DE NOCHISTLÁN</b></h1>  
            </div>  
            <div class="contenedor_der" style="float: right;">
                <div class="mostrar_usuario" style="float: center;"> 
                    <div class="imagen" style="float: left;">
                        <img src="/css/imagenes/Usuario.png" alt="" width="89%">
                    </div>  
                    <div class="texto" style="float: center;">
                        <!-- codigo php -->
                        <?php
                            if(isset($nombre_bienvenida)){
                                echo "<a href=''>Bienvenid@ $nombre_bienvenida</a>";
                            }
                        ?>
                        <!-- Codigo php     -->
                    </div>
                </div>
                <div class="contenedor"> 
                    <a href="../SesionesUsuario/logout.php"> 
                        <button class="boton_cerrar_sesion" type="button">CERRAR SESIÓN</button></a>

                    <a href="/PaginasVista/cambio_contrasena.html">
                    <button type="button" class="boton_cambiar_contraseña"> CAMBIAR CONTRASEÑA </button></a>
                </div>  
            </div>
        </div>   
        <!--**********************************-->  
        <div class="conte">
            <div class="contenedor-secretarias">
                <div class="contenedor-imageS">
                    <img src="/css/imagenes/Alumnos.png" alt="" width="90%"> 
                    <span class="titulo">ESTUDIANTES</span>
                </div> 
                <div class="botonesS" >
                    <button class="btn-registrar">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/alumnos_datos.php">REGISTRAR</b></span></a>
                    </button> 
    
                </div> 
                <div class="botonM" >
                    <button class="btn-modificar">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/modifica_alumnos2.html">MODIFICAR</b></span></a>
                    </button> 
                </div> 
                <div class="botonC" >
                    <button class="btn-consultar">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/mostrar_datos_alumnos.php">CONSULTAR</b></span></a>
                    </button> 
                </div>
            </div> 
    
            <div class="contenedor-maestros">
                <div class="contenedor-imageM">
                    <img src="/css/imagenes/carreras.png" alt="" width="63%">  
                    <span class="titulo">CARRERAS</span>
                </div> 
                <div class="botonesSCa" >
                    <button class="btn-registrarCa">
                        <div class="icono">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/registrar_carreras.html">   REGISTRAR</b></span></a>
                    </button> 
                </div>  
                <div class="botonMCa" >
                    <button class="btn-modificarCa">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/modificar_carreras.html">MODIFICAR</b></span></a>
                    </button> 
                </div> 
                <div class="botonCCa" >
                    <button class="btn-consultarCa">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/consulta_carreras.html">CONSULTAR</b></span></a>
                    </button> 
                </div> 
                <div class="botonRCa" >
                    <button class="btn-reticula">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/reticula.php">RETÍCULAS</b></span></a>
                    </button> 
                </div> 
            </div>
            
            <div class="contenedor-alumnos">
                <div class="contenedor-imageA" style="float: center;">
                    <img src="/img/calendario.jpg" alt="" width="100%"> 
                    <span class="titulo">PLANEACIÓN</span>
                </div> 
                <div class="botonesPla" >
                    <button class="btn-fechasP">
                        <div class="icono" style="margin-top: -15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 5">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/Fechas_planeada_de_corte.html">FECHAS PLANEADAS</b></span></a>
                    </button> 
                </div>
                <div class="botonCor" >
                    <button class="btn-fechasC">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/fechas_corte.php">FECHAS DE CORTE</b></span></a>
                    </button> 
                </div> 
                <div class="botonFin" >
                    <button class="btn-finalizar">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <!-- <span><b><a href="/PaginasVista/consulta_carreras.html">FINALIZAR SEMESTRE</b></span></a> -->
                        <span><b><a href="/PaginasVista/asignacion_reticula.php">FINALIZAR SEMESTRE</b></span></a>
                    </button> 
                </div> 
            </div>
            
            <div class="contenedor-materias">
                <div class="contenedor-imagenMat" style="float: center;">
                    <img src="/img/materias.jpg" alt="" width="100%"> 
                    <span class="titulo">MATERIAS</span>
                </div> 
                <div class="botonesRM" >
                    <button class="btn-registrarMat">
                        <div class="icono">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/registro_materias.php">   REGISTRAR</b></span></a>
                    </button> 
                </div>  
                <div class="botonMM" >
                    <button class="btn-modificarMat">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/modificar_materias.html">MODIFICAR</b></span></a>
                    </button> 
                </div> 
                <div class="botonCM" >
                    <button class="btn-consultarMat">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/consulta_materias.html">CONSULTAR</b></span></a>
                    </button> 
                </div>
                <div class="botonAs" >
                    <button class="btn-asignarM">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/asignacion_maestros.php">ASIGNAR</b></span></a>
                    </button> 
                </div>
                <div class="botonCU" >
                    <button class="btn-captura">
                        <div class="icono" style="margin-top: -5px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="5" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                            </svg>
                        </div>
                        <span><b><a href="/PaginasVista/captura_Unidades.php">CAPTURA UNIDADES</b></span></a>
                    </button> 
                </div>  
            </div>
        </div>
    </form>
    <script src="../SesionesUsuario/session_expiracion.js"></script>
</body>
</html>