<?php
session_start();

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "databasename";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_instance'])) {
    $instance_name = $_POST['instance_name'];
    $game_name = $_POST['game_name'];
    $url = $_POST['url'];
    $minecraft_version = $_POST['minecraft_version'];
    $loader_type = $_POST['loader_type'];
    $loader_version = $_POST['loader_version'];
    $verify = isset($_POST['verify']) ? 1 : 0;
    $ignored = $_POST['ignored'];
    $whitelistArray = explode(',', $_POST['whitelist']);
    $whitelist = implode(',', $whitelistArray);
    $whitelist_active = isset($_POST['whitelist_active']) ? 1 : 0;

    $insert_query = "INSERT INTO games (instance_name, name, url, minecraft_version, loader_type, loader_version, verify, ignored, whitelist, whitelist_active)
                     VALUES ('$instance_name', '$game_name', '$url', '$minecraft_version', '$loader_type', '$loader_version', $verify, '$ignored', '$whitelist', $whitelist_active)";

    if ($conn->query($insert_query) === TRUE) {
        echo "Game instance added successfully.";
    } else {
        echo "Error adding game instance: " . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modify_instance'])) {
    $id_instance = $_POST['id_instance'];
    $instance_name = $_POST['instance_name'];
    $game_name = $_POST['game_name'];
    $url = $_POST['url'];
    $minecraft_version = $_POST['minecraft_version'];
    $loader_type = $_POST['loader_type'];
    $loader_version = $_POST['loader_version'];
    $verify = isset($_POST['verify']) ? 1 : 0;
    $ignored = $_POST['ignored'];
    $whitelistArray = explode(',', $_POST['whitelist']);
    $whitelist = implode(',', $whitelistArray);
    $whitelist_active = isset($_POST['whitelist_active']) ? 1 : 0;

    $update_query = "UPDATE games SET
        instance_name = '$instance_name',
        name = '$game_name',
        url = '$url',
        minecraft_version = '$minecraft_version',
        loader_type = '$loader_type',
        loader_version = '$loader_version',
        verify = $verify,
        ignored = '$ignored',
        whitelist = '$whitelist',
        whitelist_active = $whitelist_active
        WHERE id = $id_instance";

    if ($conn->query($update_query) === TRUE) {
        echo "Game instance modified successfully.";
    } else {
        echo "Error modifying game instance: " . $conn->error;
    }
}

$select_query = "SELECT id, instance_name, name, url, minecraft_version, loader_type, loader_version, verify, ignored, whitelist, whitelist_active FROM games";
$result = $conn->query($select_query);
?>

<div class="section">
    <h2>Instance List</h2>
    <link rel="stylesheet" href="../../instances.css">
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Instance Name</th>
            <th>Game Name</th>
            <th>URL</th>
            <th>Minecraft Version</th>
            <th>Loader Type</th>
            <th>Loader Version</th>
            <th>Verify</th>
            <th>Ignored</th>
            <th>Whitelist</th>
            <th>Whitelist Active</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['instance_name'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['url'] . "</td>";
                echo "<td>" . $row['minecraft_version'] . "</td>";
                echo "<td>" . $row['loader_type'] . "</td>";
                echo "<td>" . $row['loader_version'] . "</td>";
                echo "<td>" . ($row['verify'] ? 'Yes' : 'No') . "</td>";
                echo "<td>" . $row['ignored'] . "</td>";
                echo "<td>" . $row['whitelist'] . "</td>";
                echo "<td>" . ($row['whitelist_active'] ? 'Yes' : 'No') . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No instances in the database.</td></tr>";
        }
        ?>
