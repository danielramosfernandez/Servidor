<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Modificar Comida</title>
  </head>
  <body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
      <div class="d-flex justify-content-center">
        <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
      </div>

      <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
        <form action="../bbdd/comida_modificado.php" method="POST">
          <h1 class="text-black mb-4">Modificar Registro de Comida</h1>

          <!-- Selección de fecha -->
          <div class="col-12 p-2">
            <h2>Fecha</h2>
            <input type="date" class="form-control" name="fecha" required>
          </div>

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

          <div class="col-12 p-2">
            <h2>Confirmación de modificación</h2>
            <p>¿Estás seguro de que deseas modificar este registro de comida?</p>
          </div>

          <button type="submit" class="btn btn-warning btn-lg mx-1">Modificar</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}
?>