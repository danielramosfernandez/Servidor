<?php
require '../../vendor/autoload.php'; 

$servidor = "localhost:3307"; 
$usuario = "root"; 
$clave = "";
$db = "empleados"; 


$conn = new mysqli($servidor, $usuario, $clave, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa.<br>";

$sql = "SELECT CodEmple, Nombre, Apellido1, Apellido2, Departamento FROM empleado"; 
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $empleados = [];
    while ($row = $result->fetch_assoc()) {
        $empleados[] = $row; 
    }
} else {
    echo "No se encontraron empleados.<br>";
}


$conn->close();


$mongoClient = new MongoDB\Client("mongodb://localhost:27017"); 
$mongoDb = $mongoClient->empleados;
$collection = $mongoDb->empleados; 

if (!empty($empleados)) {
    foreach ($empleados as $empleado) {
        $collection->insertOne($empleado);
    }
    echo "Empleados insertados en MongoDB.<br>";
} else {
    echo "No hay empleados para insertar.<br>";
}

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
