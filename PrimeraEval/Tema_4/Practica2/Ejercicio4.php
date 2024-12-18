<?php

$sexoErr = isset($sexoErr) ? $sexoErr : "";


$sexo = "mujer"; 
?>

<input type="radio" name="sexo" value="mujer"  
    <?php if (isset($sexo) && $sexo == "mujer") echo "checked"; ?>> Mujer
//Es un boton tipo radiio, en este caso es el boton de mujer 
<input type="radio" name="sexo" value="hombre"  
    <?php if (isset($sexo) && $sexo == "hombre") echo "checked"; ?>> Hombre
//Es un boton igual al de arriba que 
<span class="error">*<?php echo $sexoErr; ?></span><br><br>
