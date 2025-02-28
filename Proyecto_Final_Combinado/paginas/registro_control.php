<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro Control Glucosa</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <form action="../bbdd/insert_control_glucosa.php" method="POST">
                <h1 class="text-black mb-4">Registro Control Glucosa</h1>

                
                <div class="col-12 p-2">
                    <h2>Deporte</h2>
                    <input type="number" class="form-control" placeholder="Deporte" name="deporte" required>
                </div>

       
                <div class="col-12 p-2">
                    <h2>Lenta</h2>
                    <input type="number" class="form-control" placeholder="Lenta" name="lenta" required>
                </div>

                <button type="submit" class="btn btn-success btn-lg mx-1">Añadir Control Glucosa</button>
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