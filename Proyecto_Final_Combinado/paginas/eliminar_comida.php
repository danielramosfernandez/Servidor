<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Eliminar Registro</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-3 bg-light rounded shadow text-center">
            <form action="../bbdd/eliminacion_comida.php" method="POST">
                <h1 class="text-black mb-4">Eliminar Registro</h1>

                <!-- Fecha del registro -->
                <div class="col-12 p-2">
                    <h2>Fecha del registro</h2>
                    <input type="date" class="form-control" name="fecha" required>
                </div>

                <!-- Tipo de comida -->
                <div class="col-12 p-2">
                    <h2>Tipo de comida</h2>
                    <select class="form-control" name="comida" required>
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="desayuno">Desayuno</option>
                        <option value="almuerzo">Almuerzo</option>
                        <option value="comida">Comida</option>
                        <option value="merienda">Merienda</option>
                        <option value="cena">Cena</option>
                    </select>
                </div>

                <div class="col-12 p-2">
                    <h2>Confirmación de eliminación</h2>
                    <p>¿Estás seguro de que deseas eliminar este registro?</p>
                </div>

                <div class="row p-3 col-12 d-flex justify-content-between">
                    <button type="button" class="btn btn-danger" onclick="window.location.href='menu.php'">Volver al menú</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.href='ver_registros.php'">Ver Registros</button>
                </div>

                <button type="submit" class="btn btn-warning btn-lg mx-1">Eliminar</button>
            </form>
        </div>
    </div>
</body>
</html>
