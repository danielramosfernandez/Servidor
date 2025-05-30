<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Modificar Control</title>
  </head>
  <body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
      <div class="d-flex justify-content-center">
        <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
      </div>

      <div class="col-md-6 col-lg-4 p-1 bg-light rounded shadow text-center">
        <form action="../bbdd/modificado.php" method="POST">
          <h1 class="text-black mb-4">Modificar Registro de Control</h1>

      
          <div class="col-12 p-2">
            <h2>Fecha del control</h2>
            <input type="date" class="form-control" name="fecha" max="<?php echo date('Y-m-d'); ?>" required>
          </div>

          <div class="col-12 p-2">
            <h2>Confirmación de modificación</h2>
            <p>¿Estás seguro de que deseas modificar este registro de control?</p>
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
    exit;
}
?> 
<!-- <?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Modificar Control</title>
</head>
<body>
  <h1>Modificar Registro de Control</h1>

  <form action="../bbdd/modificado.php" method="POST">
    <label for="fecha">Fecha del control:</label><br>
    <input type="date" id="fecha" name="fecha" max="<?php echo date('Y-m-d'); ?>" required><br><br>

    <p>¿Estás seguro de que deseas modificar este registro de control?</p>

    <input type="submit" value="Modificar">
  </form>
</body>
</html>
 -->