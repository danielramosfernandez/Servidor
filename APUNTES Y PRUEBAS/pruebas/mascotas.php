<?php

$mashcotas = array('Perro' => array(
    'mastin'=> "Yunito", 
    'Salchica'=> "Fuet",
    'Chihuahua'=> "Sarnoso"),
    'Gatos'=> array(
    'Persa'=> "Otis", 
    'Comun'=> "Gardfield", 
        'Siames'=>"Princesa"
    )
);
echo "<pre>";
foreach($mashcotas as $section => $items)
foreach($items as $key => $value)
echo "$section:\t$key\t($value)<br>";
echo "</pre>";
?> 