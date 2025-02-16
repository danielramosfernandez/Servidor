<?php

function comprobarUrl($url){ 
    if(filter_var($url, FILTER_VALIDATE_URL)){ //El filter validate sirve para comprobar el URL
        return true; //si al validar es correcto se devuelve true
    }else{ 
        return false;//si no false
    }
}

$url="https://www.educastur.es/"; //Introducimos un caso de prueba 

if(comprobarUrl($url)){ //Se llama a la función para comprobar y filtrar el URL
    echo "El URL $url es valido"; //En caso de ser valido se muestra este mensaje 
}else{ 
    echo "El URL $url no es valido";//Si no lo es se muestra este otro mensaje
}
?>