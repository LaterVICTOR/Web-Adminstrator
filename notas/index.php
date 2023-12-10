<?php
session_start();

// Verificar si el usuario está autenticado en la sesión de PHP
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Si el usuario no está autenticado, redirigir a la página de inicio de sesión
    header('Location: /');
    exit;
}

// Cargar datos desde el archivo JSON
$notas = json_decode(file_get_contents('notas.json'), true);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestionar Notas</title>
    <link rel="shortcut icon" href="https://launcher.latervictor.dev/storage/img/favicon.png">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style>
        /* Estilos para las notas */
        .nota {
            border: 1px solid var(--border);
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
            background-color: #f9f9f9;
        }

        .nota h2 {
            font-size: 24px;
        }

        .nota p {
            font-size: 16px;
        }

        .nota img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Gestionar Notas</h1>
        </header>
        <main>
            <?php if (!empty($notas)) { ?>
                <?php foreach ($notas as $nota) { ?>
                    <?php
                        // Verificar si la nota está dirigida al usuario actual
                        $audiencia = $nota['audiencia'];
                        if ($audiencia === 'admin' && $_SESSION['rol'] === 'admin') {
                            // Mostrar nota solo a administradores
                        } elseif ($audiencia === 'usuario' && $_SESSION['rol'] === 'usuario') {
                            // Mostrar nota solo a usuarios
                        } elseif ($audiencia === 'todos' || empty($audiencia)) {
                            // Mostrar nota a todos (incluyendo casos donde no se especifica la audiencia)
                        } else {
                            // No mostrar la nota
                            continue;
                        }
                    ?>
                    <div class="nota">
                        <h2><?php echo $nota['titulo']; ?></h2>
                        <p><?php echo $nota['descripcion']; ?></p>
                        <p><strong>Autor:</strong> <?php echo $nota['autor']; ?></p>
                        <p><strong>Fecha Límite:</strong> <?php echo $nota['fecha_limite']; ?></p>
                        <?php if (!empty($nota['imagen'])) { ?>
                            <img src="<?php echo $nota['imagen']; ?>" alt="Imagen de la nota">
                        <?php } ?>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>No hay notas disponibles.</p>
            <?php } ?>
        </main>
        <footer>
            <a href="/home">Volver al Menú Principal</a>
            <a href="/cerrar_sesion">Cerrar Sesión</a>
        </footer>
    </div>
</body>
</html>
