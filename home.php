<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroTemp</title>

    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

</head>
<body>

    
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container d-flex justify-content-center">
            <span class="navbar-brand mb-0 h1">DATOS SENSOR</span>
        </div>
    </nav>

    <!-- SECTION VALORES MAXIMOS Y MINIMOS DIA Y MES-->
    <section class="container">
        <h1 class="mt-5">Temperatura del Día</h1>

        <?php
        // Establecer la conexión con la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto_sensor";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }


// Consulta para obtener la temperatura actual
$queryTemperaturaActual = "SELECT temperatura FROM datos_de_sensor ORDER BY id DESC LIMIT 1";
$resultTemperaturaActual = $conn->query($queryTemperaturaActual);

if ($resultTemperaturaActual->num_rows > 0) {
    $rowTemperaturaActual = $resultTemperaturaActual->fetch_assoc();
    $temperaturaActual = $rowTemperaturaActual["temperatura"];

    echo '
    <div class="row g-3 mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temperatura actual</h4>
                    <p class="card-text">' . $temperaturaActual . '°C</p>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No se encontraron registros de temperatura.";
}

// Consulta para obtener la humedad actual
$queryHumedadActual = "SELECT humedad FROM datos_de_sensor ORDER BY id DESC LIMIT 1";
$resultHumedadActual = $conn->query($queryHumedadActual);

if ($resultHumedadActual->num_rows > 0) {
    $rowHumedadActual = $resultHumedadActual->fetch_assoc();
    $HumedadActual = $rowHumedadActual["humedad"];

    echo '
    <div class="row g-3 mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Humedad actual</h4>
                    <p class="card-text">' . $HumedadActual . '°C</p>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No se encontraron registros de humedad.";
}


         // Consulta para obtener la temperatura máxima
    $queryTemperaturaMaxima = "SELECT MAX(temperatura) as max_temperatura FROM datos_de_sensor";
    $resultTemperaturaMaxima = $conn->query($queryTemperaturaMaxima);

    if ($resultTemperaturaMaxima->num_rows > 0) {
        $rowTemperaturaMaxima = $resultTemperaturaMaxima->fetch_assoc();
        $temperaturaMaxima = $rowTemperaturaMaxima["max_temperatura"];

        echo '
        <div class="row g-3 mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temperatura máxima</h4>
                    <p class="card-text">' . $temperaturaMaxima . '°C</p>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No se encontraron registros de temperatura máxima.";
}

// Consulta para obtener la temperatura mínima
$queryTemperaturaMinima = "SELECT MIN(temperatura) as min_temperatura FROM datos_de_sensor";
$resultTemperaturaMinima = $conn->query($queryTemperaturaMinima);

if ($resultTemperaturaMinima->num_rows > 0) {
    $rowTemperaturaMinima = $resultTemperaturaMinima->fetch_assoc();
    $temperaturaMinima = $rowTemperaturaMinima["min_temperatura"];

    echo '
    <div class="row g-3 mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Temperatura mínima</h4>
                    <p class="card-text">' . $temperaturaMinima . '°C</p>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No se encontraron registros de temperatura mínima.";
}

           // Cerrar la conexión
        $conn->close();
        ?>
        


<div class="col-md-12">
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Máximos y Mínimos semanal</h5>
        <!-- Aquí podrías integrar un gráfico utilizando librerías como Chart.js -->
        <canvas id="tuCanvas"></canvas>
    </div>
</div>

</div>

</div>

</section>


<?php
        // Establecer la conexión con la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto_sensor";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }


        // Consulta para obtener el promedio de temperatura
$queryPromedioTemperatura = "SELECT AVG(temperatura) as promedio_temperatura FROM datos_de_sensor";
$resultPromedioTemperatura = $conn->query($queryPromedioTemperatura);

if ($resultPromedioTemperatura->num_rows > 0) {
    $rowPromedioTemperatura = $resultPromedioTemperatura->fetch_assoc();
    $promedioTemperatura = $rowPromedioTemperatura["promedio_temperatura"];

    $promedioTemperatura = number_format($promedioTemperatura, 2);
    echo '
    <div class="row g-3 mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Promedio temperatura</h4>
                    Promedio: ' . $promedioTemperatura . '°C<br>
                    <button class="btn btn-dark">Ver grafico</button>
                </div>
            </div>
        </div>
    </div>';
} else {
    echo "No se encontraron registros de el promedio de temperatura.";
}
    // Consulta para obtener la temperatura máxima
    $queryTemperaturaMaxima = "SELECT MAX(temperatura) as max_temperatura FROM datos_de_sensor";
    $resultTemperaturaMaxima = $conn->query($queryTemperaturaMaxima);

    if ($resultTemperaturaMaxima->num_rows > 0) {
        $rowTemperaturaMaxima = $resultTemperaturaMaxima->fetch_assoc();
        $temperaturaMaxima = $rowTemperaturaMaxima["max_temperatura"];

        // Consulta para obtener la temperatura mínima
        $queryTemperaturaMinima = "SELECT MIN(temperatura) as min_temperatura FROM datos_de_sensor";
        $resultTemperaturaMinima = $conn->query($queryTemperaturaMinima);

        if ($resultTemperaturaMinima->num_rows > 0) {
            $rowTemperaturaMinima = $resultTemperaturaMinima->fetch_assoc();
            $temperaturaMinima = $rowTemperaturaMinima["min_temperatura"];

            echo '
            <div class="row g-3 mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Temperatura Máxima y Mínima</h4>
                            <p class="card-text">
                                Máxima: ' . $temperaturaMaxima . '°C<br>
                                Mínima: ' . $temperaturaMinima . '°C
                            </p>
                            <button class="btn btn-dark">Ver grafico</button>
                        </div>
                    </div>
                </div>
            </div>';
        } else {
            echo "No se encontraron registros de temperatura mínima.";
        }
    } else {
        echo "No se encontraron registros de temperatura máxima.";
    }



       
        



     // Cerrar la conexión
     $conn->close();
     ?>
     


    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="static/js/si.js"></script>
</body>
</html>