<?php
require_once('conexion.php');
session_start();

//^Comprobar si el usuario tiene el rol de 'director'
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    echo "Usted no es director, no puede insertar.";
    exit();
}

//^Validaciones y procesamiento del formulario
if (isset($_POST['id'])) {
    $alumno = $_POST['id'];
    $asignatura = $_POST['asignatura'];
    $nota = $_POST['nota'];
    $fecha = date("Y-m-d"); //^Fecha en la que se introduce la nota

    //^a) Comprobar que la nota esté entre 0 y 10
    if ($nota < 0 || $nota > 10) {
        echo "La nota debe estar entre 0 y 10.";
        exit();
    }

    //^b) Comprobar que todos los campos estén completos
    if (empty($alumno) || empty($asignatura) || empty($nota)) {
        echo "Todos los campos son obligatorios.";
        exit();
    }

    //^c) Comprobar si el alumno existe en la tabla usuarios
    $query = "SELECT id FROM usuarios WHERE id = '$alumno' AND rol = 'alumno'";
    $result = $conn->query($query);
    if ($result->num_rows == 0) {
        //^Comprobar si el alumno existe en la tabla alumnos
        $query_alumno = "SELECT id FROM alumnos WHERE id = '$alumno'";
        $result_alumno = $conn->query($query_alumno);
        if ($result_alumno->num_rows == 0) {
            //^Si el alumno no existe en ninguna de las tablas
            echo "El alumno NO existe en la tabla alumnos y tampoco en usuarios";
            exit();
        } else {
            //^El alumno existe en la tabla alumnos pero no en usuarios
            echo "El alumno NO existe en la tabla usuarios";
            exit();
        }
    }

    //^Si llega aquí, el alumno existe en la tabla usuarios y su rol es alumno, por lo que podemos insertar la nota
    $query_insert = "INSERT INTO notas (alumno, asignatura, nota, fecha) VALUES ('$alumno', '$asignatura', '$nota', '$fecha')";
    $result_insert = $conn->query($query_insert);

    // Comprobar si la inserción fue exitosa
    if (!$result_insert) {
        die("Error al insertar la nota");
    } else {
        echo "Nota insertada correctamente";
        header("Location: menu-director.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserción de Notas</title>
</head>
<body>
    <form action="#" method="post">
        <h1>Insertar Notas</h1>
        <br>
        <h1>Id del alumno</h1>
        <input type="number" class="form-control" name="id" required>
        <br>
        <h2>Asignatura</h2>
        <input type="text" class="form-control" name="asignatura" required>
        <br>
        <h2>Nota (0-10)</h2>
        <input type="number" class="form-control" name="nota" min="0" max="10" required>
        <br>
        <br>
        <button type="submit">Insertar</button>
    </form>
    <button onclick="window.location.href='menu-director.php'">Volver al menú</button>
</body>
</html>
