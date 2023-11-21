#include <ESP8266WiFi.h>
//#include <DHT.h>

#define DHTPIN 2       // Pin del sensor DHT22
#define DHTTYPE DHT22   // Tipo de sensor DHT(vercion)

const char *ssid = "SSID";
const char *password = "Contraseña";
const char *server = "Servidor";  
const String path = "/Pagina beta/TempE-main/static/js/no.php";

DHT dht(DHTPIN, DHTTYPE);

void setup() {
  Serial.begin(115200);
  delay(10);

  // Conexión a WiFi
  WiFi.begin(ssid, password);
  Serial.println();

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("Conectado a WiFi");
}

void loop() {
  delay(2000);  // Espera de 2 segundos entre lecturas

  float temperatura = dht.readTemperature();
  float humedad = dht.readHumidity();

  Serial.print("Temperatura: ");
  Serial.print(temperatura);
  Serial.print(" °C\tHumedad: ");
  Serial.print(humedad);
  Serial.println(" %");

  // Enviar datos al servidor
  enviarDatosAlServidor(temperatura, humedad);
}

void enviarDatosAlServidor(float temperatura, float humedad) {
  // Construir la URL
  String url = "http://" + String(server) + path + "?temperatura=" + String(temperatura) + "&humedad=" + String(humedad);

  // Inicializar la conexión
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(server, httpPort)) {
    Serial.println("Error de conexión");
    return;
  }

  // Hacer la solicitud HTTP
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + server + "\r\n" +
               "Connection: close\r\n\r\n");

  delay(10);

  // Leer y mostrar la respuesta
  while (client.available()) {
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }

  Serial.println();
  Serial.println("Datos enviados al servidor");

  // Cerrar la conexión
  client.stop();
}
