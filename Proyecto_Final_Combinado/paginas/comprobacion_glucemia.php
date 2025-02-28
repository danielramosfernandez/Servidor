<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Modificar Glucemia</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <form action="../bbdd/comprobar_glucemia.php" method="POST">
                <h1 class="text-black mb-4">Modificar Registro de Glucemia</h1>


                <div class="col-12 p-2">
                    <h2>Fecha</h2>
                    <input type="date" class="form-control" name="fecha" required>
                </div>

                <div class="col-12 p-2">
                    <h2>Estado de glucemia</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hiperglucemia" value="hiperglucemia" required>
                        <label class="form-check-label" for="hiperglucemia">Hiperglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hipoglucemia" value="hipoglucemia" required>
                        <label class="form-check-label" for="hipoglucemia">Hipoglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="ninguno" value="ninguno" required>
                        <label class="form-check-label" for="ninguno">Ninguno</label>
                    </div>
                </div>

                <div class="col-12 p-2">
                    <h2>Confirmación de modificación</h2>
                    <p>¿Estás seguro de que deseas modificar este registro de glucemia?</p>
                </div>

                <div class="row p-3 col-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='menu.php'">Volver al menú</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='ver_registros.php'">Ver Registros</button>
                </div>

                <button type="submit" class="btn btn-warning btn-lg mx-1">Modificar</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}
?>
