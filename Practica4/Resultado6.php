<?php
// Archivo: AplicacionEjecutor.php

// Incluye el archivo de las clases
include 'ClasesVehiculos.php';

class Ejecutor {
    public function ejecutar() {
        // Crear un coche verde de 2100 kg con 4 puertas
        $coche = new Coche("Verde", 2100, 4);
        echo "Coche creado: Verde, 2100 kg, 4 puertas." . Vehiculo::SALTO_DE_LINEA;

        // Añadir 2 cadenas para la nieve y una persona de 80 kg
        $coche->añadir_cadenas_nieve(2);
        $coche->añadir_persona(80);

        // Cambiar el color del coche a azul
        $coche->setColor("Azul");

        // Quitar 4 cadenas para la nieve
        $coche->quitar_cadenas_nieve(4);

        // Volver a pintar el coche en color negro
        $coche->setColor("Negro");

        // Mostrar todos los atributos del coche y el número de cambios de color
        Vehiculo::ver_atributo($coche);
    }
}

// Ejecución del ejemplo
$ejecutor = new Ejecutor();
$ejecutor->ejecutar();
?>