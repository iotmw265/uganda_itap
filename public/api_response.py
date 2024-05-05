import requests
import json

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

print (tank_name)
print(metres)
print(percentage)
print(litres)
print(last_posted)