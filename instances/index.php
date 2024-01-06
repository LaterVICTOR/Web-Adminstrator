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
    $instance_id = $_POST['instance_id'];
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
        WHERE id = $instance_id";

    if ($conn->query($update_query) === TRUE) {
        echo "Game instance modified successfully.";
    } else {
        echo "Error modifying game instance: " . $conn->error;
    }
}

$select_query = "SELECT id, instance_name, name, url, minecraft_version, loader_type, loader_version, verify, ignored, whitelist, whitelist_active FROM games";
$result = $conn->query($select_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game Instances Configuration</title>
    <link rel="shortcut icon" href="../favicon.png">
    <link rel="stylesheet" type="text/css" href="../instances.css">
</head>
<body>
<div class="container">
    <h1>Game Instances Configuration</h1>

    <div class="section">
        <h2>Add Instance</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Instance Name: <input type="text" name="instance_name" required></label>
            <label>Game Name: <input type="text" name="game_name" required></label>
            <label>URL: <input type="text" name="url" required></label>
            <label>Minecraft Version: <input type="text" name="minecraft_version" required></label>
            <label>Loader Type: <input type="text" name="loader_type" required></label>
            <label>Loader Version: <input type="text" name="loader_version" required></label>
            <label>Verify: <input type="checkbox" name="verify"></label>
            <label>Ignored: <input type="text" name="ignored"></label>
            <label>Whitelist: <input type="text" name="whitelist" placeholder="user1,user2,user3"></label>
            <label>Whitelist Active: <input type="checkbox" name="whitelist_active"></label>
            <input type="submit" name="add_instance" value="Add Instance">
        </form>
    </div>

    <div class="section">
        <h2>Modify Instance</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label>Instance ID: <input type="text" name="instance_id" required></label>
            <label>Instance Name: <input type="text" name="instance_name" required></label>
            <label>Game Name: <input type="text" name="game_name" required></label>
            <label>URL: <input type="text" name="url" required></label>
            <label>Minecraft Version: <input type="text" name="minecraft_version" required></label>
            <label>Loader Type: <input type="text" name="loader_type" required></label>
            <label>Loader Version: <input type="text" name="loader_version" required></label>
            <label>Verify: <input type="checkbox" name="verify"></label>
            <label>Ignored: <input type="text" name="ignored"></label>
            <label>Whitelist: <input type="text" name="whitelist" placeholder="user1,user2,user3"></label>
            <label>Whitelist Active: <input type="checkbox" name="whitelist_active"></label>
            <input type="submit" name="modify_instance" value="Modify Instance">
        </form>
    </div>
</div>
</body>
</html>

<?php
$conn->close();
?>
