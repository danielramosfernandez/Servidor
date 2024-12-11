<?php
session_start(); 
require_once 'login.php';
$connection = new mysqli($hn, $un, $pw, $db,3307);
if ($connection->connect_error) die("Fatal Error");
if(!isset($_SESSION['contador'])){ 
  $_SESSION['contador']=0; 
  $_SESSION['emojis']=[] ; 
} 

$emojis=["OIP0","OIP1","OIP2","OIP3","OIP4"]; 

if(isset($_POST['incrementar'])){ 
    if($_SESSION['contador']<5){ 
        $_SESSION['contador']++; 
        $_SESSION['emojis'][]= $emojis[array_rand($emojis)]; 
    }
}
if (isset($_POST['grabar'])){  
    echo "<p>La cantidad de contactos que seran creados son: ". $_SESSION['contador']. "</p>";

}
if (isset($_POST['grabar'])) {
    // Redirige a agenda.php
    header("Location: agenda.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         
    </style>
</head>
<body>
    <h1>agenda</h1>
            <p>Hola <?php echo $_SESSION['usu']; ?>, cuantos contactos deseas grabar </p>
            <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más. </p>
            <p>Cuando el número sea el deseado pulsa grabar</p>
    
    <div>
           <?php
                if(!empty($_SESSION['emojis'])){ 
                    echo "<p>".implode(" ", $_SESSION['emojis']). "</p>";
                }
           ?>
        </div>
    <form action="#" method="post">
        <button type="submit" name="incrementar">INCREMENTAR</button>
        <button type="submit" name="grabar">GRABAR</button>
    </form>
    
    
</body>
</html>