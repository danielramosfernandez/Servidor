<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Registro</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 
        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>
        <div class="container d-flex justify-content-center">
            <div class="col-md-6 col-lg-4 p-4 bg-light rounded shadow text-center">
                <h1 class="text-black mb-4">Registro</h1> 
                <form action="../bbdd/nuevousuario.php" method="POST" onsubmit="return validarFormulario()">
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="apellido" placeholder="Apellido" required>
                                <label>Apellido</label>
                            </div>                        
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                 <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>
                                 <label>Nombre de usuario</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required>
                                <label>Contraseña</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password_repeat" id="password_repeat" placeholder="Repite la contraseña" required>
                                <label>Repite la contraseña</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="date" class="form-control" name="nacimiento" required>
                                <label>Fecha de nacimiento</label>
                            </div>
                        </div>
                        <div class="col-12 p-3">
                            <button type="submit" class="btn btn-secondary">Registrarse</button>
                            <button type="button" class="btn btn-danger" onclick="window.location.href='../index.php'">Volver al inicio</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function validarFormulario() {
            let pass = document.getElementById('password').value;
            let passRepeat = document.getElementById('password_repeat').value;
            if (pass !== passRepeat) {
                alert('Las contraseñas no coinciden');
                return false;
            }
            return true;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
