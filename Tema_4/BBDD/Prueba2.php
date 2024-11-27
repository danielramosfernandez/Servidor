<?php  
require_once 'login.php'; 
$conn =new mysqli($hn,$un,$pw,$db,3307); 
$consulta = "INSERT INTO usuarios (Usu, contra, Rol) VALUES ('Yolanda', 'Yolanda', 'jugador')";
$result=$conn->query($consulta);  

mysqli_close($conn); 
?>