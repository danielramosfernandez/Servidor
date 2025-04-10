<?php
session_start();

if (isset($_GET['nivel'])) {
    $_SESSION['nivel'] = $_GET['nivel'];
    header("Location: jugar.php");
    exit();
}

header("Location: menu-dificultad.php");
exit();
?>