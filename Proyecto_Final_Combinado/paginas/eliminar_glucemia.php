<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Eliminar Registro de Glucemia</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-4 bg-light rounded shadow text-center">
            <form action="../bbdd/eliminacion_glucemia.php" method="POST">
                <h1 class="text-black mb-4">Eliminar Registro de Glucemia</h1>

           
                <div class="mb-3">
                    <h2>Fecha del registro</h2>
                    <input type="date" class="form-control" name="fecha" max="<?php echo date('Y-m-d'); ?>" required>
                </div>

                <div class="mb-3">
                    <h2>Tipo de registro a eliminar</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo_glucemia" id="hiperglucemia" value="hiperglucemia" required>
                        <label class="form-check-label" for="hiperglucemia">Hiperglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipo_glucemia" id="hipoglucemia" value="hipoglucemia" required>
                        <label class="form-check-label" for="hipoglucemia">Hipoglucemia</label>
                    </div>
                </div>

              
                <div class="mb-3">
                    <h2>Confirmación</h2>
                    <p>¿Estás seguro de que deseas eliminar este registro?</p>
                </div>

      
                <button type="submit" class="btn btn-danger btn-lg mt-3">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>
