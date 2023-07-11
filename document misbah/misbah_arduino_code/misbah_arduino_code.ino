//library include
#include "SoftwareSerial.h"

SoftwareSerial toESP8266(14, 12);

void setup() {
  Serial.begin(9600);
  toESP8266.begin(9600);
}

void loop() {
  float val_ph = readPH();
  float val_turbinity = readTurbinity();

  toESP8266.print(val_ph);
  toESP8266.print(',');
  toESP8266.print(val_turbinity);
  toESP8266.print(',');
  toESP8266.print('\n');
  
}

float readTurbinity(){
  int sensorValue = analogRead(A0);
  float voltage = sensorValue * (5.0 / 1024.0);
  return voltage;
}

float readPH() {
  float calibration_value = 21.34;
  int phval = 0;
  unsigned long int avgval;
  int buffer_arr[10], temp;
  float result = 0;

  for (int i = 0; i < 10; i++) {
    buffer_arr[i] = analogRead(A1);
    delay(30);
  }

  for (int i = 0; i < 9; i++) {
    for (int j = i + 1; j < 10; j++) {
      if (buffer_arr[i] > buffer_arr[j]) {
        temp = buffer_arr[i];
        buffer_arr[i] = buffer_arr[j];
        buffer_arr[j] = temp;
      }
    }
  }

  for (int i = 2; i < 8; i++) {
    avgval += buffer_arr[i];
    float volt = (float)avgval * 5.0 / 1024 / 6;
    float ph_act = -5.70 * volt + calibration_value;
    result = ph_act;
  }

  return result;
}
