<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro de Glucemia y Comida</title>
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
    
            <form action="../bbdd/insert_comida_y_glucemia.php" method="POST" onsubmit="return validateForm()">
                <h1 class="text-black mb-4">Registro de Comida y Glucemia</h1>

                <div class="col-12 p-2">
                    <h2>Fecha</h2>
                     <input type="date" class="form-control" name="fecha" required max="<?php echo date('Y-m-d'); ?>">
</div>
               


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

           
                <div class="col-12 p-2">
                    <h2>Cantidad de glucosa</h2>
                    <input type="number" class="form-control" placeholder="Glucosa 1h antes" name="glucosa1" min="90" max="200" required>
                    <input type="number" class="form-control mt-2" placeholder="Glucosa 2h después" name="glucosa2" min="90" max="200" required>
                    <input type="number" class="form-control mt-2" placeholder="Insulina aplicada" name="insulina" min="1" max="10" required>
                    <input type="number" class="form-control mt-2" placeholder="Raciones consumidas" name="raciones" min="1" max="5" required>
                </div>

         
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
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="glucemia" id="ninguno" value="ninguno" checked onclick="toggleGlucemiaFields()">
                        <label class="form-check-label" for="ninguno">Ninguno</label>
                    </div>
                </div>

              
                <div id="hiperglucemia-fields" class="p-2" style="display: none;">
                    <h2>Detalles de Hiperglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hiperglucemia" min="90" max="200" >
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hiperglucemia">
                    <input type="number" class="form-control mb-2" placeholder="Corrección" name="correccion_hiperglucemia" min="1" max="5" >
                </div>

  
                <div id="hipoglucemia-fields" class="p-2" style="display: none;">
                    <h2>Detalles de Hipoglucemia</h2>
                    <input type="number" class="form-control mb-2" placeholder="Cantidad de glucosa" name="glucosa_hipoglucemia" min="90" max="200" >
                    <input type="time" class="form-control mb-2" placeholder="Hora" name="hora_hipoglucemia">
                </div>

                <button type="submit" class="btn btn-primary mt-4">Registrar Comida y Glucemia</button>
            </form>
        </div>
    </div>
</body>
</html>
