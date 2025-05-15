<?php
// ejercicio2.php
require 'config.php';
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ejercicio1.php");
    exit();
}
$mensaje = "";
$puntuacion = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'] ?? '';
    $anio = $_POST['anio'] ?? '';
    $director = $_POST['director'] ?? '';
    $poster = $_POST['poster'] ?? '';
    $alquilada = isset($_POST['alquilada']) ? (int)$_POST['alquilada'] : 0;
    $sinopsis = $_POST['sinopsis'] ?? '';
    $puntuacion = isset($_POST['puntuacion']) ? (int)$_POST['puntuacion'] : 0;

    $errores = [];
    if (empty($titulo)) $errores[] = "El título es obligatorio";
    if (empty($anio) || !is_numeric($anio) || strlen($anio) != 4) $errores[] = "El año debe ser un número de 4 dígitos";
    if (empty($director)) $errores[] = "El director es obligatorio";
    if (!in_array($alquilada, [0, 1])) $errores[] = "Valor no válido para 'alquilada'";

    if (empty($errores) && isset($_POST['insertar'])) {
        $sql = "INSERT INTO pelicula (titulo, anio, director, poster, alquilada, sinopsis, puntuacion)
                VALUES ('$titulo', '$anio', '$director', '$poster', $alquilada, '$sinopsis', $puntuacion)";
        if ($conn->query($sql)) {
            $mensaje = "Película insertada correctamente!";
            $titulo = $anio = $director = $poster = $sinopsis = '';
            $alquilada = 0;
            $puntuacion = 0;
        } else {
            $mensaje = "Error al insertar la película: " . $conn->error;
        }
    } else {
        $mensaje = implode("<br>", $errores);
    }

    if (isset($_POST['votar'])) {
        $puntuacion = min(10, ($puntuacion + 1));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insertar Película - Videoclub</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .form-container { max-width: 600px; margin: 0 auto; }
        .error { color: red; }
        .success { color: green; }
        .estrella { color: gold; font-size: 24px; }
        .puntuacion { margin: 10px 0; }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Insertar Nueva Película</h2>
    <a href="menu.php">Volver al menú</a>
    <?php if (!empty($mensaje)): ?>
        <p class="<?php echo strpos($mensaje, 'correctamente') !== false ? 'success' : 'error'; ?>">
            <?php echo $mensaje; ?>
        </p>
    <?php endif; ?>
    <form method="post" action="">
        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="<?php echo $titulo ?? ''; ?>" required>
        </div>
        <div>
            <label for="anio">Año:</label>
            <input type="number" id="anio" name="anio" min="1900" max="2099"
                   value="<?php echo $anio ?? ''; ?>" required>
        </div>
        <div>
            <label for="director">Director:</label>
            <input type="text" id="director" name="director"
                   value="<?php echo $director ?? ''; ?>" required>
        </div>
        <div>
            <label for="poster">URL del Poster:</label>
            <input type="url" id="poster" name="poster"
                   value="<?php echo $poster ?? ''; ?>">
        </div>
        <div>
            <label for="sinopsis">Sinopsis:</label>
            <textarea id="sinopsis" name="sinopsis"><?php echo $sinopsis ?? ''; ?></textarea>
        </div>
        <div>
            <label>Alquilada:</label>
            <input type="radio" id="alquilada_si" name="alquilada" value="1" <?php echo ($alquilada ?? 0) == 1 ? 'checked' : ''; ?>>
            <label for="alquilada_si">Sí</label>
            <input type="radio" id="alquilada_no" name="alquilada" value="0" <?php echo ($alquilada ?? 0) == 0 ? 'checked' : ''; ?>>
            <label for="alquilada_no">No</label>
        </div>
        <div class="puntuacion">
            <label>Puntuación:</label>
            <input type="hidden" name="puntuacion" value="<?php echo $puntuacion; ?>">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <span class="estrella"><?php echo $i < $puntuacion ? '★' : '☆'; ?></span>
            <?php endfor; ?>
            <button type="submit" name="votar">Votar</button>
            (<?php echo $puntuacion; ?>/10)
        </div>
        <div>
            <button type="submit" name="insertar">Insertar Película</button>
        </div>
    </form>
</div>
</body>
</html>
