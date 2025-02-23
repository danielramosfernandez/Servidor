<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Actualizar Registro de Comida</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <!-- Formulario de actualización de comida -->
            <form action="../bbdd/modificacion_final_comida.php" method="POST">
                <h1 class="text-black mb-4">Actualizar Registro de Comida</h1>
                
                <!-- Selección de comida -->
                <div class="row p-2 justify-content-center">
                    <h2>Comida</h2>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comida" id="desayuno" value="desayuno" required>
                            <label class="form-check-label" for="desayuno">Desayuno</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comida" id="almuerzo" value="almuerzo" required>
                            <label class="form-check-label" for="almuerzo">Almuerzo</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comida" id="comida" value="comida" required>
                            <label class="form-check-label" for="comida">Comida</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comida" id="merienda" value="merienda" required>
                            <label class="form-check-label" for="merienda">Merienda</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="comida" id="cena" value="cena" required>
                            <label class="form-check-label" for="cena">Cena</label>
                        </div>
                    </div>
                </div>

                <!-- Datos de Glucosa e Insulina -->
                <div class="col-12 p-2">
                    <h2>Datos de Glucosa e Insulina</h2>
                    <input type="number" class="form-control" placeholder="Glucosa 1h antes" name="glucosa1" required>
                    <input type="number" class="form-control mt-2" placeholder="Glucosa 2h después" name="glucosa2" required>
                    <input type="number" class="form-control mt-2" placeholder="Insulina aplicada" name="insulina" required>
                    <input type="number" class="form-control mt-2" placeholder="Raciones consumidas" name="raciones" required>
                </div>

                <button type="submit" class="btn btn-warning mt-4">Actualizar Comida</button>
            </form>
        </div>
    </div>
</body>
</html>
