<?php
    // Inicia la sesión para poder acceder a las variables de sesión
    session_start();

    // Comprueba si el valor almacenado en $_SESSION["color"] es igual al valor de $_POST["resColor"]
    if ($_SESSION["color"] == $_POST["resColor"]) {
        // Si los colores coinciden, muestra un enlace indicando "Acertaste, nueva ronda"
        echo <<< _END
            <a href="index.php">Acertaste, nueva ronda</a>
        _END;
    } else {
        // Si los colores no coinciden, muestra un enlace indicando "Fallaste, nueva ronda"
        echo <<< _END
            <a href="index.php">Fallaste, nueva ronda</a>
        _END;
    }
?>
