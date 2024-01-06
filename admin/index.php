<?php
session_start();

// Check if the user is authenticated in the PHP session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If the user is not an administrator, send a 403 Forbidden response
    http_response_code(403);

    // Set the custom HTML message
    $htmlMessage = <<<HTML
<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="shortcut icon" href="../favicon.png">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forbidden</title>
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}code{font-family:monospace,monospace;font-size:1em}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}code{font-family:Menlo,Monaco,Consolas,Liberation Mono,Courier New,monospace}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-gray-400{--border-opacity:1;border-color:#cbd5e0;border-color:rgba(203,213,224,var(--border-opacity))}.border-t{border-top-width:1px}.border-r{border-right-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-xl{max-width:36rem}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.uppercase{text-transform:uppercase}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.tracking-wider{letter-spacing:.05em}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@-webkit-keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@keyframes spin{0%{transform:rotate(0deg)}to{transform:rotate(1turn)}}@-webkit-keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@keyframes ping{0%{transform:scale(1);opacity:1}75%,to{transform:scale(2);opacity:0}}@-webkit-keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@keyframes pulse{0%,to{opacity:1}50%{opacity:.5}}@-webkit-keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@keyframes bounce{0%,to{transform:translateY(-25%);-webkit-animation-timing-function:cubic-bezier(.8,0,1,1);animation-timing-function:cubic-bezier(.8,0,1,1)}50%{transform:translateY(0);-webkit-animation-timing-function:cubic-bezier(0,0,.2,1);animation-timing-function:cubic-bezier(0,0,.2,1)}}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>
        <style>
            body {
                font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                    <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                        403
                    </div>

                    <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                        Forbidden
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
HTML;

    echo $htmlMessage;
    exit;
}

// Establecer la conexión a la base de datos (reemplaza los valores con los tuyos)
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "databaname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Procesar el formulario para agregar usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar_usuario'])) {
    // Recuperar datos del formulario
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];

    // Realizar la inserción en la base de datos
    $insert_query = "INSERT INTO usuarios (nombre, contrasena, rol) VALUES ('$nombre_usuario', '$contrasena', '$rol')";
    if ($conn->query($insert_query) === TRUE) {
        echo "Usuario agregado correctamente.";
    } else {
        echo "Error al agregar usuario: " . $conn->error;
    }
}

// Procesar el formulario para eliminar usuario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_usuario'])) {
    // Recuperar el ID del usuario a eliminar
    $id_usuario = $_POST['id_usuario'];

    // Realizar la eliminación en la base de datos
    $delete_query = "DELETE FROM usuarios WHERE id = '$id_usuario'";
    if ($conn->query($delete_query) === TRUE) {
        echo "Usuario eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
}

// Procesar el formulario para cambiar contraseña
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cambiar_contrasena'])) {
    // Recuperar datos del formulario
    $id_usuario_cambio = $_POST['id_usuario_cambio'];
    $nueva_contrasena = $_POST['nueva_contrasena'];

    // Realizar la actualización en la base de datos
    $update_query = "UPDATE usuarios SET contrasena = '$nueva_contrasena' WHERE id = '$id_usuario_cambio'";
    if ($conn->query($update_query) === TRUE) {
        echo "Contraseña cambiada correctamente.";
    } else {
        echo "Error al cambiar la contraseña: " . $conn->error;
    }
}

// Consulta para obtener la lista de usuarios
$select_query = "SELECT id, nombre, rol FROM usuarios";
$result = $conn->query($select_query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Configuración de Usuarios</title>
    <link rel="shortcut icon" href="../favicon.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>Configuración de Usuarios</h1>

        <div class="section">
            <h2>Agregar Usuario</h2>
            <!-- Formulario de agregar usuario -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
                <input type="password" name="contrasena" placeholder="Contraseña" required>
                <select name="rol">
                    <option value="admin">Admin</option>
                    <option value="member">Miembro</option>
                </select>
                <input type="submit" name="agregar_usuario" value="Agregar Usuario">
            </form>
        </div>

        <div class="section">
            <h2>Eliminar Usuario</h2>
            <!-- Formulario de eliminar usuario -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <select name="id_usuario">
                    <?php
                    // Obtener la lista de usuarios para el formulario de eliminación
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" name="eliminar_usuario" value="Eliminar Usuario">
            </form>
        </div>

        <div class="section">
            <h2>Lista de Usuarios</h2>
            <!-- Mostrar la lista de usuarios -->
            <ul>
                <?php
                $result = $conn->query("SELECT id, nombre, rol FROM usuarios");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>ID: " . $row['id'] . " - Nombre: " . $row['nombre'] . " - Rol: " . $row['rol'] . "</li>";
                        // Agregar formulario para cambiar contraseña
                        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                        echo "<input type='hidden' name='id_usuario_cambio' value='" . $row['id'] . "'>";
                        echo "<input type='password' name='nueva_contrasena' placeholder='Nueva Contraseña' required>";
                        echo "<input type='submit' name='cambiar_contrasena' value='Cambiar Contraseña'>";
                        echo "</form>";
                    }
                } else {
                    echo "No hay usuarios en la base de datos.";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
