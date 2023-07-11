#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include <SoftwareSerial.h>
#include <StringSplitter.h>
#include <SoftwareSerial.h>

SoftwareSerial toArduino(D1, D2);
int Bot_mtbs = 1000;  //mean time between scan messages
long Bot_lasttime;    //last time messages' scan has been done
String incomingByte;
String buff[3];

//////setup koneksi wifi//////
String SSID = "Listiani Bakery";  //name wifi
String password = "Rotibolu31";   //password wifi
/////////////////////////////

//////setup to web server//////
HTTPClient http;
String URLget = "http://192.168.0.1/api/get_data";
String URLsend = "/api/send_data";
const char *host = "192.168.0.1";  // IP your Laptop/pc
const int httpPort = 80;
WiFiClient client1;
//////////////////////////////

void setup() {
  Serial.begin(115200);  //baudrate
  toArduino.begin(9600);

  //////setup wifi//////
  WiFi.mode(WIFI_STA);
  WiFi.begin(SSID, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Connecting..");
  }
  //////////////////////
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {

    ////baca data sensor//////
    if (toArduino.available() > 1) {
      Serial.println("read Serial data from arduino");

      incomingByte = toArduino.readStringUntil('\n');
      StringSplitter *splitter = new StringSplitter(incomingByte, ',', 3);  // new StringSplitter(string_to_split, delimiter, limit)
      int itemCount = splitter->getItemCount();

      for (int i = 0; i < itemCount; i++) {
        //String item = splitter->getItemAtIndex(i);
        buff[i] = splitter->getItemAtIndex(i);

      }

      Serial.print(F("PH: "));
      Serial.print(buff[0]);
      Serial.print(F(" |Turbinity: "));
      Serial.print(buff[1]);
    } else {
      Serial.println("not connected arduino...");
    }
    ///////////////////////////

    //////mengirim data ke web//////
    Serial.print("connecting to ");
    Serial.println(host);

    if (!client1.connect(host, httpPort)) {
      Serial.println("connection failed");
      return;
    } else {
      sendToServer(buff[0], buff[1]);
    }
    /////////////////////////////////////////////////////////////////////

  } else {
    Serial.println("not connect WiFi....");
  }
  delay(2000);
}

void sendToServer(String PH, String Turbinity) {
  String URL = "";
  URL = URLsend
        + "?ph=" + PH
        + "&tur=" + Turbinity;

  //send request to server
  Serial.print("Requesting URL PUT: ");
  Serial.println(URL);

  client1.print(String("POST") + URL + " HTTP/1.1\r\n" +
                "Host: " + host + "\r\n" +
                "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client1.available() == 0) {
    if (millis() - timeout > 2000) {
      Serial.println(">>> Client Timeout !");
      client1.stop();
      return;
    }
  }

  // Read all the lines of the reply from server and print them to Serial
  while (client1.available()) {
    String line = client1.readStringUntil('\r');
    Serial.print(line);
  }
  Serial.println();
  Serial.println("closing connection");
}
