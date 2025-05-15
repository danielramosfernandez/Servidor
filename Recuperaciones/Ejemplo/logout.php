<?php
// logout.php
session_start();
session_destroy();
header("Location: ejercicio1.php");
exit(); ?>
