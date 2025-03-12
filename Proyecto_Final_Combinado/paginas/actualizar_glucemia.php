<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro de Glucemia</title>
    <script>
        function toggleGlucemiaFields() {
            var hiperglucemiaFields = document.getElementById("hiperglucemia-fields");
            var hipoglucemiaFields = document.getElementById("hipoglucemia-fields");
            var hiperglucemiaRadio = document.getElementById("hiperglucemia");
            var hipoglucemiaRadio = document.getElementById("hipoglucemia");

            if (hiperglucemiaRadio.checked) {
                hiperglucemiaFields.style.display = "block";
                hipoglucemiaFields.style.display = "none";
            } else if (hipoglucemiaRadio.checked) {
                hipoglucemiaFields.style.display = "block";
                hiperglucemiaFields.style.display = "none";
            } else {
                hiperglucemiaFields.style.display = "none";
                hipoglucemiaFields.style.display = "none";
            }
        }

        window.onload = function() {
            toggleGlucemiaFields();
        }
    </script>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <form action="../bbdd/modificacion_final_glucemia.php" method="POST">
                <h1 class="text-black mb-4">Registro de Glucemia</h1>

                <div class="col-12 p-2">
                    <h2>Estado de glucemia</h2>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hiperglucemia" value="hiperglucemia" required onclick="toggleGlucemiaFields()">
                        <label class="form-check-label" for="hiperglucemia">Hiperglucemia</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="hipoglucemia" value="hipoglucemia" required onclick="toggleGlucemiaFields()">
                        <label class="form-check-label" for="hipoglucemia">Hipoglucemia</label>
                    </div>
                </div>

                <div id="hiperglucemia-fields" class="p-2" style="display: none;">
                    <h2>Detalles de Hiperglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hiperglucemia" min="90" max="200">
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hiperglucemia">
                    <input type="number" class="form-control mb-2" placeholder="Corrección" name="correccion_hiperglucemia" min="90" max="200">
                </div>

                <div id="hipoglucemia-fields" class="p-2" style="display: none;">
                    <h2>Detalles de Hipoglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hipoglucemia"min="90" max="200">
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hipoglucemia">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Registrar Glucemia</button>
            </form>
        </div>
    </div>
</body>
</html>