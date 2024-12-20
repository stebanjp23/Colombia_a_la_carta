<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger y limpiar los datos del formulario
    $nombre = htmlspecialchars(trim($_POST['nom_r']));
    $email = htmlspecialchars(trim($_POST['email_r']));
    $opinion = htmlspecialchars(trim($_POST['opinion_r']));

    // Validaciones básicas
    if (empty($nombre) || empty($email) || empty($opinion)) {
        echo "Por favor, completa todos los campos.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "El correo electrónico no es válido.";
        exit;
    }

    // Guardar los datos en un archivo de texto o base de datos (opcional)
    $archivo = "opiniones.txt"; // Nombre del archivo donde se guardarán las opiniones
    $contenido = "Nombre: $nombre\nCorreo: $email\nOpinión: $opinion\n---\n";

    if (file_put_contents($archivo, $contenido, FILE_APPEND)) {
        echo "¡Gracias por tu opinión! La hemos recibido correctamente.";
    } else {
        echo "Hubo un error al guardar tu opinión. Por favor, inténtalo de nuevo.";
    }
}
?>
