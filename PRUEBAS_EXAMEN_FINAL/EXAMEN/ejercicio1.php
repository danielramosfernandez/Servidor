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
//& El count que usaste aquí se encarga de controlar cuántas imágenes se han mostrado en la fila actual de la tabla. Básicamente, 
//&está determinando cuándo se debe hacer un salto de línea (es decir, iniciar una nueva fila en la tabla <tr>).
$count = 0;

echo "<table border='5px'>";
echo "<h1>Listado pictogramas</h1>";
echo "<tr>";
//&Se recorren las filas 
for ($i=0; $i < $result->num_rows; $i++) {
    $row = $result->fetch_assoc();
    $img = $row['imagen'];
    
    //&Este eco lo que hace es mostrar las imagenes 
    echo "<td>";
        echo "<img style='display: flex;' width='60px' src='".$img."'>";
        echo "<span>".$img."</span>";
    echo "</td>";

    //&En este if lo que se hace es que cuando llegue a cuatro imagenes
    if ($count < 3) {
        //&Si es menor a 3 seguiran sumandose imagenes 
        $count++;
    } else {
        //&Si llega a cuatro fotos se resetea el contador haciendo que salte de fila
        $count = 0;
        echo "</tr>"; 
        echo "<tr>";
    }
    
    /*  for ($j=0; $j < 4; $j++) {
            
            
        }
        */
    
}
//&Cerramos aqui el for que recorre las filas de la tabla
echo "</table>";

?>