<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Eliminar Control</title>
  </head>
  <body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
      <div class="d-flex justify-content-center">
        <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
      </div>

      <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
        <form action="../bbdd/eliminado.php" method="POST">
          <h1 class="text-black mb-4">Eliminar Registro de Control</h1>

          <div class="col-12 p-2">
            <h2>Fecha del control</h2>
            <input type="date" class="form-control" name="fecha" max="<?php echo date('Y-m-d'); ?>" required>
          </div>

          <div class="col-12 p-2">
            <h2>Confirmación de eliminación</h2>
            <p>¿Estás seguro de que deseas eliminar este registro de control?</p>
          </div>


          <button type="submit" class="btn btn-warning btn-lg mx-1">Eliminar</button>
        </form>
      </div>
    </div>
  </body>
</html>
<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}
?>