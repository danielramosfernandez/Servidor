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
            <form action="../bbdd/modificacion.php" method="POST">
                <h1>Modificar Control</h1>

                <div class="col-12 p-2">
                    <label for="deporte">Deporte</label>
                    <input type="text" class="form-control" name="deporte" min="1" max="5" required>
                </div>


                <div class="col-12 p-2">
                    <label for="lenta">Lenta</label>
                    <input type="text" class="form-control" name="lenta" min="1" max="50" required>
                </div>
				
                 <div class="col-12 p-2">
                    <label for="fecha">Fecha</label>
                   <input type="date" class="form-control mt-2" name="fecha" max="<?php echo date('Y-m-d'); ?>" required>

                </div>   
                 
                <input type="hidden" name="fecha" value="<?php echo $_SESSION['fecha']; ?>">
                <input type="hidden" name="id_usu" value="<?php echo $_SESSION['id_usu']; ?>">


                <p>¿Estás seguro de que deseas modificar este registro de control?</p>

                <button type="submit" class="btn btn-warning btn-lg mx-1">Modificar</button>
            </form>
        </div>
    </div>
</body>
</html>