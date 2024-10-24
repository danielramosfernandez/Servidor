<?php 
    class Operaciones { 
        private $num1; 
        private $num2; 
    
        public function __construct($num1, $num2) { 
            $this->num1 = $num1; 
            $this->num2 = $num2; 
        }
    
        function sumar() { 
            return "La suma es igual a " . ($this->num1 + $this->num2); 
        } 
    
        function restar() { 
            return "La resta es igual a " . ($this->num1 - $this->num2); 
        }
    
        function multiplicacion() { 
            return "La multiplicación es igual a " . ($this->num1 * $this->num2); 
        }
    
        function division() { 
            if ($this->num2 != 0) {
                return "La división es igual a " . ($this->num1 / $this->num2); 
            } else {
                return "Error: División por cero.";
            }
        }
    }

?>