<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>
<body>
<h1>Bienvenid@, <?php echo htmlspecialchars($_SESSION["usuario"]); ?>!</h1>
 <h3>Tu perfil es de <?php echo htmlspecialchars($_SESSION["rol"]); ?> </h3>
<button type="submit" class="btn btn-lg btn-outline-primary" onclick="window.location.href='insertar_notas.php'">Nuevos Registros</button> 
<br>
<button type="submit" class="btn btn-lg btn-outline-primary" onclick="window.location.href='mostrar_notas.php'">Mostrar todas las notas</button>
<br>
<?php
 session_destroy();
 echo "<a href='index.php'>Cerrar sesion</a>";
?>
</button>

</body>
</html>