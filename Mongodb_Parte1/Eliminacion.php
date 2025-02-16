<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar documento en MongoDB</title>
</head>
<body>
    <h1>Eliminar Evento</h1>
    <form action="#" method="POST">
        <label for="id">ID del documento del evento: </label>
        <input type="text" id="id" name="id" required>
        <button type="Submit">Eliminar</button>
    </form>
</body>
</html> 
<?php
require '../../vendor/autoload.php';  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    try{ 
        $client = new MongoDB\Client("mongodb://localhost:27017"); 

$database = $client->AyuGijon;
$collection = $database->eventos;


$filter = ['id' => $id];


$result = $collection->deleteOne($filter);

if ($result->getDeletedCount() > 0) {
    echo "<p>El evento con id '$id' ha sido eliminado.</p>";
} else {
    echo "<p>No se encontró ningún documento con el id '$id'.</p>";
}
    }catch (Exception $e){ 

        echo "<p>Error al conectar a MongoDB: " . $e->getMessage() . "</p>";
    }
}
?>