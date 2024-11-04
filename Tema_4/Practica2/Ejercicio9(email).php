<?php

function comprobarMail($email){ 
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ //El filter validate sirve para comprobar el email
        return true; //si al validar es correcto se devuelve true
    }else{ 
        return false;//si no false
    }
}

$email="danidrf06@gmail.com"; //Introducimos un caso de prueba 

if(comprobarMail($email)){ //Se llama a la función para comprobar y filtrar el mail
    echo "El email $email es valido"; //En caso de ser valido se muestra este mensaje 
}else{ 
    echo "El email $email no es valido";//Si no lo es se muestra este otro mensaje
}
?>