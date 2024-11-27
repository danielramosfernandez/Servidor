<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db, 3307);
if ($conn->connect_error) die("Fatal Error: " . $conn->connect_error);

if (isset($_POST['usu']) && isset($_POST['contra']) && isset($_POST['rol'])) {
    $usu =get_post($conn,'usu');
    $contra = get_post($conn,'contra');
    $rol = get_post($conn,'rol');

    $query = "INSERT INTO usuarios VALUES ('usu','contra','rol')";
    $result = $conn->query($query);
    if (!$result) echo "INSERT failed<br><br>";
}

echo <<<_END
<form action="login.php" method="post"><pre>
    Usuario: <input type="text" name="usu">
    Contraseña: <input type="text" name="contra">
    Rol: <input type="text" name="rol">
    <input type="submit" value="AÑADIR">
</pre></form>
_END;


 $conn->close(); 
?>

