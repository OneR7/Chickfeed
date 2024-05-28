#include <WiFi.h>
#include <HTTPClient.h>
#include <HX711_ADC.h>
#include <ESP32Servo.h>

// WiFi credentials
const char* ssid = "oner";
const char* password = "12345678";

// Server URLs
const char* serverData = "http://192.168.30.227/chickfeed/app/views/iot/data.php";
const char* serverSchedule = "http://192.168.30.227/chickfeed/app/views/iot/check_feed_time.php";
const char* serverControl = "http://192.168.30.227/chickfeed/app/views/iot/control_status.php";

// Load cell pins
const int LOADCELL_DOUT = 14;
const int LOADCELL_SCK = 12;
HX711_ADC LoadCell(LOADCELL_DOUT, LOADCELL_SCK);

// Servo
Servo myservo;
int servoPin = 13;

// LED WiFi
int ledwifi = 2;

// Global variables
boolean newDataReady = false;
unsigned long previousMillis = 0;
const long interval = 1000; // Interval untuk pengecekan

void setup() {
  // Setup Serial Monitor
  Serial.begin(115200);

  // Setup Load Cell
  LoadCell.begin();
  LoadCell.start(2000);
  LoadCell.setCalFactor(420);

  // Setup Servo
  myservo.attach(servoPin);
  myservo.write(0); // Posisi awal servo di 0 derajat

  // Setup LED WiFi
  pinMode(ledwifi, OUTPUT);

  // Connect to WiFi
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.print("Connecting to WiFi");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
    digitalWrite(ledwifi, LOW);
  }
  Serial.println();
  Serial.print("Connected: ");
  Serial.println(WiFi.localIP());
  digitalWrite(ledwifi, HIGH);
}

void loop() {
  unsigned long currentMillis = millis();

  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;

    // Update Load Cell
    LoadCell.update();
    float i = LoadCell.getData();
    if (i < 0) {
      i = 0;
    }
    Serial.print("Berat (g): ");
    Serial.println(i);
    sendDataToServer(i);

    // Check Schedule
    checkSchedule();

    // Check Manual Control
    checkControl();
  }
}

void sendDataToServer(float berat) {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverData);
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    String httpRequestData = "api_key=12345678912&berat_act=" + String(berat);
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);

    int httpResponseCode = http.POST(httpRequestData);

    if (httpResponseCode == HTTP_CODE_OK) {
      Serial.print("HTTP Response code: ");
      Serial.println(httpResponseCode);
    } else {
      Serial.print("Error code: ");
      Serial.println(httpResponseCode);
    }

    http.end();
  } else {
    Serial.println("WiFi Disconnected");
  }
  delay(500);
}

void checkSchedule() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverSchedule);
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String payload = http.getString();
      Serial.println("Schedule Payload: " + payload);
      if (payload == "ON") {
        myservo.write(5);
        delay(500);
        myservo.write(0);
      }
    } else {
      Serial.print("Error on HTTP request (Schedule): ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
}

void checkControl() {
  if (WiFi.status() == WL_CONNECTED) {
    HTTPClient http;
    http.begin(serverControl);
    int httpResponseCode = http.GET();

    if (httpResponseCode > 0) {
      String payload = http.getString();
      Serial.println("Control Payload: " + payload);
      if (payload == "ON") {
        myservo.write(5);
        delay(500);
        myservo.write(0);
      }
    } else {
      Serial.print("Error on HTTP request (Control): ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
}
