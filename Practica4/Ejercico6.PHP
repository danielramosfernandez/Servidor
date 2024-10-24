<?php
class Vehiculo {
    protected $color;
    private $peso;
    const SALTO_DE_LINEA = "<br />";
    protected static $numero_cambio_color = 0;

    public function __construct($color, $peso) {
        $this->color = $color;
        $this->setPeso($peso);
    }

    public function circula() {
        echo "El vehículo está en movimiento." . self::SALTO_DE_LINEA;
    }

    public function añadir_persona($peso_persona) {
        $this->setPeso($this->peso + $peso_persona);
        echo "Nuevo peso del vehículo: " . $this->peso . " kg" . self::SALTO_DE_LINEA;
    }

    public function setColor($color) {
        $this->color = $color;
        self::$numero_cambio_color++;
        echo "El color del vehículo ha sido cambiado a: " . $this->color . self::SALTO_DE_LINEA;
    }

    public static function ver_atributo($objeto) {
        echo "Color: " . $objeto->color . ", Peso: " . $objeto->peso . " kg, Cambios de color: " . self::$numero_cambio_color . self::SALTO_DE_LINEA;
    }

    public function setPeso($peso) {
        if ($peso <= 2100) {
            $this->peso = $peso;
        } else {
            echo "El peso excede el límite permitido de 2100 kg." . self::SALTO_DE_LINEA;
        }
    }
}

class CuatroRuedas extends Vehiculo {
    private $numero_puertas;

    public function __construct($color, $peso, $numero_puertas) {
        parent::__construct($color, $peso);
        $this->numero_puertas = $numero_puertas;
    }

    public function repintar($color) {
        $this->setColor($color);
    }
}

class DosRuedas extends Vehiculo {
    private $cilindrada;

    public function __construct($color, $peso, $cilindrada) {
        parent::__construct($color, $peso);
        $this->cilindrada = $cilindrada;
    }

    public function poner_gasolina($litros) {
        echo "Se han añadido " . $litros . " litros de gasolina." . self::SALTO_DE_LINEA;
    }
}


class Coche extends CuatroRuedas {
    private $numero_cadenas_nieve = 0;

    public function añadir_cadenas_nieve($num) {
        $this->numero_cadenas_nieve += $num;
        echo "Se han añadido " . $num . " cadenas de nieve al coche." . self::SALTO_DE_LINEA;
    }

    public function quitar_cadenas_nieve($num) {
        $this->numero_cadenas_nieve = max(0, $this->numero_cadenas_nieve - $num);
        echo "Se han quitado " . $num . " cadenas de nieve del coche." . self::SALTO_DE_LINEA;
    }

    public function añadir_persona($peso_persona) {
        parent::añadir_persona($peso_persona);
        if ($this->peso > 1500 && $this->numero_cadenas_nieve <= 2) {
            echo "Atención, ponga 4 cadenas para la nieve." . self::SALTO_DE_LINEA;
        }
    }
}


class Camion extends CuatroRuedas {
    private $longitud;

    public function __construct($color, $peso, $numero_puertas, $longitud) {
        parent::__construct($color, $peso, $numero_puertas);
        $this->longitud = $longitud;
    }

    public function añadir_remolque($longitud_remolque) {
        echo "Se ha añadido un remolque de longitud " . $longitud_remolque . " metros." . self::SALTO_DE_LINEA;
    }
}
?>