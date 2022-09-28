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
                    <img src="/logo_pagina/logo-tecnm-2018_orig.png" alt="" width="90%" >
                </div>
            </div>
            <!-- codigo php -->
                <?php
                    if(isset($errorLogin)){
                        echo "<p class=''>" . $errorLogin ."</p>";
                    }
                ?>
            <!--  ######################  -->
            <form class="inputs-container" action="" method="POST">
                <input class="input" type="text"  name="usuario" placeholder="Usuario">
                <input class="input" type="password" name="password" placeholder="Contraseña">
                <input  class="btn" type="submit" value="COMPROBAR">
                <!--<a class="btn" href="jefe_Control.html">COMPROBAR</a> -->
                <a href="">Olvidaste tu Contraseña</a>
            </form>
           
        </div>
    </div>
</body>
</html>