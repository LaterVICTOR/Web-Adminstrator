<?php
// Habilita la salida JSON
header('Content-Type: application/json');

// Comando para obtener el uso de CPU y memoria RAM
$cpuUsage = shell_exec("top -b -n 1 | grep 'Cpu(s)' | awk '{print $2 + $4}'");
$ramUsage = shell_exec("free -m | awk 'NR==2{print $3}'");

// Crear un array con los datos
$data = [
    'cpu_usage' => floatval($cpuUsage),
    'ram_usage' => intval($ramUsage),
];

// Devuelve los datos en formato JSON
echo json_encode($data);
?>
