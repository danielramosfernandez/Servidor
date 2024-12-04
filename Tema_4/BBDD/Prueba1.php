<?php
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db, 3307);
if ($conn->connect_error) die("Fatal Error");

$query = "SELECT usu, contra,rol FROM usuarios";
$result = $conn->query($query);
if (!$result) die("Fatal Error");
$rows = $result->num_rows;

for ($j = 0; $j < $rows; ++$j) {
    $result->data_seek($j);
    $row = $result->fetch_assoc();
    echo 'Usuario: ' . htmlspecialchars($row['usu']) . '<br>';
    echo 'Contraseña: ' . htmlspecialchars($row['contra']) . '<br>';
    echo 'Rol: ' . htmlspecialchars($row['rol']) . '<br><br>';
} 
$result->close();
 $conn->close(); 
/* 
if (isset($_POST['id']) && isset($_POST['usu']) && isset($_POST['contra']) && isset($_POST['rol'])) {
    $id = $conn->real_escape_string($_POST['id']);
    $usu = $conn->real_escape_string($_POST['usu']);
    $contra = $conn->real_escape_string($_POST['contra']);
    $rol = $conn->real_escape_string($_POST['rol']);

    $query = "INSERT INTO usuarios (id, usu, contra, rol) VALUES ('$id', '$usu', '$contra', '$rol')";
    $result = $conn->query($query);
    if (!$result) echo "Insert failed <br><br>". $conn->error;;
} 
*/
echo <<<_END
<form action="login.php" method="post">
    <pre>
    Id: <input type="text" name="id">
    Usuario: <input type="text" name="usu">
    Contraseña: <input type="text" name="contra">
    Rol: <input type="text" name="rol">
    <input type="submit" value="AÑADIR">
    </pre>
</form>
_END;
 

 

?>
