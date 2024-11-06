<?php
    session_start();
    if ($_SESSION["color"] == $_POST["resColor"]) {
        echo<<<_END
            <a href="Simon.php">Acertaste, nueva ronda</a>
        _END;
    } else {
        echo<<<_END
            <a href="Simon.php">Fallaste, nueva ronda</a>
        _END;
    }
?>