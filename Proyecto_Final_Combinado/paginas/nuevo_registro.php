<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Nuevo Registro</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
            <form action="../bbdd/nuevo_registro.php" method="POST">
            <h1 class="text-black mb-4">Nuevo Registro</h1>

            <!-- Radio Buttons de Comida -->
        
            <div class="row p-2 justify-content-center">
                <h2>Comida</h2>
                <div class="col-2"> 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="desayuno">
                        <label class="form-check-label" for="desayuno">Desayuno</label>
                    </div>
                </div>
                <div class="col-2"> 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="almuerzo">
                        <label class="form-check-label" for="almuerzo">Almuerzo</label>
                    </div>
                </div>
                <div class="col-2"> 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="comida">
                        <label class="form-check-label" for="comida">Comida</label>
                    </div>
                </div>
                <div class="col-2"> 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="merienda">
                        <label class="form-check-label" for="merienda">Merienda</label>
                    </div>  
                </div>
                <div class="col-2"> 
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="cena">
                        <label class="form-check-label" for="cena">Cena</label>
                    </div>
                </div>
            </div>

            <!-- Cantidad de glucosa -->
            <div class="col-12 p-2">
                <h2>Cantidad de glucosa</h2>
                <div class="row p-1 g-1">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Glucosa 1h antes" name="glucosa1">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Glucosa 2h después" name="glucosa2">
                    </div>
                </div>
                <div class="col ">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Insulina aplicada" name="insulina">
                    </div>
                </div>
                <div class="col ">
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Raciones consumidas" name="raciones">
                    </div>
                </div>
                
            </div>

            <!-- Deporte -->
            <div class="col-12 p-2">
                <h2>Deporte</h2>
                <div class="row p-1 g-1 justify-content-center">
                    <div class="col-6">
                        <input type="number" class="form-control" placeholder="Deporte" name="deporte">
                    </div>
                </div>
            </div>
       

         <!-- Deporte -->
         <div class="col-12 p-2">
                <h2>Lenta</h2>
                <div class="row p-1 g-1 justify-content-center">
                    <div class="col-6">
                        <input type="number" class="form-control" placeholder="Lenta" name="lenta">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 p-2 bg-light rounded shadow  mt-3">
        
            <h2 class="text-center">Estado de glucosa</h2>
    
    <div class="row justify-content-center p-3 g-2">
    <!-- Agrupar cada radio con su formulario -->
    <div>
    <input type="radio" id="hiperglucemia" name="glucosaEstado" value="hiperglucemia">Hiperglucemia</input>
        <div id="hiperForm" class="p-2 bg-light border rounded">
            <h3>Hiperglucemia</h3>
            <input type="number" class="form-control mt-2" placeholder="Glucosa medida" name="glucosaMedida" required>
            <input type="time" class="form-control" placeholder="Hora" name="hora" required>
            <input type="number" class="form-control mt-2" placeholder="Correción" name="correccion" required>
        </div>
    </div>

    <div>
    <input type="radio" id="hipoglucemia" name="glucosaEstado" value="hipoglucemia">Hipoglucemia</input>
        <div id="hipoForm" class="p-2 bg-light border rounded">
            <h3>Hipoglucemia</h3>
            <input type="number" class="form-control" placeholder="Glucosa" name="glucosa" required>
            <input type="time" class="form-control mt-2" placeholder="Hora" name="hora" required>
        </div>
    </div>
    <div class="text-center mt-3">
    <button type="button" class="btn btn-warning" onclick="resetGlucosaEstado()">Desmarcar</button>
</div>
</div>

        <!-- Botones -->
        <div class="row p-3">
            <div class="col-12">
            <div class="d-flex justify-content-between">
    <button type="submit" class="btn btn-success btn-lg mx-1">Añadir</button>
    <button type="button" class="btn btn-danger btn-lg mx-1" onclick="window.location.href='menu.php'">Volver al menú</button>
    <button type="button" class="btn btn-primary btn-lg mx-1" onclick="window.location.href='ver_registros.php'">Ver Registros</button>
</div>

            </div>
        </div>
    </div>
</form>
</div>

    
    <script>
    //!JavaScript para hacer funcionar los botnes de la hipo y la hiper
document.addEventListener("DOMContentLoaded", function() {
    let hiperglucemia = document.getElementById("hiperglucemia");
    let hipoglucemia = document.getElementById("hipoglucemia");
    let hiperForm = document.getElementById("hiperForm");
    let hipoForm = document.getElementById("hipoForm");

    function toggleForms() {
        hiperForm.style.display = hiperglucemia.checked ? "block" : "none";
        hipoForm.style.display = hipoglucemia.checked ? "block" : "none";
    }

    // Escuchar cambios en los radio buttons
    hiperglucemia.addEventListener("change", toggleForms);
    hipoglucemia.addEventListener("change", toggleForms);

    // Llamar a la función por si uno está preseleccionado
    toggleForms();
});

//!Botones para desmarcar el formulario
function resetGlucosaEstado() {
    // Desmarcar los radio buttons
    document.getElementById("hiperglucemia").checked = false;
    document.getElementById("hipoglucemia").checked = false;

    // Ocultar los formularios
    document.getElementById("hiperForm").style.display = "none";
    document.getElementById("hipoForm").style.display = "none";
}
    </script>
</body>
</html>