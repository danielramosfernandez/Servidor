<?php
require '../../vendor/autoload.php'; 

$servidor = "localhost:3307"; // o la dirección de tu servidor
$usuario = "root"; // usuario de MySQL
$clave = ""; // clave del usuario
$db = "empleados"; // base de datos

// Crear conexión
$conn = new mysqli($servidor, $usuario, $clave, $db);

// Para comprobar que estoy conectada a la base de datos
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa.<br>";

$sql = "SELECT CodEmple, Nombre, Apellido1, Apellido2, Departamento FROM empleado"; // Cambié a 'empleado'
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    $empleados = [];
    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row; // Agregar cada fila a la colección
    }
} else {
    echo "No se encontraron empleados.<br>";
}

// Cerrar la conexión a MySQL
$conn->close();

// Conectar a MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017"); // Cambia esto si es necesario
$mongoDb = $mongoClient->empleados; // Nombre de tu base de datos en MongoDB
$collection = $mongoDb->empleados; // Nombre de la colección

// Insertar empleados en MongoDB
if (!empty($empleados)) {
    foreach ($empleados as $empleado) {
        $collection->insertOne($empleado);
    }
    echo "Empleados insertados en MongoDB.<br>";
} else {
    echo "No hay empleados para insertar.<br>";
}

// Mostrar empleados en una tabla HTML
echo "<h2>Empleados</h2>";
echo "<table border='1'>
<tr>
<th>CodEmple</th>
<th>Nombre</th>
<th>Apellido1</th>
<th>Apellido2</th>
<th>Departamento</th>
</tr>";

foreach ($empleados as $empleado) {
    echo "<tr>
    <td>{$empleado['CodEmple']}</td>
    <td>{$empleado['Nombre']}</td>
    <td>{$empleado['Apellido1']}</td>
    <td>{$empleado['Apellido2']}</td>
    <td>{$empleado['Departamento']}</td>
    </tr>";
}

echo "</table>";
?>
