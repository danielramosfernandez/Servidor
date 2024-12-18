<?php
 $target_dir = "uploads/";
 $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
 $uploadOk = 1;
 $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);//Sirve para identificar la extension del fichero
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);/* Determina el tamaño de una imagen 
  devolverá las dimensiones junto con el tipo de fichero, una cadena de texto con el alto/ancho para 
  utilizarla dentro una etiqueta IMG de HTML, y el tipo de contenido HTTP correspondiente.*/
    if($check !== false) {
        echo "El fichero es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1; /* Si el fichero es una imagen el boleano pasa a 1 es decir true */
            } else {
                echo "El fichero no es una imagen.";
        $uploadOk = 0;/* En caso de que no sea imagen pasa a ser cero es decir true */

  }
  if (file_exists($target_file)) {
    echo "El fichero existe.";
    $uploadOk = 0;
   }
   if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "El fichero es demasiado grande.";
    $uploadOk = 0;
   }
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)){ 
        echo "El archivo se subio de manera correcta"; 
        
    }
?>