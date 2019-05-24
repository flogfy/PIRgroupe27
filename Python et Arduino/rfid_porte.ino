#include <Arduino.h>
#include <Wire.h>
#include <SPI.h>
#include <Adafruit_PN532.h>

// If using the breakout with SPI, define the pins for SPI communication.
#define PN532_SCK  (2)
#define PN532_MOSI (3)
#define PN532_SS   (4)
#define PN532_MISO (5)

// If using the breakout or shield with I2C, define just the pins connected
// to the IRQ and reset lines.  Use the values below (2, 3) for the shield!
#define PN532_IRQ   (2)
#define PN532_RESET (3)  // Not connected by default on the NFC Shield


// This line is for a breakout or shield with an I2C connection:
Adafruit_PN532 nfc(PN532_IRQ, PN532_RESET);

#if defined(ARDUINO_ARCH_SAMD)
// for Zero, output on USB Serial console, remove line below if using programming port to program the Zero!
// also change #define in Adafruit_PN532.cpp library file
   #define Serial SerialUSB
#endif

// Connection for
int openDoor =0;
int relay = 7;

void setup(void) {
  #ifndef ESP8266
    while (!Serial); // for Leonardo/Micro/Zero
  #endif
  Serial.begin(115200);
  //Serial.println("Hello!");
  nfc.begin();
  // Define your 'secret' 16 byte key in program memory (flash memory)
  const uint8_t key[] PROGMEM = {0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07,
                                0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f};
  // to start hashing initialize with your key

  uint32_t versiondata = nfc.getFirmwareVersion();
  if (! versiondata) {
    while (1); // halt
  }

  // configure board to read RFID tags
  nfc.SAMConfig();

  //Le pin du relais est en mode output
  pinMode(relay,OUTPUT);
}


void loop(void) {
  //fermeture de la porte dans tous les cas
  digitalWrite(relay, HIGH);
  uint8_t success;
  uint8_t uid[] = { 0, 0, 0, 0, 0, 0, 0 };  // Buffer to store the returned UID
  uint8_t uidLength;                        // Length of the UID (4 or 7 bytes depending on ISO14443A card type)

  // Wait for an ISO14443A type cards (Mifare, etc.).  When one is found
  // 'uid' will be populated with the UID, and uidLength will indicate
  // if the uid is 4 bytes (Mifare Classic) or 7 bytes (Mifare Ultralight)
  success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, uid, &uidLength);

  if (success) {

    // Send UID value
    //nfc.PrintHex(uid, uidLength);       //possibilité de voir ça plus proprement : 0x32 0x15 0xE0 0xC3
    nfc.PrintHexChar(uid, uidLength);     // plus facile à récupérer raspberry : 3215E0C3
    //Serial.println(uid);
    while(Serial.available() == 0){
      // read the incoming byte:
      openDoor = Serial.read();
      if (openDoor==1){
        digitalWrite(relay, LOW);
        // opening door of 10s
        delay(10000);
        // closing door
        digitalWrite(relay, HIGH);
        break;
      }
      if(openDoor == 0){
        //la porte ne s'ouvre pas
        break;
      }
    }
  }
}
