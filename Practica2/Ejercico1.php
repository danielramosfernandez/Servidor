<?php 
/* Apartado A */
echo "-APARTADO A-";
echo "<br>";
$coches = array (32,11,45,22,78,-3,9,66,5); 
echo "En la posición 5 tenemos el número: ";
echo $coches['5'];

/* Apartado B */ 
echo "<br>"; 
echo "<br>";  
echo "-APARTADO B-";
echo "<br>";
$importe= array (32.583,11.239,45.781,22.237);  
echo "El importe de la posición 1: ";
echo $importe['1'];
echo "<br>";
echo "El importe de la posición 3: ";
echo $importe['3']; 

/* APARTADO C */
echo "<br>"; 
echo "<br>"; 
echo "-APARTADO C-";
echo "<br>"; 
$confirmado = array(true, true, false, true, false, false); 
echo "La posición cero es ";
echo $confirmado['0']; 

/* APARTADO D */
echo "<br>"; 
echo "<br>"; 
echo "-APARTADO D-";
echo "<br>"; 
$jugador = array("Crovic", "Antic", "Malic", "Zulic","Rostrich"); 
echo "La alineación del equipo está compuesta de ". $jugador[0] . ", ". $jugador[1]. ", ". $jugador[2] . ", ". $jugador[3]. " y ". $jugador[4] ;
?>