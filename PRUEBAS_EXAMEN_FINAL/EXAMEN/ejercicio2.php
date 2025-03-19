<?php
require_once "conexion.php";
//&Crear la conexión
$conn = new mysqli($servidor, $usuario, $password, $db);

//&Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

//&Crear la consulta, este sirve para el desplegable de personas dado que tenemos q mostrar sus nombres
$stmt = $conn->prepare("SELECT * FROM personas");

//&Ejecutar la consulta de las personas
$stmt->execute();
$result = $stmt->get_result();

//&Crear la consulta, este otro se usa para mostrar las imagenes para seleccionar la actividad
$stmt2 = $conn->prepare("SELECT * FROM imagenes");

//&Ejecutar la consulta de las imagenes
$stmt2->execute();
$result2 = $stmt2->get_result();
$count = 0;

//&Esta parte se usa para comprobar si han sido introducidos los datos
if (isset($_POST['fecha'])) {
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $idImagen = $_POST["img"];
    $idUsu = $_POST["id"];

    //&Crear la consulta se introducen los datos en la base
    $stmt3 = $conn->prepare("INSERT INTO agenda (fecha, hora, idpersona, idimagen) VALUES (?,?,?,?)");
    $stmt3->bind_param("ssii", $fecha, $hora, $idUsu, $idImagen);

    // Ejecutar la consulta
    $stmt3->execute();
    
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Añadir datos agenda</h1>
    <form action="#" method="post">
        <label for="fecha" class="form-label">Fecha:</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        <br>
        <label for="hora" class="form-label">Hora:</label>
        <input type="time" name="hora" id="hora" class="form-control" value="<?php echo date('H:s'); ?>" required>
        <br>
        <label for="id" class="form-label">Persona:</label>
        <select name="id" id="id" class="form-select" required>
            //&Dentro del select lo que hacemos es reproducir los nombres de las personas con un for que lea la tabla
            <?php
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $nombre = $row['nombre'];
                $id = $row['idpersona'];

                echo "<option value='" . $id . "'>" . $nombre . "</option>";
            }
            ?>
        </select>


        <h4>Seleccionar una imagen</h4>
        <table border='5px'>
            <tr>
                <?php
                //&For para leer la lista de imagenes y mostrar la imagen y su id
                for ($i = 0; $i < $result2->num_rows; $i++) {
                    $row = $result2->fetch_assoc();
                    $img = $row['imagen'];
                    $idimg = $row['idimagen'];

                    echo "<td>";
                    echo "<img style='display: flex;' width='100px' src='" . $img . "'>";
                    echo "<span> Imagen:" . $idimg . "</span>";
                    echo "<input type='radio' name='img' id='img' value='" . $idimg . "'>";
                    echo "</td>";

                    //&Hacemos el contador para saltar de línea 

                    if ($count < 3) {
                        $count++;
                    } else {
                        $count = 0;
                        echo "</tr>";
                        echo "<tr>";
                    }
                }
                ?>
        </table>

        <input type="submit" value="Añadir entrada en agenda">
        <a href="ejercicio1.php">Volver al listado</a>


    </form>
</body>

</html>