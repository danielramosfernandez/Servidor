<?php
$target_dir = "ornamentos/";
$uploaded_files = []; 

if (isset($_FILES['fileToUpload']['name']) && is_array($_FILES['fileToUpload']['name'])) {
    $totalFiles = count($_FILES['fileToUpload']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $uploadOk = 1;

        if (empty($_FILES["fileToUpload"]["name"][$i])) {
            continue; //Este metodo hace q si no pongo ninguna imagen se la salta sin mas
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!empty($_FILES["fileToUpload"]["tmp_name"][$i]) && file_exists($_FILES["fileToUpload"]["tmp_name"][$i])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
            if ($check === false) {
                $uploadOk = 0; //Devuelve false 
            }
        } else {
            $uploadOk = 0; //Devuelve false por error de procesamiento
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                $uploaded_files[] = $target_file; //Añade la imagen subida al array
            }
        }
    }
}

//El html para mostrar las imagenes
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imágenes Subidas</title>
    <style>
        .gallery {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: center;
        }
        .row {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .row img {
            height: 150px;
            width: 50px;
        }
        .row:nth-child(1) img {
            width: auto;
            height: 200px;
            position: relative;
            top: 0;
        }
        .row:nth-child(1) {
            justify-content: center;
        }
        .row:nth-child(2) img { width: auto; } /* Damos formato a la fila de 3 bolas */
        .row:nth-child(3) img { width: auto; } /* Damos formato a la fila de 2 bolas */
        .row:nth-child(4) img { width: auto; } /* Damos formato a la fila de 4 bolas */
    </style>
</head>
<body>

    <div class="gallery">
        <?php if (!empty($uploaded_files)) : ?>
            <div class="row">
                <?php foreach (array_slice($uploaded_files, 9, 1) as $file): ?>
                    <img src="<?= htmlspecialchars($file); ?>" alt="Imagen subida">
                <?php endforeach; ?>
            </div>
            <div class="row">
                <?php foreach (array_slice($uploaded_files, 7, 2) as $file): ?>
                    <img src="<?= htmlspecialchars($file); ?>" alt="Imagen subida">
                <?php endforeach; ?>
            </div>
             <div class="row">
                <?php foreach (array_slice($uploaded_files, 4, 3) as $file): ?>
                    <img src="<?= htmlspecialchars($file); ?>" alt="Imagen subida"> 
                <?php endforeach; ?>
            </div>
            <div class="row">
                <?php foreach (array_slice($uploaded_files, 0, 4) as $file): ?>
                    <img src="<?= htmlspecialchars($file); ?>" alt="Imagen subida">
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>No se han subido imágenes.</p>
        <?php endif; ?>
    </div>
</body>
</html>

