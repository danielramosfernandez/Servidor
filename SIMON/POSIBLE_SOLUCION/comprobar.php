<?php
    session_start();
    if ($_SESSION["color"] == $_POST["resColor"]) {
        echo<<<_END
            <a href="index.php">Acertaste, nueva ronda</a>
        _END;
    } else {
        echo<<<_END
            <a href="index.php">Fallaste, nueva ronda</a>
        _END;
    }
?>