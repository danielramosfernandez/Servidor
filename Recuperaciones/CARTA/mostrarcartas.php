<?php
    require_once 'pintarCartas.php';
    session_start();

    $levanta = -1;

        if (isset($_POST["lev"])) {
            $levanta = intval(substr($_POST["lev"], -1));
                $_SESSION['cartasLevantadas'] = ($_SESSION['cartasLevantadas'] ?? 0) + 1;
        } else {
                $_SESSION['cartasLevantadas'] = 0;
        }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Cartas</title>
</head>

<body>
    <h1>Bienvenid@, <?php echo htmlspecialchars($_SESSION["login"]); ?></h1>

    <form method="post">
        <label>Cartas levantadas:</label>
        <input type="number" value="<?php echo $_SESSION['cartasLevantadas']; ?>" disabled>
        <br><br>
        <?php for ($i = 1; $i <= 6; $i++): ?>
        <input type="submit" name="lev" value="Levantar carta <?php echo $i; ?>">
        <?php endfor; ?>
    </form>

    <br>

    <form action="resultado.php" method="post">
        <label>Pareja: </label>
        <input type="number" name="x" min="1" max="6" required>
        <input type="number" name="y" min="1" max="6" required>
        <input type="submit" value="Comprobar">
    </form>

    <br><br>

    <div class="cartas">
        <?php pintar($levanta); ?>
    </div>
</body>

</html>