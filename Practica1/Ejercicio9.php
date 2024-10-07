<?php

$num=rand(1,100);

$esprimo=true;
if ($num==1) {
  $esprimo=false;
} else {
  for ($i=2; $i<=$num/2; $i++) {
    if ($num % $i == 0) {
      $esprimo=false;
    }
  }
}
if ($esprimo) {
  echo "$num es primo";
} else {
  echo "$num NO es primo";
}
?>