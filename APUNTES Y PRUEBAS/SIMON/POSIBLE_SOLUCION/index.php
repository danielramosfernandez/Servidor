<?php
session_start();
require_once 'login.php'

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>VAMOS A JUGAR AL SIMÓN!!!!</h1>
    <form action="#" method="post">
        <label for="usu">Usuario: </label>
        <input type="text" id="usu" name="usu" required><br>
        <label for="usu">Contraseña: </label>
        <input type="password" id="psw" name="psw" required><br>
        <!-- <a href="registro.php">Registrese</a><br>  -->
        <input type="submit" value="Entrar" name="submit">
    </form>
</body>
</html> 