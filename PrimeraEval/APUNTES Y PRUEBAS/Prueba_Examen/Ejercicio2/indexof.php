<?php
session_start();
$bin = [rand(0, 1), rand(0, 1), rand(0, 1), rand(0, 1)];
$potencias = [8, 4, 2, 1];
$resul = 0;

for ($i = 0; $i < 4; $i++) {
    if ($bin[$i] == 1) {
        $resul += $potencias[$i];
    }
}
$_SESSION["resul"] = $resul;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Adivina el número decimal</h1>
    <h2>El número en BINARIO: <?= implode('', $bin) ?></h2>
    <?php
    for ($i = 0; $i < 4; $i++) {
        if ($bin[$i] == 1) {
            echo "<img src='img/" . $potencias[$i] . ".JPG' alt='Carta " . $potencias[$i] . "'>";
        } else {
            echo "<img src='img/blanco.JPG' alt='Carta 0'>";
        }
    }
    ?>
    <br><br>
    <form action="#" method="post">
        <label for="resp">Número decimal</label>
        <input type="number" name="resp" required>
        <input type='submit' value='Enviar'>
    </form>
</body>
</html>