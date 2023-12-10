<?php
session_start();

// Destruir la sesión actual
session_destroy();

// Redirigir a la página de inicio de sesión o a cualquier otra página que desees
header('Location: /'); // Cambia 'index.php' por la página de inicio de sesión deseada
exit;
?>
