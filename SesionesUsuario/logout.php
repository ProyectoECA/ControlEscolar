<?php
    include_once 'user_session.php';

    $userSession = new UserSession();
    $userSession->closeSession();
    //elimina la ruta anterior para dirigirnos a la ruta que tiene el index.php
    header_remove("http://localhost/sesionesUsuario");
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'index.php';
    header("Location: http://$host/$extra");
    exit;    

?>