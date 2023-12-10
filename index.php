<?php
session_start();

// Verificar si el usuario ya está autenticado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: /home'); // Redirigir al menú principal si el usuario ya está autenticado
    exit;
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    // Conexión a la base de datos (reemplaza con tus propias credenciales)
    $mysqli = new mysqli("201.106.88.95", "u1_hkKzoF0xtJ", "ygzPOVxQU2U=wFk!X8ZXx+ei", "s1_loginweb");

    // Verificar la conexión a la base de datos
    if ($mysqli->connect_error) {
        die("Conexión fallida: " . $mysqli->connect_error);
    }

    // Utilizar consultas preparadas para evitar la inyección SQL
    $query = "SELECT nombre, contrasena, rol FROM usuarios WHERE nombre = ? AND contrasena = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $nombre_usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Autenticación exitosa, establecer una sesión como usuario autenticado
        $usuario = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['nombre_usuario'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['rol'];

        // Redirigir al menú principal
        header('Location: /home');
        exit;
    } else {
        // Credenciales inválidas, mostrar un mensaje de error
        $error_message = "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
    $mysqli->close();
}

include 'gestion_usuarios.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="https://launcher.latervictor.dev/storage/img/favicon.png">
</head>
<body>
    <div class="container">
        <header>
            <h1>Iniciar Sesión</h1>
        </header>
        <main>
            <!-- Mostrar mensaje de error si las credenciales son inválidas -->
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
            
            <!-- Formulario de inicio de sesión -->
            <form action="" method="POST">
                <label for="nombre_usuario">Nombre de Usuario:</label>
                <input type="text" id="nombre_usuario" name="nombre_usuario" required>
                <br>
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <br>
                <input type="submit" value="Iniciar Sesión">
            </form>
        </main>
    </div>
</body>
</html>
