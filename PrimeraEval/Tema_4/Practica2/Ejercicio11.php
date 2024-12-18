<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULARIO</title> 
</head>
<body>
    <h2>PHP Form Validation Example</h2>
    
    <?php
     function comprobarMail($email) { 
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    } 

    $nameErr = "";
    $name = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {     
            $nameErr = "El nombre es obligatorio";   
        } else {     
            $name = trim($_POST["name"]);
            $name = stripslashes($name);
            $name = htmlspecialchars($name); 
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {      
                $nameErr = "Únicamente se permiten letras y espacios";      
            }
        }
    }

    $emailErr= ""; 
    $email= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["email"])) {     
            $emailErr = "El e-mail es obligatorio";   
        } else {     
            $email = trim($_POST["email"]);
            $email = stripslashes($email);
            $email = htmlspecialchars($email); 
            if (!preg_match("/^[a-zA-Z ]*$/", $email)) {      
                $emailErr = "Únicamente se permiten letras y espacios";      
            }
        }
    }
    $urlErr= ""; 
    $url= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["url"])) {     
            $urlErr = "El url es obligatorio";   
        } else {     
            $url = trim($_POST["url"]);
            $url = stripslashes($url);
            $url = htmlspecialchars($url); // Sanitizar la entrada
            if (!preg_match("/^[a-zA-Z ]*$/", $url)) {      
                $urlErr = "Únicamente se permiten letras y espacios";      
            }
        }
    }
    $comment= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["comment"])) {
        $comment = htmlspecialchars($_POST["comment"]); 
        //echo "<h3>Tu comentario:</h3>";
        //echo "<p>" . nl2br($comment) . "</p>";
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["name"]) && !empty($_POST["comment"])) {
            $name = htmlspecialchars($_POST["name"]); 
            $comment = htmlspecialchars($_POST["comment"]);
        }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Nombre: </label> 
        <input type="text" name="name" value="<?php echo $name; ?>"/>
        <span style="color:red;"><?php echo $nameErr; ?></span>
        <br><br>
        
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $email ?>"/> 
        <span style="color:red;"><?php echo $nameErr; ?></span>
        <br><br>
        
        <label>Url: </label>
        <input type="text" name="url" value="<?php echo $url ?>"/> 
        <span style="color:red;"><?php echo $urlErr; ?></span>
        <br><br>
        
        <label for="comment">Comentario: </label>
        <textarea name="comment" id="comment" rows="5" cols="40"><?php echo $comment; ?></textarea>
        <br><br>
        <input type="submit" value="Enviar">
    </form> 
    <br>
    <h2>Tu info:</h2>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($name) && !empty($comment)) {
    echo "Nombre: ". $name. "<br>";
    echo "Email: ". $email. "<br>"; 
    echo "Url: ". $url. "<br>"; 
    echo "Comentarios: ". $comment. "<br>";
     }
    ?>
</body>
</html>