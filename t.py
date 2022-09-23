# from ecapture import ecapture 

# ecapture.capture(0,'gala','img.jpg')

import matplotlib.pyplot as plt 
import mysql.connector as data
import pandas as pd 
import numpy as py 
import sklearn.externals as sk 

msql = data.connect(host = 'localhost',user = 'lagarxia',password = 'linux' , database = 'exer')

cur = msql.cursor()
cur.execute('select * from user')
t = cur.fetchall()

for i in t:
    print(i)

fille = [50,800,100,250,322,100,500]
year  = [2017,2018,2018,2019,2020,2021,2022]


plt.bar(year,fille, color = 'r' , label = 'legende')
plt.xlabel('annee d evolution'.upper())
plt.ylabel('filles evolution'.upper())
plt.title('evolution des filles par annee'.title())
plt.grid(True)
plt.legend()
plt.show()