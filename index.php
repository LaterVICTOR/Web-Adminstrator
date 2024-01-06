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
    $mysqli = new mysqli("66.181.33.169", "u1_qTW4RVmuMV", "2rSL8zp1XdjdZ!urGngkoAnN", "s1_webadmin");

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
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="./favicon.png">
    <style>
        #version,
        #repo-version {
            margin-top: 10px;
            font-weight: bold;
            color: #333;
        }

        .update-alert {
            color: #ff0000;
            font-weight: bold;
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Login</h1>
        </header>
        <main>
            <!-- Show error message if credentials are invalid -->
            <?php if (isset($error_message)) { ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php } ?>
            
            <p id="version"></p>
                <p id="repo-version"></p>
            <!-- Login form -->
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" value="Login">
                <div></div>
                <div></div>
                <p id="creator">Created by: LaterVICTOR</p>
            </form>
        </main>
    </div>
    <footer>
        <!-- Link de version repository -->
        <script src="update.js"></script>
    </footer>
</body>
</html>



