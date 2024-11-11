<!-- index.php -->
<?php
session_start();
if (!isset($_SESSION['mazo'])) {
    header("Location: juego.php?iniciar=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego de UNO</title>
</head>
<body>

<h1>Juego de UNO</h1>
<p>Carta en la pila: <?php echo $_SESSION['cartaActual']; ?></p>

<h2>Tu mano:</h2>
<pre>
<?php 
foreach ($_SESSION['jugador'] as $indice => $carta) {
    echo "$indice. $carta\n";
}
?>
</pre>

<form action="juego.php" method="post">
    <label>Selecciona una carta para jugar (número) o escribe "robar" para tomar una carta:</label>
    <input type="text" name="accion" required>
    <button type="submit">Jugar</button>
</form>

</body>
</html>
