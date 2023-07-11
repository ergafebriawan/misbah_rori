#include "SoftwareSerial.h"

SoftwareSerial toESP8266(14, 12);

void setup() {
  Serial.begin(9600);
  toESP8266.begin(9600);
}

void loop() {
  String message = "test";

  toESP8266.print(message);
  Serial.print(message);
  
  delay(1000);
}
