import requests

url = 'http://hyrome.freeboxos.fr:6880/maxime/data.json'

r = requests.get(url)

print(r.text)
