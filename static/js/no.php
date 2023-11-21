<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "proyecto_sensor";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$query = "SELECT temperatura, humedad, dia FROM datos_de_sensor";
$result = $conn->query($query);

$formattedData = [
    'temperatura' => [],
    'humedad' => [], // Agregamos la columna de humedad
    'dia' => []
];

while ($row = $result->fetch_assoc()) {
    $temperatura = ($row['temperatura'] !== null) ? floatval($row['temperatura']) : null;
    $humedad = ($row['humedad'] !== null) ? floatval($row['humedad']) : null; // Añadimos la humedad
    $dia = ($row['dia'] !== null) ? floatval($row['dia']) : null;

    $formattedData['temperatura'][] = $temperatura;
    $formattedData['humedad'][] = $humedad; // Añadimos la humedad al array
    $formattedData['dia'][] = $dia;
}

echo json_encode($formattedData);

$conn->close();
?>
