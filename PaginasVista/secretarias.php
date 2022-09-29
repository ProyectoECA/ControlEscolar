<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Secretaria</title>
    <link rel="stylesheet" href="/css/estilo_pagina_secretaria.css">
    <link rel="shortcut icon" href="/logo_pagina/Logo-TecNM.ico" type="image/x-icon">
</head>
<body>
    <div class="Contenedor_datos_secretaria">
        <div class="secre-datos-contenedor">
            <div class="social_secretaria">
                <div class="Imagen_de_registr">
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="30%" >
                </div>
            </div>
            <from class="cajas_de_texto_secretaria" action="/ModificacionesBD/InsertaSecre.php">
                <input class="caja_texto" type="text" placeholder="No.Empleado" id="numeroEmple"><br>
                <input class="caja_texto" type="text" placeholder="Nombre" id="nombre"><br>
                <input class="caja_texto" type="text" placeholder="Apellido paterno" id="apellidoP"><br>
                <input class="caja_texto" type="text" placeholder="Apellido materno"id="apellidoM"><br>
                <input class="caja_texto" type="text" placeholder="Calle y numero" id="calle"><br>
                <input class="caja_texto" type="text" placeholder="Colonia" id="colonia"><br>
                <input class="caja_texto" type="text" placeholder="Municipio" id="municipio"><br>
                <input class="caja_texto" type="text" placeholder="Estado" id="estado"><br>
                <input class="caja_texto" type="int" placeholder="Codigo postal" id="cp"><br>
                <input class="caja_texto" type="int" placeholder="No.Telefono" id="tel"><br>
                <input class="caja_texto" type="email" placeholder="Correo" id="correo">
            </from>
        </div>
    </div>
    <div class="botones">
        <button class="guardar_boton">Guardar</button>
        <button class="boton_cancelar">Cancelar</button>
    </div>

    
</body>
</html>