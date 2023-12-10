<?php
session_start();

// Check if the user is authenticated in the PHP session
if ($_SESSION['rol'] !== 'admin') {
    // If the user does not have the administrator rol, send a 403 Forbidden response
    http_response_code(403);

    // Set the custom HTML message
    $htmlMessage = <<<HTML
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Forbidden</title>

        <style>
            /* Styles for the Forbidden page */
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

// Establish a connection to the database (replace values with your own)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

// Process the form to add a user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_user'])) {
    // Retrieve data from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $rol = $_POST['rol'];

    // Perform insertion into the database
    $insertQuery = "INSERT INTO users (name, password, rol) VALUES ('$username', '$password', '$rol')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "User added successfully.";
    } else {
        echo "Error adding user: " . $conn->error;
    }
}

// Process the form to delete a user
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    // Retrieve the ID of the user to be deleted
    $user_id = $_POST['user_id'];

    // Perform deletion in the database
    $deleteQuery = "DELETE FROM users WHERE id = '$user_id'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

// Process the form to change password
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['change_password'])) {
    // Retrieve data from the form
    $changed_user_id = $_POST['changed_user_id'];
    $new_password = $_POST['new_password'];

    // Perform update in the database
    $updateQuery = "UPDATE users SET password = '$new_password' WHERE id = '$changed_user_id'";
    if ($conn->query($updateQuery) === TRUE) {
        echo "Password changed successfully.";
    } else {
        echo "Error changing password: " . $conn->error;
    }
}

// Query to get the list of users
$selectQuery = "SELECT id, name, rol FROM users";
$result = $conn->query($selectQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Configuration</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <h1>User Configuration</h1>

        <div class="section">
            <h2>Add User</h2>
            <!-- Add user form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="rol">
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
                <input type="submit" name="add_user" value="Add User">
            </form>
        </div>

        <div class="section">
            <h2>Delete User</h2>
            <!-- Delete user form -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <select name="user_id">
                    <?php
                    // Get the list of users for the deletion form
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" name="delete_user" value="Delete User">
            </form>
        </div>

        <div class="section">
            <h2>User List</h2>
            <!-- Display the list of users -->
            <ul>
                <?php
                $result = $conn->query("SELECT id, name, rol FROM users");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>ID: " . $row['id'] . " - Name: " . $row['name'] . " - rol: " . $row['rol'] . "</li>";
                        // Add form to change password
                        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
                        echo "<input type='hidden' name='changed_user_id' value='" . $row['id'] . "'>";
                        echo "<input type='password' name='new_password' placeholder='New Password' required>";
                        echo "<input type='submit' name='change_password' value='Change Password'>";
                        echo "</form>";
                    }
                } else {
                    echo "No users in the database.";
                }
                ?>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
