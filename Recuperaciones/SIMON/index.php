//&Seccion de conexion a la base
<?php
session_start(); 
require_once 'conexion.php'; 
//&Comprobamos que el usuario ha sido escrito en el formulario
if(isset($_POST['usu'])){ 
$usu= $_POST['usu']; 
$contra= $_POST['psw']; 

//&Se abre la conexion
$connection = new mysqli($hn,$un,$pw,$db); 
if ($connection->connect_error) die("Fatal Error"); 

//&Consulta
$query="SELECT Codigo,Nombre,Clave FROM usuarios WHERE Nombre='$usu' AND Clave='$psw'";
$result=$connection->query($query); 

if(!$result) die("Fatal  Error"); 
$rows = $result->num_rows; 
if($rows!=0){ 
    $_SESSION['usu']=$_POST['usu']; 
    //&Reiniciamos el puntero con data seek
    $result-> data_seek(0);
    $_SESSION['cod']=htmlspecialchars($result->fetch_assoc['Codigo']); 
    echo "LOGUEADO CORRECTAMENTE"; 
    $connection->close(); 
    echo<<<_END
        <meta http-equiv="refresh" content="0;URL='jugar.php"/>
    _END;
}else{ 
    session_destroy();
    echo "<a href='index.php'>NO EXISTE EL USUARIO Y/O CONTRASEÑA, VUELVA A INTENTARLO</a>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN</title>
</head>
<body>
    <h1>JUGAR AL SIMÓN</h1>
    <form action="#" method="post">
        <label for="usu">Usuario: </label>
        <input type="text" id="usu" name="usu" required><br>
        <label for="psw">Contraseña: </label>
        <input type="password" id="psw" name="psw" required><br> 
        <input type="submit" value="Iniciar" name="submit">
    </form>
</body>
</html>