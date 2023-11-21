// Recuperar datos mediante AJAX
const xhr = new XMLHttpRequest();
xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log(data);
            crearGrafico(data);
        } else {
            console.error("Error al obtener datos del gráfico");
        }
    }
};

xhr.open("GET", "/Pagina beta/TempE-main/static/js/no.php", true);
xhr.send();

// Crear gráfico con Chart.js
function crearGrafico(data) {
    const labels = data.dia.map((_, index) => index + 1);
    const temperaturaValues = data.temperatura.map(value => (typeof value === 'number') ? value : null);
    const humedadValues = data.humedad.map(value => (typeof value === 'number') ? value : null);

    const ctx = document.getElementById('tuCanvas').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Temperatura por Día',
                data: temperaturaValues,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                tension: 0.4
            }, {
                label: 'Humedad por Día',
                data: humedadValues,
                backgroundColor: 'rgba(255, 99, 132, 0.2)', // Puedes cambiar el color
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                tension: 0.4
            }]
        }
    });
}
