<?php 
require_once('conexion.php'); 

/* Inicio de sesion */
function autenticacion($conn, $login, $clave){
    $stmt = $conn->prepare("SELECT * FROM jugador WHERE login=? AND clave=?");
    $stmt->bind_param("ss", $login, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    $esValido = $result->num_rows === 1;

    $stmt->close();
    return $esValido;
}

session_start();  

// --- PROCESAR FORMULARIO ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"]) && isset($_POST["clave"])) {
        $login = $_POST["login"];
        $clave = $_POST["clave"];

        if (autenticacion($conn, $login, $clave)) {
            $_SESSION["login"] = $login;
            header("Location: mostrarcartas.php");
            exit();
        } else {
            $error = "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    }
}

/* Juego */
$_SESSION['combinacion'] = rand(0, 2);
$cartas = ["copas_03", "copas_02", "copas_02", "copas_03", "copas_05", "copas_05"];
shuffle($cartas);
$_SESSION['baraja'] = $cartas;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logueo</title>
</head>
<body>
    <form method="post" action="#">
        <label for="usuario">Nombre de usuario: </label>
        <input type="text" id="usuario" name="login" required><br>
        <label for="contra">Contraseña</label>
        <input type="password" id="contra" name="clave" required><br>
        <input type="submit" value="logueo">
    </form>
</body>
</html>
