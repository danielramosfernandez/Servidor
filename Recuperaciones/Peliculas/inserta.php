<?php
require 'conexion.php';
session_start();


if (!isset($_SESSION['puntos'])) {
    $_SESSION['puntos'] = 0;
}

// Obtener valores del formulario para mantenerlos
$titulo = $_POST['titulo'] ?? '';
$anio = intval($_POST['anio'] ?? '');
$director = $_POST['director'] ?? '';
$poster = $_POST['poster'] ?? '';
$alquilada = intval($_POST['alq'] ?? '');
$sinopsis = $_POST['sinop'] ?? '';

if (isset($_POST['puntos'])) {
    if ($_SESSION['puntos'] < 10) {
        $_SESSION['puntos']++;
    }
}

if (isset($_POST['info'])) {
    if (!empty($titulo) && !empty($anio) && !empty($director) &&
        !empty($poster) && $alquilada !== '' && !empty($sinopsis)) {
        
        $puntuacion = $_SESSION['puntos'];

        $inserta = $conn->prepare('INSERT INTO pelicula (titulo, anio, director, poster, alquilada, sinopsis, puntuacion) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $inserta->bind_param('sissisi', $titulo, $anio, $director, $poster, $alquilada, $sinopsis, $puntuacion);

        if ($inserta->execute()) {
            echo ' Se ha insertado correctamente la película.';
        } else {
            echo ' Error al insertar en la base de datos.';
        }

        // Resetear
        $_SESSION['puntos'] = 0;
        $titulo = $anio = $director = $poster = $alquilada = $sinopsis = '';
    } else {
        echo 'Todos los campos son obligatorios.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Película</title>
</head>
<body>

<!-- //? los value htmlspecialchars($variable), se utilizan para que no se borre la info del formulario al actualizar los puntos --> 

    <form action="" method="post">
        <label>Pelicula:
            <input type="text" name="titulo" required value="<?= htmlspecialchars($titulo) ?>">
        </label><br>

        <label>Año:
            <input type="number" name="anio" required value="<?= htmlspecialchars($anio) ?>">
        </label><br>

        <label>Director:
            <input type="text" name="director" required value="<?= htmlspecialchars($director) ?>">
        </label><br>

        <label>Poster URL:
            <input type="text" name="poster" required value="<?= htmlspecialchars($poster) ?>">
        </label><br>

        <label>Alquilada (0 o 1):
            <input type="number" min="0" max="1" name="alq" required value="<?= htmlspecialchars($alquilada) ?>">
        </label><br>

        <label>Sinopsis:
            <input type="text" name="sinop" required value="<?= htmlspecialchars($sinopsis) ?>">
        </label><br>
        <h3>Puntuación</h3>
        <?php 
            for ($i = 0; $i < $_SESSION['puntos']; $i++) {
                echo '<img src="estrella.webp" width="40" height="40">';
            }
        ?>
        <br>
        <button type="submit" name="puntos">Votar</button>
        <button type="submit" name="info">Enviar</button>
    </form>
</body>
</html>
