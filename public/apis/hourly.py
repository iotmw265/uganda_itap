import requests
import pymysql
import json

try:

    db = pymysql.connect(host="127.0.0.1",user="root",password="2022@Intmosys",database="mlwt" )

        # prepare a cursor object using cursor() method
        
    token = '5671054321:AAGsxXZZuqIBpULHlmoC_8P9XQz2LY5RLQY'
    chat_id = '-690727139'
    cursor = db.cursor() 
    
    try:
        
        #blantyre
        #LTC

        url = 'https://www.iot.mw/api/hourlyBT'
        form_data = {'name': 'get_data'}
        server = requests.post(url, data=form_data)
        output = server.text
        response_info = json.loads(output)
        #fuel tank 
        LAB_tank_name = response_info['Lab'][0][1]
        LAB_metres = response_info['Lab'][1][1]
        LAB_percentage = response_info['Lab'][2][1]
        LAB_litres = response_info['Lab'][3][1]
        LAB_last_posted = response_info['Lab'][4][1]

        
        LTC_tank_name = response_info['LTC'][0][1]
        LTC_metres = response_info['LTC'][1][1]
        LTC_percentage = response_info['LTC'][2][1]
        LTC_litres = response_info['LTC'][3][1]
        LTC_last_posted = response_info['LTC'][4][1]

        FUEL_tank_name = response_info['fuel'][0][1]
        FUEL_metres = response_info['fuel'][1][1]
        FUEL_percentage = response_info['fuel'][2][1]
        FUEL_litres = response_info['fuel'][3][1]
        FUEL_last_posted = response_info['fuel'][4][1]

        msg = "Current Trends for Blantyre Tanks:\n\nLTC: " + LTC_metres + "m\n" + LTC_litres+"L ("+LTC_percentage+"%)\n\nLab: " + LAB_metres + "m\n" + LAB_litres+"L ("+LAB_percentage+"%)\n\nFuel: " + FUEL_metres + "m\n" + FUEL_litres+"L ("+FUEL_percentage+"%)\n\n[NOTE: IOT generated message]" 
        #msg = "Current Trends for Blantyre Tanks:\n\n" + "LTC Tank: " + str(LTC_water_level) + "m of 1.9m (" +str(LTC_water_perc) + "%)\nLab Tank: " + str(LAB_water_level) + "m of 0.72m (" + str(LAB_water_perc) + "%)\nFuel Tank: " + metres +  " - "+litres + " ("+ percentage+"%)\n\n[NOTE: IOT generated message]" 
        to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
        resp = requests.get(to_url)
        print(msg)
        print("response sent")
 

    except Exception as e:
        print ("Error1: " + str(e) + "\n")
        
        
    try:
        
        #chikwawa

        url = 'https://www.iot.mw/api/hourlyCK'
        form_data = {'name': 'get_data'}
        server = requests.post(url, data=form_data)
        output = server.text
        response_info = json.loads(output)
        #fuel tank 
        CK1_tank_name = response_info['CK1'][0][1]
        CK1_metres = response_info['CK1'][1][1]
        CK1_percentage = response_info['CK1'][2][1]
        CK1_litres = response_info['CK1'][3][1]
        CK1_last_posted = response_info['CK1'][4][1]

        
        CK2_tank_name = response_info['CK2'][0][1]
        CK2_metres = response_info['CK2'][1][1]
        CK2_percentage = response_info['CK2'][2][1]
        CK2_litres = response_info['CK2'][3][1]
        CK2_last_posted = response_info['CK2'][4][1]

        
        CK3_tank_name = response_info['CK3'][0][1]
        CK3_metres = response_info['CK3'][1][1]
        CK3_percentage = response_info['CK3'][2][1]
        CK3_litres = response_info['CK3'][3][1]
        CK3_last_posted = response_info['CK3'][4][1]

        CK_FUEL_tank_name = response_info['fuel'][0][1]
        CK_FUEL_metres = response_info['fuel'][1][1]
        CK_FUEL_percentage = response_info['fuel'][2][1]
        CK_FUEL_litres = response_info['fuel'][3][1]
        CK_FUEL_last_posted = response_info['fuel'][4][1]


        msg = "Current Trends for Chikwawa Tanks:\n\nTank 1: " + CK1_metres + "m\n" + CK1_litres+"L ("+CK1_percentage+"%)\n\nTank 2: " + CK2_metres + "m\n" + CK2_litres+"L ("+CK2_percentage+"%)\n\nTank 3: " + CK3_metres + "m\n" + CK3_litres+"L ("+CK3_percentage+"%)\n\nFuel: " + CK_FUEL_metres + "m\n" + CK_FUEL_litres+"L ("+CK_FUEL_percentage+"%)\n\n[NOTE: IOT generated message]" 
        to_url = 'https://api.telegram.org/bot{}/sendMessage?chat_id={}&text={}&parse_mode=HTML'.format(token, chat_id, msg)
        resp = requests.get(to_url)
        print(msg)
        print("response sent")
 

    except Exception as e:
        print ("Error3: " + str(e) + "\n")

except Exception as e:
        print ("Error2: " + str(e) + "\n")
