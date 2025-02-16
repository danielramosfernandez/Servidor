<?php

$nume=rand(1,100);

$primo=true;
if ($num==1) {
  $primo=false;
} 
else {
  //for para recorrer los numeros primos
  for ($x=2; $x<=$nume/2; $x++) { 
    if ($nume % $x == 0) {
      $primo=false;
    }
  }
}

if ($primo) {
  echo "$nume es un número primo";
} else {
  echo "$nume no es número primo";
}
?>