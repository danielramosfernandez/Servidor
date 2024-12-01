<?php  
require_once 'login.php'; 
$conn =new mysqli($hn,$un,$pw,$db,3307); 
$consulta = "DELETE FROM usuarios WHERE usu='Yolanda' AND con='Yolanda123' AND rol='jugador'";
$result=$conn->query($consulta);  
mysqli_close($conn); 
?>