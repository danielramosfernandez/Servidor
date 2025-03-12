<?php
session_start(); // Iniciar sesión
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : "";
unset($_SESSION['error_message']); // Borrar el mensaje después de mostrarlo
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Inicio de sesión</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="img/diabetes.png" alt="Logo diabetes">
        </div>
        <div class="col-md-6 col-lg-4 p-4 bg-light rounded shadow text-center">
            <h1 class="text-black mb-4">Inicio De Sesión</h1> 
            
            <!-- Formulario de inicio de sesión -->
            <form action="bbdd/procesar_login.php" method="POST">
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="usuario" placeholder="nombre_de_usuario" required>
                            <label for="floatingUsername">Nombre de usuario</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating">
                            <input type="password" class="form-control" name="clave" placeholder="contraseña" required>
                            <label for="floatingPassword">Contraseña</label>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-secondary">Iniciar Sesión</button>
                        <button type="button" class="btn btn-danger" onclick="window.location.href='paginas/registro.php'">Registrarse</button>
                    </div>
                </div>
            </form>

            <!-- Mensaje de error -->
            <?php if (!empty($error_message)): ?>
                <p class="text-danger mt-3"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>