<?php
$usu = 'Pepito'; 
$pass = '123'; 

if ($_GET['usu'] == $usu && $_GET['pass'] == $pass) { 
    echo "Bienvenido";
} else { 
    echo"Usuario no existente, registrese por favor<br> ";
    echo<<<_END
    <a href="acceso.php">Vuelva al acceso para registrarse</a>
_END;
}
?>
