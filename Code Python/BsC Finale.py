# =============================================================================
# Importer les bibliothèques :
# =============================================================================

import numpy as np
import mysql.connector

import nltk
from nltk.corpus import stopwords

from nltk.stem.snowball import SnowballStemmer


import xlsxwriter

from scipy import spatial

# =============================================================================
# Les fonction:
# =============================================================================

def SimilariteCosinus(IdItem1,IdItem2):
    return (1- spatial.distance.cosine(matriceBin[IdItem1],matriceBin[IdItem2]))


def isSimilar(IdItem1,IdItemr2):
    return (SimilariteCosinus(IdItem1,IdItemr2)>0.1)


def MaxSim(L,I,n):
    
    S=set()
    L[I]=0
    
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
# TOKENISATION ET STEMMING
# =============================================================================
  
conn = mysql.connector.connect(host="localhost",user="root",password="", database="slothbd")
cursor=conn.cursor()

stop=set(stopwords.words('english'))
stop=list(stop)
stop.extend([".",",","-",";","?","(",")",":","!","Sloth","sloth","Slothy","sloths","Slothed","Slother"])

snowball=SnowballStemmer("english")

MotsUniques=set()
NbMots=0

cursor.execute("SELECT MAX(ID) FROM items")
NbPdts= cursor.fetchall()[0][0]

DictMots={}

cursor.execute("select * from items")

for ligne in cursor.fetchall():
    
        desc=ligne[2]
        
        mots=nltk.word_tokenize(desc)
        
        Mots=[m for m in mots if m not in stop]

        MotsStemS=[]
        for m in Mots:
            MotsStemS.append(snowball.stem(m))
            for m in MotsStemS:
                MotsUniques.add(m)
                DictMots[ligne[0]]=MotsStemS
        
# =============================================================================
# Calcul de similarité:
# =============================================================================

workbook = xlsxwriter.Workbook('BinItem.xlsx')
worksheet = workbook.add_worksheet()


NbMots=len(MotsUniques)

matriceBin=np.zeros((NbPdts,NbMots))
for i in range (NbPdts):
    j=0
    for m in MotsUniques:
        if(m in DictMots[i+1]):
            matriceBin[i][j]=1
        j+=1
        
        
row = 0
for col, data in enumerate(matriceBin):
    worksheet.write_column(row, col, data)
workbook.close()

# =============================================================================

workbook = xlsxwriter.Workbook('SimItem.xlsx')
worksheet = workbook.add_worksheet()


SimItem=np.zeros((NbPdts,NbPdts))
for s in range(NbPdts):
    for z in range (NbPdts):
        SimItem[s][z]=SimilariteCosinus(s,z)
      
        
row = 0
for col, data in enumerate(SimItem):
    worksheet.write_column(row, col, data)
workbook.close()


# =============================================================================
#  les N Produits les plus similaires:
# =============================================================================

DictSimItem={}

for i in range(NbPdts):
    for j in range(NbPdts):
        if(isSimilar(i,j)):
            if i in DictSimItem:
              DictSimItem[i].append(j+1)
            else:
              DictSimItem[i]=[j+1]

for k in DictSimItem.keys():
    print("Item ",k+1," is similar to :", DictSimItem[k])


print("\n--------------------------------------------------------------\n")



n= int(input("Choose the number of Items: "))
for i1 in range (NbPdts):
    
    Sim=[i+1 for i in MaxSim(SimItem[i1],i1,n)]
    
    print("Top ",n," similar Items to the item ",i1+1,":",Sim)
    
    SimCh=ListToStr(Sim)
    
    sql="INSERT INTO simitem (Id_Item, Sim_Items) VALUES (%s,%s) ON DUPLICATE KEY UPDATE Sim_Items= %s"
        
    val=(str(i1+1),SimCh,SimCh)
    cursor.execute(sql,val)

    conn.commit()
conn.close()
