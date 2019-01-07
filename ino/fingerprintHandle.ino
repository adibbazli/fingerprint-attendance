// Handle Fingerprint ID and Setup
// ----------------------- Fingerprint Setup -----------------------------

void fingerprintSetup() {
  // This function will be inside setup
  Serial.begin(9600);
  Serial.println("Fingerprint");
  
  mySerial.begin(57600);
  if (finger.begin(&mySerial)) {
    Serial.println("Found fingerprint sensor!");
  } else {
    Serial.println("Did not find fingerprint sensor :(");
    while (1) yield(); // Infinite Loop If Sensor not Found
  }
}

// ----------------------- Fingerprint Setup End -------------------------
// ----------------------- getFingerprintID --------------------------

int getFingerprintID(){
  // Will return FingerprintID (based on StaffID) in int format
  // -1 indicate error code
  int p = -1;
  while (p != FINGERPRINT_OK){
    p = finger.getImage(); // Get Fingerprint Image
    switch (p) {
      case FINGERPRINT_OK:
        ledoff();
        break;
      case FINGERPRINT_NOFINGER:
        ledon();
        break;
      default:
        Serial.println("ERR_GETIMAGE");
        break;
    }
    yield();
  }
  // Continue if success etc, infinite loop

  p = finger.image2Tz(); // Convert Image
  switch (p) {
    case FINGERPRINT_OK:
      break;
    default:
      Serial.println("ERR_CONVERT");
      return -1;
  }

  p = finger.fingerFastSearch();
  switch (p){
    case FINGERPRINT_OK:
      return finger.fingerID;
    case FINGERPRINT_NOTFOUND:
      return -1;
  }
}

// ----------------------- getFingerprintID End ----------------------
// ----------------------- getFingerprintEnroll ------------------------------
int getFingerprintEnroll(int id) {
  int p = -1;
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      ledoff();
      break;
    case FINGERPRINT_NOFINGER:
      ledon();
      break;
    default:
    return -1;
      break;
    }
    yield();
  }

  p = finger.image2Tz(1);
   switch (p) {
    case FINGERPRINT_OK:
      break;
    default:
    return -1;
      break;
   }

   delay(2000);
   p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
    yield();
  }

  p = -1;
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
    case FINGERPRINT_OK:
      ledoff();
      break;
    case FINGERPRINT_NOFINGER:
      ledon();
      break;
    default:
    return -1;
      break;
    }
    yield();
  }

  p = finger.image2Tz(2);
   switch (p) {
    case FINGERPRINT_OK:
      break;
    default:
    return -1;
      break;
   }

   p = finger.createModel();
   if (p == FINGERPRINT_OK) {}
   else return -1;

  p = finger.deleteModel(id);
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    Serial.println("Stored!");
    return 0;
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Could not store in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Error writing to flash");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }   
   return 1;
}

// ----------------------- getFingerprintEnroll End --------------------------
// ----------------------- deleteFingerprint --------------------------
// We might will not using this
uint8_t deleteFingerprint(uint8_t id) {
  
}

// ----------------------- deleteFingerprint End ----------------------
