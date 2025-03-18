<?php
 require_once "conexion.php";
// Crear la conexión
$conn = new mysqli($servidor, $usuario, $password, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear la consulta
$stmt = $conn->prepare("SELECT * FROM imagenes");

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();
$count = 0;
echo "<table border='5px'>";
echo "<h1>Listado pictogramas</h1>";
echo "<tr>";
for ($i=0; $i < $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
    $img = $row['imagen'];
    
    echo "<td>";
        echo "<img style='display: flex;' width='60px' src='".$img."'>";
        echo "<span>".$img."</span>";
    echo "</td>";

    if ($count < 3) {
        $count++;
    } else {
        $count = 0;
        echo "</tr>"; 
        echo "<tr>";
    }
    
    for ($j=0; $j < 4; $j++) {
        
        
    }
    
    
}

echo "</table>";

?>