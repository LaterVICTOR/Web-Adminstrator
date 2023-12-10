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
        <!-- Meta tags and styles for the Forbidden page -->
        <link rel="shortcut icon" href="../favicon.png">
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

// Process the form to change the password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set the database connection (replace values with yours)
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "db_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Database connection error: " . $conn->connect_error);
    }

    // Retrieve form data
    $username = $_SESSION['nombre_usuario'];
    $current_password = $_POST['contrasena_actual'];
    $new_password = $_POST['nueva_contrasena'];

    // Check the current password in the database
    $query = "SELECT nombre, contrasena FROM usuarios WHERE nombre = '$username' AND contrasena = '$current_password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Update the password in the database
        $update_query = "UPDATE usuarios SET contrasena = '$new_password' WHERE nombre = '$username'";
        if ($conn->query($update_query) === TRUE) {
            echo "Password changed successfully.";
        } else {
            echo "Error changing password: " . $conn->error;
        }
    } else {
        echo "Incorrect current password.";
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../favicon.png">
    <!-- Head content for the Main Menu page -->
</head>
<body>
    <div class="container">
        <header>
            <!-- Change the profile picture based on the user's rol -->
            <?php if ($_SESSION['rol'] === 'admin') { ?>
                <!-- Admin profile content -->
            <?php } elseif ($_SESSION['rol'] === 'member') { ?>
                <!-- Member profile content -->
            <?php } ?>
        </header>
        <div>
            <h2>Change Password</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label for="contrasena_actual">Current Password:</label>
                <input type="password" id="contrasena_actual" name="contrasena_actual" required><br>

                <label for="nueva_contrasena">New Password:</label>
                <input type="password" id="nueva_contrasena" name="nueva_contrasena" required><br>

                <input type="submit" value="Change Password">
            </form>
        </div>
        <footer>
            <a href="/logout">Logout</a>
            <a href="/home">Back to Main Menu</a>
        </footer>
    </div>
</body>
</html>
