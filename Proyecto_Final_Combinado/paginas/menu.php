<?php
require_once '../bbdd/conexion.php'; 

session_start();

// Si el usuario no ha iniciado sesión, redirigirlo
if (!isset($_SESSION["id_usu"])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Menú Control Diabétes</title>
</head>
<body>
    <!-- Esto esta puesto para que la imagen se alinee verticalmente cobn el formulario -->
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 

        <div class="d-flex justify-content-center">
            <!-- Puse la imagen al 50% por ciento de tamaño -->
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-4 bg-light rounded shadow text-center">
            <h1 class="text-black mb-4">Bienvenid@, <?php echo htmlspecialchars($_SESSION["nombre"]); ?>!</h1>

            <div class="row g-3">
                <div class="col-12">
                    <div class="form-floating d-grid mx-autox">
                        <button type="submit" class="btn btn-secondary btn-lg" onclick="window.location.href='registros.php'">Nuevos Registros</button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating d-grid mx-auto">
                        <button type="submit" class="btn btn-secondary btn-lg" onclick="window.location.href='modificaciones.php'">Modificar Registros</button>  
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating d-grid mx-auto">
                        <button type="submit" class="btn btn-secondary btn-lg" onclick="window.location.href='eliminaciones.php'">Eliminado de Registros</button>  
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating d-grid mx-auto">
                        <button type="submit" class="btn btn-secondary btn-lg">Ver Registros</button>  
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating d-grid mx-autox">
                        <button type="submit" class="btn btn-secondary btn-lg">Revisar estadísticas</button>
                    </div>
                </div>
                <h5 class="text-danger">*En caso de error en algún proceso serás reenviado a este menú</h5>
            </div>

        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

