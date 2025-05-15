<?php
require 'conexion.php';
session_start();
if(isset($_POST['usuario'])&&isset($_POST['pass'])){
    $_SESSION['usuario']=$_POST['usuario'];
    $usuario_existe = $conn -> prepare('SELECT Nombre and Clave FROM usuarios WHERE Nombre = ? AND Clave = ?');
    $usuario_existe-> bind_param('ss',$_SESSION['usuario'],$_POST['pass']);
    $usuario_existe ->execute();

    $resultado_usuario = $usuario_existe -> get_result();

    if($resultado_usuario && $resultado_usuario -> num_rows>0){
        header('Location: menu.php');
    }else{
        echo 'Usuario o Contraseña invalidos';
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label>Usuario<input type="text" name="usuario"></label>
        <label>Contraseña<input type="password" name="pass"></label>
        <button type="submit">Iniciar Sesion</button>
    </form>
</body>
</html>