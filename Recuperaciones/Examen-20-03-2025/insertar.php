<?php
require_once('conexion.php');
session_start();

if (isset($_POST['id'])) {
    $alumno = $_POST['id'];
    $asignatura = $_POST['asignatura'];
    $nota = $_POST['nota'];
    $fecha = date("Y-m-d"); //&Esta funcion sirve para guardar la fecha en la que el usuario introdujo esta nota 

    $query = "INSERT INTO notas (alumno, asignatura, nota, fecha) VALUES ('$alumno', '$asignatura', '$nota', '$fecha')";
    $result = $conn->query($query);
    //&En el caso de que haya un error se te notificara y si se introduce correctamente se reembiara al menu o a una pestaña de exxito (adicion propia)
    if (!$result) {
        die("Error al insertar la nota");
    } else {

        header("Location: menu-director.php");
        exit();
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion de notas</title>
</head>
<body>
<form action="#" method="post">
    <h1>Insertar Notas</h1>
        <br>
    <h1>Id del alumno</h1>
    <input type="number" class="form-control" name="id" required>
        <br>
    <h2>Asignatura</h2>
    <input type="text" class="form-control"  name="asignatura" required>
        <br>
    <h2>Nota(0-10)</h2>
    <input type="number" class="form-control"  name="nota" min=1 max=10 required>
        <br>
        <br>
    <button type="submit">Insertar</button>
</form>
    <button onclick="window.location.href='menu-director.php'">Volver al menu</button>
</body>
</html>