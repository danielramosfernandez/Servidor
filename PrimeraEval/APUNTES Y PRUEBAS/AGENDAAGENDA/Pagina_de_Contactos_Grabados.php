<?php
// Iniciar sesión
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambia estos valores según tu configuración
$username = "root";
$password = "";
$dbname = "agenda";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el usuario logueado
$usuario_logueado = $_SESSION["usuario"] ?? 'Invitado'; // Agregar un valor predeterminado en caso de que no haya sesión activa

// Obtener el número de contactos grabados
$sql = "SELECT COUNT(*) AS num_contactos FROM contactos WHERE codusuario = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error al preparar la consulta: " . $conn->error);
}

// Asociar parámetro y ejecutar
$stmt->bind_param("s", $usuario_logueado);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$num_contactos = $row["num_contactos"] ?? 0; // Si no hay registros, predeterminar a 0

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contactos Grabados</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario_logueado); ?>!</h1>
    <p>Se han grabado <?php echo $num_contactos; ?> contactos en tu agenda.</p>
    <a href="inicio.php">Volver a Inicio</a>
    <a href="Página_de_Agenda.php">Agregar más contactos</a>
    <a href="Página_Totales_de_Contactos.php">Ver totales de contactos</a>
</body>
</html>
