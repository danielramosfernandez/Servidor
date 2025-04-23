<?php


function pintar($levanta) {
    $baraja = $_SESSION['baraja'];

    for ($i = 0; $i < count($baraja); $i++) {
        if ($levanta !== -1 && $i === $levanta - 1) {
            $img = "cartas/" . $baraja[$i] . ".jpg";
        } else {
            $img = "cartas/boca_abajo.jpg";
        }

        echo "<img src='$img' width='260' height='400'>";
    }
}
?>
