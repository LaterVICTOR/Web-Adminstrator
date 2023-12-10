<?php
session_start();

// Check if the user is already authenticated
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: /home'); // Redirect to the main menu if the user is already authenticated
    exit;
}

// Check if the login form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the database (replace with your own credentials)
    $mysqli = new mysqli("localhost", "username", "password", "db_name");

    // Check the database connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Use prepared statements to prevent SQL injection
    $query = "SELECT nombre, contrasena, rol FROM usuarios WHERE nombre = ? AND contrasena = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful authentication, set a session as an authenticated user
        $user = $result->fetch_assoc();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user['nombre'];
        $_SESSION['rol'] = $user['rol'];

        // Redirect to the main menu
        header('Location: /home');
        exit;
    } else {
        // Invalid credentials, show an error message
        $error_message = "Invalid credentials. Please try again.";
    }

    // Close the database connection
    $stmt->close();
    $mysqli->close();
}

include 'user_management.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="https://launcher.latervictor.dev/storage/img/favicon.png">
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
            
            <!-- Login form -->
            <form action="" method="POST">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <input type="submit" value="Login">
            </form>
        </main>
    </div>
</body>
</html>
