<?php
// Función para pintar los círculos dinámicamente
function pintar_circulos(...$colores) {
    // Iterar sobre los colores y pintar los círculos
    foreach ($colores as $color) {
        // Verificamos que el color no sea vacío o nulo
        if (!empty($color)) {
            echo "<div class='circulo' style='background-color: $color'></div>";
        }
    }
}
?>
