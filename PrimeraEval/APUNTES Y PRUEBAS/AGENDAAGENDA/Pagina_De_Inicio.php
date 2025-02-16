Página de Inicio
<?php // Iniciar sesión session_start(); // Conexión a la base de datos $servername = "localhost"; $username = "root"; $password = ""; $dbname = "AGENDA"; $conn = new mysqli($servername, $username, $password, $dbname); // Verificar conexión if ($conn->connect_error) { die("Conexión fallida: " . $conn->connect_error); } // Obtener el nombre del usuario logueado $usuario_logueado = $_SESSION["usuario"]; // Generar entre 1 y 5 emojis aleatorios $emojis = array("😀", "😃", "😄", "😁", "😆", "😅", "😂", "🤣", "☺️", "😊"); $num_emojis = rand(1, 5); $emojis_mostrados = array_rand($emojis, $num_emojis); ?> <!DOCTYPE html> <html> <head> <title>Página de Inicio</title> </head> <body> <h1>Bienvenido, <?php echo $usuario_logueado; ?>!</h1> <p>Haz clic en el botón para añadir más contactos a tu agenda:</p> <?php foreach ($emojis_mostrados as $emoji) { ?> <span style="font-size: 2em;"><?php echo $emoji; ?></span> <?php } ?> <br> <button id="incrementar-emoji">INCREMENTAR</button> <script> let numEmojis = <?php echo $num_emojis; ?>; const incrementarEmojiButton = document.getElementById("incrementar-emoji");
    incrementarEmojiButton.addEventListener("click", function() {
        if (numEmojis < 5) {
            const newEmoji = "<?php echo $emojis[array_rand($emojis)]; ?>";
            const emojiSpan = document.createElement("span");
            emojiSpan.style.fontSize = "2em";
            emojiSpan.textContent = newEmoji;
            document.body.appendChild(emojiSpan);
            numEmojis++;
        } else {
            window.location.href = "Página_de_Agenda.php";
        }
    });
</script>
</body> </html>