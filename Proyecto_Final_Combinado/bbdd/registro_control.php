<?php
session_start();
include('conexion.php');

// Verificar si el id_usu está en la sesión
if (!isset($_SESSION['id_usuario'])) {
    echo "No se ha iniciado sesión correctamente.";
    exit; // Detener la ejecución si no hay sesión activa
}

$idUsu = $_SESSION['id_usuario']; // Obtener el id de usuario desde la sesión

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoger los datos del formulario
    $comida = isset($_POST['flexRadioDefault']) ? $_POST['flexRadioDefault'] : '';
    $glucosa1ha = isset($_POST['glucosa1']) ? $_POST['glucosa1'] : '';
    $glucosa2hd = isset($_POST['glucosa2']) ? $_POST['glucosa2'] : '';
    $insulina = isset($_POST['insulina']) ? $_POST['insulina'] : '';
    $deporte = isset($_POST['deporte']) ? $_POST['deporte'] : '';
    $lenta = isset($_POST['lenta']) ? $_POST['lenta'] : '';
    $raciones = isset($_POST['raciones']) ? $_POST['raciones'] : '';
    $glucosaEstado = isset($_POST['glucosaEstado']) ? $_POST['glucosaEstado'] : '';

    $medidaGlucosa = '';
    $hora = '';
    $correccion = '';

    // Verificar si se seleccionó hiperglucemia
    if ($glucosaEstado == 'hiperglucemia') {
        $medidaGlucosa = isset($_POST['glucosaMedida']) ? $_POST['glucosaMedida'] : '';
        $hora = isset($_POST['hora']) ? $_POST['hora'] : '';
        $correccion = isset($_POST['correccion']) ? $_POST['correccion'] : '';
    }

    // Verificar si se seleccionó hipoglucemia
    if ($glucosaEstado == 'hipoglucemia') {
        $medidaGlucosa = isset($_POST['glucosa']) ? $_POST['glucosa'] : '';
        $hora = isset($_POST['hora']) ? $_POST['hora'] : '';
    }

       // Validar que los campos obligatorios estén completos
       if (empty($comida) || empty($glucosa1ha) || empty($glucosa2hd) || empty($insulina) || empty($deporte) || empty($lenta) || empty($raciones)) {
        echo "Por favor, rellene todos los campos.";
        exit;
    }

    // Insertar en la tabla de control_glucosa
    $sql_control_glucosa = "INSERT INTO control_glucosa (deporte, lenta, id_usu) VALUES (?, ?, ?)";
    $stmt_control_glucosa = $conexion->prepare($sql_control_glucosa);
    $stmt_control_glucosa->bind_param('ddi', $deporte, $lenta, $idUsu);
    $stmt_control_glucosa->execute();
    $control_glucosa_id = $stmt_control_glucosa->insert_id; // Obtener el ID del control_glucosa recién insertado
    $stmt_control_glucosa->close();

    // Insertar en la tabla de comida
    $sql_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, insulina, raciones, id_control_glucosa) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_comida = $conexion->prepare($sql_comida);
    $stmt_comida->bind_param('sddddi', $comida, $glucosa1ha, $glucosa2hd, $insulina, $raciones, $control_glucosa_id);
    $stmt_comida->execute();
    $stmt_comida->close();

    // Si es hiperglucemia, insertar en la tabla de hiperglucemia
    if ($glucosaEstado == 'hiperglucemia') {
        $sql_hiperglucemia = "INSERT INTO hiperglucemia (medidaGlucosa, hora, correccion, id_comida) VALUES (?, ?, ?, ?)";
        $stmt_hiperglucemia = $conexion->prepare($sql_hiperglucemia);
        $stmt_hiperglucemia->bind_param('sssi', $medidaGlucosa, $hora, $correccion, $control_glucosa_id);
        $stmt_hiperglucemia->execute();
        $stmt_hiperglucemia->close();
    }

    // Si es hipoglucemia, insertar en la tabla de hipoglucemia
    if ($glucosaEstado == 'hipoglucemia') {
        $sql_hipoglucemia = "INSERT INTO hipoglucemia (medidaGlucosa, hora, id_comida) VALUES (?, ?, ?)";
        $stmt_hipoglucemia = $conexion->prepare($sql_hipoglucemia);
        $stmt_hipoglucemia->bind_param('ssi', $medidaGlucosa, $hora, $control_glucosa_id);
        $stmt_hipoglucemia->execute();
        $stmt_hipoglucemia->close();
    }

    // Mensaje de éxito
    echo "Registro guardado correctamente.";
}
?>
