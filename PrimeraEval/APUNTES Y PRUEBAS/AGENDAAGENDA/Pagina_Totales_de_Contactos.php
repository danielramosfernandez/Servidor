<?php

$conn = new mysqli($servername, $username, $password, $dbname);


// Obtener los totales de contactos por usuario
$sql = "SELECT usuario, COUNT(*) AS num_contactos FROM contactos GROUP BY usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Totales de Contactos</title>
</head>
<body>
    <h1>Totales de Contactos</h1>
    <table>
        <tr>
            <th>Usuario</th>
            <th>Número de Contactos</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row["usuario"]; ?></td>
            <td><?php echo $row["num_contactos"]; ?></td>
        </tr>
        <?php } ?>
    </table>
    <div id="grafica"></div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Generar la gráfica
        const ctx = document.getElementById('grafica').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php
                         $sql = "SELECT usuario FROM contactos GROUP BY usuario";
                         $result = $conn->query($sql);
                         $labels = array();
                         while ($row = $result->fetch_assoc()) {
                             $labels[] = "'" . $row["usuario"] . "'";
                         }
                         echo implode(", ", $labels);
                         ?>],
                datasets: [{
                    label: 'Número de Contactos',
                    data: [<?php
                         $sql = "SELECT COUNT(*) AS num_contactos FROM contactos GROUP BY usuario";
                         $result = $conn->query($sql);
                         $data = array();
                         while ($row = $result->fetch_assoc()) {
                             $data[] = $row["num_contactos"];
                         }
                         echo implode(", ", $data);
                         ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>