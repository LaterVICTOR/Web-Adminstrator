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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Forbidden</title>
        <link rel="shortcut icon" href="../favicon.png">
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Menu 1</title>
    <link rel="shortcut icon" href="../favicon.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>
    <div class="container">
        <header>
            <!-- Change profile picture based on user rol -->
            <?php if ($_SESSION['rol'] === 'admin') { ?>
                <img src="../img/imagen_admin.png">
                <h1>Welcome Administrator <?php echo $_SESSION['nombre_usuario']; ?></h1>
                <p>As an administrator, your rol is to manage and supervise tasks and projects at Mialu Studios Fin. You have full access to all functionalities and can assign tasks to other team members.</p>
            <?php } elseif ($_SESSION['rol'] === 'member') { ?>
                <img src="../img/imagen_member.png">
                <h1>Welcome Member <?php echo $_SESSION['nombre_usuario']; ?></h1>
                <p>As a member, your rol is to work on projects assigned by administrators and collaborate with other team members. Use this panel to access tasks and projects assigned to you.</p>
            <?php } ?>
        </header>
        <nav class="menu">
            <ul>
                <li>
                    <button onclick="location.href='/chat'">
                        <img src="https://img.freepik.com/vector-premium/grafico-icono-lapiz-bloc-notas-dibujos-animados-aislado_24877-17197.jpg" alt="Notes Icon">
                        <span>Manage Notes</span>
                    </button>
                    <button onclick="location.href='/stats'">
                        <img src="data:image/png;base64,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" alt="Stats">
                        <span>Status</span>
                    </button>
                    <button onclick="location.href='/config'">
                        <img src="https://cdn.icon-icons.com/icons2/1788/PNG/512/nuticon_114497.png" alt="Stats">
                        <span>Settings</span>
                        <ul>
                            <?php if ($_SESSION['rol'] === 'admin'): ?>
                                <button onclick="location.href='/admin'">
                                    <img src="https://icons.veryicon.com/png/o/miscellaneous/yuanql/icon-admin.png" alt="Admin"> 
                                    <span>Admin</span>
                                </button>
                            <?php endif; ?>
                        </ul>
                    </button>
                </li>
            </ul>
        </nav>
        <footer>
            <a href="/logout">Logout</a>
        </footer>
    </div>
</body>
</html>
