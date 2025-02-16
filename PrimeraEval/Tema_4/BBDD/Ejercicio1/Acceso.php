<?php 
require_once 'Login.php';  
$conn = new mysqli($hn,$un,$pw,$db,3307); 
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

 

if (isset($_POST['usu']) && isset($_POST['pass']))
{
    $usuario = $_POST['usu']; 
    $contra = $_POST['pass'];
    $query ="SELECT Usu, contra FROM usuarios WHERE Usu='$usuario' AND contra='$contra'";
    $result = $conn->query($query); 
    if (!$result) echo "INSERT failed<br><br>"; 
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "Bienvenido, " . htmlspecialchars($row['Usu']) . "!<br>"; 
    } else {
        echo "Usuario o contraseña incorrectos.<br>";
    }
}

?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="Acceso.php">
        Nombre:<br> <input type="text" name="usu" required><br><br>
        Contraseña:<br> <input type="password" name="pass" required><br><br>
        <input type="submit" value="INICIAR SESIÓN">
    </form>
</body>
</html>
