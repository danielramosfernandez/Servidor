<?php
// Iniciar sesión
session_start();

// Conexión a la base de datos
$servername = "localhost"; // Cambiar según la configuración
$username = "root";
$password = "";
$database = "agenda";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el nombre del usuario logueado
$usuario_logueado = $_SESSION["usuario"];

// Procesar los formularios de contactos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_contactos = count($_POST["nombre"]);
    
    // Preparar la consulta
    $stmt = $conn->prepare("INSERT INTO contactos (codusuario, nombre, telefono, email) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    for ($i = 0; $i < $num_contactos; $i++) {
        $nombre = $_POST["nombre"][$i];
        $telefono = $_POST["telefono"][$i];
        $email = $_POST["email"][$i];

        // Validar que todos los campos estén rellenos
        if (empty($nombre) || empty($telefono) || empty($email)) {
            $error_message = "Todos los campos deben estar rellenos.";
            break;
        }

        // Asociar los parámetros y ejecutar
        $stmt->bind_param("ssss", $usuario_logueado, $nombre, $telefono, $email);
        if (!$stmt->execute()) {
            $error_message = "Error al grabar el contacto: " . $stmt->error;
            break;
        }
    }

    // Cerrar la consulta preparada
    $stmt->close();

    if (!isset($error_message)) {
        // Redirigir a la página de contactos grabados
        header("Location: Pagina_de_Contactos_Grabados.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($usuario_logueado); ?>!</h1>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <?php
        $num_emojis = $_SESSION["num_emojis"] ?? 1; // Asegurarse de tener un valor predeterminado
        for ($i = 0; $i < $num_emojis; $i++) {
        ?>
        <h2>Contacto <?php echo $i + 1; ?></h2>
        Nombre: <input type="text" name="nombre[]" required><br>
        Teléfono: <input type="text" name="telefono[]" required><br>
        Email: <input type="email" name="email[]" required><br>
        <?php } ?>
        <input type="submit" name="submit" value="Grabar">
    </form>
</body>
</html>
