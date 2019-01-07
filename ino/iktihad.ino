// Written By Adib Bazli - Iktihad Software Engineering Group
// Universiti Teknologi Malaysia

#include <ESP8266WebServer.h> // To Connect WiFI and start a Server
#include <Hash.h> // To use sha1 function
#include <FPM.h> // Fingerprint Module
#include <SoftwareSerial.h> // To Connect Fingerprint and ESP Board
#include <ESP8266HTTPClient.h> // To establish an http connection

// ------------------ Fingerprint ---------------------------

SoftwareSerial mySerial(4, 5); // RX, TX pin(3, 4)
FPM finger;

// ------------------ Fingerprint End -----------------------
// ------------------ WIFI SETTINGS -------------------------

const char* ssid = "Hotspot 1Malaysia";
const char* password = "makannasi";
const char* deviceName = "Iktihad-Fingerprint";
ESP8266WebServer server(80);

// ------------------ WIFI SETTINGS END ---------------------

void setup(){
  pinMode(LED_BUILTIN, OUTPUT);
  digitalWrite(LED_BUILTIN,HIGH); // Make LED of as Default

  fingerprintSetup(); // Configure Fingerprint
  
  WiFi.mode(WIFI_STA);
  WiFi.hostname(deviceName);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) delay(500); // Waiting for connection

  server.on("/", handleRoot);
  server.on("/start", handleStart);
  server.on("/stop", handleStop);
  server.on("/early", handleEarly);

  server.on("/enroll", handleEnroll);

  server.onNotFound(handleNotFound);
  server.begin();
}

void loop(){
  server.handleClient();
}

