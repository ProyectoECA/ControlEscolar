<?php
$conn= new mysqli('localhost','root','','login');
if($conn->connect_error){
    die('Error de conexion: '.$conn->connect_error);
}
echo 'Conexion exitosa';
$nombre=$_POST['username'];
$pass=$_POST['password'];
//$pass=hash('sha512',$pass);


if (isset($_POST['registrar'])){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $sql="INSERT INTO almacena (usuario,correo) VALUES ('$nombre','$hash')";
    $result=$conn->query($sql);
    echo $hash;
    if($result){
        echo 'Usuario registrado';
        
    }else{
        echo 'Error al registrar usuario';
        
    }
}
if (isset($_POST['sesion'])){
    $sql="SELECT * FROM almacena WHERE usuario='$nombre'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            if(password_verify($pass,$row['correo'])){
                echo 'Usuario y contraseña correctos';
            }else{
                echo 'Usuario o contraseña incorrectos';
            }
        }
    }
}

$conn->close();