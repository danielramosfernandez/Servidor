<?php 
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "agenda"; 

$conn = new mysqli ($servername, $username,$password,$dbname); 

if($conn->connect_error){ 
    die("Conexión fallida: ". $conn->connect_error);
}
?>
