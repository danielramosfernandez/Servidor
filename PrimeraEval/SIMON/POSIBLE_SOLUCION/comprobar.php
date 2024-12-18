<?php
    
    session_start();
    require_once "pintar-circulos.php";
    ?>
    <!DOCTYPE html>
        <html>
        <head>
            <style>
                .circulos {
                    display: flex;
                }
                .circulo {
                    width: 100px;       
                    height: 100px;      
                    
                    border-radius: 50%; 
                }
            </style>
        </head>
    <?php
    if ($_SESSION["solucion"] == $_SESSION["respuesta"]) {
    ?>
        
        <body>
            <h2>CORRECTO</h2>
            <div class="circulos">
                <?php pintar_circulos($_SESSION["solucion"][0],$_SESSION["solucion"][1],$_SESSION["solucion"][2],$_SESSION["solucion"][3]);?>
            </div>
            <a href="index.php">Acertaste, nueva ronda</a>
        </body>
        </html>
        <?php
    } else {
        ?>
        <body>
            <h2>LA COMBINACIÓN CORRECTA ERA:</h2>
            <div class="circulos">
                
                <?php pintar_circulos($_SESSION["solucion"][0],$_SESSION["solucion"][1],$_SESSION["solucion"][2],$_SESSION["solucion"][3]);?>
            </div>
            <h2>TU RESPUESTA:</h2>
            <div class="circulos">
                
                <?php pintar_circulos($_SESSION["respuesta"][0],$_SESSION["respuesta"][1],$_SESSION["respuesta"][2],$_SESSION["respuesta"][3]);?>
            </div>
            <a href="index.php">Fallaste, nueva ronda</a>
        </body>
        </html>
        <?php
    }
    session_destroy();
    
?>