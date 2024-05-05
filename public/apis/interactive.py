import requests
import json
import pymysql
import math


while True:

    db = pymysql.connect(host="127.0.0.1",user="root",password="2022@Intmosys",database="mlwt" )

        # prepare a cursor object using cursor() method
    cursor = db.cursor() 

    token = '5671054321:AAGsxXZZuqIBpULHlmoC_8P9XQz2LY5RLQY'
    chat_id = '-690727139'

    # Prepare SQL query to read a controller ip the database.
    sql = """SELECT id, user_name , message ,user_id from telegram_requests where status = 'pending' """
            
    # Execute the SQL command
    cursor.execute(sql)

    tokens_unresponded = cursor.fetchall()

    for row in tokens_unresponded:
        message_id = row[0]
        username = row[1]
        message = row[2]
        user_id=row[3]
        
        #print ("this is the gatway:"+ gateway)
        user_input=[]

        user_input.append(message)

        last_word= user_input[-1]
                                    #splitting the array
        sname= last_word.split()
        
        #print( sname[1])
        targeted_at = sname[1]
        rm = sname[:-1]

        length= len(rm)

        track = []
        track1=[]
        name =[]
        device=[]
        did_not_post=[]
        did_post=[]

        user_site_input=rm[0]
                                    
        user_site_input = str(user_site_input)
        print (user_site_input + user_site_input)

        print (type(user_site_input))
        print (type(length))
        print (length)
                                
        power_voltage =[]
        
        if targeted_at == '@iotMW_bot':

          if user_site_input == "Tanks" or user_site_input =="tanks":
                                            print("bingo")

                                            
                                            try:           
                                                        sites=[]
                                                        # Prepare SQL query to Do1 from the database.
                                                        sql = "SELECT REPLACE( assertId, '_', ' ' ) from devices WHERE id in (1,2,3,4,5,6,7)  ORDER BY id ASC"
                                                        # Execute the SQL command
                                                        cursor.execute(sql)
                                                        # Fetch all the rows in a list of lists.
                                                        all_sites = cursor.fetchall()
                                                        for row in all_sites:

                                                            sites.append(row[0])

                                                            stext = '''
                                                        <a href="tg://user?id={}">@{}</a>'''.format(user_id,username)

                                                        for idx, item in enumerate(sites, start=1):
                                                            res= ("%d. %s" % (idx, item))
                                                            track.append(res)
                                                            
                                                        print (track)

                                                        text = stext + "\nHere is a list of all Tanks :\n" + ' \n'.join(track) +"\n"                       
                                                        to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, text)
                                                        resp = requests.get(to_url)
                                                        print("response sent list")
                                                        
                                                        sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """

                                                        try:

                                                                 cursor.execute(sql_dup,('response sent',message_id))
                                                                 db.commit()
                                                                 print('Record Successfully updated..................................................................................................................\n')
                                                 
                                                        except Exception as e:
                            
                                                              print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                                                              #db.rollback()      

                                            except:
                                                pass                                         

          elif  rm[0].isnumeric() == True:
            print ("hello")

            full_user_input = rm[0]
            print (full_user_input)
            full_user2 = 0
            print (full_user2)
            full_user=float(full_user_input.rsplit(' ', 1)[0])
            print (full_user)
                                        #full_user2=int(full_user)

            numm= (math.trunc(full_user))
            print('dimmercate')
            print(numm)
            print(type(length))

            if (length == 1 and numm != "" ):   
                        print ("passed") 
                        print (numm)
                        stext = ''' <a href="tg://user?id={}">@{}</a>'''.format(user_id,username)

                        if (numm < 6):

                          #ltc
                          if numm == 1:

                            try:

                                url = 'https://www.iot.mw/api/hourlyBT'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)
        
                                LTC_tank_name = response_info['LTC'][0][1]
                                LTC_metres = response_info['LTC'][1][1]
                                LTC_percentage = response_info['LTC'][2][1]
                                LTC_litres = response_info['LTC'][3][1]
                                LTC_last_posted = response_info['LTC'][4][1]
                                LTC_battery = response_info['LTC'][5][1]

                                msg = "Tank name: LTC" + "\n\nWater level: "+ LTC_metres +"m ("+ LTC_percentage+"%)\nWater in Liters: "+ LTC_litres+"L\nAs of: " + LTC_last_posted + "\nBattery voltage: " + LTC_battery + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                #msg = "Tank name: " + tank_name.capitalize() + "\n\nWater level: "+ str(water_level)+ "m of "+ str(max_height) +"m ("+ str(water_level_perc)+"%)\nWater in Liters: "+ str(water_litres) +" of 5000"+"\nAs of: " + str(timestamp) + "\nBattery voltage: " + str(BatteryLevel) + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                print(message_id)

                                sql_dup1 = "UPDATE telegram_requests SET status='response sent' WHERE id="+str(message_id) 
                                cursor.execute(sql_dup1)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    

                            except:
                                print ("Error2: " + str(e) + "\n")
                          
                          #lab
                          elif numm ==2 :

                            try:

                                url = 'https://www.iot.mw/api/hourlyBT'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)
        
                                LAB_tank_name = response_info['Lab'][0][1]
                                LAB_metres = response_info['Lab'][1][1]
                                LAB_percentage = response_info['Lab'][2][1]
                                LAB_litres = response_info['Lab'][3][1]
                                LAB_last_posted = response_info['Lab'][4][1]
                                LAB_battery = response_info['Lab'][5][1]

                                msg = "Tank name: Lab" + "\n\nWater level: "+ LAB_metres +"m ("+ LAB_percentage+"%)\nWater in Liters: "+ LAB_litres+"L\nAs of: " + LAB_last_posted + "\nBattery voltage: " + LAB_battery + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                #msg = "Tank name: " + tank_name.capitalize() + "\n\nWater level: "+ str(water_level)+ "m of "+ str(max_height) +"m ("+ str(water_level_perc)+"%)\nWater in Liters: "+ str(water_litres) +" of 3500"+"\nAs of: " + str(timestamp) + "\nBattery voltage: " + str(BatteryLevel) + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                print(message_id)

                                sql_dup1 = "UPDATE telegram_requests SET status='response sent' WHERE id="+str(message_id) 
                                cursor.execute(sql_dup1)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    

                            except:
                                print ("Error2: " + str(e) + "\n")

                          #ck1
                          elif numm == 3:

                            try:

                                url = 'https://www.iot.mw/api/hourlyCK'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)
        
                                CK1_tank_name = response_info['CK1'][0][1]
                                CK1_metres = response_info['CK1'][1][1]
                                CK1_percentage = response_info['CK1'][2][1]
                                CK1_litres = response_info['CK1'][3][1]
                                CK1_last_posted = response_info['CK1'][4][1]
                                CK1_battery = response_info['CK1'][5][1]


                                msg = "Tank name: Chikwawa 1 (water)" + "\n\nWater level: "+ CK1_metres +"m ("+ CK1_percentage+"%)\nWater in Liters: "+ CK1_litres+"L\nAs of: " + CK1_last_posted + "\nBattery voltage: " + CK1_battery + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                #msg = "Tank name: " + tank_name.capitalize() + "\n\nWater level: "+ str(water_level)+ "m of "+ str(max_height) +"m ("+ str(water_level_perc)+"%)\nWater in Liters: "+ str(water_litres) +" of 5000"+"\nAs of: " + str(timestamp) + "\nBattery voltage: " + str(BatteryLevel) + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                print(message_id)

                                sql_dup1 = "UPDATE telegram_requests SET status='response sent' WHERE id="+str(message_id) 
                                cursor.execute(sql_dup1)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    

                            except:
                                print ("Error2: " + str(e) + "\n")

                          #ck2
                          elif numm == 4:

                            try:

                                url = 'https://www.iot.mw/api/hourlyCK'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)
         
                                CK2_tank_name = response_info['CK2'][0][1]
                                CK2_metres = response_info['CK2'][1][1]
                                CK2_percentage = response_info['CK2'][2][1]
                                CK2_litres = response_info['CK2'][3][1]
                                CK2_last_posted = response_info['CK2'][4][1]
                                CK2_battery = response_info['CK2'][5][1]


                                msg = "Tank name: Chikwawa 2 (water)"+ "\n\nWater level: "+ CK2_metres +"m ("+ CK2_percentage+"%)\nWater in Liters: "+ CK2_litres+"L\nAs of: " + CK2_last_posted + "\nBattery voltage: " + CK2_battery + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                #msg = "Tank name: " + tank_name.capitalize() + "\n\nWater level: "+ str(water_level)+ "m of "+ str(max_height) +"m ("+ str(water_level_perc)+"%)\nWater in Liters: "+ str(water_litres) +" of 5000"+"\nAs of: " + str(timestamp) + "\nBattery voltage: " + str(BatteryLevel) + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                print(message_id)

                                sql_dup1 = "UPDATE telegram_requests SET status='response sent' WHERE id="+str(message_id) 
                                cursor.execute(sql_dup1)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    

                            except:
                                print ("Error2: " + str(e) + "\n")

                          #ck3
                          elif numm == 5:

                            try:

                                url = 'https://www.iot.mw/api/hourlyCK'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output) 
         
                                CK3_tank_name = response_info['CK3'][0][1]
                                CK3_metres = response_info['CK3'][1][1]
                                CK3_percentage = response_info['CK3'][2][1]
                                CK3_litres = response_info['CK3'][3][1]
                                CK3_last_posted = response_info['CK3'][4][1]
                                CK3_battery = response_info['CK3'][5][1]


                                msg = "Tank name: Chikwawa 3 (water)" + "\n\nWater level: "+ CK3_metres +"m ("+ CK3_percentage+"%)\nWater in Liters: "+ CK3_litres+"L\nAs of: " + CK3_last_posted + "\nBattery voltage: " + CK3_battery + "v\n" + "\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                print(message_id)

                                sql_dup1 = "UPDATE telegram_requests SET status='response sent' WHERE id="+str(message_id) 
                                cursor.execute(sql_dup1)
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    

                            except:
                                print ("Error2: " + str(e) + "\n")

                        elif(numm >= 6 ):
                            
                          #bt fuel 
                          if (numm == 6):
                              
                            print('here')

                            sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """
                            sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """

                            try:
                                
                                url = 'https://www.iot.mw/api/telegramBT'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)

                                #print('The response from the server is: \n', output)
                                print(response_info['fuel'][0])
                                tank_name = response_info['fuel'][0][1]
                                metres = response_info['fuel'][1][1]
                                percentage = response_info['fuel'][2][1]
                                litres = response_info['fuel'][3][1]
                                last_posted = response_info['fuel'][4][1]
                                BatteryLevel = response_info['fuel'][5][1]


                                msg = "Tank name: Blantyre (Fuel Tank)"+ "\n\nFuel Level: "+ str(metres)+" ("+ str(percentage)+"%)\nFuel in Litres: "+ litres +"("+percentage+"%)\nAs of: " + last_posted + "\nBattery voltage: " + str(BatteryLevel) + "v\n\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                
                                cursor.execute(sql_dup,('sent',message_id))
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    
                            except Exception as e:
                                
                                print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                                #db.rollback()  

                          elif (numm == 7):
                              
                            print('here')

                            sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """
                            sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """

                            try:
                                
                                url = 'https://www.iot.mw/api/telegramCK'
                                form_data = {'name': 'get_data'}
                                server = requests.post(url, data=form_data)
                                output = server.text
                                response_info = json.loads(output)

                                #print('The response from the server is: \n', output)
                                print(response_info['fuel'][0])
                                tank_name = response_info['fuel'][0][1]
                                metres = response_info['fuel'][1][1]
                                percentage = response_info['fuel'][2][1]
                                litres = response_info['fuel'][3][1]
                                last_posted = response_info['fuel'][4][1]
                                BatteryLevel = response_info['fuel'][5][1]

                                msg = "Tank name: Chikwawa (Fuel Tank)"+ "\n\nFuel Level: "+ str(metres)+" ("+ percentage+"%)\nFuel in Litres: "+ litres +"("+percentage+"%)\nAs of: " + str(last_posted) + "\nBattery voltage: " + str(BatteryLevel) + "v\n\n[*NOTE*: IOT Autogenerated message]"
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
                                resp = requests.get(to_url)
                                print("response sent")
                                
                                cursor.execute(sql_dup,('sent',message_id))
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    
                            except Exception as e:
                                
                                print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                                #db.rollback()  

                          elif(numm >= 8):

                            sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """

                            try:
                                text = stext + "\nYou have entered an invalid tank number. Use the Tanks command and pick the right number. "                       
                                to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, text)
                                resp = requests.get(to_url)
                                print("response sent list")
                                cursor.execute(sql_dup,('invalid number',message_id))
                                db.commit()
                                print('Record Successfully updated..................................................................................................................\n')
                                                    
                            except Exception as e:
                                
                                print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                                #db.rollback()  
          else:

                        sql_dup = """UPDATE telegram_requests SET status=%s WHERE id=%s """

                        try:
                            #text = stext + "\nYou have entered an invalid command."                       
                            #to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, text)
                            #resp = requests.get(to_url)
                            #print("response sent list")
                            cursor.execute(sql_dup,('invalid command',message_id))
                            db.commit()
                            print('Record Successfully updated..................................................................................................................\n')
                                                 
                        except Exception as e:
                            
                            print ("Error2: " + str(e) + "\n")			   # Rollback in case there is any error
                            #db.rollback() 
        else:
            print('not mine')

    db.close()


