<?php
$target_dir = "ornamentos/";
$uploaded_files = []; // Array para almacenar rutas de imágenes subidas

if (isset($_FILES['fileToUpload']['name']) && is_array($_FILES['fileToUpload']['name'])) {
    $totalFiles = count($_FILES['fileToUpload']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $uploadOk = 1;

        if (empty($_FILES["fileToUpload"]["name"][$i])) {
            continue; // Saltar inputs vacíos
        }

        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (!empty($_FILES["fileToUpload"]["tmp_name"][$i]) && file_exists($_FILES["fileToUpload"]["tmp_name"][$i])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
            if ($check === false) {
                $uploadOk = 0; // No es una imagen
            }
        } else {
            $uploadOk = 0; // Error de procesamiento
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                $uploaded_files[] = $target_file; // Agregar imagen subida al array
            }
        }
    }
}

// Mostrar imágenes subidas en una cuadrícula
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
        .row:nth-child(1) img { width: auto; } /* 4 imágenes */
        .row:nth-child(2) img { width: auto; } /* 3 imágenes */
        .row:nth-child(3) img { width: auto; } /* 2 imágenes */
        .row:nth-child(4) img { width: auto; } /* 1 imagen */
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
