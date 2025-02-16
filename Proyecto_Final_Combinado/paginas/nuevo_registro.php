<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Nuevo Registro</title>
    <style>
/* Ocultar ambos formularios por defecto */
#hiperForm, #hipoForm {
    display: none;
}

/* Mostrar el formulario de Hiperglucemia cuando se selecciona su radio */
#hiperglucemia:checked ~ #hiperForm {
    display: block;
}

/* Mostrar el formulario de Hipoglucemia cuando se selecciona su radio */
#hipoglucemia:checked ~ #hipoForm {
    display: block;
}
</style>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
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
                        <input type="number" class="form-control" placeholder="Glucosa 1h antes" aria-label="glucosa1">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" placeholder="Glucosa 2h después" aria-label="glucosa2">
                    </div>
                </div>
                <div class="row p-1 g-1 justify-content-center">
                    <div class="col-6">
                        <input type="number" class="form-control" placeholder="Insulina aplicada" aria-label="insulina">
                    </div>
                </div>
            </div>

            <!-- Deporte -->
            <div class="col-12 p-2">
                <h2>Deporte</h2>
                <div class="row p-1 g-1 justify-content-center">
                    <div class="col-6">
                        <input type="number" class="form-control" placeholder="Deporte" aria-label="deporte">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 p-2 bg-light rounded shadow  mt-3">
        
            <h2 class="text-center">Estado de glucosa</h2>
    
    <div class="row justify-content-center p-3 g-2">
    <!-- Agrupar cada radio con su formulario -->
    <div>
        <input type="radio" id="hiperglucemia" name="glucosaEstado">Hiperglucemia</input>
        <div id="hiperForm" class="p-2 bg-light border rounded">
            <h3>Hiperglucemia</h3>
            <input type="text" class="form-control" placeholder="Tratamiento aplicado">
            <input type="number" class="form-control mt-2" placeholder="Glucosa medida">
        </div>
    </div>

    <div>
        <input type="radio" id="hipoglucemia" name="glucosaEstado">Hipoglucemia</input>
        <div id="hipoForm" class="p-2 bg-light border rounded">
            <h3>Hipoglucemia</h3>
            <input type="text" class="form-control" placeholder="Alimento ingerido">
            <input type="number" class="form-control mt-2" placeholder="Tiempo de recuperación">
        </div>
    </div>
</div>
</div>
        <!-- Botones -->
        <div class="row p-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">  
                    <button type="submit" class="btn btn-success btn-lg mx-1">Añadir</button>  
                    <button type="submit" class="btn btn-danger btn-lg mx-1">Volver al menú</button>  
                    <button type="submit" class="btn btn-primary btn-lg mx-1">Ver Registros</button>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>