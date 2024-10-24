<?php
class Vehiculo{  
    public $color; 
    public $peso; 


    public function __construct($color, $peso) { 
        $this->color = $color; 
        $this->peso = $peso; 
    }

    public function detalles() { 
        return "Color: $this->color, Peso: $this->peso";
    }
    public function circula() {
        echo "El vehículo está en movimiento.<br>";
    }

    public function añadir_persona($peso_persona) {
        $this->peso += $peso_persona;
        echo "Nuevo peso del vehículo: " . $this->peso . " kg<br>";
    }
}
    class Cuatro_ruedas extends Vehiculo{ 
        public $numero_puertas; 
        public function __construct($color,$peso,$numero_puertas){  
            parent::__($color,$peso); 
            $this->numero_puertas=$numero_puertas; 
        }
        public function repintar($color){ 
            $this->setColor($color);
        }

    } 
    class Dos_ruedas extends Vehiculo{ 
        public $cilindrada; 
        public function __construct($color,$peso,$cilindrada){ 
            parent::__($color,$peso); 
            $this->cilindrada=$cilindrada;
        }
        public function anadir_gaso($litros){ 
            echo "Se han añadido ".$litros." al vehiculo de dos ruedas";
        }
    } 
    class Coche extends Vehiculo{ 
        public $numero_cadenas_nieve; 
        public function __construct($color,$peso,$numero_cadenas_nieve){ 
            parent::__($color,$peso); 
            $this->numero_cadenas_nieve=$numero_cadenas_nieve; 
        }
        public function aniadir_cadenas_nieve($num){ 
            echo "Se han añadido ".$num." cadenas de nieve";
        }
        public function quitar_cadenas_nieve($num){ 
            echo "Se han quitado ".$num." cadenas de nieve"; 
        }
    } 
    class Camion extends Vehiculo{ 
        public $longitud; 
        public function __construct($color,$peso,$longitud){ 
            parent::__($color,$peso); 
            $this->longitud=$longitud; 
        }
        public function aniadir_remolque($longitud_remolque){
            echo "Se ha añadido un remolque de ".$longitud_remolque." metros"; 
         }
    }

    
?>