// Contenido de update.js
document.addEventListener('DOMContentLoaded', function() {
    // Código JavaScript aquí
    const apiUrl = 'https://api.github.com/repos/latervictor/Web-Adminstrator/releases/latest';

    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const latestVersion = data.tag_name;
            document.getElementById('repo-version').innerText = `Latest Release: ${latestVersion}`;

            // Comparación de versiones y mensaje de actualización
            const currentVersion = '1.0.1';
            if (compareVersions(latestVersion, currentVersion) > 0) {
                document.getElementById('update-alert').innerText = 'There is a new version available. Please update.';
            }
        })
        .catch(error => console.error('Error fetching GitHub release:', error));

    function compareVersions(a, b) {
        const partsA = a.split('.').map(Number);
        const partsB = b.split('.').map(Number);

        for (let i = 0; i < 3; i++) {
            if (partsA[i] > partsB[i]) return 1;
            if (partsA[i] < partsB[i]) return -1;
        }

        return 0;
    }
});
