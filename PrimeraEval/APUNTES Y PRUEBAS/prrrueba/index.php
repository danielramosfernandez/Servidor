<?php
session_start(); // Inicia o reanuda la sesión para mantener el estado del juego entre las páginas

// Verifica si la variable de sesión 'mazo' está configurada.
// Si no lo está, significa que el juego no ha comenzado, por lo que redirige a juego.php para iniciar el juego.
if (!isset($_SESSION['mazo'])) {
    header("Location: juego.php?iniciar=1"); // Redirige a juego.php con el parámetro 'iniciar' en 1 para inicializar el mazo
    exit; // Detiene la ejecución del código para evitar que se cargue el resto de la página sin el mazo configurado
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
<p>Carta en la pila: <?php echo $_SESSION['cartaActual']; // Muestra la carta actual en la pila ?></p>

<h2>Tu mano:</h2>
<pre>
<?php 
// Recorre el arreglo de cartas del jugador (almacenado en la sesión) y muestra cada carta con su índice
foreach ($_SESSION['jugador'] as $indice => $carta) {
    echo "$indice. $carta\n"; // Muestra el número de índice y el valor de la carta
}
?>
</pre>

<form action="juego.php" method="post">
    <label>Selecciona una carta para jugar (número) o escribe "robar" para tomar una carta:</label>
    <input type="text" name="accion" required> <!-- Campo de entrada para que el jugador ingrese el índice de la carta o "robar" -->
    <button type="submit">Jugar</button> <!-- Botón para enviar la acción a juego.php -->
</form>

</body>
</html>
