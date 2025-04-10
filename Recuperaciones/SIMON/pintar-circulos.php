<?php
function pintar_circulos(...$colores) {
    foreach ($colores as $color) {
        if (!empty($color)) {
            echo "<div class='circulo' style='background-color: $color'></div>";
        }
    }
}
?>
