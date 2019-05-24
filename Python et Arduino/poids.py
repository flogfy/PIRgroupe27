 
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
serpoids = serial.Serial('/dev/ttyACM0', 115200)

conn = mysql.connector.connect(host="localhost",user="root",password="7nains", database="PIRBDDv1")
cursor = conn.cursor()
tableau=[]
print('Waiting for a card')
while 1 :

    tableau.append(serpoids.readline())
    
    # convert bytes to str
    uid1 = int(tableau[0]) #.decode("utf-8")
    print(uid1)
    
    
    ###########Regarder si le numero est dans la BDD####
    cursor.execute("""SELECT * FROM Matériel WHERE id_materiel = '%s'""", (uid1))#erreur de syntake uid1 doit prendre la valeur de %s
    row = cursor.fetchone()
    print(row)
    if row!=None :
        
        print("Nom Matériel")
        print(row[1])
        tableau=[]
        tableau.append(serpoids.readline())
        # convert bytes to str
        uid2 = int(tableau[0])
        print(uid2)
        ###on va convertir la valeur de poids en int
        poidsunitbdd=row[3]
        quantitebdd=row[2]
        poidstotalbdd=quantitebdd*poidsunitbdd
        poidsserial=uid2
        if(abs(poidstotalbdd-poidsserial)>200):
            if(row[4]==0):
                print("alerteactivée")
                cursor.execute("""UPDATE Matériel SET alertepoids=1 WHERE id_materiel='%s'""",(uid1))#erreur de syntake uid1 doit prendre la valeur de %s
        else:
            print("pas d'alerte")
            if(row[4]==1):
                cursor.execute("""UPDATE Matériel SET alertepoids=1 WHERE id_materiel='%s'""",(uid1))#erreur de syntake uid1 doit prendre la valeur de %s
                print("alarmedesactivee")

    else:
        print("Erreur aucun materiel correspondant a ce pin")

     ####Puis on vite le tableau pour passer a l'autre com serial
    tableau=[]
