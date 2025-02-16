<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validador de meses de un año</title>
    <style>
        table {
            border-collapse: collapse;
            width: 200px;
        }
        th {
            background-color: blue;
            color: white;
        }
        th, td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Comrprobador de dias en un mes</h2>

<form method="POST">
    <label for="month">Introduce un mes del 1 al 12: </label>
    <input type="text" id="month" name="month" required>

    <label for="year"> y el año que quieres revisar:</label>
    <input type="text" id="year" name="year" required>
    <br><br>
    <button type="submit">Generar Calendario</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $month = intval($_POST['month']);
    $year = intval($_POST['year']);

  
    if ($month < 1 || $month > 12) {
        echo "<p>Por favor, ingresa un mes válido (1-12).</p>";
    } else {

        echo generarCalendario($month, $year);
    }
}

function generarCalendario($mes, $año) {
    $dias_semana = ['L', 'M', 'X', 'J', 'V', 'S', 'D'];
    $dias_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $año);
    $primer_dia_mes = date('N', strtotime("$año-$mes-01"));

  
    $html = "<h3>Calendario de $mes / $año</h3>";
    $html .= "<table><thead><tr>";


    foreach ($dias_semana as $dia) {
        $html .= "<th>$dia</th>";
    }
    $html .= "</tr></thead><tbody><tr>";

    for ($i = 1; $i < $primer_dia_mes; $i++) {
        $html .= "<td></td>";
    }


    for ($dia = 1; $dia <= $dias_mes; $dia++) {
        $html .= "<td>$dia</td>";

        if (($dia + $primer_dia_mes - 1) % 7 == 0) {
            $html .= "</tr><tr>";
        }
    }

    $celdas_restantes = (7 - (($dias_mes + $primer_dia_mes - 1) % 7)) % 7;
    for ($i = 0; $i < $celdas_restantes; $i++) {
        $html .= "<td></td>";
    }

    $html .= "</tr></tbody></table>";
    return $html;
}
?>
</body>
</html>