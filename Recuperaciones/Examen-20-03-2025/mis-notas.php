<?php
require 'conexion.php';
session_start();


$notas = $conn->prepare('
    SELECT notas.asignatura, notas.nota 
    FROM notas 
    INNER JOIN usuarios ON notas.alumno = usuarios.id   
    WHERE usuarios.usuario = ?
');
/* ✅ 
*¿Qué hace?
*Solo muestra las notas que están asociadas a un usuario existente con ese nombre.
*Si no hay coincidencias en ambas tablas, no se muestra nada.
*/


/* 
&Utilizacion de having: 
 
$notas = $conn->prepare('
    SELECT notas.asignatura, AVG(notas.nota) AS nota 
    FROM notas 
    INNER JOIN usuarios ON notas.alumno = usuarios.id 
    WHERE usuarios.usuario = ?
    GROUP BY notas.asignatura
    HAVING AVG(notas.nota) >= 5
');
^Con este ejemplo que consiste en basicamente la misma consulta de antes, sacamos la media de las notas 
^y lo que hacemos es AGRUPAR por notas y TENIENDO (HAVING) una media superior a cinco o dicho de otra forma aprobado

&Ejemplo con SUM():

SELECT asignatura, SUM(nota) AS total_notas
FROM notas
INNER JOIN usuarios ON notas.alumno = usuarios.id
WHERE usuarios.usuario = ?
GROUP BY asignatura
HAVING SUM(nota) >= 10
^Muestra las asignaturas donde la suma de las notas es mayor a diez

&Ejemplo con COUNT(): 

SELECT asignatura, COUNT(*) AS cantidad
FROM notas
INNER JOIN usuarios ON notas.alumno = usuarios.id
WHERE usuarios.usuario = ?
GROUP BY asignatura
HAVING COUNT(*) >= 2
^En este ejemplo se mostrara las asignaturas en las que el usuario tiene dos o mas notas registradas
*/



$notas->bind_param('s', $_SESSION['usu']);
$notas->execute();
$info = $notas->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>
<body>
    <h2><?php echo htmlspecialchars($_SESSION['usu']); ?>, estas son tus notas:</h2>

    <h3>Notas:</h3>
    <?php if ($info->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Asignatura</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = $info->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($fila['asignatura']); ?></td>
                        <td><?php echo htmlspecialchars($fila['nota']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron notas.</p>
    <?php endif; ?>

    <br>
    <a href="alumno.php">Volver al menú de alumno</a>
</body>
</html>

<!-- 
LEFT JOIN
$notas = $conn->prepare('
    SELECT notas.asignatura, notas.nota 
    FROM usuarios 
    LEFT JOIN notas ON notas.alumno = usuarios.id 
    WHERE usuarios.usuario = ?
');
$notas->bind_param('s', $_SESSION['usuario']);

✅ ¿Qué hace?
Devuelve todas las filas del usuario, incluso si no tiene notas.

Si el usuario no tiene ninguna nota, los campos de asignatura y nota serán NULL.

Útil si quieres mostrar al usuario aunque no tenga notas, con algo como "No tienes notas registradas". -->

<!--
RIGHT JOIN
 $notas = $conn->prepare('
    SELECT notas.asignatura, notas.nota 
    FROM notas 
    RIGHT JOIN usuarios ON notas.alumno = usuarios.id 
    WHERE usuarios.usuario = ?
');
$notas->bind_param('s', $_SESSION['usuario']);
✅ ¿Qué hace?
Similar al LEFT JOIN pero al revés: muestra todas las notas, y si alguna no tiene un usuario coincidente, igual la muestra.

En este caso no es útil porque siempre filtrás por usuarios.usuario = ?, así que nunca habrá notas sin usuario. -->
<