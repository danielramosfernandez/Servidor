<?php
include 'Ejercicio2.php';

class Ejecutor {
    public function ejecutar() {

        $moto = new DosRuedas("Rojo", 100, 125);
        echo "Moto creada.<br>";
        $moto->circula();
        $moto->poner_gasolina(5);

        echo "<br>";

        $coche = new CuatroRuedas("Azul", 1500, 4);
        echo "Coche creado.<br>";
        $coche->circula();
        $coche->repintar("Negro");
        $coche->añadir_persona(70);

        echo "<br>";

      
        $camion = new Camion("Blanco", 3000, 2, 8);
        echo "Camión creado.<br>";
        $camion->añadir_persona(80);
        $camion->añadir_remolque(4.5);
    }
}


$ejecutor = new Ejecutor();
$ejecutor->ejecutar();
?>