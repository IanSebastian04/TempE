const datosTemperatura = [20, 25, 22, 27, 30, 28, 26]; // Temperaturas
const etiquetasTiempo = ["Lun", "Mar", "Mié", "Jue", "Vie", "Sáb", "Dom"]; // Etiquetas de tiempo

// Crear el gráfico
const ctx = document.getElementById('graficoTemperatura').getContext('2d');
const graficoTemperatura = new Chart(ctx, {
    type: 'line',
    data: {
        labels: etiquetasTiempo,
        datasets: [{
            label: 'Temperatura',
            data: datosTemperatura,
            borderColor: 'blue',
            backgroundColor: 'rgba(0, 123, 255, 0.3)',
            tension: 0.4
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
                // Puedes configurar más opciones de la escala Y según tus necesidades
            }
        }
    }
});