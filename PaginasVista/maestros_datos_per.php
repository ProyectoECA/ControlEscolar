<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Maestros</title>
    <link rel="stylesheet" href="/css/estilo_datos_mestros.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_datos_maestros">
        <div class="maestros-datos-contenedor">
            <div class="social_maestros">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="30%" >
                </div>
            </div>
            <form class="cajas_de_texto_maestros"  action="/ModificacionesBD/InsertaMaes.php" method ="POST">
                <input class="caja_texto" type="text" placeholder="Clave" id="clave"><br>
                <input class="caja_texto" type="text" placeholder="Nombre" id="nombre"><br>
                <input class="caja_texto" type="text" placeholder="Apellido paterno" id="apePat"><br>
                <input class="caja_texto" type="text" placeholder="Apellido materno" id="apeMat"><br>
                <input class="caja_texto" type="text" placeholder="Calle y número" id="calle"><br>
                <input class="caja_texto" type="text" placeholder="Colonia" id="colonia"><br>
                <input class="caja_texto" type="text" placeholder="Municipio" id="munnicipio"><br>
                <input class="caja_texto" type="text" placeholder="Estado" id="estado"><br>
                <input class="caja_texto" type="int" placeholder="Código postal" id="cp"><br>
                <input class="caja_texto" type="int" placeholder="No.Teléfono" id="telefono"><br>
                <input class="caja_texto" type="text" placeholder="RFC" id="rfc"><br>
                <input class="caja_texto" type="text" placeholder="Titulo" id="titulo"><br>
                <input class="caja_texto" type="email" placeholder="Correo" id="correo">
            </form>
        </div>
    </div>
    <div class="botones">
        <a id="guardar_boton" href="/ModificacionesBD/InsertaMaes.php">Guardar</a>
        <a id="boton_cancelar" href="jefe_Control.php">Cancelar</a>
    </div>

    
</body>
</html>