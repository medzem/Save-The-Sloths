# =============================================================================
# Importer les bibliothèques :
# =============================================================================

import mysql.connector
import numpy as np
import xlsxwriter

from scipy import spatial

# =============================================================================
# Les fonction:
# =============================================================================

def SimilariteCosinus(IdUser1,IdUser2):
    return (1- spatial.distance.cosine(Rating[:,IdUser1],Rating[:,IdUser2]))


def isSimilar(IdUser1,IdUser2):
    return (SimilariteCosinus(IdUser1,IdUser2)>0.45)


def MaxSim(L,U,n):
    
    S=set()
    L[U]=0
    
    for i in range(n):
        S.add(np.argmax(L))
        L[np.argmax(L)]=0
        
    return S


def ListToStr(L):
    Ch=""
    for i in L:
        Ch+=str(i)+','
    
    return Ch[:-1]


# =============================================================================
# Récupération des données:
# =============================================================================
    
conn = mysql.connector.connect(host="localhost",user="root",password="", database="slothbd")
cursor = conn.cursor()

cursor.execute("SELECT MAX(ID) FROM items")
NbItems= cursor.fetchall()[0][0]

cursor.execute("SELECT MAX(ID) FROM user")
NbUsers = cursor.fetchall()[0][0]

Rating = np.zeros((NbUsers,NbItems))
 
workbook = xlsxwriter.Workbook('Rating.xlsx')
worksheet = workbook.add_worksheet()


cursor.execute("select * from review")

for ligne in cursor.fetchall():
    Rating[ligne[0]-1][ligne[1]-1]=ligne[2]
    
    

row = 0

for col, data in enumerate(Rating):
    worksheet.write_column(row, col, data)

workbook.close()


# =============================================================================
# Calcul de similarité:
# =============================================================================

workbook = xlsxwriter.Workbook('SimUser.xlsx')
worksheet = workbook.add_worksheet()


SimUser= np.zeros((NbUsers,NbUsers))
for u1 in range(NbUsers):
    for u2 in range(NbUsers):
        SimUser[u1][u2]=SimilariteCosinus(u1,u2)

SimUser[np.isnan(SimUser)]=0

row = 0

for col, data in enumerate(SimUser):
    worksheet.write_column(row, col, data)

workbook.close()

# =============================================================================
#  les N Users les plus similaires:
# =============================================================================

DictSimUser={}

for i in range(NbUsers):
    for j in range(NbUsers):
        if(isSimilar(i,j)):
            if i in DictSimUser:
              DictSimUser[i].append(j+1)
            else:
              DictSimUser[i]=[j+1]
              

for k in DictSimUser.keys():
    print("User ",k+1," is similar to :", DictSimUser[k])

print("\n--------------------------------------------------------------\n")


n= int(input("Choose the number of Users: "))

for u1 in range (NbUsers):
    
    Sim=[u+1 for u in MaxSim(SimUser[u1],u1,n)]
    
    print("Top ",n," similar Users to the User ",u1+1,":",Sim)
    
    SimCh=ListToStr(Sim)
    
    sql="INSERT IGNORE INTO simuser (Id_User, Sim_Users) VALUES (%s,%s) ON DUPLICATE KEY UPDATE Sim_Users= %s"
    val=(str(u1+1),SimCh,SimCh)
    cursor.execute(sql,val)

    conn.commit()
conn.close()



"""
for s in range (NbUsers):
    maxi=0
    IdMax=[]
    
    for z in range(NbUsers):
        if(SimUser[s][z]>maxi and SimUser[s][z]<1):
            maxi=z
            idMaxi= maxi+1
    print("Top 1 du User",s+1,"est",idMaxi )
"""
