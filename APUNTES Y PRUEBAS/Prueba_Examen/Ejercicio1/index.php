<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <style>
        .contenedor-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        .contenedor-grid div {
            display: flex;
            align-items: center;
           
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Resultados en binario:</h2>";
    echo "<table border='1'>";

    for ($i = 0; $i < 2; $i++) {
        echo "<tr>";
        for ($j = 0; $j < 3; $j++) {
            $cajas = "E" . $i . "_" . $j;
            if (isset($_POST[$cajas])) {
                $numero = $_POST[$cajas];
                
                if (is_numeric($numero) && $numero >= 0 && $numero <= 100) {
                    $resultado = decbin($numero);
                    echo "<td>$resultado</td>";
                } else {
                    echo "<td>Introduce un número dentro de el rango (1-100)</td>";
                }
            }
        }
        echo "</tr>";
    }
    echo "</table><br><br>";
} else {
?>

    <form method="post" action="#">
        <div class="contenedor-grid">
            <div>E0_0 <input type="text" name="E0_0" ></div>
            <div>E0_1 <input type="text" name="E0_1" ></div>
            <div>E0_2 <input type="text" name="E0_2" ></div>
            <div>E1_0 <input type="text" name="E1_0" ></div>
            <div>E1_1 <input type="text" name="E1_1" ></div>
            <div>E1_2 <input type="text" name="E1_2" ></div>
        </div>
        <br>
        <button type="submit">Calcular</button>
    </form>

<?php
}
?>

</body>
</html>
