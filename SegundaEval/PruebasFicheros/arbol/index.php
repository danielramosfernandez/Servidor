<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivos</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <h2>Seleccionar archivos:</h2>
        <br>
        <?php 
        for ($i = 0; $i < 10; $i++) {
            echo '<input type="file" name="fileToUpload[]" id="fileToUpload' . $i . '"><br>';
        }
        ?>
        <br>
        <input type="submit" value="Subir Imágenes" name="submit">
    </form>
</body>
</html>
