import pymysql
import time
from datetime import datetime

db = pymysql.connect(host="127.0.0.1",user="imosys",password="2022@Intmosys",database="mlwt" )

      # prepare a cursor object using cursor() method
cursor = db.cursor() 

      # Prepare SQL query to read a controller ip the database.
sql = "select last_scanned_id, counts,id, posted_id from fuel_refills where serialNumber = %s  order by id desc limit 1;"
         # Execute the SQL command
serialNumber = '220641-10072'

cursor.execute(sql,(serialNumber))
         # Fetch all the rows in a list of lists.
resultsFromRefills = cursor.fetchall()
print(resultsFromRefills)
counts_old = 0
for data in resultsFromRefills:

  last_scanned = data[0]
  counts_old = int(data[1])
  posted_id= data[3]
                       
try: 
                    # Prepare SQL query to Do1 from the database.
    sql1 = "select VarB0,ID, ExactTime from tanks where SerialNumber = '"+str(serialNumber)+"' and VarB0 != "+str(counts_old)+" and id > "+ str(posted_id)+" order by id asc;"
                        # Execute the SQL command
                #  cursor.execute(sql1,(serialNumber,counts,posted_id))
    cursor.execute(sql1)
    resultsTanks = cursor.fetchall()
    print(sql1)
    time.sleep(2)
                    
    for rows in resultsTanks:
        
        #cursor.execute(sql,(serialNumber))
         # Fetch all the rows in a list of lists.
        #results = cursor.fetchall()
       # print(results)
       # for row2 in results:
                       
                        print('bingo')
                        conts = int(rows[0])
                        
                        print(conts)
                        print('here')
                        print(counts_old) 
                        
                        #time.sleep(1)
                        
                        
                        if(int(counts_old) < conts):
                          
                          difference =  conts - counts_old
                          print('clear')
                          
                          print(difference)
                          if (int(difference) > 40 ):
                            
                            sql_dup1 = """ INSERT INTO fuel_refills (posted_id, counts, posted_at, serialNumber, message, previous_counts) VALUES (%s,%s,%s,%s,%s, %s) """
                            insert_values1=  ( rows[1], rows[0], rows[2], serialNumber, 'refill', counts_old)
                            
                            counts_old = int(rows[0])
                            
                            try:

                                cursor.execute(sql_dup1,insert_values1)
                                db.commit()
                                print('data inserted')
                                
                            except Exception as e:
                            
                                print ("Error1: " + str(e) + "\n")			   # Rollback in case there is any error
                                db.rollback() 
                                
                                   
                        elif (int(counts_old) > int(conts)):
                          
                          difference = counts_old - conts
                          
                          print(difference)
                          if (int(difference) > 40):
                            
                            sql_dup1 = """ INSERT INTO fuel_refills (posted_id, counts, posted_at, serialNumber, message, previous_counts) VALUES (%s,%s,%s,%s,%s, %s) """
                            insert_values1=  ( rows[1], rows[0], rows[2], serialNumber, 'drop',counts_old)
                            
                            counts_old = int(rows[0])
                            
                            try:

                                cursor.execute(sql_dup1,insert_values1)
                                db.commit()
                                print('data inserted')
                                
                            except Exception as e:
                            
                                print ("Error1: " + str(e) + "\n")			   # Rollback in case there is any error
                                db.rollback() 
                                
                                
                        sql3 = """UPDATE fuel_refills SET last_scanned_id =%s WHERE id='%s' """
                            
                        insert_values=  ( rows[1], data[2] )
                        print (insert_values)
                        try:

                                cursor.execute(sql3,insert_values)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                           
                        except Exception as e:
                                print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                                db.rollback()  
            
except Exception as e:
                                print ("Error: " + str(e) + "\n")			   # Rollback in case there is any error
                                db.rollback()  


time.sleep(2)   

db.close()        
