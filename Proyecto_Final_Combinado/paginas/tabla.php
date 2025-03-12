<?php
require_once '../bbdd/conexion.php'; 

session_start();

// Si el usuario no ha iniciado sesión, redirigirlo
if (!isset($_SESSION["id_usu"])) {
    header("Location: login.php");
    exit();
}

$id_usu = $_SESSION["id_usu"];
$query = "SELECT c.fecha, c.deporte, c.lenta, co.tipo_comida, co.gl_1h, co.gl_2h, co.raciones, co.insulina,
                 hipo.glucosa AS hipo_glu, hipo.hora AS hipo_hora, 
                 hiper.glucosa AS hiper_glu, hiper.hora AS hiper_hora, hiper.correccion 
          FROM control_glucosa c
          LEFT JOIN comida co ON c.fecha = co.fecha AND c.id_usu = co.id_usu
          LEFT JOIN hipoglucemia hipo ON co.fecha = hipo.fecha AND co.id_usu = hipo.id_usu AND co.tipo_comida = hipo.tipo_comida
          LEFT JOIN hiperglucemia hiper ON co.fecha = hiper.fecha AND co.id_usu = hiper.id_usu AND co.tipo_comida = hiper.tipo_comida
          WHERE c.id_usu = ?
          ORDER BY c.fecha DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$result = $stmt->get_result();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Control de Glucosa</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
    <div class="d-flex justify-content-center">
            
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="container mt-3">
    <div class="table-responsive rounded">
        <table class="table table-bordered text-center bg-light">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Deporte</th>
                    <th>Insulina Lenta</th>
                    <th>Comida</th>
                    <th>GL/1H</th>
                    <th>GL/2H</th>
                    <th>Raciones</th>
                    <th>Insulina</th>
                    <th>Glucosa durante la hipoglucemia</th>
                    <th>Hora de la hipoglucemia</th>
                    <th>Glucosa durante la hiperglucemia</th>
                    <th>Hora de la hiperglucemia</th>
                    <th>Corrección</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['fecha'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['deporte'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['lenta'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['tipo_comida'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['gl_1h'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['gl_2h'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['raciones'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['insulina'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['hipo_glu'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['hipo_hora'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['hiper_glu'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['hiper_hora'] ?? ''); ?></td>
						<td><?php echo htmlspecialchars($row['correccion'] ?? ''); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Botón centrado -->
    <div class="w-100 d-flex justify-content-center mt-3">
        <button type="button" class="btn btn-secondary btn-lg" onclick="window.location.href='menu.php'">Volver al menú</button>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
