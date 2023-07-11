#include "SoftwareSerial.h"

SoftwareSerial toArduino(D1, D2);
String data;
char c;

void setup() {
  Serial.begin(9600);
  toArduino.begin(9600);
}

void loop() {
  while (toArduino.available() > 0) {
    delay(10);
    c = toArduino.read();
    data += c;
  }
  if (data.length() > 0) {
    Serial.println(data);
    data = "";
  }
}
