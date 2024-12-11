<?php
session_start(); 
require_once 'login.php'; 

// Conexión a la base de datos
$connection = new mysqli($hn, $un, $pw, $db); 
if ($connection->connect_error) die("Error fatal de conexión"); 

// Consulta para obtener los usuarios y el número de contactos creados
$query = "
SELECT u.Codigo, u.Nombre, COUNT(c.codusuario) AS num_contactos
FROM usuarios u
LEFT JOIN contactos c ON u.Codigo = c.codusuario
GROUP BY u.Codigo, u.Nombre
"; 

$result = $connection->query($query); 
if (!$result) die("Error al ejecutar la consulta");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadística de Contactos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .dots {
            display: flex;
            align-items: center;
            gap: 3px;
        }
        .dot {
            width: 10px;
            height: 10px;
            background-color: red;
            border-radius: 50%;
        }
        a {
            text-decoration: none;
            margin: 10px;
            color: blue;
        }
    </style>
</head>
<body>
    <h1>SIMON</h1>
    <h2><?php echo htmlspecialchars($_SESSION['nombre_usuario'] ?? "Invitado"); ?>, aquí están los resultados:</h2>
    <table>
        <tr>
            <th>Código Usuario</th>
            <th>Nombre</th>
            <th>Número de Contactos</th>
            <th>Gráfica</th>
        </tr>
        <?php 
        while ($row = $result->fetch_assoc()) { 
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['Codigo']) . "</td>";
            echo "<td>" . htmlspecialchars($row['Nombre']) . "</td>";
            echo "<td>" . htmlspecialchars($row['num_contactos']) . "</td>";
            
            // Gráfica con puntos rojos
            echo "<td class='dots'>";
            for ($i = 0; $i < $row['num_contactos']; $i++) {
                echo "<div class='dot'></div>";
            }
            echo "</td>";
            echo "</tr>";
        }
        ?> 
    </table>
    <br>
    <a href="index.php">Volver al Logueo</a>
    <a href="inicio.php">Introducir más contactos</a>
</body>
</html>
<?php
$connection->close();
?>
