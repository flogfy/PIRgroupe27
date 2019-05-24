 
#import sys     # pour la gestion des parametres
#import serial  # bibliothèque permettant la communication série
#On écrit dans l'interface /dev/ttyUSB0 à 9600 bauds
#ser = serial.Serial('/dev/ttyACM0', 115200)
#On écrit dans la console série de l'Arduino la lettre passée en paraètre lors de l'éxecution de la commande :
#ser.write(sys.argv[1])
#print(sys.argv[1])

import hashlib
import serial
import mysql.connector
ser = serial.Serial('/dev/ttyACM0', 115200)
conn = mysql.connector.connect(host="localhost",user="root",password="7nains", database="PIRBDDv1")
cursor = conn.cursor()
tableau=[]
print('Waiting for a card')
while 1 :
	# recover uid student card send from arduino
    tableau.append(ser.readline())
    
    # convert bytes to str
    uid = tableau[0].decode("utf-8")
    print('type:', type(uid), ' uid:', uid)
    
    # to use hash, it is necessary to convert uid in bytes
    print(hashlib.sha224(str.encode(uid)).hexdigest())
    
    ###########Regarder si le numero est dans la BDD####
    cursor.execute("""SELECT * FROM Utilisateur WHERE etud_key = %s""", (tableau))
    row = cursor.fetchone()
    if row!=None :
        print(row)
        print("Utilisateur reconnu")
        ###Si oui alors on va enregistrer un passage de porte et déverouiller porte
        if(row[2]==1):
            cursor.execute("""INSERT INTO Passageporte(etud_id) VALUES(%s)""", row[0])
            #ser.write(b'1')    #ON envoie 1 a l'arduino pour qu'il ouvre la porte.
            
    
    

        
    ####Sinon on ne fait rien
    else:
        print("Erreur utilisateur non-enregistré")

    ####Puis on vite le tableau pou recommencer
    tableau=[]
