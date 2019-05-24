/* 
 
Connect one end of FSR to power, the other end to Analog 0.
Then connect one end of a 10K resistor from Analog 0 to ground  */
int nbcapteurs=1;

int capteurcalcule;     // 
int i=0;

void setup(void) {
  Serial.begin(115200);   // We'll send debugging information via the Serial monitor
}
 
void loop(void) {
  
  int capteur[nbcapteurs];     // the analog reading from the FSR resistor divider
  for(i=0;i<nbcapteurs;i++){
     capteur[i] = analogRead(i);//On considère les 4 capteurs branchés sur les pins 1,2,3,4
  // analog voltage reading ranges from about 0 to 1023 which maps to 0V to 5V (= 5000mV)
  capteurcalcule = map(capteur[i], 0, 1023, 0, 5000);
  capteurcalcule=20+0.996*capteurcalcule; //pour convertir la valeur entre 0 et 5000 entre une valeur entre 20grammes et 5kilos
  Serial.println(i);
  delay(0.5);
  Serial.println(capteurcalcule);
  delay(4000);
  }
}
