<?php
session_start();

// Establish connection to the database (replace values with your own)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "databasename";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

// Query to get the list of instances
$select_query = "SELECT id, nombre_instancia, nombre, url, minecraft_version, loadder_type, loadder_version, verify, ignored, whitelist, whitelist_active FROM juegos";
$result = $conn->query($select_query);

// Create an associative array to store the information of instances
$instances = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert whitelist and ignored lists strings into arrays
        $whitelist = explode(',', $row['whitelist']);
        $ignored = explode(',', $row['ignored']);

        // Create an associative array for each instance
        $instance = array(
            "name" => $row['nombre_instancia'],
            "url" => $row['url'],
            "loader" => array(
                "minecraft_version" => $row['minecraft_version'],
                "loader_type" => $row['loadder_type'],
                "loader_version" => $row['loadder_version']
            ),
            "verify" => boolval($row['verify']),
            "ignored" => $ignored,
            "whitelist" => $whitelist,
            "whitelistActive" => boolval($row['whitelist_active'])
        );

        // Add the instance to the main array
        $instances[$row['nombre_instancia']] = $instance;
    }
}

// Convert the array to raw JSON format with certain unescaped slashes
$json_data = json_encode($instances, JSON_UNESCAPED_SLASHES);

// Show the JSON in the browser
header('Content-Type: application/json');
echo $json_data;

// Close the connection
$conn->close();
?>
