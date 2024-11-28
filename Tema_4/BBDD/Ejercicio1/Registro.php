<?php

require_once 'Login.php';  
$conn = new mysqli($hn,$un,$pw,$db,3307); 
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

if (isset($_POST['usu']) && isset($_POST['pass']))
{
    $usuario = $_POST['usu']; 
    $contra = $_POST['pass']; 
    $rol = $_POST['rol'];
    $query ="INSERT INTO usuarios(Usu,contra,rol) VALUES ('$usuario','$contra','$rol')";
    $result = $conn->query($query); 
    if (!$result){ echo "INSERT failed<br><br>"; 
    }else{ 
        echo"Usuario registrado correctamente";
    }
  
}else{ 
        echo"por favor complete correctamente el registro";
    }

 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="POST" action="Registro.php">
        Nombre:<br> <input type="text" name="usu" required><br><br>
        Contraseña:<br> <input type="password" name="pass" required><br><br>
        Confirmar contraseña:<br> <input type="password" name="conf" required><br><br>
        Rol:<br>
        Jugador <input type="radio" name="rol" value="Jugador" checked><br>
        Jugador Premium <input type="radio" name="rol" value="Jugador Premium"><br><br>
        <input type="submit" value="REGISTRARSE">
    </form>
</body>
</html>
