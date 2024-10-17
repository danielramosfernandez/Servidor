<?php


include 'ClasesVehiculos.php';

class Ejecutor {
    public function ejecutar() {
       
        $coche = new Coche("Verde", 2100, 4);
        echo "Coche creado: Verde, 2100 kg, 4 puertas." . Vehiculo::SALTO_DE_LINEA;

   
        $coche->añadir_cadenas_nieve(2);
        $coche->añadir_persona(80);

       
        $coche->setColor("Azul");

        $coche->quitar_cadenas_nieve(4);

   
        $coche->setColor("Negro");

      
        Vehiculo::ver_atributo($coche);
    }
}

$ejecutor = new Ejecutor();
$ejecutor->ejecutar();
?>