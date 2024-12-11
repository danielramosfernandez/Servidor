<?php
session_start(); // Asegúrate de iniciar la sesión al principio del archivo
require_once 'login.php'; // Requiere el archivo de conexión

// Verificar si 'contador' está definido y tiene un valor mayor a 0
if (!isset($_SESSION['contador']) || $_SESSION['contador'] == 0) { 
    echo '<p>Ningún contacto ha sido seleccionado. Por favor vuelva a intentarlo.</p>';
    echo '<a href="index.php">Volver al inicio</a>';
    exit; 
}

// Conexión a la base de datos
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");

// Procesar el formulario cuando se envíe
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $contador = $_SESSION['contador']; // Obtiene el número de contactos de la sesión

    // Insertar los contactos en la base de datos
    for ($i = 1; $i <= $contador; $i++) { 
        $nombre = $_POST["nombre_$i"]; 
        $email = $_POST["email_$i"]; 
        $telefono = $_POST["telefono_$i"]; 

        $codigo_usuario = rand(1, 100); // Código de usuario aleatorio

        // Preparar la consulta de inserción
        $stmt = $connection->prepare("INSERT INTO usuarios(codcontacto, nombre, email, telefono, codusuario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("isssi", $i, $nombre, $email, $telefono, $codigo_usuario); 

        if ($stmt->execute()) { 
            echo "<p>Usuario $nombre fue creado correctamente</p>";
        } else { 
            echo "<p>El usuario $nombre ha sufrido un error en su creación: " . $stmt->error . "</p>";
        }
    }

    // Limpiar la sesión después de grabar los contactos
    $_SESSION['contador'] = 0; 
    $_SESSION['emojis'] = [];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contactos</title>
</head>
<body>
    <h1>AGENDA</h1>
    <p>Hola <?php echo $_SESSION['usu']; ?></p>
    <form action="grabado.php" method="post">
        <?php
        $contador = $_SESSION['contador']; // Obtiene el número de contactos de la sesión
        for ($i = 1; $i <= $contador; $i++) { 
            echo "
            <h3>Contacto $i</h3>
            <label for='nombre_$i'>Nombre:</label>
            <input type='text' name='nombre_$i' id='nombre_$i' required><br><br>
            <label for='email_$i'>Correo Electrónico:</label>
            <input type='email' name='email_$i' id='email_$i' required><br><br>
            <label for='telefono_$i'>Teléfono:</label>
            <input type='text' name='telefono_$i' id='telefono_$i' required><br><br>
        ";
        }
        ?> 
        <button type="submit">Guardar Contactos</button>
    </form>
</body> 
</html>
