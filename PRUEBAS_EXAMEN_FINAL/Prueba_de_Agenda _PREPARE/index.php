<?php
//^ Iniciamos la sesión 
session_start();
//^ Hacemos la conexión a la base de datos
require_once 'conexion.php';

//^ Se comprueba que se haya introducido usuario y contraseña
if (isset($_POST['usu']) && isset($_POST['psw'])) {
    
    //^ Iniciamos las variables
    $usu = $_POST['usu'];
    $psw = $_POST['psw'];
    
    //^ Creamos la conexión
    $connection = new mysqli($hn, $un, $pw, $db);
    
    //^ En caso de error en la conexión
    if ($connection->connect_error) die("Fatal Error");
    
    //^ Preparamos la consulta
    $query = "SELECT Codigo, Nombre FROM usuarios WHERE Nombre = ? AND Clave = ?";
    $stmt = $connection->prepare($query);
    
    if ($stmt) {
        //^ Vinculamos parámetros
        $stmt->bind_param("ss", $usu, $psw);
        //^ Ejecutamos la consulta
        $stmt->execute();
        //^ Obtenemos el resultado
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            //^ Guardamos datos en sesión
            $_SESSION['usu'] = $usu;
            $_SESSION['cod'] = htmlspecialchars($result->fetch_assoc()['Codigo']);
            echo "LOGUEADO CORRECTAMENTE";
            
            //^ Cerramos la conexión
            $stmt->close();
            $connection->close();
            
            //^ Redireccionamos
            echo "<meta http-equiv='refresh' content='0;URL=inicio.php' />";
        } else {
            session_destroy();
            echo "<a href='index.php'>NO EXISTE EL USUARIO Y/O CONTRASEÑA, VUELVA A INTENTARLO</a>";
        }
    } else {
        die("Error en la preparación de la consulta");
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <form action="#" method="post">
        <label for="usu">Usuario:</label>
        <input type="text" id="usu" name="usu" required>
        <label for="psw">Contraseña:</label>
        <input type="password" id="psw" name="psw" required>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
