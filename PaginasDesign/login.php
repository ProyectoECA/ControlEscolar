<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/estilos_login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <div class="login-info-container">
            <div class="social-login">
                <div class="image">
                    <img src="/logo_pagina/Logo-TecNM.ico" alt="" width="90%" >
                </div>
            </div>
            <form action="../baseDatosArchivoBacpac/InicioSesion.php" class="inputs-container">
                <input class="input" type="text" placeholder="Usuario" id="Usua">
                <input class="input" type="password" placeholder="Contraseña" id="Contra">
                <a class="btn" href="../baseDatosArchivoBacpac/InicioSesion.php">COMPROBAR</a> 
                <a href="">Olvidaste tu Contraseña</a>
            </form>
        </div>
    </div>
</body>
</html>