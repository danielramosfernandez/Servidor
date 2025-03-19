<?php
require_once "conexion.php";
// Crear la conexión
$conn = new mysqli($servidor, $usuario, $password, $db);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Crear la consulta
$stmt = $conn->prepare("SELECT * FROM personas");

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

$count = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="post">
        <h1>Ver Agenda</h1>
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        <br>
        <label for="id" class="form-label">Persona:</label>
        <select name="id" id="id" class="form-select" required>
            <?php
            //&Recorremos filas para mostrar el nombre de la persona dentro del select
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                //&Almacenamos el nombre
                $nombre = $row['nombre'];
                //&Almacenamos el id
                $id = $row['idpersona'];

                echo "<option value='" . $id . "'>" . $nombre . "</option>";
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Mostrar agenda">
        <a href="ejercicio1.php">Volver al listado</a>
    </form>
    
            
    <?php
    //&Comprobamos  que la fecha y el id del usuario fueron introducidos
if (isset($_POST['fecha'])) {
    $fecha = $_POST["fecha"];
    $idUsu = $_POST["id"];
    echo "<h1>Agenda del dia</h1>";
    echo "<table border='5px'>";
    echo "<tr>";
    
    //&Creamos la consulta donde comprobaremos la agenda dentro de agenda donde haya el id y la fecha que introducimos
    $stmtAg= $conn->prepare("SELECT * FROM agenda WHERE  idpersona = ? AND fecha = ?");
    $stmtAg->bind_param("is",$idUsu, $fecha);
    //&Ejecutar la consulta
    $stmtAg->execute();
    $resultAg = $stmtAg->get_result();
    
    //&Se almacenan todos los datos de los usuarios.
    for ($i = 0; $i < $resultAg->num_rows; $i++) {
        $agenda = $resultAg->fetch_assoc();
        
    //& Se crea la consulta
    $stmtImg = $conn->prepare("SELECT * FROM imagenes WHERE idimagen = ?");
    $stmtImg->bind_param("i",$agenda['idimagen']);

    //&Ejecutamos la consulta
    $stmtImg->execute();
    $resultImg = $stmtImg->get_result();
    $imagen = $resultImg->fetch_assoc();
    $img = $imagen['imagen'];
    $idimg = $imagen['idimagen'];
    echo "<td>";
    //&Muestra una vez hecha la consulta la agenda de los usuarios
    echo "<img style='display: flex;' width='100px' src='" . $img . "'>";
    echo "<span>" . $img . "</span>";
    echo "<span> " . $agenda['hora'] . "</span>";
    echo "</td>";
    if ($count < 1) {
        //&Tinen que mostrar con un máximo de dos imagenes por fila
        $count++;
    } else {
        $count = 0;
        echo "</tr>";
        echo "<tr>";
    }
    }
}
?>
</table>
</body>


</html>