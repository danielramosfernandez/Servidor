<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro Comida</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <form action="../bbdd/insert_comida.php" method="POST" onsubmit="return validateForm()">
                <h1 class="text-black mb-4">Registro Comida</h1>

                <!-- Radio Buttons de Comida -->
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

                <!-- Cantidad de glucosa -->
                <div class="col-12 p-2">
                    <h2>Cantidad de glucosa</h2>
                    <input type="number" class="form-control" placeholder="Glucosa 1h antes" name="glucosa1" required>
                    <input type="number" class="form-control mt-2" placeholder="Glucosa 2h después" name="glucosa2" required>
                    <input type="number" class="form-control mt-2" placeholder="Insulina aplicada" name="insulina" required>
                    <input type="number" class="form-control mt-2" placeholder="Raciones consumidas" name="raciones" required>
                </div>

                <!-- Radio Buttons de Glucemia -->
                <div class="col-12 p-2">
                    <h2>Estado de glucemia</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hiperglucemia" value="hiperglucemia" onclick="toggleInfo('hiperglucemia')">
                        <label class="form-check-label" for="hiperglucemia">Hiperglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hipoglucemia" value="hipoglucemia" onclick="toggleInfo('hipoglucemia')">
                        <label class="form-check-label" for="hipoglucemia">Hipoglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="ninguno" value="ninguno" onclick="toggleInfo('ninguno')" checked>
                        <label class="form-check-label" for="ninguno">Ninguno</label>
                    </div>
                    <button type="button" class="btn btn-warning mt-2" onclick="deselect()">Deseleccionar</button>
                </div>

                <!-- Información desplegable -->
                <div id="info" style="display:none;" class="alert alert-info mt-3"></div>

                <!-- Campos para Hiperglucemia -->
                <div id="hiperglucemia-fields" style="display:none;" class="p-2">
                    <h2>Detalles de Hiperglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hiperglucemia">
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hiperglucemia">
                    <input type="number" class="form-control mb-2" placeholder="Corrección" name="correccion_hiperglucemia">
                </div>

                <!-- Campos para Hipoglucemia -->
                <div id="hipoglucemia-fields" style="display:none;" class="p-2">
                    <h2>Detalles de Hipoglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hipoglucemia">
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hipoglucemia" >
                </div>

                <button type="submit" class="btn btn-primary mt-4">Registrar Comida</button>
            </form>
        </div>
    </div>

    <script src="../js/funciones.js"></script>
</body>
</html>
