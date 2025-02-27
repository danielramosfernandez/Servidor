<?php
include '../bbdd/conexion.php'; 

$query = "SELECT 
            MONTH(hipo.fecha) AS mes,
            COUNT(DISTINCT CASE WHEN hipo.glucosa IS NOT NULL THEN hipo.fecha END) AS total_hipoglucemias,
            COUNT(DISTINCT CASE WHEN hiper.glucosa IS NOT NULL THEN hiper.fecha END) AS total_hiperglucemias
          FROM usuario u
          LEFT JOIN hipoglucemia hipo ON u.id_usu = hipo.id_usu
          LEFT JOIN hiperglucemia hiper ON u.id_usu = hiper.id_usu
          GROUP BY mes
          ORDER BY mes";

$result = mysqli_query($conn, $query);

$meses = [];
$hipoglucemias = [];
$hiperglucemias = [];

while ($row = mysqli_fetch_assoc($result)) {
    $meses[] = date("F", mktime(0, 0, 0, $row['mes'], 1)); 
    $hipoglucemias[] = $row['total_hipoglucemias'];
    $hiperglucemias[] = $row['total_hiperglucemias'];
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas de Glucosa</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="../img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">

        <div class="d-flex justify-content-center">
            <img class="w-25 mb-3" src="../img/diabetes.png" alt="Logo diabetes">
        </div>

        <div class="col-md-6 col-lg-5 p-4 bg-light rounded shadow text-center">
            <h1 class="text-primary mb-4">Estadísticas de Glucosa</h1>

            <canvas id="glucosaChart"></canvas>

            <div class="mt-4 d-grid">
                <button class="btn btn-outline-primary btn-lg" onclick="window.location.href='menu.php'">Volver al menú</button>
            </div>
        </div>
    </div>

    <!-- Script del gráfico -->
    <script>
        const ctx = document.getElementById('glucosaChart').getContext('2d');
        const glucosaChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($meses); ?>,
                datasets: [
                    {
                        label: 'Hipoglucemias',
                        data: <?php echo json_encode($hipoglucemias); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Hiperglucemias',
                        data: <?php echo json_encode($hiperglucemias); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
