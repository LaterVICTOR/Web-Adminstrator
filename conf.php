<!DOCTYPE html>
<html>
<head>
    <title>Configuración</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Estilos adicionales para la configuración */
        .config-container {
            padding: 20px;
        }

        .config-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .config-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .config-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid var(--border);
            border-radius: 3px;
        }

        .config-container input[type="checkbox"] {
            margin-bottom: 15px;
        }

        .config-container input[type="submit"] {
            background-color: var(--color-primario);
            color: var(--fondo-1);
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .config-container input[type="submit"]:hover {
            background-color: var(--color-secundario);
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Configuración</h1>
        </header>
        <main>
            <form action="" method="POST" class="config-container">
                <h2>Preferencias de usuario</h2>
                <label for="theme">Tema:</label>
                <select id="theme" name="theme">
                    <option value="light" <?php if ($theme === 'light') echo 'selected'; ?>>Claro</option>
                    <option value="dark" <?php if ($theme === 'dark') echo 'selected'; ?>>Oscuro</option>
                </select>
                <br>
                <label for="language">Idioma:</label>
                <select id="language" name="language">
                    <option value="es" <?php if ($language === 'es') echo 'selected'; ?>>Español</option>
                    <option value="en" <?php if ($language === 'en') echo 'selected'; ?>>Inglés</option>
                </select>
                <br>
                <h2>Configuración de notificaciones</h2>
                <label for="notifications">Notificaciones:</label>
                <input type="checkbox" id="notifications" name="notifications" <?php if ($notifications) echo 'checked'; ?>>
                <br>
                <h2>Integraciones</h2>
                <label for="google">Integración con Google:</label>
                <input type="checkbox" id="google" name="google" <?php if ($integrations['google']) echo 'checked'; ?>>
                <br>
                <label for="facebook">Integración con Facebook:</label>
                <input type="checkbox" id="facebook" name="facebook" <?php if ($integrations['facebook']) echo 'checked'; ?>>
                <br>
                <input type="submit" value="Guardar">
            </form>
        </main>
        <footer>
            <a href="menu.php">Volver al Menú Principal</a>
        </footer>
    </div>

    <script>
        // Función para cambiar el tema
        document.getElementById('theme').addEventListener('change', function() {
            var selectedTheme = this.value;
            document.body.className = selectedTheme;
            localStorage.setItem('theme', selectedTheme);
        });

        // Función para cambiar el idioma
        document.getElementById('language').addEventListener('change', function() {
            var selectedLanguage = this.value;
            // Aquí puedes aplicar cambios en el idioma de la página
            localStorage.setItem('language', selectedLanguage);
        });

        // Inicializar el tema desde localStorage
        var savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.className = savedTheme;
        }

        // Inicializar el idioma desde localStorage
        var savedLanguage = localStorage.getItem('language');
        if (savedLanguage) {
            // Aquí puedes aplicar cambios en el idioma de la página si es necesario
        }
    </script>
</body>
</html>
