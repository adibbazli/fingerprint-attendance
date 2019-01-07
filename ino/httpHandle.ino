// Contain code to Handle HTTP Request
void handleRoot(){
  HTTPClient http;
  String url = "http://iktihad-malaysia.com.myarduino/output/home.php";
  http.begin(url);
  http.GET();
  String payload = http.getString();
  http.end();
  server.send(200, "text/html", payload);
}

void handleStart(){
  int id = getFingerprintID();
  int id0;
  String hash;
  String html;
    id0 = id * 123456;
    hash = sha1(String(id0));
    html = fingerName(id, hash, "Start");
  server.send(200, "text/html", html);
}

void handleStop(){
  int id = getFingerprintID();
  int id0;
  String hash;
  String html;
    id0 = id * 123456;
    hash = sha1(String(id0));
    html = fingerName(id, hash, "Stop");
  server.send(200, "text/html", html);
}

void handleEarly(){
  int id = getFingerprintID();
  int id0;
  String hash;
  String html;
    id0 = id * 123456;
    hash = sha1(String(id0));
    html = fingerName(id, hash, "eStop");
  server.send(200, "text/html", html);
}

void handleEnroll(){
    String html = "";
    String url = "http://iktihad-malaysia.com.my/arduino/output/enrollx.html";
    HTTPClient http;  
  if (server.hasArg("id") && server.hasArg("hash")){
    String ids = server.arg("id");
    int id = ids.toInt();
    int idhs = id * 123456;

    String idsha = sha1(String(idhs));
    String hash = server.arg("hash");
    if(idsha == hash){
    url = "http://iktihad-malaysia.com.my/arduino/output/enroll.html";
        if (getFingerprintEnroll(id) == -1)
        url = "http://iktihad-malaysia.com.my/arduino/output/enrollx.html";
    } 
  }
    http.begin(url);
    http.GET();
    html = http.getString();
    http.end();
  server.send(200, "text/html", html);
}

void handleNotFound(){
  String message = "File Not Found\n\n";
  message += "URI: ";
  message += server.uri();
  message += "\nMethod: ";
  message += (server.method() == HTTP_GET) ? "GET" : "POST";
  message += "\nArguments: ";
  message += server.args();
  message += "\n";
  for (uint8_t i = 0; i < server.args(); i++) {
    message += " " + server.argName(i) + ": " + server.arg(i) + "\n";
  }
  server.send(404, "text/plain", message);
}

String fingerName(int id, String hash, String type){
  HTTPClient http;
  String url = "http://iktihad-malaysia.com.my/arduino/attendance.php";
  http.begin(url);
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");
  http.POST("id=" + String(id) + "&hash=" + hash + "&type=" + type);
  String payload = http.getString();
  http.end();
  return payload;
}

